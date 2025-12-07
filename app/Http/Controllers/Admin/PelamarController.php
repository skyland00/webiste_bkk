<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LamaranModel;
use App\Models\PelamarModel;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index()
    {
        // ambil semua data lamaran (berserta relasi pelamar & lowongan)
        $pelamar = LamaranModel::with(['pelamar', 'lowongan'])
            ->orderBy('created_at', 'DESC')
            ->get();

        // total pelamar (jumlah record pada tabel pelamar)
        $totalPelamar = PelamarModel::count();

        // kirim keduanya ke view
        return view('admin.pelamar', compact('pelamar', 'totalPelamar'));
    }
}
