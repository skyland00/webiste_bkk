<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model  // ← PENTING: class name harus Berita
{
    use HasFactory;

    protected $table = 'berita'; // ← PENTING: nama tabel

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'kategori',
        'lokasi',
        'status',
        'user_id'
    ];

    // Relasi ke User (Admin yang membuat)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Auto generate slug dari judul
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul')) {
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }
}