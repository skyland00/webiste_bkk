{{-- /views/frontend/pelamar/dashboard.blade.php --}}

@extends('frontend.layout')

@section('title', 'Dashboard Pelamar - BKK SMKN 1 Purwosari')

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 bg-gradient-to-b from-white via-[#F5F6F5] to-white overflow-hidden">

        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 left-0 w-full h-full"
                style="background-image: radial-gradient(circle at 2px 2px, #F8BE09 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <!-- Floating Blobs -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-[#F8BE09]/20 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-[#122431]/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>

        <div class="relative max-w-[1400px] mx-auto px-8 sm:px-16">

            <!-- Welcome Message -->
            <div class="mb-8">
                <h1 class="text-4xl md:text-6xl font-black text-[#122431] mb-4 leading-tight">
                    Halo,
                    <span class="relative inline-block">
                        <span class="relative z-10">{{ $pelamar->nama_lengkap }}</span>
                        <span class="absolute bottom-2 left-0 w-full h-4 bg-[#F8BE09] -rotate-1"></span>
                    </span>
                </h1>
                <p class="text-xl text-[#4B5057]">Kelola lamaran pekerjaan Anda di sini</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid md:grid-cols-4 gap-6">

                <!-- Total Lamaran -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5] hover:shadow-xl transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-[#122431]/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-black text-[#122431] mb-1">{{ $totalLamaran }}</h3>
                    <p class="text-sm text-[#4B5057] font-semibold">Total Lamaran</p>
                </div>

                <!-- Pending -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5] hover:shadow-xl transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-yellow-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-black text-yellow-600 mb-1">{{ $totalPending }}</h3>
                    <p class="text-sm text-[#4B5057] font-semibold">Sedang Diproses</p>
                </div>

                <!-- Diterima -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5] hover:shadow-xl transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-black text-green-600 mb-1">{{ $totalDiterima }}</h3>
                    <p class="text-sm text-[#4B5057] font-semibold">Diterima</p>
                </div>

                <!-- Ditolak -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5] hover:shadow-xl transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-red-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-black text-red-600 mb-1">{{ $totalDitolak }}</h3>
                    <p class="text-sm text-[#4B5057] font-semibold">Ditolak</p>
                </div>

            </div>

        </div>
    </section>

    <!-- Alert Success -->
    @if(session('success'))
    <section class="py-4">
        <div class="max-w-[1400px] mx-auto px-8 sm:px-16">
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
        </div>
    </section>
    @endif

    <!-- Riwayat Lamaran -->
    <section class="py-12 bg-white">
        <div class="max-w-[1400px] mx-auto px-8 sm:px-16">

            <!-- Header & Filter -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-3xl font-black text-[#122431] mb-2">Riwayat Lamaran</h2>
                    <p class="text-[#4B5057]">Pantau status lamaran pekerjaan Anda</p>
                </div>

                <!-- Filter Status -->
                <div class="flex gap-2">
                    <a href="{{ route('frontend.pelamar.dashboard') }}"
                       class="px-4 py-2 rounded-xl font-semibold transition-all text-sm
                              {{ !$status ? 'bg-[#122431] text-white' : 'bg-white border-2 border-[#F5F6F5] text-[#4B5057] hover:border-[#122431]' }}">
                        Semua
                    </a>
                    <a href="{{ route('frontend.pelamar.dashboard', ['status' => 'pending']) }}"
                       class="px-4 py-2 rounded-xl font-semibold transition-all text-sm
                              {{ $status === 'pending' ? 'bg-yellow-500 text-white' : 'bg-white border-2 border-[#F5F6F5] text-[#4B5057] hover:border-yellow-500' }}">
                        Pending
                    </a>
                    <a href="{{ route('frontend.pelamar.dashboard', ['status' => 'diterima']) }}"
                       class="px-4 py-2 rounded-xl font-semibold transition-all text-sm
                              {{ $status === 'diterima' ? 'bg-green-500 text-white' : 'bg-white border-2 border-[#F5F6F5] text-[#4B5057] hover:border-green-500' }}">
                        Diterima
                    </a>
                    <a href="{{ route('frontend.pelamar.dashboard', ['status' => 'ditolak']) }}"
                       class="px-4 py-2 rounded-xl font-semibold transition-all text-sm
                              {{ $status === 'ditolak' ? 'bg-red-500 text-white' : 'bg-white border-2 border-[#F5F6F5] text-[#4B5057] hover:border-red-500' }}">
                        Ditolak
                    </a>
                </div>
            </div>

            <!-- Lamaran List -->
            @forelse($lamaran as $item)
            <div class="bg-white rounded-3xl shadow-lg p-6 mb-4 border border-[#F5F6F5] hover:shadow-xl transition-all">
                <div class="flex items-start gap-6">

                    <!-- Logo Perusahaan -->
                    <div class="flex-shrink-0">
                        @if($item->lowongan->perusahaan->logo)
                        <img src="{{ asset('storage/' . $item->lowongan->perusahaan->logo) }}"
                             alt="{{ $item->lowongan->perusahaan->nama_perusahaan }}"
                             class="w-16 h-16 rounded-2xl object-cover ring-4 ring-[#F5F6F5]">
                        @else
                        <div class="w-16 h-16 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-2xl flex items-center justify-center ring-4 ring-[#F5F6F5]">
                            <span class="text-[#F8BE09] font-bold text-xl">{{ substr($item->lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Info Lamaran -->
                    <div class="flex-1">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <h3 class="text-xl font-bold text-[#122431] mb-1">{{ $item->lowongan->judul_lowongan }}</h3>
                                <p class="text-[#4B5057] font-medium">{{$item->lowongan->perusahaan->nama_perusahaan }}</p>
</div>
<!-- Status Badge -->
                        @if($item->status === 'pending')
                        <span class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-bold flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Pending
                        </span>
                        @elseif($item->status === 'diterima')
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
                    </div>

                    <!-- Detail Info -->
                    <div class="flex flex-wrap gap-4 text-sm text-[#4B5057] mb-4">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            <span>{{ $item->lowongan->lokasi }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Dilamar: {{ $item->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ ucfirst($item->lowongan->tipe_pekerjaan) }}</span>
                        </div>
                    </div>

                    <!-- Catatan Perusahaan (jika ada) -->
                    @if($item->catatan_perusahaan)
                    <div class="bg-[#F8BE09]/10 border-l-4 border-[#F8BE09] rounded-r-xl p-4 mb-4">
                        <p class="text-sm font-bold text-[#122431] mb-1">Catatan dari Perusahaan:</p>
                        <p class="text-sm text-[#4B5057]">{{ $item->catatan_perusahaan }}</p>
                    </div>
                    @endif

                    <!-- Action Button -->
                    <a href="{{ route('pelamar.lamaran.show', $item->id) }}"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-[#122431] text-white rounded-xl font-semibold hover:bg-[#1a3345] transition-all text-sm">
                        Lihat Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
        @empty
        <div class="text-center py-24 bg-white rounded-3xl border-2 border-dashed border-[#F5F6F5]">
            <div class="w-24 h-24 bg-[#F8BE09]/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-3xl font-bold text-[#122431] mb-2">Belum Ada Lamaran</h3>
            <p class="text-lg text-[#4B5057] mb-6">Mulai melamar pekerjaan dan pantau statusnya di sini</p>
            <a href="{{ route('frontend.lowongan') }}"
               class="inline-flex items-center gap-2 px-8 py-4 bg-[#122431] text-white rounded-2xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Cari Lowongan
            </a>
        </div>
        @endforelse

        <!-- Pagination -->
        @if($lamaran->hasPages())
        <div class="flex justify-center mt-8">
            <div class="inline-flex items-center gap-2 bg-white rounded-2xl p-2 shadow-lg border border-[#F5F6F5]">
                {{ $lamaran->appends(['status' => $status])->links() }}
            </div>
        </div>
        @endif

    </div>
</section>
@endsection
