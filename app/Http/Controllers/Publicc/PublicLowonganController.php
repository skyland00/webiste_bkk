<?php

namespace App\Http\Controllers\Publicc;

use App\Http\Controllers\Controller;
use App\Models\LowonganModel;
use Illuminate\Http\Request;

class PublicLowonganController extends Controller
{
    // Halaman List Lowongan
    public function lowongan(Request $request)
    {
        $search = $request->input('search');
        $bidang = $request->input('bidang');
        $tipe_pekerjaan = $request->input('tipe_pekerjaan');
        $lokasi = $request->input('lokasi');
        $sort = $request->input('sort', 'terbaru');

        $query = LowonganModel::with('perusahaan')
            ->where('status', 'aktif')
            ->where('tanggal_tutup', '>=', now());

        // Filter Search
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('judul_lowongan', 'like', "%{$search}%")
                  ->orWhere('deskripsi_pekerjaan', 'like', "%{$search}%")
                  ->orWhereHas('perusahaan', function($p) use ($search) {
                      $p->where('nama_perusahaan', 'like', "%{$search}%");
                  });
            });
        }

        // Filter Bidang
        if ($bidang) {
            $query->where('bidang', $bidang);
        }

        // Filter Tipe Pekerjaan
        if ($tipe_pekerjaan) {
            $query->where('tipe_pekerjaan', $tipe_pekerjaan);
        }

        // Filter Lokasi
        if ($lokasi) {
            $query->where('lokasi', 'like', "%{$lokasi}%");
        }

        // Sorting
        switch ($sort) {
            case 'gaji_tertinggi':
                $query->orderBy('gaji_max', 'desc');
                break;
            case 'gaji_terendah':
                $query->orderBy('gaji_min', 'asc');
                break;
            case 'terlama':
                $query->orderBy('created_at', 'asc');
                break;
            default: // terbaru
                $query->orderBy('created_at', 'desc');
                break;
        }

        $lowongan = $query->paginate(12)->withQueryString();

        // Data untuk filter dropdown
        $bidangList = LowonganModel::where('status', 'aktif')
            ->distinct()
            ->pluck('bidang');

        $lokasiList = LowonganModel::where('status', 'aktif')
            ->distinct()
            ->pluck('lokasi');

        $totalLowongan = LowonganModel::where('status', 'aktif')
            ->where('tanggal_tutup', '>=', now())
            ->count();

        return view('publicc.lowongan.lowongan', compact(
            'lowongan',
            'search',
            'bidang',
            'tipe_pekerjaan',
            'lokasi',
            'sort',
            'bidangList',
            'lokasiList',
            'totalLowongan'
        ));
    }

    // Halaman Detail Lowongan
    public function detailLowongan($id)
    {
        $lowongan = LowonganModel::with('perusahaan')
            ->where('status', 'aktif')
            ->findOrFail($id);

        // Lowongan terkait (dari perusahaan yang sama atau bidang yang sama)
        $lowonganTerkait = LowonganModel::with('perusahaan')
            ->where('status', 'aktif')
            ->where('tanggal_tutup', '>=', now())
            ->where('id', '!=', $id)
            ->where(function($q) use ($lowongan) {
                $q->where('perusahaan_id', $lowongan->perusahaan_id)
                  ->orWhere('bidang', $lowongan->bidang);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('publicc.lowongan.detail_lowongan', compact('lowongan', 'lowonganTerkait'));
    }
}