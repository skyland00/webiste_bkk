@extends('perusahaan.layout')

@section('content')
    <div class="p-6 bg-white shadow rounded-lg">

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Edit Lowongan</h1>
            <p class="text-sm text-slate-600 mt-1">Perbarui informasi lowongan pekerjaan</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">
            <form action="{{ route('perusahaan.lowongan.update', $lowongan->id) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                {{-- Judul Lowongan --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Judul Lowongan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul_lowongan"
                        value="{{ old('judul_lowongan', $lowongan->judul_lowongan) }}"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('judul_lowongan') border-red-500 @enderror"
                        placeholder="Contoh: Staff IT, Marketing Manager, Web Developer">
                    @error('judul_lowongan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Bidang --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Bidang <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="bidang" value="{{ old('bidang', $lowongan->bidang) }}"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('bidang') border-red-500 @enderror"
                        placeholder="Contoh: IT & Software, Marketing, Finance">
                    @error('bidang')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Grid: Tipe & Jumlah Orang --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Tipe Pekerjaan --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Tipe Pekerjaan <span class="text-red-500">*</span>
                        </label>
                        <select name="tipe_pekerjaan"
                            class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tipe_pekerjaan') border-red-500 @enderror">
                            <option value="">Pilih tipe pekerjaan</option>
                            <option value="full-time"
                                {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'full-time' ? 'selected' : '' }}>Full
                                Time</option>
                            <option value="part-time"
                                {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'part-time' ? 'selected' : '' }}>Part
                                Time</option>
                            <option value="kontrak"
                                {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'kontrak' ? 'selected' : '' }}>
                                Kontrak</option>
                            <option value="magang"
                                {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'magang' ? 'selected' : '' }}>Magang
                            </option>
                        </select>
                        @error('tipe_pekerjaan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jumlah Orang --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Jumlah Orang Dibutuhkan <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="jumlah_orang"
                            value="{{ old('jumlah_orang', $lowongan->jumlah_orang) }}" min="1"
                            class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('jumlah_orang') border-red-500 @enderror"
                            placeholder="Contoh: 2">
                        @error('jumlah_orang')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- Lokasi --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $lowongan->lokasi) }}"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('lokasi') border-red-500 @enderror"
                        placeholder="Contoh: Jakarta Selatan, Bandung, Remote">
                    @error('lokasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Grid: Gaji --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Range Gaji (Opsional)
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <input type="number" name="gaji_min" value="{{ old('gaji_min', $lowongan->gaji_min) }}"
                                min="0"
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('gaji_min') border-red-500 @enderror"
                                placeholder="Gaji minimal (Rp)">
                            @error('gaji_min')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input type="number" name="gaji_max" value="{{ old('gaji_max', $lowongan->gaji_max) }}"
                                min="0"
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('gaji_max') border-red-500 @enderror"
                                placeholder="Gaji maksimal (Rp)">
                            @error('gaji_max')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <p class="mt-1 text-xs text-slate-500">Kosongkan jika tidak ingin menampilkan range gaji</p>
                </div>

                {{-- Grid: Tanggal Buka & Tutup --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Tanggal Buka --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Tanggal Buka Lamaran <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_buka"
                            value="{{ old('tanggal_buka', $lowongan->tanggal_buka->format('Y-m-d')) }}"
                            class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tanggal_buka') border-red-500 @enderror">
                        @error('tanggal_buka')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Tutup --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Tanggal Tutup Lamaran <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_tutup"
                            value="{{ old('tanggal_tutup', $lowongan->tanggal_tutup->format('Y-m-d')) }}"
                            class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tanggal_tutup') border-red-500 @enderror">
                        @error('tanggal_tutup')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <p class="mt-1 text-xs text-slate-500">Tanggal tutup harus setelah tanggal buka</p>

                {{-- Deskripsi Pekerjaan --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Deskripsi Pekerjaan <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi_pekerjaan" rows="5"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('deskripsi_pekerjaan') border-red-500 @enderror"
                        placeholder="Jelaskan deskripsi pekerjaan, tanggung jawab, dan detail lainnya...">{{ old('deskripsi_pekerjaan', $lowongan->deskripsi_pekerjaan) }}</textarea>
                    @error('deskripsi_pekerjaan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Kualifikasi --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Kualifikasi <span class="text-red-500">*</span>
                    </label>
                    <textarea name="kualifikasi" rows="5"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kualifikasi') border-red-500 @enderror"
                        placeholder="Tulis kualifikasi yang dibutuhkan, skill, pengalaman, dll...">{{ old('kualifikasi', $lowongan->kualifikasi) }}</textarea>
                    @error('kualifikasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="flex items-center gap-3 pt-4 border-t border-slate-200">
                    <button type="submit"
                        class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        <i class="ri-save-line mr-2"></i>
                        Update Lowongan
                    </button>
                    <a href="{{ route('perusahaan.lowongan.lowongan') }}"
                        class="px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition-colors">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
