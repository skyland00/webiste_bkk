<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\PelamarController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\LowonganController as AdminLowonganController;

use App\Http\Controllers\Perusahaan\DashboardController;
use App\Http\Controllers\Perusahaan\LowonganController;
use App\Http\Controllers\Perusahaan\PerusahaanController;
use App\Http\Controllers\Perusahaan\PelamarMasukController;

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Frontend\Pelamar\LamaranController;
use App\Http\Controllers\frontend\PublicLowonganController;
use App\Http\Controllers\Frontend\BeritaController as FrontendBeritaController;
use App\Http\Controllers\Frontend\Pelamar\ProfileController;

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
    // Profile Routes
    Route::get('/pelamar/profile', [ProfileController::class, 'index'])->name('pelamar.profile');
    Route::get('/pelamar/profile/edit', [ProfileController::class, 'edit'])->name('pelamar.profile.edit');
    Route::put('/pelamar/profile', [ProfileController::class, 'update'])->name('pelamar.profile.update');
    Route::delete('/pelamar/profile/foto', [ProfileController::class, 'deleteFoto'])->name('pelamar.profile.delete-foto');
    Route::delete('/pelamar/profile/cv', [ProfileController::class, 'deleteCV'])->name('pelamar.profile.delete-cv');

    // pengaturan Routes (NEW) - Untuk Password & Delete Account
    Route::get('/pelamar/pengaturan', [ProfileController::class, 'pengaturan'])->name('pelamar.pengaturan');
    Route::put('/pelamar/pengaturan/password', [ProfileController::class, 'updatePassword'])->name('pelamar.pengaturan.update-password');
    Route::delete('/pelamar/pengaturan/delete-account', [ProfileController::class, 'deleteAccount'])->name('pelamar.pengaturan.delete-account');

    // Riwayat Lamaran Routes
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

    // Route Berita
    Route::patch('berita/{berita}/toggle-status', [BeritaController::class, 'toggleStatus'])
        ->name('berita.toggle-status');
    Route::resource('berita', BeritaController::class);

    Route::get('/pengaturan', [AdminController::class, 'pengaturan'])->name('pengaturan');
    Route::put('/pengaturan/password', [AdminController::class, 'updatePassword'])->name('pengaturan.password');
});

// Role: Perusahaan
Route::middleware(['auth', 'role:perusahaan'])->group(function () {
   Route::get('/perusahaan/dashboard', [DashboardController::class, 'index'])->name('perusahaan.dashboard');

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

    // Route Pelamar Masuk
    Route::get('/perusahaan/pelamar_masuk', [PelamarMasukController::class, 'index'])
        ->name('perusahaan.pelamar_masuk');
    Route::get('/perusahaan/pelamar_masuk/lowongan/{id}', [PelamarMasukController::class, 'byLowongan'])
        ->name('perusahaan.pelamar_masuk.lowongan');
    Route::get('/perusahaan/pelamar_masuk/show/{id}', [PelamarMasukController::class, 'show'])
        ->name('perusahaan.pelamar_masuk.show');
    Route::post('/perusahaan/pelamar_masuk/{id}/terima', [PelamarMasukController::class, 'terima'])
        ->name('perusahaan.pelamar_masuk.terima');
    Route::post('/perusahaan/pelamar_masuk/{id}/tolak', [PelamarMasukController::class, 'tolak'])
        ->name('perusahaan.pelamar_masuk.tolak');

    Route::get('/perusahaan/profile', [PerusahaanController::class, 'profile'])->name('perusahaan.profile');
    Route::put('/perusahaan/profile', [PerusahaanController::class, 'updateProfile'])->name('perusahaan.profile.update');
    Route::delete('/perusahaan/profile/logo', [PerusahaanController::class, 'deleteLogo'])->name('perusahaan.profile.delete-logo');

    Route::get('/perusahaan/pengaturan', [PerusahaanController::class, 'pengaturan'])->name('perusahaan.pengaturan');
    Route::put('/perusahaan/pengaturan/password', [PerusahaanController::class, 'updatePassword'])->name('perusahaan.pengaturan.password');
    Route::delete('/perusahaan/pengaturan/account', [PerusahaanController::class, 'deleteAccount'])->name('perusahaan.pengaturan.delete-account');
});


// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Halaman publik
Route::get('/tentang-bkk', [HomeController::class, 'tentangBkk'])->name('frontend.tentang');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('frontend.kontak');

Route::get('/berita', [FrontendBeritaController::class, 'index'])->name('frontend.berita');
Route::get('/berita/{slug}', [FrontendBeritaController::class, 'show'])->name('frontend.berita.show');
