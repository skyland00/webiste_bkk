<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelamarModel extends Model
{
    use HasFactory;

    protected $table = 'pelamar';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nisn',
        'tahun_lulus',
        'no_telp',
        'cv',
        'foto_profil',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lamaran()
    {
        return $this->hasMany(LamaranModel::class, 'pelamar_id');
    }
}
