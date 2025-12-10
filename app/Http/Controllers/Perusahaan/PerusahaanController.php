<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class PerusahaanController extends Controller
{
    public function index()
    {
        return view('perusahaan.dashboard');
    }

    // 📁 PROFIL PERUSAHAAN
    public function profile()
    {
        $perusahaan = Auth::user()->perusahaan;
        return view('perusahaan.profile', compact('perusahaan'));
    }

    public function updateProfile(Request $request)
    {
        $perusahaan = Auth::user()->perusahaan;

        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_perusahaan.required' => 'Nama perusahaan wajib diisi',
            'kontak.required' => 'Kontak wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'bidang_usaha.required' => 'Bidang usaha wajib diisi',
            'logo.image' => 'File harus berupa gambar',
            'logo.mimes' => 'Logo harus berformat jpeg, png, atau jpg',
            'logo.max' => 'Ukuran logo maksimal 2MB',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($perusahaan->logo && Storage::disk('public')->exists($perusahaan->logo)) {
                Storage::disk('public')->delete($perusahaan->logo);
            }

            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $perusahaan->update($validated);

        return redirect()->route('perusahaan.profile')
            ->with('success', 'Profil perusahaan berhasil diperbarui');
    }

    public function deleteLogo()
    {
        $perusahaan = Auth::user()->perusahaan;

        if ($perusahaan->logo && Storage::disk('public')->exists($perusahaan->logo)) {
            Storage::disk('public')->delete($perusahaan->logo);
            $perusahaan->update(['logo' => null]);

            return response()->json(['success' => true, 'message' => 'Logo berhasil dihapus']);
        }

        return response()->json(['success' => false, 'message' => 'Logo tidak ditemukan'], 404);
    }

    // ⚙️ PENGATURAN AKUN
    public function pengaturan()
    {
        return view('perusahaan.pengaturan');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)],
        ], [
            'current_password.required' => 'Password saat ini wajib diisi',
            'password.required' => 'Password baru wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $user = Auth::user();

        // Cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('perusahaan.pengaturan')
            ->with('success', 'Password berhasil diperbarui');
    }

    public function deleteAccount(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required',
        ], [
            'password.required' => 'Password wajib diisi untuk menghapus akun',
        ]);

        $user = Auth::user();

        // Verifikasi password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password tidak sesuai']);
        }

        // Hapus logo jika ada
        if ($user->perusahaan && $user->perusahaan->logo) {
            Storage::disk('public')->delete($user->perusahaan->logo);
        }

        // Logout dan hapus user (cascade akan hapus perusahaan & lowongan)
        Auth::logout();
        $user->delete();

        return redirect()->route('login')
            ->with('success', 'Akun berhasil dihapus');
    }
}
