<?php
// controller/frontend/pelemar/ProfileController.php
namespace App\Http\Controllers\Frontend\Pelamar;

use App\Http\Controllers\Controller;
use App\Models\PelamarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'no_telp' => 'required|string|max:15',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'foto_profil' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'tahun_lulus.required' => 'Tahun lulus wajib diisi',
            'tahun_lulus.digits' => 'Tahun lulus harus 4 digit',
            'no_telp.required' => 'Nomor telepon wajib diisi',
            'cv.mimes' => 'CV harus berformat PDF, DOC, atau DOCX',
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
}
