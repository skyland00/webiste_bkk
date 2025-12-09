<?php
// controller/BeritaController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // Tampilkan daftar berita
    // app/Http/Controllers/Admin/BeritaController.php

    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $perPage = $request->get('per_page', 10);
        $statusFilter = $request->get('status', 'all');

        // Query builder
        $query = BeritaModel::query()->latest();

        // Filter by status
        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        // Search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%')
                    ->orWhere('lokasi', 'like', '%' . $search . '%')
                    ->orWhere('konten', 'like', '%' . $search . '%');
            });
        }

        $berita = $query->paginate($perPage)->appends($request->query());

        // Count statistics
        $publishedCount = BeritaModel::where('status', 'published')->count();
        $draftCount = BeritaModel::where('status', 'draft')->count();

        // If AJAX request, return JSON
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.partials.berita_table', ['berita' => $berita])->render(),
                'pagination' => view('admin.partials.berita_pagination', ['berita' => $berita])->render(),
                'total' => $berita->total(),
                'from' => $berita->firstItem() ?? 0,
                'to' => $berita->lastItem() ?? 0,
            ]);
        }

        return view('admin.berita.berita', compact(
            'berita',
            'search',
            'perPage',
            'statusFilter',
            'publishedCount',
            'draftCount'
        ));
    }

    // Form tambah berita
    public function create()
    {
        return view('admin.berita.create');
    }

    // Simpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:draft,published'
        ], [
            'judul.required' => 'Judul wajib diisi',
            'konten.required' => 'Konten wajib diisi',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Gambar harus berformat JPEG, JPG, atau PNG',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
            'kategori.required' => 'Kategori wajib diisi',
            'lokasi.required' => 'Lokasi wajib diisi',
            'status.required' => 'Status wajib dipilih'
        ]);

        // Upload gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        BeritaModel::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'gambar' => $gambarPath,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'status' => $request->status,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    // Form edit berita
    public function edit($id)
    {
        $berita = BeritaModel::findOrFail($id);
        return view('admin.berita.edit', compact('berita')); // FIXED: Ganti jadi admin.berita.edit
    }

    // Update berita
    public function update(Request $request, $id)
    {
        $berita = BeritaModel::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:draft,published'
        ], [
            'judul.required' => 'Judul wajib diisi',
            'konten.required' => 'Konten wajib diisi',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Gambar harus berformat JPEG, JPG, atau PNG',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
            'kategori.required' => 'Kategori wajib diisi',
            'lokasi.required' => 'Lokasi wajib diisi',
            'status.required' => 'Status wajib dipilih'
        ]);

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $gambarPath = $request->file('gambar')->store('berita', 'public');
            $berita->gambar = $gambarPath;
        }

        $berita->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate!');
    }

    public function toggleStatus($id)
    {
        $berita = BeritaModel::findOrFail($id);

        $berita->status = $berita->status === 'published' ? 'draft' : 'published';
        $berita->save();

        $message = $berita->status === 'published'
            ? 'Berita berhasil dipublikasikan'
            : 'Berita berhasil dijadikan draft';

        return redirect()->back()->with('success', $message);
    }

    // Hapus berita
    public function destroy($id)
    {
        $berita = BeritaModel::findOrFail($id);

        // Hapus gambar jika ada
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
