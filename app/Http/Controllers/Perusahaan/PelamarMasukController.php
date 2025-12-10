<?php
// app/Http/Controllers/Perusahaan/PelamarMasukController.php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\LamaranModel;
use App\Models\PerusahaanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelamarMasukController extends Controller
{
    /**
     * Tampilkan semua pelamar masuk untuk semua lowongan perusahaan
     */
    public function index(Request $request)
    {
        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);
        $statusFilter = $request->input('status', 'all');
        $lowonganFilter = $request->input('lowongan', 'all');

        // Query lamaran dari semua lowongan perusahaan ini
        $query = LamaranModel::whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })->with(['pelamar.user', 'lowongan']);

        // Filter berdasarkan search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('pelamar', function ($subQ) use ($search) {
                    $subQ->where('nama_lengkap', 'like', "%{$search}%")
                        ->orWhere('nisn', 'like', "%{$search}%")
                        ->orWhere('no_telp', 'like', "%{$search}%");
                })->orWhereHas('lowongan', function ($subQ) use ($search) {
                    $subQ->where('judul_lowongan', 'like', "%{$search}%");
                });
            });
        }

        // Filter berdasarkan status
        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        // Filter berdasarkan lowongan
        if ($lowonganFilter !== 'all') {
            $query->where('lowongan_id', $lowonganFilter);
        }

        $lamaran = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Hitung statistik
        $totalCount = LamaranModel::whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })->count();

        $pendingCount = LamaranModel::whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })->where('status', 'pending')->count();

        $diterimaCount = LamaranModel::whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })->where('status', 'diterima')->count();

        $ditolakCount = LamaranModel::whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })->where('status', 'ditolak')->count();

        // Ambil daftar lowongan untuk filter dropdown
        $lowonganList = \App\Models\LowonganModel::where('perusahaan_id', $perusahaan->id)
            ->orderBy('judul_lowongan')
            ->get();

        // Jika request AJAX
        if ($request->ajax() || $request->wantsJson()) {
            $html = view('perusahaan.partials.pelamar_masuk_list', compact('lamaran'))->render();
            $pagination = view('perusahaan.partials.pelamar_masuk_pagination', compact('lamaran'))->render();

            return response()->json([
                'html' => $html,
                'pagination' => $pagination,
                'total' => $lamaran->total(),
                'from' => $lamaran->firstItem(),
                'to' => $lamaran->lastItem(),
            ]);
        }

        return view('perusahaan.pelamar_masuk.pelamar_masuk', [
            'lamaran' => $lamaran,
            'pelamar' => $lamaran, // <--- WAJIB! Tambahkan ini
            'search' => $search,
            'perPage' => $perPage,
            'statusFilter' => $statusFilter,
            'lowonganFilter' => $lowonganFilter,
            'totalCount' => $totalCount,
            'pendingCount' => $pendingCount,
            'diterimaCount' => $diterimaCount,
            'ditolakCount' => $ditolakCount,
            'lowonganList' => $lowonganList,

            'totalPelamar' => $totalCount,
        ]);
    }

    /**
     * Tampilkan pelamar untuk lowongan tertentu
     */
    public function byLowongan(Request $request, $lowonganId)
    {
        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        $lowongan = \App\Models\LowonganModel::where('id', $lowonganId)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);
        $statusFilter = $request->input('status', 'all');

        $query = LamaranModel::where('lowongan_id', $lowonganId)
            ->with(['pelamar.user']);

        // Filter berdasarkan search
        if ($search) {
            $query->whereHas('pelamar', function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('nisn', 'like', "%{$search}%")
                    ->orWhere('no_telp', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan status
        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        $lamaran = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Hitung statistik
        $totalCount = LamaranModel::where('lowongan_id', $lowonganId)->count();
        $pendingCount = LamaranModel::where('lowongan_id', $lowonganId)->where('status', 'pending')->count();
        $diterimaCount = LamaranModel::where('lowongan_id', $lowonganId)->where('status', 'diterima')->count();
        $ditolakCount = LamaranModel::where('lowongan_id', $lowonganId)->where('status', 'ditolak')->count();

        // Jika request AJAX
        if ($request->ajax() || $request->wantsJson()) {
            $html = view('perusahaan.partials.pelamar_masuk_list', compact('lamaran'))->render();
            $pagination = view('perusahaan.partials.pelamar_masuk_pagination', compact('lamaran'))->render();

            return response()->json([
                'html' => $html,
                'pagination' => $pagination,
                'total' => $lamaran->total(),
                'from' => $lamaran->firstItem(),
                'to' => $lamaran->lastItem(),
            ]);
        }

        return view('perusahaan.pelamar.pelamar_lowongan', compact(
            'lowongan',
            'lamaran',
            'search',
            'perPage',
            'statusFilter',
            'totalCount',
            'pendingCount',
            'diterimaCount',
            'ditolakCount'
        ));
    }

    public function show($id)
{
    $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

    $lamaran = LamaranModel::with(['pelamar', 'lowongan'])
        ->whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })
        ->findOrFail($id);

    // Pastikan Blade bisa akses pelamar dan lowongan
    $pelamar = $lamaran->pelamar; // relasi pelamar
    $lowongan = $lamaran->lowongan; // relasi lowongan

    return view('perusahaan.pelamar_masuk.show', compact('lamaran', 'pelamar', 'lowongan'));
}



    public function terima(Request $request, $id)
    {
        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        $lamaran = LamaranModel::with('lowongan')
            ->whereHas('lowongan', function ($q) use ($perusahaan) {
                $q->where('perusahaan_id', $perusahaan->id);
            })
            ->findOrFail($id);

        // Validasi catatan (opsional)
        $validated = $request->validate([
            'catatan_perusahaan' => 'nullable|string|max:1000',
        ]);

        $lamaran->update([
            'status' => 'diterima',
            'catatan_perusahaan' => $validated['catatan_perusahaan'] ?? null,
        ]);

        return back()->with('success', 'Lamaran berhasil diterima!');
    }

    public function tolak(Request $request, $id)
    {
        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        $lamaran = LamaranModel::with('lowongan')
            ->whereHas('lowongan', function ($q) use ($perusahaan) {
                $q->where('perusahaan_id', $perusahaan->id);
            })
            ->findOrFail($id);

        // Validasi catatan (opsional)
        $validated = $request->validate([
            'catatan_perusahaan' => 'nullable|string|max:1000',
        ]);

        $lamaran->update([
            'status' => 'ditolak',
            'catatan_perusahaan' => $validated['catatan_perusahaan'] ?? null,
        ]);

        return back()->with('success', 'Lamaran telah ditolak.');
    }
}