{{-- /views/frontend/pelamar/detail_lamaran.blade.php --}}

@extends('frontend.layout')

@section('title', 'Detail Lamaran - BKK SMKN 1 Purwosari')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-[#F5F6F5] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-sm text-[#4B5057]">
                <a href="{{ route('frontend.home') }}" class="hover:text-[#122431] transition">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('frontend.pelamar.riwayat_lamaran') }}" class="hover:text-[#122431] transition">Dashboard</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-[#122431] font-medium">Detail Lamaran</span>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-[#F5F6F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Header Card -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <div class="flex items-start gap-6 mb-6">
                            @if($lamaran->lowongan->perusahaan->logo)
                            <img src="{{ asset('storage/' . $lamaran->lowongan->perusahaan->logo) }}"
                                 alt="{{ $lamaran->lowongan->perusahaan->nama_perusahaan }}"
                                 class="w-20 h-20 rounded-2xl object-cover ring-4 ring-[#F5F6F5]">
                            @else
                            <div class="w-20 h-20 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-2xl flex items-center justify-center ring-4 ring-[#F5F6F5]">
                                <span class="text-[#F8BE09] font-bold text-2xl">{{ substr($lamaran->lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
                            </div>
                            @endif

                            <div class="flex-1">
                                <h1 class="text-3xl font-bold text-[#122431] mb-2">{{ $lamaran->lowongan->judul_lowongan }}</h1>
                                <p class="text-lg text-[#4B5057] mb-3">{{ $lamaran->lowongan->perusahaan->nama_perusahaan }}</p>

                                <!-- Status Badge -->
                                <div class="flex items-center gap-3">
                                    @if($lamaran->status === 'pending')
                                    <span class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-bold flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Sedang Diproses
                                    </span>
                                    @elseif($lamaran->status === 'diterima')
                                    <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-bold flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Diterima
                                    </span>
                                    @else
                                    <span class="px-4 py-2 bg-red-100 text-red-700 rounded-full text-sm font-bold flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Ditolak
                                    </span>
                                    @endif

                                    <span class="px-4 py-2 bg-[#F8BE09]/10 text-[#122431] rounded-full text-sm font-semibold">
                                        {{ ucfirst($lamaran->lowongan->tipe_pekerjaan) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Info Grid -->
                        <div class="grid md:grid-cols-2 gap-4 pt-6 border-t border-[#F5F6F5]">
                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <svg class="w-5 h-5 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Tanggal Melamar</p>
                                    <p class="font-semibold text-[#122431]">{{ $lamaran->created_at->format('d M Y, H:i') }} WIB</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <svg class="w-5 h-5 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Lokasi</p>
                                    <p class="font-semibold text-[#122431]">{{ $lamaran->lowongan->lokasi }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <svg class="w-5 h-5 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Gaji</p>
                                    @if($lamaran->lowongan->gaji_min && $lamaran->lowongan->gaji_max)
                                        <p class="font-semibold text-[#122431]">Rp {{ number_format($lamaran->lowongan->gaji_min, 0, ',', '.') }} - {{ number_format($lamaran->lowongan->gaji_max, 0, ',', '.') }}</p>
                                    @else
                                        <p class="font-semibold text-[#122431]">Gaji Kompetitif</p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <svg class="w-5 h-5 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Bidang</p>
                                    <p class="font-semibold text-[#122431]">{{ $lamaran->lowongan->bidang }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CV yang Diupload -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <h2 class="text-2xl font-bold text-[#122431] mb-4 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-[#122431] to-[#4B5057] rounded-full"></span>
                            Curriculum Vitae (CV)
                        </h2>
                        <div class="bg-[#F8BE09]/10 border-2 border-[#F8BE09] rounded-2xl p-6 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-[#F8BE09] rounded-2xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-[#122431] text-lg">CV Lamaran</p>
                                    <p class="text-sm text-[#4B5057]">File yang dikirim untuk lamaran ini</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $lamaran->cv) }}" target="_blank"
                               class="px-6 py-3 bg-[#122431] text-white rounded-xl font-bold hover:bg-[#1a3345] transition-all shadow-lg hover:shadow-xl flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Lihat CV
                            </a>
                        </div>
                    </div>

                    <!-- Cover Letter -->
                    @if($lamaran->cover_letter)
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <h2 class="text-2xl font-bold text-[#122431] mb-4 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-[#F8BE09] to-[#ffd54f] rounded-full"></span>
                            Cover Letter
                        </h2>
                        <div class="bg-[#F5F6F5] rounded-2xl p-6">
                            <p class="text-[#4B5057] leading-relaxed whitespace-pre-line">{{ $lamaran->cover_letter }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Catatan dari Perusahaan -->
                    @if($lamaran->catatan_perusahaan)
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <h2 class="text-2xl font-bold text-[#122431] mb-4 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-[#4B5057] to-[#122431] rounded-full"></span>
                            Catatan dari Perusahaan
                        </h2>
                        <div class="bg-[#F8BE09]/10 border-l-4 border-[#F8BE09] rounded-r-2xl p-6">
                            <p class="text-[#122431] leading-relaxed">{{ $lamaran->catatan_perusahaan }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Info Lowongan -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <h2 class="text-2xl font-bold text-[#122431] mb-6 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-[#122431] to-[#4B5057] rounded-full"></span>
                            Detail Lowongan
                        </h2>

                        <div class="space-y-6">
                            <!-- Deskripsi Pekerjaan -->
                            <div>
                                <h3 class="font-bold text-[#122431] mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Deskripsi Pekerjaan
                                </h3>
                                <div class="text-[#4B5057] leading-relaxed">
                                    {!! nl2br(e($lamaran->lowongan->deskripsi_pekerjaan)) !!}
                                </div>
                            </div>

                            <!-- Kualifikasi -->
                            <div>
                                <h3 class="font-bold text-[#122431] mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                    </svg>
                                    Kualifikasi
                                </h3>
                                <div class="text-[#4B5057] leading-relaxed">
                                    {!! nl2br(e($lamaran->lowongan->kualifikasi)) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">

                        <!-- Status Card -->
                        <div class="bg-gradient-to-br from-[#122431] to-[#1a3345] rounded-3xl shadow-xl p-8 text-white">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-[#F8BE09]/20 rounded-2xl mb-4 backdrop-blur-sm">
                                    @if($lamaran->status === 'pending')
                                    <svg class="w-8 h-8 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @elseif($lamaran->status === 'diterima')
                                    <svg class="w-8 h-8 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @else
                                    <svg class="w-8 h-8 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @endif
                                </div>
                                <h3 class="text-2xl font-bold mb-2">Status Lamaran</h3>
                                <p class="text-[#F5F6F5] text-sm mb-4">
                                    @if($lamaran->status === 'pending')
                                        Lamaran Anda sedang ditinjau oleh perusahaan
                                    @elseif($lamaran->status === 'diterima')
                                        Selamat! Lamaran Anda diterima
                                    @else
                                        Mohon maaf, lamaran Anda ditolak
                                    @endif
                                </p>

                                @if($lamaran->status === 'pending')
                                <div class="px-4 py-2 bg-yellow-500/20 rounded-full text-yellow-300 font-bold text-sm">
                                    Sedang Diproses
                                </div>
                                @elseif($lamaran->status === 'diterima')
                                <div class="px-4 py-2 bg-green-500/20 rounded-full text-green-300 font-bold text-sm">
                                    Diterima
                                </div>
                                @else
                                <div class="px-4 py-2 bg-red-500/20 rounded-full text-red-300 font-bold text-sm">
                                    Ditolak
                                </div>
                                @endif
                            </div>

                            <a href="{{ route('frontend.pelamar.riwayat_lamaran') }}"
                               class="block w-full bg-[#F8BE09] text-[#122431] text-center py-4 rounded-2xl font-bold hover:bg-[#ffd54f] transition shadow-lg hover:shadow-xl hover:scale-105 duration-300">
                                Kembali ke Dashboard
                            </a>
                        </div>

                        <!-- Kontak Perusahaan -->
                        <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5]">
                            <h3 class="font-bold text-[#122431] mb-4">Kontak Perusahaan</h3>
                            <div class="space-y-3">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#F8BE09] mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-[#B2B2AF]">Perusahaan</p>
                                        <p class="font-semibold text-[#122431]">{{ $lamaran->lowongan->perusahaan->nama_perusahaan }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#F8BE09] mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-[#B2B2AF]">Telepon</p>
                                        <p class="font-semibold text-[#122431]">{{ $lamaran->lowongan->perusahaan->kontak }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#F8BE09] mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-[#B2B2AF]">Alamat</p>
                                        <p class="font-semibold text-[#122431]">{{ $lamaran->lowongan->perusahaan->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cari Lowongan Lain -->
                        <div class="bg-[#F8BE09]/10 rounded-3xl p-6 border-2 border-[#F8BE09]">
                            <h3 class="font-bold text-[#122431] mb-2">Cari Lowongan Lain</h3>
                            <p class="text-sm text-[#4B5057] mb-4">Jelajahi lowongan kerja lainnya yang sesuai dengan Anda</p>
                            <a href="{{ route('frontend.lowongan') }}"
                               class="block w-full bg-[#122431] text-white text-center py-3 rounded-xl font-bold hover:bg-[#1a3345] transition">
                                Lihat Lowongan
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
