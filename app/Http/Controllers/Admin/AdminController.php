<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerusahaanModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.dashboard');
    }

    function perusahaanPending()
    {
        $perusahaan = PerusahaanModel::with('user')
            ->where('status', 'pending') // ← ini yang diperbaiki
            ->latest()
            ->get();

        return view('admin.perusahaan_pending', compact('perusahaan'));
    }

    function approvePerusahaan($id)
    {
        $perusahaan = PerusahaanModel::findOrFail($id);
        $perusahaan->update(['status' => 'approved']);



        return back()->with('success', 'Perusahaan berhasil disetujui');
    }

    function perusahaanRejected()
    {
        $perusahaan = PerusahaanModel::with('user')
            ->where('status', 'rejected')
            ->latest()
            ->get();

        return view('admin.perusahaan_ditolak', compact('perusahaan'));
    }

    function perusahaan()
    {
        $perusahaan = PerusahaanModel::with('user')->latest()->get();

        $approvedCount = PerusahaanModel::where('status', 'approved')->count();
        $pendingCount = PerusahaanModel::where('status', 'pending')->count();
        $rejectedCount = PerusahaanModel::where('status', 'rejected')->count();

        // TOTAL = hanya approved
        $totalClean = $approvedCount;

        return view('admin.perusahaan', compact(
            'perusahaan',
            'totalClean',
            'approvedCount',
            'pendingCount',
            'rejectedCount'
        ));
    }
}
