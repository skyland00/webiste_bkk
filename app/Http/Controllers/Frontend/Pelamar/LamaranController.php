<?php
// controller\frontend\pelamar\LamaranController.php
namespace App\Http\Controllers\Frontend\Pelamar;

use App\Http\Controllers\Controller;
use App\Models\LamaranModel;
use App\Models\LowonganModel;
use App\Models\PelamarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LamaranController extends Controller
{
    // Halaman form melamar
    public function create($lowongan_id)
    {
        $lowongan = LowonganModel::with('perusahaan')->findOrFail($lowongan_id);

        // Cek apakah lowongan masih aktif
        if ($lowongan->status !== 'aktif') {
            return redirect()->route('frontend.lowongan.detail', $lowongan_id)
                ->with('error', 'Lowongan ini sudah ditutup');
        }

        // Cek apakah sudah melewati tanggal tutup
        if ($lowongan->tanggal_tutup < now()) {
            return redirect()->route('frontend.lowongan.detail', $lowongan_id)
                ->with('error', 'Pendaftaran lowongan ini sudah ditutup');
        }

        // Ambil data pelamar
        $pelamar = PelamarModel::where('user_id', Auth::id())->first();

        // Cek apakah sudah pernah melamar
        $sudahMelamar = LamaranModel::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $lowongan_id)
            ->exists();

        if ($sudahMelamar) {
            return redirect()->route('frontend.lowongan.detail', $lowongan_id)
                ->with('error', 'Anda sudah melamar lowongan ini');
        }

        return view('frontend.pelamar.melamar_kerja', compact('lowongan', 'pelamar'));
    }

    // Proses melamar
    public function store(Request $request, $lowongan_id)
    {
        $lowongan = LowonganModel::findOrFail($lowongan_id);
        $pelamar = PelamarModel::where('user_id', Auth::id())->first();

        // Validasi
        $request->validate([
            'cv' => $pelamar->cv ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
            'cover_letter' => 'nullable|string',
        ], [
            'cv.required' => 'CV wajib diupload',
            'cv.mimes' => 'CV harus berformat PDF',
            'cv.max' => 'Ukuran CV maksimal 2MB',
        ]);

        // Cek apakah sudah pernah melamar
        $sudahMelamar = LamaranModel::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $lowongan_id)
            ->exists();

        if ($sudahMelamar) {
            return redirect()->route('frontend.lowongan.detail', $lowongan_id)
                ->with('error', 'Anda sudah melamar lowongan ini');
        }

        // Handle CV
        $cvPath = $pelamar->cv; // Default: gunakan CV dari registrasi

        if ($request->hasFile('cv')) {
            // Upload CV baru
            $cvPath = $request->file('cv')->store('cv_lamaran', 'public');
        } elseif (!$pelamar->cv) {
            // Jika tidak ada CV sama sekali
            return back()->withErrors(['cv' => 'CV wajib diupload'])->withInput();
        }

        // Simpan lamaran
        LamaranModel::create([
            'pelamar_id' => $pelamar->id,
            'lowongan_id' => $lowongan_id,
            'cv' => $cvPath,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        return redirect()->route('frontend.pelamar.riwayat_lamaran')
            ->with('success', 'Lamaran berhasil dikirim! Kami akan menghubungi Anda segera.');
    }

    // Dashboard pelamar (history lamaran)
    public function index(Request $request)
    {
        $pelamar = PelamarModel::where('user_id', Auth::id())->first();

        $status = $request->get('status');

        $lamaran = LamaranModel::where('pelamar_id', $pelamar->id)
            ->with(['lowongan.perusahaan'])
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalLamaran = LamaranModel::where('pelamar_id', $pelamar->id)->count();
        $totalPending = LamaranModel::where('pelamar_id', $pelamar->id)->where('status', 'pending')->count();
        $totalDiterima = LamaranModel::where('pelamar_id', $pelamar->id)->where('status', 'diterima')->count();
        $totalDitolak = LamaranModel::where('pelamar_id', $pelamar->id)->where('status', 'ditolak')->count();

        // Jika request AJAX, return JSON
        if ($request->ajax()) {
            return response()->json([
                'html' => view('frontend.partials.lamaran_list', compact('lamaran'))->render(),
                'pagination' => $lamaran->appends(['status' => $status])->links()->render()
            ]);
        }

        return view('frontend.pelamar.riwayat_lamaran', compact(
            'lamaran',
            'totalLamaran',
            'totalPending',
            'totalDiterima',
            'totalDitolak',
            'status',
            'pelamar'
        ));
    }

    // Detail lamaran
    public function show($id)
    {
        $pelamar = PelamarModel::where('user_id', Auth::id())->first();

        $lamaran = LamaranModel::with(['lowongan.perusahaan'])
            ->where('id', $id)
            ->where('pelamar_id', $pelamar->id)
            ->firstOrFail();

        return view('frontend.pelamar.detail_lamaran', compact('lamaran'));
    }

    // Batalkan lamaran
    public function cancel($id)
    {
        $pelamar = PelamarModel::where('user_id', Auth::id())->first();

        $lamaran = LamaranModel::where('id', $id)
            ->where('pelamar_id', $pelamar->id)
            ->firstOrFail();

        // Hanya bisa membatalkan jika status masih pending
        if ($lamaran->status !== 'pending') {
            return redirect()->back()->with('error', 'Hanya lamaran dengan status "Pending" yang dapat dibatalkan.');
        }

        // Update status menjadi dibatalkan
        $lamaran->update([
            'status' => 'dibatalkan',
            'catatan_perusahaan' => 'Lamaran dibatalkan oleh pelamar pada ' . now()->format('d M Y, H:i') . ' WIB'
        ]);

        return redirect()->route('frontend.pelamar.riwayat_lamaran')
            ->with('success', 'Lamaran berhasil dibatalkan.');
    }
}
