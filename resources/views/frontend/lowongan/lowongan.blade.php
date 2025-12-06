{{-- /views/frontend/lowongan/lowongan.blade.php --}}

@extends('frontend.layout')

@section('title', 'Lowongan Kerja - BKK SMKN 1 Purwosari')

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

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-5 py-2 bg-[#122431] text-[#F8BE09] rounded-full text-sm font-bold mb-6">
                Lowongan Kerja Terbaru
            </div>

            <!-- Heading -->
            <h1 class="text-4xl md:text-6xl font-black text-[#122431] mb-4 leading-tight">
                Jelajahi Semua
                <span class="relative inline-block">
                    <span class="relative z-10">Lowongan Kerja</span>
                    <span class="absolute bottom-2 left-0 w-full h-4 bg-[#F8BE09] -rotate-1"></span>
                </span>
            </h1>

            <p class="text-xl text-[#4B5057] max-w-2xl mb-8">
                <span class="font-bold text-[#122431]">{{ $totalLowongan }}</span> lowongan kerja menunggu untuk kamu dari berbagai perusahaan terpercaya
            </p>

        </div>
    </section>

    <!-- Filter & Search Section -->
    <section class="-mt-12 relative z-10">
        <div class="max-w-[1400px] mx-auto px-8 sm:px-16">
            <div class="bg-white rounded-3xl shadow-2xl p-8 border border-[#F5F6F5]">
                <form method="GET" action="{{ route('frontend.lowongan') }}" class="space-y-6">

                    <!-- Search Bar -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative">
                                <i class="ri-search-line absolute left-5 top-1/2 -translate-y-1/2 text-xl text-[#B2B2AF]"></i>
                                <input type="text" name="search" value="{{ $search }}"
                                    placeholder="Cari posisi, perusahaan, atau kata kunci..."
                                    class="w-full pl-14 pr-4 py-5 border-2 border-[#F5F6F5] rounded-2xl focus:ring-2 focus:ring-[#F8BE09] focus:border-[#F8BE09] text-[#122431] font-medium transition-all">
                            </div>
                        </div>
                        <button type="submit" class="group px-10 py-5 bg-[#122431] text-white rounded-2xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 shadow-xl inline-flex items-center justify-center gap-2">
                            Cari Lowongan
                            <i class="ri-search-2-line text-xl group-hover:scale-110 transition-transform"></i>
                        </button>
                    </div>

                    <!-- Filters -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <!-- Filter Bidang -->
                        <div>
                            <label class="block text-sm font-bold text-[#122431] mb-2">
                                <i class="ri-bookmark-line mr-1"></i>Bidang
                            </label>
                            <select name="bidang" class="w-full px-4 py-3 border-2 border-[#F5F6F5] rounded-xl focus:ring-2 focus:ring-[#F8BE09] focus:border-[#F8BE09] font-medium text-[#122431] transition-all">
                                <option value="">Semua Bidang</option>
                                @foreach($bidangList as $b)
                                <option value="{{ $b }}" {{ $bidang == $b ? 'selected' : '' }}>{{ $b }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter Tipe Pekerjaan -->
                        <div>
                            <label class="block text-sm font-bold text-[#122431] mb-2">
                                <i class="ri-time-line mr-1"></i>Tipe Pekerjaan
                            </label>
                            <select name="tipe_pekerjaan" class="w-full px-4 py-3 border-2 border-[#F5F6F5] rounded-xl focus:ring-2 focus:ring-[#F8BE09] focus:border-[#F8BE09] font-medium text-[#122431] transition-all">
                                <option value="">Semua Tipe</option>
                                <option value="full-time" {{ $tipe_pekerjaan == 'full-time' ? 'selected' : '' }}>Full Time</option>
                                <option value="part-time" {{ $tipe_pekerjaan == 'part-time' ? 'selected' : '' }}>Part Time</option>
                                <option value="kontrak" {{ $tipe_pekerjaan == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                                <option value="magang" {{ $tipe_pekerjaan == 'magang' ? 'selected' : '' }}>Magang</option>
                            </select>
                        </div>

                        <!-- Filter Lokasi -->
                        <div>
                            <label class="block text-sm font-bold text-[#122431] mb-2">
                                <i class="ri-map-pin-line mr-1"></i>Lokasi
                            </label>
                            <select name="lokasi" class="w-full px-4 py-3 border-2 border-[#F5F6F5] rounded-xl focus:ring-2 focus:ring-[#F8BE09] focus:border-[#F8BE09] font-medium text-[#122431] transition-all">
                                <option value="">Semua Lokasi</option>
                                @foreach($lokasiList as $l)
                                <option value="{{ $l }}" {{ $lokasi == $l ? 'selected' : '' }}>{{ $l }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sort -->
                        <div>
                            <label class="block text-sm font-bold text-[#122431] mb-2">
                                <i class="ri-sort-desc mr-1"></i>Urutkan
                            </label>
                            <select name="sort" class="w-full px-4 py-3 border-2 border-[#F5F6F5] rounded-xl focus:ring-2 focus:ring-[#F8BE09] focus:border-[#F8BE09] font-medium text-[#122431] transition-all">
                                <option value="terbaru" {{ $sort == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                <option value="terlama" {{ $sort == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                <option value="gaji_tertinggi" {{ $sort == 'gaji_tertinggi' ? 'selected' : '' }}>Gaji Tertinggi</option>
                                <option value="gaji_terendah" {{ $sort == 'gaji_terendah' ? 'selected' : '' }}>Gaji Terendah</option>
                            </select>
                        </div>

                    </div>

                    <!-- Active Filters -->
                    @if($search || $bidang || $tipe_pekerjaan || $lokasi)
                    <div class="flex flex-wrap items-center gap-3 pt-4 border-t-2 border-[#F5F6F5]">
                        <span class="text-sm font-bold text-[#122431] flex items-center gap-2">
                            <i class="ri-filter-3-line"></i>Filter Aktif:
                        </span>
                        <div class="flex flex-wrap gap-2">
                            @if($search)
                            <span class="inline-flex items-center gap-2 px-4 py-2 bg-[#F8BE09] text-[#122431] rounded-full text-sm font-bold">
                                <i class="ri-search-line"></i>"{{ $search }}"
                                <a href="{{ route('frontend.lowongan', array_merge(request()->except('search'))) }}" class="hover:text-white transition-colors">
                                    <i class="ri-close-line text-lg"></i>
                                </a>
                            </span>
                            @endif
                            @if($bidang)
                            <span class="inline-flex items-center gap-2 px-4 py-2 bg-[#F8BE09] text-[#122431] rounded-full text-sm font-bold">
                                <i class="ri-bookmark-line"></i>{{ $bidang }}
                                <a href="{{ route('frontend.lowongan', array_merge(request()->except('bidang'))) }}" class="hover:text-white transition-colors">
                                    <i class="ri-close-line text-lg"></i>
                                </a>
                            </span>
                            @endif
                            @if($tipe_pekerjaan)
                            <span class="inline-flex items-center gap-2 px-4 py-2 bg-[#F8BE09] text-[#122431] rounded-full text-sm font-bold">
                                <i class="ri-time-line"></i>{{ ucfirst($tipe_pekerjaan) }}
                                <a href="{{ route('frontend.lowongan', array_merge(request()->except('tipe_pekerjaan'))) }}" class="hover:text-white transition-colors">
                                    <i class="ri-close-line text-lg"></i>
                                </a>
                            </span>
                            @endif
                            @if($lokasi)
                            <span class="inline-flex items-center gap-2 px-4 py-2 bg-[#F8BE09] text-[#122431] rounded-full text-sm font-bold">
                                <i class="ri-map-pin-line"></i>{{ $lokasi }}
                                <a href="{{ route('frontend.lowongan', array_merge(request()->except('lokasi'))) }}" class="hover:text-white transition-colors">
                                    <i class="ri-close-line text-lg"></i>
                                </a>
                            </span>
                            @endif
                            <a href="{{ route('frontend.lowongan') }}" class="inline-flex items-center gap-1 px-4 py-2 bg-white text-[#122431] rounded-full text-sm font-bold border-2 border-[#122431] hover:bg-[#122431] hover:text-white transition-all">
                                <i class="ri-delete-bin-line"></i>Hapus Semua
                            </a>
                        </div>
                    </div>
                    @endif

                </form>
            </div>
        </div>
    </section>

    <!-- Lowongan List -->
    <section class="py-20 bg-[#F5F6F5]">
        <div class="max-w-[1400px] mx-auto px-8 sm:px-16">

            <!-- Result Info -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-black text-[#122431] mb-2">Hasil Pencarian</h2>
                    <p class="text-[#4B5057]">
                        Menampilkan <span class="font-bold text-[#122431]">{{ $lowongan->firstItem() ?? 0 }} - {{ $lowongan->lastItem() ?? 0 }}</span> dari <span class="font-bold text-[#122431]">{{ $lowongan->total() }}</span> lowongan kerja
                    </p>
                </div>

                @if($lowongan->total() > 0)
                <div class="flex items-center gap-2 text-sm text-[#4B5057]">
                    <i class="ri-information-line text-[#F8BE09] text-lg"></i>
                    <span>Diperbarui setiap hari</span>
                </div>
                @endif
            </div>

            <!-- Grid Lowongan - Lebih lebar dengan 4 kolom di layar besar -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">

                @forelse($lowongan as $item)
                <div class="group bg-white rounded-3xl overflow-hidden hover:shadow-2xl transition-all duration-300 border border-transparent hover:border-[#F8BE09]">
                    <div class="p-6">
                        <!-- Company Info -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                @if($item->perusahaan->logo)
                                    <img src="{{ asset('storage/' . $item->perusahaan->logo) }}"
                                        alt="{{ $item->perusahaan->nama_perusahaan }}"
                                        class="w-14 h-14 rounded-xl object-cover border-2 border-[#F5F6F5]">
                                @else
                                    <div class="w-14 h-14 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-xl flex items-center justify-center border-2 border-[#F5F6F5]">
                                        <span class="text-[#F8BE09] font-bold text-xl">{{ substr($item->perusahaan->nama_perusahaan, 0, 1) }}</span>
                                    </div>
                                @endif
                            </div>
                            <span class="px-3 py-1 bg-[#F8BE09] text-[#122431] text-xs font-bold rounded-full">
                                {{ ucfirst($item->tipe_pekerjaan) }}
                            </span>
                        </div>

                        <!-- Company Name -->
                        <h3 class="font-bold text-[#122431] mb-1">{{ $item->perusahaan->nama_perusahaan }}</h3>
                        <p class="text-sm text-[#B2B2AF] mb-4">{{ $item->bidang }}</p>

                        <!-- Job Title -->
                        <h4 class="text-xl font-bold text-[#122431] mb-4 line-clamp-2 group-hover:text-[#F8BE09] transition-colors">
                            {{ $item->judul_lowongan }}
                        </h4>

                        <!-- Details -->
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-2 text-sm text-[#4B5057]">
                                <i class="ri-map-pin-line text-[#F8BE09] text-[20px]"></i>
                                <span class="font-medium">{{ $item->lokasi }}</span>
                            </div>

                            <div class="flex items-center gap-2 text-sm">
                                <i class="ri-money-dollar-circle-line text-[#F8BE09] text-[20px]"></i>
                                @if($item->gaji_min && $item->gaji_max)
                                    <span class="font-bold text-[#122431]">Rp {{ number_format($item->gaji_min, 0, ',', '.') }} - {{ number_format($item->gaji_max, 0, ',', '.') }}</span>
                                @else
                                    <span class="font-semibold text-[#4B5057]">Gaji Kompetitif</span>
                                @endif
                            </div>

                            <div class="flex items-center gap-2 text-sm text-[#4B5057]">
                                <i class="ri-calendar-line text-[#F8BE09] text-[20px]"></i>
                                <span class="font-medium">Ditutup: {{ $item->tanggal_tutup->format('d M Y') }}</span>
                            </div>
                        </div>

                        <!-- Button -->
                        <a href="{{ route('frontend.lowongan.detail', $item->id) }}"
                            class="flex items-center justify-center gap-2 w-full py-4 bg-[#122431] text-white rounded-xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 group-hover:shadow-lg">
                            Lihat Detail
                            <i class="ri-arrow-right-line text-[18px]"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full">
                    <div class="text-center py-24 bg-white rounded-3xl border-2 border-dashed border-[#F5F6F5]">
                        <div class="w-24 h-24 bg-[#F8BE09]/20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="ri-briefcase-4-line text-[#F8BE09] text-[48px]"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-[#122431] mb-2">Tidak ada lowongan ditemukan</h3>
                        <p class="text-lg text-[#4B5057] mb-6">Coba ubah filter atau kata kunci pencarian</p>
                        <a href="{{ route('frontend.lowongan') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-[#122431] text-white rounded-2xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 shadow-xl">
                            <i class="ri-refresh-line text-xl"></i>
                            Reset Filter
                        </a>
                    </div>
                </div>
                @endforelse

            </div>

            <!-- Pagination -->
            @if($lowongan->hasPages())
            <div class="flex justify-center">
                <div class="inline-flex items-center gap-2 bg-white rounded-2xl p-2 shadow-lg border border-[#F5F6F5]">
                    {{ $lowongan->links() }}
                </div>
            </div>
            @endif

        </div>
    </section>
@endsection
