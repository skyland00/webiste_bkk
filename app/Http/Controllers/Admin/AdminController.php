<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerusahaanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.dashboard');
    }

    function perusahaan(Request $request)
    {
        $perPage = $request->get('per_page', 15);
        $search = $request->get('search', '');
        $statusFilter = $request->get('status', 'all'); // all, pending, approved, rejected

        // Gunakan select untuk membatasi kolom yang dimuat
        $query = PerusahaanModel::with(['user:id,email'])
            ->select('id', 'user_id', 'nama_perusahaan', 'logo', 'kontak', 'bidang_usaha', 'status', 'created_at')
            ->latest();

        // Filter berdasarkan status
        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        // Filter berdasarkan search
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

        // Gunakan query yang lebih efisien untuk statistik
        // Cache hasil ini jika datanya jarang berubah

        $statusCounts = Cache::remember('perusahaan_status_counts', 300, function () {
            return PerusahaanModel::selectRaw('status, COUNT(*) as count')
                ->groupBy('status')
                ->pluck('count', 'status');
        });

        $approvedCount = $statusCounts['approved'] ?? 0;
        $pendingCount = $statusCounts['pending'] ?? 0;
        $rejectedCount = $statusCounts['rejected'] ?? 0;
        $totalClean = $approvedCount;

        // Jika request AJAX, return JSON
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
}
