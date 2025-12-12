<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerusahaanModel;
use App\Models\LowonganModel;
use App\Models\PelamarModel;
use App\Models\LamaranModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        // Statistik Cards
        $totalLowongan = LowonganModel::where('status', 'aktif')->count();
        $totalPerusahaan = PerusahaanModel::where('status', 'approved')->count();
        $totalSiswa = PelamarModel::count();
        $siswaDiterima = LamaranModel::where('status', 'diterima')->count();

        // Lowongan Terbaru (5 terakhir)
        $lowonganTerbaru = LowonganModel::with(['perusahaan'])
            ->where('status', 'aktif')
            ->latest()
            ->take(4)
            ->get();

        // Lamaran Terbaru (5 terakhir)
        $lamaranTerbaru = LamaranModel::with(['pelamar.user', 'lowongan.perusahaan'])
            ->latest()
            ->take(5)
            ->get();

        // Notifikasi
        $lamaranMenunggu = LamaranModel::where('status', 'menunggu')->count();
        $lowonganBerakhir = LowonganModel::where('status', 'aktif')
            ->whereDate('tanggal_tutup', '<=', now()->addDays(7))
            ->whereDate('tanggal_tutup', '>=', now())
            ->count();

        return view('admin.dashboard', compact(
            'totalLowongan',
            'totalPerusahaan',
            'totalSiswa',
            'siswaDiterima',
            'lowonganTerbaru',
            'lamaranTerbaru',
            'lamaranMenunggu',
            'lowonganBerakhir'
        ));
    }

    function perusahaan(Request $request)
    {
        $perPage = $request->get('per_page', 15);
        $search = $request->get('search', '');
        $statusFilter = $request->get('status', 'all');

        $query = PerusahaanModel::with(['user:id,email'])
            ->select('id', 'user_id', 'nama_perusahaan', 'logo', 'kontak', 'bidang_usaha', 'status', 'created_at')
            ->latest();

        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_perusahaan', 'like', "%{$search}%")
                    ->orWhere('kontak', 'like', "%{$search}%")
                    ->orWhere('bidang_usaha', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('email', 'like', "%{$search}%");
                    });
            });
        }

        $perusahaan = $query->paginate($perPage)->withQueryString();

        $statusCounts = Cache::remember('perusahaan_status_counts', 300, function () {
            return PerusahaanModel::selectRaw('status, COUNT(*) as count')
                ->groupBy('status')
                ->pluck('count', 'status');
        });

        $approvedCount = $statusCounts['approved'] ?? 0;
        $pendingCount = $statusCounts['pending'] ?? 0;
        $rejectedCount = $statusCounts['rejected'] ?? 0;
        $totalClean = $approvedCount;

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.partials.perusahaan_table', compact('perusahaan'))->render(),
                'pagination' => view('admin.partials.perusahaan_pagination', compact('perusahaan'))->render(),
                'total' => $perusahaan->total(),
                'from' => $perusahaan->firstItem(),
                'to' => $perusahaan->lastItem(),
            ]);
        }

        return view('admin.perusahaan', compact(
            'perusahaan',
            'totalClean',
            'approvedCount',
            'pendingCount',
            'rejectedCount',
            'perPage',
            'search',
            'statusFilter'
        ));
    }

    function approvePerusahaan($id)
    {
        $perusahaan = PerusahaanModel::findOrFail($id);
        $perusahaan->update(['status' => 'approved']);

        Cache::forget('perusahaan_status_counts');

        return back()->with('success', 'Perusahaan berhasil disetujui');
    }

    function rejectPerusahaan($id)
    {
        $perusahaan = PerusahaanModel::findOrFail($id);
        $perusahaan->update(['status' => 'rejected']);

        Cache::forget('perusahaan_status_counts');

        return back()->with('success', 'Perusahaan berhasil ditolak');
    }

    public function pengaturan()
    {
        return view('admin.pengaturan');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password saat ini harus diisi',
            'password.required' => 'Password baru harus diisi',
            'password.min' => 'Password baru minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Password saat ini tidak sesuai');
        }

        if (Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password baru tidak boleh sama dengan password lama');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil diperbarui');
    }
}