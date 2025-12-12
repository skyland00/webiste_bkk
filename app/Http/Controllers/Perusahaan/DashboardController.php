<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\LowonganModel;
use App\Models\LamaranModel;
use App\Models\PerusahaanModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        // Lowongan aktif total
        $lowonganAktif = LowonganModel::where('perusahaan_id', $perusahaan->id)
            ->where('status', 'aktif')
            ->count();

        // Lowongan aktif bulan ini
        $lowonganAktifBulanIni = LowonganModel::where('perusahaan_id', $perusahaan->id)
            ->where('status', 'aktif')
            ->whereMonth('created_at', now()->month)
            ->count();

        // Total pelamar
        $pelamarTotal = LamaranModel::whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })->count();

        // Pelamar baru 7 hari
        $pelamarBaru7Hari = LamaranModel::whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })
        ->where('created_at', '>=', now()->subDays(7))
        ->count();

        // Lowongan mendekati deadline
        $lowonganMendekatiDeadline = LowonganModel::where('perusahaan_id', $perusahaan->id)
            ->where('status', 'aktif')
            ->whereDate('tanggal_tutup', '<=', now()->addDays(14))
            ->count();

        // Siswa diterima total
        $siswaDiterima = LamaranModel::whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })
        ->where('status', 'diterima')
        ->count();

        // Siswa diterima bulan ini
        $siswaDiterimaBulanIni = LamaranModel::whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })
        ->where('status', 'diterima')
        ->whereMonth('updated_at', now()->month)
        ->count();

        // Pelamar terbaru
        $pelamarTerbaru = LamaranModel::whereHas('lowongan', function ($q) use ($perusahaan) {
            $q->where('perusahaan_id', $perusahaan->id);
        })
        ->latest()
        ->take(5)
        ->get();

        return view('perusahaan.dashboard', compact(
            'lowonganAktifBulanIni',
            'lowonganAktif',
            'pelamarBaru7Hari',
            'pelamarTotal',
            'lowonganMendekatiDeadline',
            'siswaDiterima',
            'siswaDiterimaBulanIni',
            'pelamarTerbaru'
        ));
    }
}
