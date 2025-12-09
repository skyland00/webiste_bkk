{{-- /views/frontend/berita/index.blade.php --}}

@extends('frontend.layout')

@section('title', 'Berita & Informasi - BKK SMKN 1 Purwosari')

@section('content')

<!-- Hero Section -->
<section class="relative pt-32 pb-20 bg-gradient-to-b from-white via-[#F5F6F5] to-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0"
            style="background-image: radial-gradient(circle at 2px 2px, #F8BE09 1px, transparent 0); background-size: 40px 40px;">
        </div>
    </div>

    <!-- Floating Blobs -->
    <div class="absolute top-10 left-10 w-72 h-72 bg-[#F8BE09]/20 rounded-full blur-3xl animate-blob"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-[#122431]/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>

    <div class="relative max-w-[1400px] mx-auto px-8 sm:px-16">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-[#F8BE09]/20 text-[#122431] rounded-full text-sm font-bold mb-4">
                BERITA & INFORMASI
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-[#122431] mb-4 leading-tight">
                Update Terbaru
                <span class="relative inline-block">
                    <span class="relative z-10">BKK</span>
                    <span class="absolute bottom-1 left-0 w-full h-3 bg-[#F8BE09] -rotate-1"></span>
                </span>
            </h1>
            <p class="text-xl text-[#4B5057] max-w-3xl mx-auto">
                Tetap update dengan berita terkini seputar lowongan kerja, tips karir, dan informasi penting lainnya
            </p>
        </div>

        <!-- Search & Filter -->
        <div class="max-w-4xl mx-auto">
            <form method="GET" action="{{ route('frontend.berita') }}" class="flex flex-col md:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1 relative">
                    <i class="ri-search-line absolute left-5 top-1/2 -translate-y-1/2 text-[#4B5057] text-xl"></i>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari berita..."
                           class="w-full pl-14 pr-6 py-4 bg-white border-2 border-[#F5F6F5] rounded-2xl text-[#122431] placeholder-[#B2B2AF] focus:border-[#F8BE09] focus:outline-none transition-colors">
                </div>

                <!-- Category Filter -->
                <select name="kategori"
                        class="px-6 py-4 bg-white border-2 border-[#F5F6F5] rounded-2xl text-[#122431] focus:border-[#F8BE09] focus:outline-none transition-colors appearance-none cursor-pointer min-w-[200px]">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>
                            {{ ucfirst($kat) }}
                        </option>
                    @endforeach
                </select>

                <!-- Submit Button -->
                <button type="submit"
                        class="px-8 py-4 bg-[#122431] text-white rounded-2xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 whitespace-nowrap">
                    <i class="ri-filter-3-line mr-2"></i>Filter
                </button>

                @if(request('search') || request('kategori'))
                    <a href="{{ route('frontend.berita') }}"
                       class="px-6 py-4 bg-white border-2 border-[#122431] text-[#122431] rounded-2xl font-bold hover:bg-[#122431] hover:text-white transition-all duration-300 flex items-center justify-center">
                        <i class="ri-close-line text-xl"></i>
                    </a>
                @endif
            </form>
        </div>
    </div>
</section>

<!-- News Grid -->
<section class="bg-white">
    <div class="max-w-[1400px] mx-auto px-8 sm:px-16">

        @if($beritas->count() > 0)
            <!-- Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($beritas as $berita)
                    <article class="group bg-white rounded-3xl overflow-hidden border-2 border-[#F5F6F5] hover:border-[#F8BE09] transition-all duration-300 hover:shadow-2xl">
                        <!-- Image -->
                        <div class="relative h-56 overflow-hidden bg-gradient-to-br from-[#122431] to-[#4B5057]">
                            @if($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                     alt="{{ $berita->judul }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="ri-newspaper-line text-[#F8BE09] text-6xl"></i>
                                </div>
                            @endif

                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-2 bg-[#F8BE09] text-[#122431] text-xs font-bold rounded-full">
                                    {{ ucfirst($berita->kategori) }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Meta -->
                            <div class="flex items-center gap-4 text-sm text-[#4B5057] mb-4">
                                <div class="flex items-center gap-2">
                                    <i class="ri-calendar-line text-[#F8BE09]"></i>
                                    <span>{{ $berita->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-map-pin-line text-[#F8BE09]"></i>
                                    <span>{{ $berita->lokasi }}</span>
                                </div>
                            </div>

                            <!-- Title -->
                            <h3 class="text-xl font-bold text-[#122431] mb-3 line-clamp-2 group-hover:text-[#F8BE09] transition-colors">
                                {{ $berita->judul }}
                            </h3>

                            <!-- Excerpt -->
                            <p class="text-[#4B5057] line-clamp-3 mb-6 leading-relaxed">
                                {{ Str::limit(strip_tags($berita->konten), 120) }}
                            </p>

                            <!-- Button -->
                            <a href="{{ route('frontend.berita.show', $berita->slug) }}"
                               class="inline-flex items-center gap-2 text-[#122431] font-bold hover:text-[#F8BE09] transition-colors group/btn">
                                Baca Selengkapnya
                                <i class="ri-arrow-right-line text-xl group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $beritas->links('pagination::tailwind') }}
            </div>

        @else
            <!-- Empty State -->
            <div class="text-center py-24">
                <div class="w-32 h-32 bg-[#F8BE09]/20 rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="ri-newspaper-line text-[#F8BE09] text-6xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-[#122431] mb-4">Belum Ada Berita</h3>
                <p class="text-xl text-[#4B5057] mb-8">
                    @if(request('search') || request('kategori'))
                        Tidak ada berita yang sesuai dengan pencarian Anda
                    @else
                        Berita akan segera hadir!
                    @endif
                </p>
                @if(request('search') || request('kategori'))
                    <a href="{{ route('frontend.berita') }}"
                       class="inline-flex items-center gap-2 px-8 py-4 bg-[#122431] text-white rounded-2xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300">
                        <i class="ri-refresh-line"></i>
                        Lihat Semua Berita
                    </a>
                @endif
            </div>
        @endif

    </div>
</section>

@endsection
