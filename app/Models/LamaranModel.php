<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LamaranModel extends Model
{
    protected $table = 'lamaran';

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
