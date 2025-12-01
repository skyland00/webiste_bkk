<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelamarModel extends Model
{
    protected $table = 'pelamar';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nisn',
        'tahun_lulus',
        'no_telp',
        'cv',
        'status',
    ];

    use HasFactory;
}
