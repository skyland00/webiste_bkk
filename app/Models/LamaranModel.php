<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamaranModel extends Model
{
    use HasFactory;

    protected $table = 'lamaran';

    protected $fillable = [
        'pelamar_id',
        'lowongan_id',
        'cv',
        'cover_letter',
        'status',
        'catatan_perusahaan',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relasi ke Pelamar
    public function pelamar()
    {
        return $this->belongsTo(PelamarModel::class, 'pelamar_id');
    }

    // Relasi ke Lowongan
    public function lowongan()
    {
        return $this->belongsTo(LowonganModel::class, 'lowongan_id');
    }
}
