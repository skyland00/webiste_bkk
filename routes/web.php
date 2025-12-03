<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Perusahaan\LowonganController;
use App\Http\Controllers\Perusahaan\PerusahaanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

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

    Route::get('/lowongan/{lowongan}/applicants', [LowonganController::class, 'applicants'])
    ->name('perusahaan.lowongan.applicants');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
