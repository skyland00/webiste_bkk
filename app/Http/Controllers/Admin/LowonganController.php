<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LowonganModel; // sesuai model yang kamu pakai
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index(Request $request)
    {
        // Filter & Search
        $search = $request->search ?? '';
        $statusFilter = $request->status ?? 'all';

        $query = LowonganModel::with('perusahaan');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhereHas('perusahaan', function ($p) use ($search) {
                      $p->where('nama_perusahaan', 'like', '%' . $search . '%');
                  });
            });
        }

        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        $lowongans = $query->latest()->paginate(10);

        // Statistik
        $totalLowongan = LowonganModel::count();
        $activeCount = LowonganModel::where('status', 'aktif')->count();
        $inactiveCount = LowonganModel::where('status', 'nonaktif')->count();

        // AJAX return partial only
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.partials.lowongan_table', compact('lowongans'))->render()
            ]);
        }

        return view('admin.lowongan', compact(
            'lowongans',
            'totalLowongan',
            'activeCount',
            'inactiveCount',
            'search',
            'statusFilter'
        ));
    }

    public function destroy($id)
    {
        $lowongan = LowonganModel::findOrFail($id);
        $lowongan->delete();

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil dihapus');
    }

    public function show($id)
    {
        $lowongan = LowonganModel::with('perusahaan')->findOrFail($id);
        return view('admin.lowongan.show', compact('lowongan'));
    }

    public function toggleStatus($id)
    {
        $lowongan = LowonganModel::findOrFail($id);
        $lowongan->status = $lowongan->status === 'aktif' ? 'nonaktif' : 'aktif';
        $lowongan->save();

        return back()->with('success', 'Status berhasil diubah');
    }
}
