<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\PelamarController;
use App\Http\Controllers\Admin\LowonganController as AdminLowonganController;
use App\Http\Controllers\Perusahaan\LowonganController;
use App\Http\Controllers\Perusahaan\PerusahaanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Frontend\Pelamar\LamaranController;
use App\Http\Controllers\frontend\PublicLowonganController;

// Role: guest
Route::get('/home', function () {
    return redirect('/');
});

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('/lowongan', [PublicLowonganController::class, 'lowongan'])->name('frontend.lowongan');
Route::get('/lowongan/{id}', [PublicLowonganController::class, 'detailLowongan'])->name('frontend.lowongan.detail');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register/pelamar', [AuthController::class, 'registerPelamar'])->name('register.pelamar');
    Route::post('/register/perusahaan', [AuthController::class, 'registerPerusahaan'])->name('register.perusahaan');
});

// Role: Pelamar (setelah login)
Route::middleware(['auth', 'role:pelamar'])->group(function () {
    Route::get('/pelamar/profile', [LamaranController::class, 'index'])->name('pelamar.profile');
    Route::get('/pelamar/riwayat-lamaran', [LamaranController::class, 'index'])
        ->name('frontend.pelamar.riwayat_lamaran');
    Route::get('/lowongan/{id}/lamar', [LamaranController::class, 'create'])->name('lamaran.create');
    Route::post('/lowongan/{id}/lamar', [LamaranController::class, 'store'])->name('lamaran.store');
    Route::get('/pelamar/lamaran/{id}', [LamaranController::class, 'show'])->name('pelamar.lamaran.show');
    Route::post('/pelamar/lamaran/{id}/cancel', [LamaranController::class, 'cancel'])->name('pelamar.lamaran.cancel');
});

// Role: Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/perusahaan', [AdminController::class, 'perusahaan'])->name('perusahaan');
    Route::post('/perusahaan/{id}/approve', [AdminController::class, 'approvePerusahaan'])->name('perusahaan.approve');
    Route::post('/perusahaan/{id}/reject', [AdminController::class, 'rejectPerusahaan'])->name('perusahaan.reject');

    // Route Admin Lowongan
    Route::get('/lowongan', [AdminLowonganController::class, 'index'])->name('lowongan');
    Route::get('/lowongan/{id}', [AdminLowonganController::class, 'show'])->name('lowongan.show');
    Route::delete('/lowongan/{id}', [AdminLowonganController::class, 'destroy'])->name('lowongan.destroy');
    
    Route::get('/data-pelamar', [PelamarController::class, 'index'])->name('pelamar');
    Route::get('/data-pelamar/{id}', [PelamarController::class, 'show'])->name('lamaran.show');
    
    // Route Berita - FIXED: Sudah dalam prefix admin, jadi tinggal resource aja
    Route::resource('berita', BeritaController::class);
});

// Role: Perusahaan
Route::middleware(['auth', 'role:perusahaan'])->group(function () {
    Route::get('/perusahaan/dashboard', [PerusahaanController::class, 'index'])->name('perusahaan.dashboard');
    Route::get('/perusahaan/lowongan', [LowonganController::class, 'index'])->name('perusahaan.lowongan.lowongan');
    Route::get('/perusahaan/lowongan/create', [LowonganController::class, 'create'])->name('perusahaan.lowongan.create');
    Route::post('/perusahaan/lowongan', [LowonganController::class, 'store'])->name('perusahaan.lowongan.store');
    Route::get('/perusahaan/lowongan/{id}/edit', [LowonganController::class, 'edit'])->name('perusahaan.lowongan.edit');
    Route::put('/perusahaan/lowongan/{id}', [LowonganController::class, 'update'])->name('perusahaan.lowongan.update');
    Route::delete('/perusahaan/lowongan/{id}', [LowonganController::class, 'destroy'])->name('perusahaan.lowongan.destroy');
    Route::post('/perusahaan/lowongan/{id}/toggle-status', [LowonganController::class, 'toggleStatus'])->name('perusahaan.lowongan.toggle-status');
    Route::get('perusahaan/lowongan/{id}', [LowonganController::class, 'show'])->name('perusahaan.lowongan.show');
    Route::get('/lowongan/{lowongan}/applicants', [LowonganController::class, 'applicants'])->name('perusahaan.lowongan.applicants');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Halaman publik
Route::get('/tentang-bkk', [HomeController::class, 'tentangBkk'])->name('frontend.tentang');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('frontend.kontak');