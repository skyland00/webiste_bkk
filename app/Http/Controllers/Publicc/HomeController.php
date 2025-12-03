<?php

namespace App\Http\Controllers\Publicc;

use App\Http\Controllers\Controller;
use App\Models\LowonganModel;
use App\Models\PerusahaanModel;
use App\Models\PelamarModel;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 6 lowongan terbaru yang statusnya aktif
        $lowonganTerbaru = LowonganModel::with('perusahaan')
            ->where('status', 'aktif')
            ->where('tanggal_tutup', '>=', now())
            ->latest()
            ->take(6)
            ->get();

        // Hitung statistik
        $totalLowongan = LowonganModel::where('status', 'aktif')
            ->where('tanggal_tutup', '>=', now())
            ->count();
        
        $totalPerusahaan = PerusahaanModel::where('status', 'approved')->count();
        
        $totalPelamar = PelamarModel::count();

        return view('publicc.home', compact(
            'lowonganTerbaru',
            'totalLowongan',
            'totalPerusahaan',
            'totalPelamar'
        ));
    }
}