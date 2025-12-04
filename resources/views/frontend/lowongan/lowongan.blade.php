{{-- /views/frontend/lowongan/lowongan.blade.php --}}

@extends('frontend.layout')

@section('title', 'Lowongan Kerja - BKK SMKN 1 Purwosari')

@section('content')
    <!-- Hero Section Mini -->
    <section class="relative bg-gradient-to-br from-[#122431] via-[#1a3345] to-[#0f1b24] py-16 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#F8BE09] rounded-full filter blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Temukan Karir Impianmu</h1>
            <p class="text-lg text-[#F5F6F5] max-w-2xl mx-auto">{{ $totalLowongan }} lowongan kerja menunggu untuk kamu</p>
        </div>
    </section>

    <!-- Filter & Search Section -->
    <section class="-mt-8 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl p-6 border border-[#F5F6F5]">
                <form method="GET" action="{{ route('frontend.lowongan') }}" class="space-y-4">

                    <!-- Search Bar -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative">
                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#B2B2AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" name="search" value="{{ $search }}" placeholder="Cari posisi, perusahaan, atau kata kunci..." class="w-full pl-12 pr-4 py-4 border border-[#F5F6F5] rounded-2xl focus:ring-2 focus:ring-[#F8BE09] focus:border-transparent">
                            </div>
                        </div>
                        <button type="submit" class="px-8 py-4 bg-gradient-to-r from-[#122431] to-[#1a3345] text-[#F8BE09] rounded-2xl hover:from-[#0f1b24] hover:to-[#122431] transition font-semibold shadow-lg hover:shadow-xl">
                            Cari Lowongan
                        </button>
                    </div>

                    <!-- Filters -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <!-- Filter Bidang -->
                        <div>
                            <label class="block text-sm font-semibold text-[#122431] mb-2">Bidang</label>
                            <select name="bidang" class="w-full px-4 py-3 border border-[#F5F6F5] rounded-xl focus:ring-2 focus:ring-[#F8BE09] focus:border-transparent">
                                <option value="">Semua Bidang</option>
                                @foreach($bidangList as $b)
                                <option value="{{ $b }}" {{ $bidang == $b ? 'selected' : '' }}>{{ $b }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter Tipe Pekerjaan -->
                        <div>
                            <label class="block text-sm font-semibold text-[#122431] mb-2">Tipe Pekerjaan</label>
                            <select name="tipe_pekerjaan" class="w-full px-4 py-3 border border-[#F5F6F5] rounded-xl focus:ring-2 focus:ring-[#F8BE09] focus:border-transparent">
                                <option value="">Semua Tipe</option>
                                <option value="full-time" {{ $tipe_pekerjaan == 'full-time' ? 'selected' : '' }}>Full Time</option>
                                <option value="part-time" {{ $tipe_pekerjaan == 'part-time' ? 'selected' : '' }}>Part Time</option>
                                <option value="kontrak" {{ $tipe_pekerjaan == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                                <option value="magang" {{ $tipe_pekerjaan == 'magang' ? 'selected' : '' }}>Magang</option>
                            </select>
                        </div>

                        <!-- Filter Lokasi -->
                        <div>
                            <label class="block text-sm font-semibold text-[#122431] mb-2">Lokasi</label>
                            <select name="lokasi" class="w-full px-4 py-3 border border-[#F5F6F5] rounded-xl focus:ring-2 focus:ring-[#F8BE09] focus:border-transparent">
                                <option value="">Semua Lokasi</option>
                                @foreach($lokasiList as $l)
                                <option value="{{ $l }}" {{ $lokasi == $l ? 'selected' : '' }}>{{ $l }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sort -->
                        <div>
                            <label class="block text-sm font-semibold text-[#122431] mb-2">Urutkan</label>
                            <select name="sort" class="w-full px-4 py-3 border border-[#F5F6F5] rounded-xl focus:ring-2 focus:ring-[#F8BE09] focus:border-transparent">
                                <option value="terbaru" {{ $sort == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                <option value="terlama" {{ $sort == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                <option value="gaji_tertinggi" {{ $sort == 'gaji_tertinggi' ? 'selected' : '' }}>Gaji Tertinggi</option>
                                <option value="gaji_terendah" {{ $sort == 'gaji_terendah' ? 'selected' : '' }}>Gaji Terendah</option>
                            </select>
                        </div>

                    </div>

                    <!-- Active Filters -->
                    @if($search || $bidang || $tipe_pekerjaan || $lokasi)
                    <div class="flex items-center gap-3 pt-2">
                        <span class="text-sm font-semibold text-[#122431]">Filter Aktif:</span>
                        <div class="flex flex-wrap gap-2">
                            @if($search)
                            <span class="inline-flex items-center gap-2 px-3 py-1 bg-[#F8BE09]/10 text-[#122431] rounded-full text-sm">
                                "{{ $search }}"
                                <a href="{{ route('frontend.lowongan', array_merge(request()->except('search'))) }}" class="hover:text-[#4B5057]">×</a>
                            </span>
                            @endif
                            @if($bidang)
                            <span class="inline-flex items-center gap-2 px-3 py-1 bg-[#F8BE09]/10 text-[#122431] rounded-full text-sm">
                                {{ $bidang }}
                                <a href="{{ route('frontend.lowongan', array_merge(request()->except('bidang'))) }}" class="hover:text-[#4B5057]">×</a>
                            </span>
                            @endif
                            @if($tipe_pekerjaan)
                            <span class="inline-flex items-center gap-2 px-3 py-1 bg-[#F8BE09]/10 text-[#122431] rounded-full text-sm">
                                {{ ucfirst($tipe_pekerjaan) }}
                                <a href="{{ route('frontend.lowongan', array_merge(request()->except('tipe_pekerjaan'))) }}" class="hover:text-[#4B5057]">×</a>
                            </span>
                            @endif
                            @if($lokasi)
                            <span class="inline-flex items-center gap-2 px-3 py-1 bg-[#F8BE09]/10 text-[#122431] rounded-full text-sm">
                                {{ $lokasi }}
                                <a href="{{ route('frontend.lowongan', array_merge(request()->except('lokasi'))) }}" class="hover:text-[#4B5057]">×</a>
                            </span>
                            @endif
                            <a href="{{ route('frontend.lowongan') }}" class="text-sm text-[#4B5057] hover:text-[#122431] font-medium">Hapus Semua</a>
                        </div>
                    </div>
                    @endif

                </form>
            </div>
        </div>
    </section>

    <!-- Lowongan List -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Result Info -->
            <div class="mb-6 flex items-center justify-between">
                <p class="text-[#4B5057]">
                    Menampilkan <span class="font-bold text-[#122431]">{{ $lowongan->firstItem() ?? 0 }} - {{ $lowongan->lastItem() ?? 0 }}</span> dari <span class="font-bold text-[#122431]">{{ $lowongan->total() }}</span> lowongan
                </p>
            </div>

            <!-- Grid Lowongan -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                @forelse($lowongan as $item)
                <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-[#F5F6F5]">
                    <div class="p-6">
                        <!-- Header Card -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                @if($item->perusahaan->logo)
                                <img src="{{ asset('storage/' . $item->perusahaan->logo) }}" alt="{{ $item->perusahaan->nama_perusahaan }}" class="w-14 h-14 rounded-xl object-cover ring-2 ring-[#F5F6F5]">
                                @else
                                <div class="w-14 h-14 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-xl flex items-center justify-center ring-2 ring-[#F5F6F5]">
                                    <span class="text-[#F8BE09] font-bold text-lg">{{ substr($item->perusahaan->nama_perusahaan, 0, 1) }}</span>
                                </div>
                                @endif
                                <div>
                                    <h3 class="font-bold text-[#122431] text-sm">{{ $item->perusahaan->nama_perusahaan }}</h3>
                                    <p class="text-xs text-[#B2B2AF]">{{ $item->bidang }}</p>
                                </div>
                            </div>
                            <span class="px-3 py-1.5 bg-gradient-to-r from-[#F8BE09] to-[#ffd54f] text-[#122431] text-xs font-semibold rounded-full shadow-sm">{{ ucfirst($item->tipe_pekerjaan) }}</span>
                        </div>

                        <h4 class="text-xl font-bold text-[#122431] mb-3 group-hover:text-[#4B5057] transition-colors line-clamp-2">{{ $item->judul_lowongan }}</h4>

                        <div class="space-y-2.5 mb-6">
                            <div class="flex items-center text-sm text-[#4B5057]">
                                <svg class="w-4 h-4 mr-2 text-[#B2B2AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                </svg>
                                <span class="font-medium">{{ $item->lokasi }}</span>
                            </div>
                            <div class="flex items-center text-sm text-[#4B5057]">
                                <svg class="w-4 h-4 mr-2 text-[#B2B2AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                @if($item->gaji_min && $item->gaji_max)
                                    <span class="font-semibold text-[#122431]">Rp {{ number_format($item->gaji_min, 0, ',', '.') }} - {{ number_format($item->gaji_max, 0, ',', '.') }}</span>
                                @else
                                    <span class="font-medium">Gaji Kompetitif</span>
                                @endif
                            </div>
                            <div class="flex items-center text-sm text-[#4B5057]">
                                <svg class="w-4 h-4 mr-2 text-[#B2B2AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>Ditutup: {{ $item->tanggal_tutup->format('d M Y') }}</span>
                            </div>
                        </div>

                        <a href="{{ route('frontend.lowongan.detail', $item->id) }}" class="block text-center bg-gradient-to-r from-[#122431] to-[#1a3345] text-[#F8BE09] py-3 rounded-xl hover:from-[#0f1b24] hover:to-[#122431] transition-all font-semibold shadow-md hover:shadow-xl group-hover:scale-105 duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full">
                    <div class="text-center py-20 bg-white rounded-3xl border-2 border-dashed border-[#F5F6F5]">
                        <svg class="w-20 h-20 text-[#B2B2AF] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-[#4B5057] text-lg font-medium mb-2">Tidak ada lowongan ditemukan</p>
                        <p class="text-[#B2B2AF] text-sm mb-4">Coba ubah filter atau kata kunci pencarian</p>
                        <a href="{{ route('frontend.lowongan') }}" class="inline-block px-6 py-3 bg-[#122431] text-[#F8BE09] rounded-xl hover:bg-[#0f1b24] transition font-semibold">
                            Reset Filter
                        </a>
                    </div>
                </div>
                @endforelse

            </div>

            <!-- Pagination -->
            @if($lowongan->hasPages())
            <div class="flex justify-center">
                {{ $lowongan->links() }}
            </div>
            @endif

        </div>
    </section>
@endsection
