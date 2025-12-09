{{-- /views/frontend/pelamar/edit_profile.blade.php --}}

@extends('frontend.layout')

@section('content')
<div class="container mx-auto px-4 py-32">
    <div class="max-w-4xl mx-auto">
        <!-- Alerts -->
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <!-- CARD -->
        <div class="bg-white shadow-[0_4px_12px_rgba(0,0,0,0.06)] rounded-xl overflow-hidden">
            <form action="{{ route('pelamar.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-8">

                    <!-- FOTO -->
                    <div class="mb-8 pb-8 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-[#122431] mb-4">Foto Profil</h3>

                        <div class="flex items-start gap-6">

                            <!-- Foto -->
                            <div class="flex-shrink-0">
                                <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-100 border-4 border-gray-200 shadow-sm">
                                    @if($pelamar->foto_profil)
                                        <img id="preview-foto"
                                             src="{{ asset('storage/' . $pelamar->foto_profil) }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <img id="preview-foto"
                                             src=""
                                             class="w-full h-full object-cover hidden">
                                        <div id="no-photo" class="w-full h-full flex items-center justify-center">
                                            <svg class="w-14 h-14 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Upload -->
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-[#122431] mb-2">Upload Foto Profil Baru</label>
                                <input type="file"
                                       name="foto_profil"
                                       id="foto_profil"
                                       accept="image/jpeg,image/jpg,image/png"
                                       class="block w-full text-sm text-gray-600
                                              file:mr-4 file:py-2 file:px-4 file:rounded-lg
                                              file:border file:border-gray-300
                                              file:text-sm file:font-medium
                                              file:bg-white file:text-[#122431]
                                              hover:file:bg-gray-50 cursor-pointer">

                                @error('foto_profil')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror

                                @if($pelamar->foto_profil)
                                    <button type="button"
                                            onclick="deleteFoto()"
                                            class="mt-3 text-red-600 hover:opacity-70 text-sm font-medium flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Hapus Foto Profil
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- INFORMASI PERSONAL -->
                    <h3 class="text-lg font-semibold text-[#122431] mb-6">Informasi Personal</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Nama -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-[#122431] mb-2">Nama Lengkap *</label>
                            <input type="text" name="nama_lengkap"
                                   value="{{ old('nama_lengkap', $pelamar->nama_lengkap) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-[#122431] focus:border-[#122431]"
                                   required>
                        </div>

                        <!-- Email -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-[#122431] mb-2">Email (tidak dapat diubah)</label>
                            <input type="email"
                                   value="{{ $pelamar->user->email }}"
                                   class="w-full px-4 py-3 border border-gray-300 bg-gray-100 rounded-lg cursor-not-allowed"
                                   readonly>
                        </div>

                        <!-- NISN -->
                        <div>
                            <label class="block text-sm font-medium text-[#122431] mb-2">NISN</label>
                            <input type="text"
                                   value="{{ $pelamar->nisn ?? '-' }}"
                                   class="w-full px-4 py-3 border border-gray-300 bg-gray-100 rounded-lg cursor-not-allowed"
                                   readonly>
                        </div>

                        <!-- Tahun Lulus -->
                        <div>
                            <label class="block text-sm font-medium text-[#122431] mb-2">Tahun Lulus *</label>
                            <input type="number"
                                   name="tahun_lulus"
                                   value="{{ old('tahun_lulus', $pelamar->tahun_lulus) }}"
                                   min="1900"
                                   max="{{ date('Y') + 10 }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-[#122431] focus:border-[#122431]"
                                   required>
                        </div>

                        <!-- No Telp -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-[#122431] mb-2">No. Telepon *</label>
                            <input type="text"
                                   name="no_telp"
                                   value="{{ old('no_telp', $pelamar->no_telp) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-[#122431] focus:border-[#122431]"
                                   required>
                        </div>
                    </div>

                    <!-- CV -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-[#122431] mb-4">Curriculum Vitae (CV)</h3>

                        @if($pelamar->cv)
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-8 h-8 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <div>
                                            <p class="font-medium text-[#122431]">CV Tersimpan</p>
                                            <p class="text-sm text-gray-600">{{ basename($pelamar->cv) }}</p>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <a href="{{ asset('storage/' . $pelamar->cv) }}"
                                           target="_blank"
                                           class="px-4 py-2 bg-[#122431] text-white rounded-lg hover:bg-[#0e1c28] text-sm">
                                            Lihat CV
                                        </a>
                                        <button type="button"
                                                onclick="deleteCV()"
                                                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:opacity-75 text-sm">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <label class="block text-sm font-medium text-[#122431] mb-2">
                            {{ $pelamar->cv ? 'Upload CV Baru (Opsional)' : 'Upload CV *' }}
                        </label>

                        <input type="file" name="cv" accept=".pdf,.doc,.docx"
                               class="block w-full text-sm text-gray-600
                                      file:mr-4 file:py-2 file:px-4 file:rounded-lg
                                      file:border file:border-gray-300
                                      file:bg-white file:text-[#122431]
                                      hover:file:bg-gray-50 cursor-pointer">

                        @error('cv')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- BUTTONS -->
                    <div class="mt-10 flex gap-4">
                        <button type="submit"
                                class="flex-1 bg-[#122431] hover:bg-[#0e1c28] text-white py-3 px-6 rounded-lg font-semibold transition flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('pelamar.profile') }}"
                           class="flex-1 text-center bg-gray-200 hover:bg-gray-300 text-[#122431] py-3 px-6 rounded-lg font-semibold transition">
                            Batal
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- FORM DELETE FOTO -->
<form id="delete-foto-form" action="{{ route('pelamar.profile.delete-foto') }}" method="POST" class="hidden">
    @csrf @method('DELETE')
</form>

<!-- FORM DELETE CV -->
<form id="delete-cv-form" action="{{ route('pelamar.profile.delete-cv') }}" method="POST" class="hidden">
    @csrf @method('DELETE')
</form>

<script>
document.getElementById('foto_profil').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const prev = document.getElementById('preview-foto');
            const noPhoto = document.getElementById('no-photo');
            prev.src = e.target.result;
            prev.classList.remove('hidden');
            if (noPhoto) noPhoto.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
});
function deleteFoto() { if(confirm('Yakin hapus foto?')) document.getElementById('delete-foto-form').submit(); }
function deleteCV() { if(confirm('Yakin hapus CV?')) document.getElementById('delete-cv-form').submit(); }
</script>
@endsection
