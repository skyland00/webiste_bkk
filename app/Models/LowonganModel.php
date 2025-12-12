<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganModel extends Model
{
    use HasFactory;

    protected $table = 'lowongan';

    protected $fillable = [
        'perusahaan_id',
        'judul_lowongan',
        'deskripsi_pekerjaan',
        'kualifikasi',
        'bidang',
        'lokasi',
        'tipe_pekerjaan',
        'gaji_min',
        'gaji_max',
        'jumlah_orang',
        'tanggal_buka',
        'tanggal_tutup',
        'status',
    ];

    protected $casts = [
        'tanggal_buka' => 'date',
        'tanggal_tutup' => 'date',
        'gaji_min' => 'integer',
        'gaji_max' => 'integer',
        'jumlah_orang' => 'integer',
    ];

    // Relasi ke Perusahaan
    public function perusahaan()
    {
        return $this->belongsTo(PerusahaanModel::class, 'perusahaan_id');
    }

public function lamaran()
{
    return $this->hasMany(LamaranModel::class, 'lowongan_id');
}


}
