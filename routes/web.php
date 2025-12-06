<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminController;

use App\Http\Controllers\Perusahaan\LowonganController;
use App\Http\Controllers\Perusahaan\PerusahaanController;

use App\Http\Controllers\frontend\HomeController;
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

// Role: Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/perusahaan', [AdminController::class, 'perusahaan'])->name('admin.perusahaan');
    Route::post('/admin/perusahaan/{id}/approve', [AdminController::class, 'approvePerusahaan'])->name('admin.perusahaan.approve');
    Route::post('/admin/perusahaan/{id}/reject', [AdminController::class, 'rejectPerusahaan'])->name('admin.perusahaan.reject');

    // === Tambahkan ini untuk halaman lowongan admin ===
    Route::get('/admin/lowongan', [LowonganController::class, 'index'])->name('admin.lowongan');
    Route::get('/admin/lowongan/{id}', [LowonganController::class, 'show'])->name('admin.lowongan.show');
    Route::delete('/admin/lowongan/{id}', [LowonganController::class, 'destroy'])->name('admin.lowongan.destroy');
    Route::get('/admin/data-pelamar', [App\Http\Controllers\Admin\PelamarController::class, 'index'])->name('admin.pelamar');

});

// Role: Perusahaan
Route::middleware(['auth', 'role:perusahaan'])->group(function () {
    Route::get('/perusahaan/dashboard', [PerusahaanController::class, 'index'])->name('perusahaan.dashboard');

    // Route Lowongan
    Route::get('/perusahaan/lowongan', [LowonganController::class, 'index'])->name('perusahaan.lowongan.lowongan');
    Route::get('/perusahaan/lowongan/create', [LowonganController::class, 'create'])->name('perusahaan.lowongan.create');
    Route::post('/perusahaan/lowongan', [LowonganController::class, 'store'])->name('perusahaan.lowongan.store');
    Route::get('/perusahaan/lowongan/{id}/edit', [LowonganController::class, 'edit'])->name('perusahaan.lowongan.edit');
    Route::put('/perusahaan/lowongan/{id}', [LowonganController::class, 'update'])->name('perusahaan.lowongan.update');
    Route::delete('/perusahaan/lowongan/{id}', [LowonganController::class, 'destroy'])->name('perusahaan.lowongan.destroy');
    Route::post('/perusahaan/lowongan/{id}/toggle-status', [LowonganController::class, 'toggleStatus'])->name('perusahaan.lowongan.toggle-status');
    Route::get('perusahaan/lowongan/{id}', [LowonganController::class, 'show'])->name('perusahaan.lowongan.show');

    Route::get('/lowongan/{lowongan}/applicants', [LowonganController::class, 'applicants'])
        ->name('perusahaan.lowongan.applicants');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
