<?php

namespace App\Http\Controllers;

use App\Models\PelamarModel;
use App\Models\PerusahaanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function index()
    {
        return view("auth.login");
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'email' => 'Email atau password salah'
            ])->withInput();
        }

        $user = Auth::user();

        // Cek jika role perusahaan, validasi status approval
        if ($user->role === 'perusahaan') {
            $perusahaan = PerusahaanModel::where('user_id', $user->id)->first();

            if ($perusahaan && $perusahaan->status === 'pending') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun Anda sedang menunggu persetujuan admin'
                ])->withInput();
            }

            if ($perusahaan && $perusahaan->status === 'rejected') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun Anda ditolak oleh admin. Silakan hubungi admin untuk informasi lebih lanjut'
                ])->withInput();
            }

            return redirect()->route('perusahaan.dashboard');
        }

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect('/');
    }

    function showRegister()
    {
        return view("auth.register");
    }

    // Register Pelamar
    function registerPelamar(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|unique:pelamar,nisn|max:10',
            'tahun_lulus' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'telepon' => 'required|string|max:12',
            'email' => 'required|email|unique:users,email',
            'cv' => 'nullable|file|mimes:pdf|max:2048',
            'password' => 'required|min:8|confirmed',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'nisn.required' => 'NISN wajib diisi',
            'nisn.unique' => 'NISN sudah terdaftar',
            'nisn.max' => 'NISN harus 10 digit',
            'tahun_lulus.required' => 'Tahun lulus wajib diisi',
            'tahun_lulus.min' => 'Tahun lulus tidak valid',
            'tahun_lulus.max' => 'Tahun lulus tidak valid',
            'telepon.required' => 'No telepon wajib diisi',
            'telepon.max' => 'No telepon maksimal 12 digit',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'cv.mimes' => 'CV harus berformat PDF',
            'cv.max' => 'Ukuran CV maksimal 2MB',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // Upload CV jika ada
        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
        }

        // 1. Buat akun user
        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pelamar',
        ]);

        // 2. Simpan data pelamar
        PelamarModel::create([
            'user_id' => $user->id,
            'nama_lengkap' => $request->nama_lengkap,
            'nisn' => $request->nisn,
            'tahun_lulus' => $request->tahun_lulus,
            'no_telp' => $request->telepon,
            'cv' => $cvPath,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan login.');
    }

    // Register Perusahaan
    function registerPerusahaan(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'kontak' => 'required|string|max:20',
            'alamat' => 'required|string',
            'bidang_usaha' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'nama_perusahaan.required' => 'Nama perusahaan wajib diisi',
            'kontak.required' => 'Kontak perusahaan wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'bidang_usaha.required' => 'Bidang usaha wajib diisi',
            'logo.image' => 'Logo harus berupa gambar',
            'logo.mimes' => 'Logo harus berformat JPEG, JPG, atau PNG',
            'logo.max' => 'Ukuran logo maksimal 2MB',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // Upload Logo jika ada
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logo', 'public');
        }

        // 1. Buat akun user
        $user = User::create([
            'name' => $request->nama_perusahaan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'perusahaan',
        ]);

        // 2. Simpan data perusahaan dengan status pending
        PerusahaanModel::create([
            'user_id' => $user->id,
            'nama_perusahaan' => $request->nama_perusahaan,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'bidang_usaha' => $request->bidang_usaha,
            'logo' => $logoPath,
            'status' => 'pending', // default pending
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Akun Anda akan segera diverifikasi oleh admin.');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
