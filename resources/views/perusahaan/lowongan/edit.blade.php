@extends('perusahaan.layout')

@section('content')

    <main class="flex-1 overflow-y-auto scrollbar-thin">

       <div class="w-full max-w-6xl pb-12 px-4">

            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
                <a href="{{ route('perusahaan.dashboard') }}" class="hover:text-slate-900 transition">Dashboard</a>
                <i class="ri-arrow-right-s-line text-xs"></i>
                <a href="{{ route('perusahaan.lowongan.lowongan') }}" class="hover:text-slate-900 transition">Lowongan</a>
                <i class="ri-arrow-right-s-line text-xs"></i>
                <span class="text-slate-900">Edit Lowongan</span>
            </nav>

            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-slate-900 mb-2">Edit Lowongan</h1>
                <p class="text-slate-600">Perbarui informasi lowongan pekerjaan</p>
            </div>

            {{-- Form Card --}}
            <div class="bg-white rounded-lg border border-slate-200 shadow-sm w-full">

                <form action="{{ route('perusahaan.lowongan.update', $lowongan->id) }}" method="POST" class="p-7 space-y-8" id="lowonganForm">
                    @csrf
                    @method('PUT')

                    {{-- Informasi Dasar --}}
                    <div class="space-y-6">
                        <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Informasi Dasar</h2>

                        <div class="space-y-5">
                            {{-- Judul --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Judul Lowongan <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" name="judul_lowongan" value="{{ old('judul_lowongan', $lowongan->judul_lowongan) }}"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('judul_lowongan') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="contoh: Senior Frontend Developer">
                                @error('judul_lowongan')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Bidang --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Bidang <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" name="bidang" value="{{ old('bidang', $lowongan->bidang) }}"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('bidang') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="contoh: Technology & IT">
                                @error('bidang')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Grid 2 --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Tipe Pekerjaan <span class="text-rose-500">*</span>
                                    </label>
                                    <select name="tipe_pekerjaan"
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('tipe_pekerjaan') border-rose-300 bg-rose-50 @enderror">
                                        <option value="">Pilih tipe</option>
                                        <option value="full-time" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'full-time' ? 'selected' : '' }}>Full Time</option>
                                        <option value="part-time" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'part-time' ? 'selected' : '' }}>Part Time</option>
                                        <option value="kontrak" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                                        <option value="magang" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'magang' ? 'selected' : '' }}>Magang</option>
                                    </select>
                                    @error('tipe_pekerjaan')
                                        <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Jumlah Dibutuhkan <span class="text-rose-500">*</span>
                                    </label>
                                    <input type="number" name="jumlah_orang" value="{{ old('jumlah_orang', $lowongan->jumlah_orang) }}" min="1"
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('jumlah_orang') border-rose-300 bg-rose-50 @enderror"
                                        placeholder="2">
                                    @error('jumlah_orang')
                                        <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Lokasi --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Lokasi <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" name="lokasi" value="{{ old('lokasi', $lowongan->lokasi) }}"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('lokasi') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="contoh: Jakarta / Remote">
                                @error('lokasi')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Kompensasi & Periode --}}
                    <div class="space-y-6">
                        <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Kompensasi & Periode</h2>

                        <div class="space-y-5">
                            {{-- Gaji --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Range Gaji <span class="text-slate-400 text-xs">(opsional)</span>
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <input type="number" name="gaji_min" min="0" value="{{ old('gaji_min', $lowongan->gaji_min) }}"
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all"
                                        placeholder="Min (Rp)">
                                    <input type="number" name="gaji_max" min="0" value="{{ old('gaji_max', $lowongan->gaji_max) }}"
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all"
                                        placeholder="Max (Rp)">
                                </div>
                            </div>

                            {{-- Tanggal --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Tanggal Buka <span class="text-rose-500">*</span>
                                    </label>
                                    <input type="date" name="tanggal_buka" value="{{ old('tanggal_buka', $lowongan->tanggal_buka->format('Y-m-d')) }}"
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 @error('tanggal_buka') border-rose-300 bg-rose-50 @enderror">
                                    @error('tanggal_buka')
                                        <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Tanggal Tutup <span class="text-rose-500">*</span>
                                    </label>
                                    <input type="date" name="tanggal_tutup" value="{{ old('tanggal_tutup', $lowongan->tanggal_tutup->format('Y-m-d')) }}"
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 @error('tanggal_tutup') border-rose-300 bg-rose-50 @enderror">
                                    @error('tanggal_tutup')
                                        <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Detail Lowongan --}}
                    <div class="space-y-6">
                        <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Detail Lowongan</h2>

                        <div class="space-y-5">
                            {{-- Deskripsi --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Deskripsi Pekerjaan <span class="text-rose-500">*</span>
                                </label>
                                <textarea name="deskripsi_pekerjaan" rows="5"
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 resize-none @error('deskripsi_pekerjaan') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="Jelaskan tanggung jawab dan detail pekerjaan...">{{ old('deskripsi_pekerjaan', $lowongan->deskripsi_pekerjaan) }}</textarea>
                                @error('deskripsi_pekerjaan')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Kualifikasi --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Kualifikasi <span class="text-rose-500">*</span>
                                </label>
                                <textarea name="kualifikasi" rows="5"
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 resize-none @error('kualifikasi') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="Tulis kualifikasi, skill, dan pengalaman yang dibutuhkan...">{{ old('kualifikasi', $lowongan->kualifikasi) }}</textarea>
                                @error('kualifikasi')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-end gap-3 pt-6 border-t">
                        <a href="{{ route('perusahaan.lowongan.lowongan') }}"
                            class="px-6 py-2.5 text-slate-600 hover:text-slate-900 font-medium">
                            Batal
                        </a>
                        <button type="submit" id="submitBtn"
                            class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-medium rounded-lg shadow-sm">
                            Update Lowongan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    @push('scripts')
        <script>
            document.getElementById('lowonganForm').addEventListener('submit', function () {
                const btn = document.getElementById('submitBtn');
                btn.disabled = true;
                btn.textContent = 'Menyimpan...';
                btn.classList.add('opacity-75');
            });
        </script>
    @endpush

@endsection