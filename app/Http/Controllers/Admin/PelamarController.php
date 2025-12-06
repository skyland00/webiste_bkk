<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\LamaranModel;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index()
    {
        $lamarans = LamaranModel::with(['pelamar', 'lowongan'])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('admin.pelamar', compact('lamarans'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lamarans()
    {
        return $this->hasMany(Lamaran::class);
    }

}
