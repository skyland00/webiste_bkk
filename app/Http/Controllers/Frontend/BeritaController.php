<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = BeritaModel::where('status', 'published')
            ->with('user')
            ->orderBy('created_at', 'desc');

        // Filter by kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%");
            });
        }

        $beritas = $query->paginate(9);

        // Get available categories for filter
        $kategoris = BeritaModel::where('status', 'published')
            ->select('kategori')
            ->distinct()
            ->pluck('kategori');

        return view('frontend.berita.berita', compact('beritas', 'kategoris'));
    }

    public function show($slug)
    {
        $berita = BeritaModel::where('slug', $slug)
            ->where('status', 'published')
            ->with('user')
            ->firstOrFail();

        // Get related news (same category, exclude current)
        $relatedNews = BeritaModel::where('status', 'published')
            ->where('kategori', $berita->kategori)
            ->where('id', '!=', $berita->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('frontend.berita.detail_berita', compact('berita', 'relatedNews'));
    }
}
