<?php
// app/Http/Controllers/Frontend/Pelamar/ProfileController.php
namespace App\Http\Controllers\Frontend\Pelamar;

use App\Http\Controllers\Controller;
use App\Models\PelamarModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Tampilkan halaman profile
    public function index()
    {
        $pelamar = PelamarModel::with('user')->where('user_id', Auth::id())->firstOrFail();

        return view('frontend.pelamar.profile', compact('pelamar'));
    }

    // Tampilkan form edit profile
    public function edit()
    {
        $pelamar = PelamarModel::with('user')->where('user_id', Auth::id())->firstOrFail();

        return view('frontend.pelamar.edit_profile', compact('pelamar'));
    }

    // Update profile
    public function update(Request $request)
    {
        $pelamar = PelamarModel::where('user_id', Auth::id())->firstOrFail();

        // Validasi
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tahun_lulus' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 10),
            'no_telp' => 'required|string|max:12',
            'cv' => 'nullable|file|mimes:pdf|max:2048',
            'foto_profil' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'tahun_lulus.required' => 'Tahun lulus wajib diisi',
            'tahun_lulus.digits' => 'Tahun lulus harus 4 digit',
            'no_telp.required' => 'Nomor telepon wajib diisi',
            'no_telp.max' => 'Nomor telepon maksimal 12 digit',
            'cv.mimes' => 'CV harus berformat PDF',
            'cv.max' => 'Ukuran CV maksimal 2MB',
            'foto_profil.image' => 'Foto profil harus berupa gambar',
            'foto_profil.mimes' => 'Foto profil harus berformat JPEG, JPG, atau PNG',
            'foto_profil.max' => 'Ukuran foto profil maksimal 2MB',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'tahun_lulus' => $request->tahun_lulus,
            'no_telp' => $request->no_telp,
        ];

        // Handle CV Upload
        if ($request->hasFile('cv')) {
            // Hapus CV lama jika ada
            if ($pelamar->cv && Storage::disk('public')->exists($pelamar->cv)) {
                Storage::disk('public')->delete($pelamar->cv);
            }

            $data['cv'] = $request->file('cv')->store('cv_pelamar', 'public');
        }

        // Handle Foto Profil Upload
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($pelamar->foto_profil && Storage::disk('public')->exists($pelamar->foto_profil)) {
                Storage::disk('public')->delete($pelamar->foto_profil);
            }

            $data['foto_profil'] = $request->file('foto_profil')->store('foto_profil', 'public');
        }

        // Update data pelamar
        $pelamar->update($data);

        return redirect()->route('pelamar.profile')
            ->with('success', 'Profile berhasil diperbarui!');
    }

    // Hapus foto profil
    public function deleteFoto()
    {
        $pelamar = PelamarModel::where('user_id', Auth::id())->firstOrFail();

        if ($pelamar->foto_profil && Storage::disk('public')->exists($pelamar->foto_profil)) {
            Storage::disk('public')->delete($pelamar->foto_profil);

            $pelamar->update(['foto_profil' => null]);

            return redirect()->back()->with('success', 'Foto profil berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'Foto profil tidak ditemukan.');
    }

    // Hapus CV
    public function deleteCV()
    {
        $pelamar = PelamarModel::where('user_id', Auth::id())->firstOrFail();

        if ($pelamar->cv && Storage::disk('public')->exists($pelamar->cv)) {
            Storage::disk('public')->delete($pelamar->cv);

            $pelamar->update(['cv' => null]);

            return redirect()->back()->with('success', 'CV berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'CV tidak ditemukan.');
    }


    // Tampilkan halaman pengaturan
    public function pengaturan()
    {
        $pelamar = PelamarModel::with('user')->where('user_id', Auth::id())->firstOrFail();

        return view('frontend.pelamar.pengaturan', compact('pelamar'));
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'Password lama wajib diisi',
            'new_password.required' => 'Password baru wajib diisi',
            'new_password.min' => 'Password baru minimal 8 karakter',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $user = Auth::user();

        // Cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama yang Anda masukkan salah!');
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('success', 'Password berhasil diperbarui!');
    }

    // Hapus akun pelamar (HARD DELETE)
    public function deleteAccount(Request $request)
    {
        // Validasi password untuk keamanan ekstra
        $request->validate([
            'password' => 'required|string',
        ], [
            'password.required' => 'Password wajib diisi untuk konfirmasi',
        ]);

        $user = Auth::user();

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password yang Anda masukkan salah!');
        }

        DB::beginTransaction();
        try {
            $pelamar = PelamarModel::where('user_id', $user->id)->firstOrFail();

            // Hapus file CV jika ada
            if ($pelamar->cv && Storage::disk('public')->exists($pelamar->cv)) {
                Storage::disk('public')->delete($pelamar->cv);
            }

            // Hapus file foto profil jika ada
            if ($pelamar->foto_profil && Storage::disk('public')->exists($pelamar->foto_profil)) {
                Storage::disk('public')->delete($pelamar->foto_profil);
            }

            // Hapus semua lamaran terkait
            $pelamar->lamaran()->delete();

            // Hapus data pelamar
            $pelamar->delete();

            // Hapus user
            $user->delete();

            DB::commit();

            // Logout
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')
                ->with('success', 'Akun Anda berhasil dihapus. Terima kasih telah menggunakan layanan kami.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus akun: ' . $e->getMessage());
        }
    }
}
