{{-- /views/frontend/berita/show.blade.php --}}

@extends('frontend.layout')

@section('title', $berita->judul . ' - BKK SMKN 1 Purwosari')

@section('content')

<!-- Breadcrumb -->
<section class="py-6 bg-[#F5F6F5]">
    <div class="max-w-[1200px] mx-auto px-8 sm:px-16">
        <div class="flex items-center gap-2 text-sm">
            <a href="{{ route('frontend.home') }}" class="text-[#4B5057] hover:text-[#F8BE09] transition-colors">
                <i class="ri-home-line"></i> Beranda
            </a>
            <i class="ri-arrow-right-s-line text-[#B2B2AF]"></i>
            <a href="{{ route('frontend.berita') }}" class="text-[#4B5057] hover:text-[#F8BE09] transition-colors">
                Berita
            </a>
            <i class="ri-arrow-right-s-line text-[#B2B2AF]"></i>
            <span class="text-[#122431] font-bold">{{ Str::limit($berita->judul, 50) }}</span>
        </div>
    </div>
</section>

<!-- Article Content -->
<article class="py-16 bg-white">
    <div class="max-w-[1200px] mx-auto px-8 sm:px-16">

        <!-- Article Header -->
        <div class="mb-12">
            <!-- Category Badge -->
            <div class="mb-6">
                <span class="inline-block px-5 py-2 bg-[#F8BE09] text-[#122431] text-sm font-bold rounded-full">
                    {{ ucfirst($berita->kategori) }}
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-black text-[#122431] mb-6 leading-tight">
                {{ $berita->judul }}
            </h1>

            <!-- Meta Information -->
            <div class="flex flex-wrap items-center gap-6 text-[#4B5057]">
                <div class="flex items-center gap-2">
                    <i class="ri-user-line text-[#F8BE09] text-xl"></i>
                    <span class="font-medium">{{ $berita->user->name }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ri-calendar-line text-[#F8BE09] text-xl"></i>
                    <span>{{ $berita->created_at->format('d F Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ri-time-line text-[#F8BE09] text-xl"></i>
                    <span>{{ $berita->created_at->diffForHumans() }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ri-map-pin-line text-[#F8BE09] text-xl"></i>
                    <span>{{ $berita->lokasi }}</span>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        @if($berita->gambar)
            <div class="mb-12 rounded-3xl overflow-hidden">
                <img src="{{ asset('storage/' . $berita->gambar) }}"
                     alt="{{ $berita->judul }}"
                     class="w-full h-auto object-cover">
            </div>
        @endif

        <!-- Article Body -->
        <div class="prose prose-lg max-w-none">
            <div class="text-[#122431] leading-relaxed space-y-6">
                {!! nl2br(e($berita->konten)) !!}
            </div>
        </div>

        <!-- Share Section -->
        <div class="mt-12 pt-8 border-t-2 border-[#F5F6F5]">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="text-[#122431] font-bold">Bagikan Artikel:</div>
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                       target="_blank"
                       class="w-12 h-12 bg-[#122431] text-white rounded-xl flex items-center justify-center hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300">
                        <i class="ri-facebook-fill text-xl"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($berita->judul) }}"
                       target="_blank"
                       class="w-12 h-12 bg-[#122431] text-white rounded-xl flex items-center justify-center hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300">
                        <i class="ri-twitter-x-fill text-xl"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . request()->url()) }}"
                       target="_blank"
                       class="w-12 h-12 bg-[#122431] text-white rounded-xl flex items-center justify-center hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300">
                        <i class="ri-whatsapp-fill text-xl"></i>
                    </a>
                    <button onclick="copyToClipboard()"
                            class="w-12 h-12 bg-[#122431] text-white rounded-xl flex items-center justify-center hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300">
                        <i class="ri-links-line text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</article>

<!-- Related News -->
@if($relatedNews->count() > 0)
<section class="py-16 bg-[#F5F6F5]">
    <div class="max-w-[1400px] mx-auto px-8 sm:px-16">

        <div class="mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-[#122431] mb-2">Berita Terkait</h2>
            <p class="text-lg text-[#4B5057]">Baca juga berita lainnya yang mungkin menarik untukmu</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedNews as $news)
                <article class="group bg-white rounded-3xl overflow-hidden border-2 border-transparent hover:border-[#F8BE09] transition-all duration-300 hover:shadow-2xl">
                    <!-- Image -->
                    <div class="relative h-48 overflow-hidden bg-gradient-to-br from-[#122431] to-[#4B5057]">
                        @if($news->gambar)
                            <img src="{{ asset('storage/' . $news->gambar) }}"
                                 alt="{{ $news->judul }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="ri-newspaper-line text-[#F8BE09] text-5xl"></i>
                            </div>
                        @endif

                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-[#F8BE09] text-[#122431] text-xs font-bold rounded-full">
                                {{ ucfirst($news->kategori) }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-sm text-[#4B5057] mb-3">
                            <span>{{ $news->created_at->format('d M Y') }}</span>
                            <span>•</span>
                            <span>{{ $news->lokasi }}</span>
                        </div>

                        <h3 class="text-lg font-bold text-[#122431] mb-3 line-clamp-2 group-hover:text-[#F8BE09] transition-colors">
                            {{ $news->judul }}
                        </h3>

                        <a href="{{ route('frontend.berita.show', $news->slug) }}"
                           class="inline-flex items-center gap-2 text-[#122431] font-bold hover:text-[#F8BE09] transition-colors group/btn">
                            Baca Selengkapnya
                            <i class="ri-arrow-right-line text-lg group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="{{ route('frontend.berita') }}"
               class="inline-flex items-center gap-2 px-8 py-4 bg-[#122431] text-white rounded-2xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 shadow-xl">
                Lihat Semua Berita
                <i class="ri-arrow-right-line text-xl"></i>
            </a>
        </div>

    </div>
</section>
@endif

<script>
function copyToClipboard() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
        alert('Link berhasil disalin!');
    }).catch(err => {
        console.error('Gagal menyalin link: ', err);
    });
}
</script>

@endsection
