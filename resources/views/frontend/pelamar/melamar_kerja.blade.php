{{-- /views/frontend/pelamar/melamar_kerja.blade.php --}}

@extends('frontend.layout')

@section('title', 'Lamar Pekerjaan - ' . $lowongan->judul_lowongan)

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-[#F5F6F5] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-sm text-[#4B5057]">
                <a href="{{ route('frontend.home') }}" class="hover:text-[#122431] transition">Home</a>
                <i class="ri-arrow-right-s-line text-lg"></i>
                <a href="{{ route('frontend.lowongan') }}" class="hover:text-[#122431] transition">Lowongan</a>
                <i class="ri-arrow-right-s-line text-lg"></i>
                <a href="{{ route('frontend.lowongan.detail', $lowongan->id) }}" class="hover:text-[#122431] transition">Detail</a>
                <i class="ri-arrow-right-s-line text-lg"></i>
                <span class="text-[#122431] font-medium">Lamar Pekerjaan</span>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-[#F5F6F5]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-6 border border-[#F5F6F5]">
                <div class="flex items-start gap-6">
                    @if($lowongan->perusahaan->logo)
                    <img src="{{ asset('storage/' . $lowongan->perusahaan->logo) }}"
                         alt="{{ $lowongan->perusahaan->nama_perusahaan }}"
                         class="w-20 h-20 rounded-2xl object-cover ring-4 ring-[#F5F6F5]">
                    @else
                    <div class="w-20 h-20 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-2xl flex items-center justify-center ring-4 ring-[#F5F6F5]">
                        <span class="text-[#F8BE09] font-bold text-2xl">{{ substr($lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
                    </div>
                    @endif

                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-[#122431] mb-2">{{ $lowongan->judul_lowongan }}</h1>
                        <p class="text-lg text-[#4B5057] mb-3">{{ $lowongan->perusahaan->nama_perusahaan }}</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-4 py-2 bg-gradient-to-r from-[#F8BE09] to-[#ffd54f] text-[#122431] text-sm font-semibold rounded-full">
                                {{ ucfirst($lowongan->tipe_pekerjaan) }}
                            </span>
                            <span class="px-4 py-2 bg-[#F8BE09]/10 text-[#122431] text-sm font-semibold rounded-full">
                                {{ $lowongan->lokasi }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alert Success/Error -->
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl mb-6 flex items-center gap-3">
                <i class="ri-checkbox-circle-line text-2xl"></i>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
            @endif

            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-2xl mb-6 flex items-center gap-3">
                <i class="ri-error-warning-line text-2xl"></i>
                <span class="font-semibold">{{ session('error') }}</span>
            </div>
            @endif

            <!-- Form Lamaran -->
            <form action="{{ route('lamaran.store', $lowongan->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                @csrf

                <h2 class="text-2xl font-bold text-[#122431] mb-6 flex items-center gap-3">
                    <span class="w-2 h-8 bg-gradient-to-b from-[#122431] to-[#4B5057] rounded-full"></span>
                    Form Lamaran Pekerjaan
                </h2>

                <!-- Data Pelamar (Read Only) -->
                <div class="bg-[#F5F6F5] rounded-2xl p-6 mb-6">
                    <h3 class="font-bold text-[#122431] mb-4">Data Pelamar</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-[#4B5057] mb-1">Nama Lengkap</label>
                            <p class="text-[#122431] font-medium">{{ $pelamar->nama_lengkap }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4B5057] mb-1">NISN</label>
                            <p class="text-[#122431] font-medium">{{ $pelamar->nisn }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4B5057] mb-1">No. Telepon</label>
                            <p class="text-[#122431] font-medium">{{ $pelamar->no_telp }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4B5057] mb-1">Tahun Lulus</label>
                            <p class="text-[#122431] font-medium">{{ $pelamar->tahun_lulus }}</p>
                        </div>
                    </div>
                </div>

                <!-- Upload CV -->
                <div class="mb-6">
                    <label class="block text-sm font-bold text-[#122431] mb-2">
                        <span class="flex items-center gap-2">
                            <i class="ri-file-text-line text-xl text-[#F8BE09]"></i>
                            Curriculum Vitae (CV) <span class="text-red-500">*</span>
                        </span>
                    </label>

                    @if($pelamar->cv)
                    <div class="bg-[#F8BE09]/10 border-2 border-[#F8BE09] rounded-2xl p-4 mb-3 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-[#F8BE09] rounded-xl flex items-center justify-center">
                                <i class="ri-file-text-line text-2xl text-[#122431]"></i>
                            </div>
                            <div>
                                <p class="font-bold text-[#122431]">CV dari Profil Anda</p>
                                <p class="text-sm text-[#4B5057]">CV ini akan digunakan untuk lamaran</p>
                            </div>
                        </div>
                        <a href="{{ asset('storage/' . $pelamar->cv) }}" target="_blank"
                           class="px-4 py-2 bg-[#122431] text-white rounded-xl font-semibold hover:bg-[#1a3345] transition text-sm">
                            Lihat CV
                        </a>
                    </div>
                    <p class="text-sm text-[#4B5057] mb-3">Atau upload CV baru untuk lamaran ini:</p>
                    @else
                    <p class="text-sm text-[#4B5057] mb-3">Anda belum memiliki CV di profil. Upload CV untuk melanjutkan:</p>
                    @endif

                    <input type="file" name="cv" id="cv" accept=".pdf"
                           class="w-full px-4 py-3 border-2 border-[#F5F6F5] rounded-2xl focus:ring-2 focus:ring-[#F8BE09] focus:border-[#F8BE09] transition-all
                                  file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold
                                  file:bg-[#122431] file:text-white hover:file:bg-[#1a3345] file:cursor-pointer">

                    @error('cv')
                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                        <i class="ri-error-warning-line"></i>
                        {{ $message }}
                    </p>
                    @enderror

                    <p class="text-xs text-[#B2B2AF] mt-2">Format: PDF maksimal 2MB</p>
                </div>

                <!-- Cover Letter -->
                <div class="mb-6">
                    <label class="block text-sm font-bold text-[#122431] mb-2">
                        <span class="flex items-center gap-2">
                            <i class="ri-draft-line text-xl text-[#F8BE09]"></i>
                            Cover Letter / Surat Lamaran <span class="text-[#B2B2AF] text-xs">(Opsional)</span>
                        </span>
                    </label>
                    <textarea name="cover_letter" id="cover_letter" rows="8"
                              placeholder="Tulis surat lamaran Anda di sini...&#10;&#10;Contoh:&#10;Kepada Yth. HRD {{ $lowongan->perusahaan->nama_perusahaan }}&#10;&#10;Dengan hormat,&#10;Saya yang bertanda tangan di bawah ini:&#10;Nama: {{ $pelamar->nama_lengkap }}&#10;&#10;Dengan ini saya mengajukan lamaran pekerjaan untuk posisi {{ $lowongan->judul_lowongan }}..."
                              class="w-full px-4 py-3 border-2 border-[#F5F6F5] rounded-2xl focus:ring-2 focus:ring-[#F8BE09] focus:border-[#F8BE09] transition-all resize-none">{{ old('cover_letter') }}</textarea>

                    @error('cover_letter')
                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                        <i class="ri-error-warning-line"></i>
                        {{ $message }}
                    </p>
                    @enderror

                    <p class="text-xs text-[#B2B2AF] mt-2">Ceritakan motivasi dan alasan Anda melamar posisi ini</p>
                </div>

                <!-- Konfirmasi -->
                <div class="bg-[#F8BE09]/10 border-2 border-[#F8BE09] rounded-2xl p-6 mb-6">
                    <div class="flex items-start gap-3">
                        <input type="checkbox" id="konfirmasi" required
                               class="w-5 h-5 mt-1 rounded border-[#F8BE09] text-[#122431] focus:ring-[#F8BE09]">
                        <label for="konfirmasi" class="text-sm text-[#122431] flex-1">
                            <span class="font-bold">Saya menyatakan bahwa data yang saya berikan adalah benar dan dapat dipertanggungjawabkan.</span>
                            Saya memahami bahwa memberikan informasi palsu dapat mengakibatkan pembatalan lamaran.
                        </label>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <a href="{{ route('frontend.lowongan.detail', $lowongan->id) }}"
                       class="flex-1 py-4 bg-white border-2 border-[#122431] text-[#122431] rounded-2xl font-bold hover:bg-[#F5F6F5] transition-all text-center">
                        Batal
                    </a>
                    <button type="submit"
                            class="flex-1 py-4 bg-gradient-to-r from-[#122431] to-[#1a3345] text-white rounded-2xl font-bold hover:from-[#0f1b24] hover:to-[#122431] transition-all shadow-xl hover:shadow-2xl hover:scale-105 duration-300 flex items-center justify-center gap-2">
                        <i class="ri-send-plane-fill text-xl"></i>
                        Kirim Lamaran
                    </button>
                </div>

            </form>

        </div>
    </section>
@endsection
