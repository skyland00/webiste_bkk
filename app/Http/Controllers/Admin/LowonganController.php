<?php
// app/Http/Controllers/Admin/LowonganController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LowonganModel;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index(Request $request)
    {
        // Filter & Search
        $search = $request->input('search', '');
        $statusFilter = $request->input('status', 'all');
        $perPage = $request->input('per_page', 10);

        $query = LowonganModel::with('perusahaan');

        // Search filter
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul_lowongan', 'like', '%' . $search . '%')
                  ->orWhere('lokasi', 'like', '%' . $search . '%')
                  ->orWhere('bidang', 'like', '%' . $search . '%')
                  ->orWhereHas('perusahaan', function ($p) use ($search) {
                      $p->where('nama_perusahaan', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('bidang_usaha', 'like', '%' . $search . '%');
                  });
            });
        }

        // Status filter
        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        $lowongans = $query->latest()->paginate($perPage);

        // Statistik
        $totalLowongan = LowonganModel::count();
        $activeCount = LowonganModel::where('status', 'aktif')->count();
        $inactiveCount = LowonganModel::where('status', 'nonaktif')->count();

        // AJAX response
        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json([
                'html' => view('admin.partials.lowongan_table', compact('lowongans'))->render(),
                'pagination' => view('admin.partials.lowongan_pagination', compact('lowongans'))->render(),
                'total' => $lowongans->total(),
                'from' => $lowongans->firstItem() ?? 0,
                'to' => $lowongans->lastItem() ?? 0,
            ]);
        }

        // Normal page load
        return view('admin.lowongan', compact(
            'lowongans',
            'totalLowongan',
            'activeCount',
            'inactiveCount',
            'search',
            'statusFilter',
            'perPage'
        ));
    }

    public function show($id)
    {
        $lowongan = LowonganModel::with(['perusahaan', 'lamaran.pelamar'])
            ->findOrFail($id);
        
        return view('admin.lowongan_show', compact('lowongan'));
    }

    public function destroy($id)
    {
        try {
            $lowongan = LowonganModel::findOrFail($id);
            $lowongan->delete();

            return redirect()
                ->route('admin.lowongan')
                ->with('success', 'Lowongan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.lowongan')
                ->with('error', 'Gagal menghapus lowongan');
        }
    }

    public function toggleStatus($id)
    {
        try {
            $lowongan = LowonganModel::findOrFail($id);
            $lowongan->status = $lowongan->status === 'aktif' ? 'nonaktif' : 'aktif';
            $lowongan->save();

            return back()->with('success', 'Status lowongan berhasil diubah');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengubah status lowongan');
        }
    }
}