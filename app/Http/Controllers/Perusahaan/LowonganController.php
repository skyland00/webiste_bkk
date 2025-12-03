<?php
// app/Http/Controllers/Perusahaan/LowonganController.php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\LowonganModel;
use App\Models\PerusahaanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganController extends Controller
{
    // INDEX - List semua lowongan dengan AJAX support
    public function index(Request $request)
    {
        // Ambil perusahaan berdasarkan user yang login
        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);
        $statusFilter = $request->input('status', 'all');

        $query = LowonganModel::where('perusahaan_id', $perusahaan->id);

        // Filter berdasarkan search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul_lowongan', 'like', "%{$search}%")
                    ->orWhere('bidang', 'like', "%{$search}%")
                    ->orWhere('lokasi', 'like', "%{$search}%")
                    ->orWhere('tipe_pekerjaan', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan status
        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        $lowongan = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Hitung statistik
        $aktifCount = LowonganModel::where('perusahaan_id', $perusahaan->id)
            ->where('status', 'aktif')->count();
        $nonaktifCount = LowonganModel::where('perusahaan_id', $perusahaan->id)
            ->where('status', 'nonaktif')->count();
        $ditutupCount = LowonganModel::where('perusahaan_id', $perusahaan->id)
            ->where('status', 'ditutup')->count();

        // Jika request AJAX
        if ($request->ajax() || $request->wantsJson()) {
            $html = view('perusahaan.partials.lowongan_list', compact('lowongan'))->render();
            $pagination = view('perusahaan.partials.lowongan_pagination', compact('lowongan'))->render();

            return response()->json([
                'html' => $html,
                'pagination' => $pagination,
                'total' => $lowongan->total(),
                'from' => $lowongan->firstItem(),
                'to' => $lowongan->lastItem(),
            ]);
        }

        // Response normal
        return view('perusahaan.lowongan.lowongan', compact(
            'lowongan',
            'search',
            'perPage',
            'statusFilter',
            'aktifCount',
            'nonaktifCount',
            'ditutupCount'
        ));
    }

    // CREATE - Tampilkan form create
    public function create()
    {
        return view('perusahaan.lowongan.create');
    }

    // STORE - Simpan lowongan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_lowongan' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
            'kualifikasi' => 'required|string',
            'bidang' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tipe_pekerjaan' => 'required|in:full-time,part-time,kontrak,magang',
            'gaji_min' => 'nullable|integer|min:0',
            'gaji_max' => 'nullable|integer|min:0|gte:gaji_min',
            'jumlah_orang' => 'required|integer|min:1',
            'tanggal_buka' => 'required|date|after_or_equal:today',
            'tanggal_tutup' => 'required|date|after:tanggal_buka',
        ], [
            'judul_lowongan.required' => 'Judul lowongan harus diisi',
            'deskripsi_pekerjaan.required' => 'Deskripsi pekerjaan harus diisi',
            'kualifikasi.required' => 'Kualifikasi harus diisi',
            'bidang.required' => 'Bidang harus diisi',
            'lokasi.required' => 'Lokasi harus diisi',
            'tipe_pekerjaan.required' => 'Tipe pekerjaan harus dipilih',
            'jumlah_orang.required' => 'Jumlah orang harus diisi',
            'jumlah_orang.min' => 'Jumlah orang minimal 1',
            'tanggal_buka.required' => 'Tanggal buka harus diisi',
            'tanggal_buka.after_or_equal' => 'Tanggal buka minimal hari ini',
            'tanggal_tutup.required' => 'Tanggal tutup harus diisi',
            'tanggal_tutup.after' => 'Tanggal tutup harus setelah tanggal buka',
            'gaji_max.gte' => 'Gaji maksimal harus lebih besar atau sama dengan gaji minimal',
        ]);

        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        LowonganModel::create([
            'perusahaan_id' => $perusahaan->id,
            'judul_lowongan' => $validated['judul_lowongan'],
            'deskripsi_pekerjaan' => $validated['deskripsi_pekerjaan'],
            'kualifikasi' => $validated['kualifikasi'],
            'bidang' => $validated['bidang'],
            'lokasi' => $validated['lokasi'],
            'tipe_pekerjaan' => $validated['tipe_pekerjaan'],
            'gaji_min' => $validated['gaji_min'],
            'gaji_max' => $validated['gaji_max'],
            'jumlah_orang' => $validated['jumlah_orang'],
            'tanggal_buka' => $validated['tanggal_buka'],
            'tanggal_tutup' => $validated['tanggal_tutup'],
            'status' => 'aktif',
        ]);

        return redirect()->route('perusahaan.lowongan.index')
            ->with('success', 'Lowongan berhasil dibuat!');
    }

    // EDIT - Tampilkan form edit
    public function edit($id)
    {
        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        $lowongan = LowonganModel::where('id', $id)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();

        return view('perusahaan.lowongan.edit', compact('lowongan'));
    }

    // UPDATE - Update lowongan
    public function update(Request $request, $id)
    {
        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        $lowongan = LowonganModel::where('id', $id)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();

        $validated = $request->validate([
            'judul_lowongan' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
            'kualifikasi' => 'required|string',
            'bidang' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tipe_pekerjaan' => 'required|in:full-time,part-time,kontrak,magang',
            'gaji_min' => 'nullable|integer|min:0',
            'gaji_max' => 'nullable|integer|min:0|gte:gaji_min',
            'jumlah_orang' => 'required|integer|min:1',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date|after:tanggal_buka',
        ], [
            'judul_lowongan.required' => 'Judul lowongan harus diisi',
            'deskripsi_pekerjaan.required' => 'Deskripsi pekerjaan harus diisi',
            'kualifikasi.required' => 'Kualifikasi harus diisi',
            'bidang.required' => 'Bidang harus diisi',
            'lokasi.required' => 'Lokasi harus diisi',
            'tipe_pekerjaan.required' => 'Tipe pekerjaan harus dipilih',
            'jumlah_orang.required' => 'Jumlah orang harus diisi',
            'jumlah_orang.min' => 'Jumlah orang minimal 1',
            'tanggal_buka.required' => 'Tanggal buka harus diisi',
            'tanggal_tutup.required' => 'Tanggal tutup harus diisi',
            'tanggal_tutup.after' => 'Tanggal tutup harus setelah tanggal buka',
            'gaji_max.gte' => 'Gaji maksimal harus lebih besar atau sama dengan gaji minimal',
        ]);

        $lowongan->update($validated);

        return redirect()->route('perusahaan.lowongan.index')
            ->with('success', 'Lowongan berhasil diupdate!');
    }

    // DESTROY - Hapus lowongan
    public function destroy($id)
    {
        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        $lowongan = LowonganModel::where('id', $id)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();

        $lowongan->delete();

        return redirect()->route('perusahaan.lowongan.index')
            ->with('success', 'Lowongan berhasil dihapus!');
    }

    // TOGGLE STATUS - Aktif/Nonaktif
    public function toggleStatus($id)
    {
        $perusahaan = PerusahaanModel::where('user_id', Auth::id())->firstOrFail();

        $lowongan = LowonganModel::where('id', $id)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();

        // Toggle status
        $lowongan->status = ($lowongan->status === 'aktif') ? 'nonaktif' : 'aktif';
        $lowongan->save();

        return redirect()->route('perusahaan.lowongan.index')
            ->with('success', 'Status lowongan berhasil diubah!');
    }
}
