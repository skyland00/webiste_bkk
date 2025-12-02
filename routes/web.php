<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
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
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route::get('/logout', [AuthController::class, 'logout'])
//     ->name('logout')
//     ->middleware('auth');
