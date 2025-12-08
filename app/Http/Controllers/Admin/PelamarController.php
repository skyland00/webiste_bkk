<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LamaranModel;
use App\Models\PelamarModel;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10);

        $query = LamaranModel::with(['pelamar.user', 'lowongan.perusahaan'])
            ->orderBy('created_at', 'DESC');

        // Filter pencarian
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('pelamar', function ($q2) use ($search) {
                    $q2->where('nama_lengkap', 'like', '%' . $search . '%')
                       ->orWhere('nisn', 'like', '%' . $search . '%');
                })
                ->orWhereHas('lowongan', function ($q2) use ($search) {
                    $q2->where('judul', 'like', '%' . $search . '%');
                });
            });
        }

        $pelamar = $query->paginate($perPage)->withQueryString();
        $totalPelamar = PelamarModel::count();

        // Jika request AJAX, return view partial saja
        if ($request->ajax()) {
            return view('admin.pelamar', compact('pelamar', 'totalPelamar'));
        }

        return view('admin.pelamar', compact('pelamar', 'totalPelamar'));
    }

    public function show($id)
    {
        $lamaran = LamaranModel::with(['pelamar.user', 'lowongan.perusahaan'])
            ->findOrFail($id);

        return view('admin.partials.pelamar_detail', compact('lamaran'));
    }
}
