{{-- /views/frontend/home.blade.php --}}

@extends('frontend.layout')

@section('title', 'BKK SMKN 1 Purwosari - Beranda')

@section('content')

<!-- Hero Section - Glass Morphism Style -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-[#0f1b24] via-[#122431] to-[#1a3345]">

    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-[#F8BE09]/30 rounded-full filter blur-[128px] animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-[#4B5057]/20 rounded-full filter blur-[128px] animate-pulse animation-delay-2000"></div>
    </div>

    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 bg-[linear-gradient(rgba(248,190,9,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(248,190,9,0.03)_1px,transparent_1px)] bg-[size:64px_64px]"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center space-y-8">

            <!-- Badge -->
            <div class="inline-flex items-center gap-3 px-6 py-3 bg-white/10 backdrop-blur-xl rounded-full border border-white/20 shadow-2xl">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#F8BE09] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-[#F8BE09]"></span>
                </span>
                <span class="text-white font-semibold text-sm tracking-wider">BKK SMKN 1 PURWOSARI</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-6xl md:text-7xl lg:text-8xl font-extrabold text-white leading-tight">
                Gerbang Menuju
                <span class="block mt-2 bg-gradient-to-r from-[#F8BE09] via-[#ffd54f] to-[#F8BE09] bg-clip-text text-transparent animate-gradient">
                    Karir Sukses
                </span>
            </h1>

            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Platform inovatif yang menghubungkan talenta terbaik dengan peluang karir impian di perusahaan terkemuka
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-5 pt-6">
                <a href="#lowongan-section" class="group px-10 py-5 bg-[#F8BE09] text-[#122431] rounded-2xl font-bold text-lg shadow-2xl hover:shadow-[#F8BE09]/50 transition-all duration-300 hover:scale-105 flex items-center gap-3">
                    Jelajahi Lowongan
                    <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="#tentang" class="px-10 py-5 bg-white/10 backdrop-blur-xl text-white rounded-2xl font-bold text-lg border-2 border-white/30 hover:bg-white/20 transition-all duration-300 shadow-xl">
                    Pelajari Lebih Lanjut
                </a>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-16 max-w-5xl mx-auto">
                <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 shadow-2xl hover:bg-white/15 transition-all duration-300">
                    <div class="text-5xl font-black text-[#F8BE09] mb-2">{{ $totalLowongan }}+</div>
                    <div class="text-white font-semibold text-lg">Lowongan Aktif</div>
                    <div class="text-gray-400 text-sm mt-1">Siap untuk dilamar</div>
                </div>
                <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 shadow-2xl hover:bg-white/15 transition-all duration-300">
                    <div class="text-5xl font-black text-[#F8BE09] mb-2">{{ $totalPerusahaan }}+</div>
                    <div class="text-white font-semibold text-lg">Perusahaan</div>
                    <div class="text-gray-400 text-sm mt-1">Partner terpercaya</div>
                </div>
                <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 shadow-2xl hover:bg-white/15 transition-all duration-300">
                    <div class="text-5xl font-black text-[#F8BE09] mb-2">{{ $totalPelamar }}+</div>
                    <div class="text-white font-semibold text-lg">Kisah Sukses</div>
                    <div class="text-gray-400 text-sm mt-1">Alumni terserap</div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-white/30 rounded-full flex items-start justify-center p-2">
            <div class="w-1 h-2 bg-[#F8BE09] rounded-full animate-pulse"></div>
        </div>
    </div>
</section>

<!-- Features Bento Grid -->
<section class="py-24 bg-[#F5F6F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-[#122431] mb-4">Kenapa Memilih Kami?</h2>
            <p class="text-xl text-[#4B5057]">Semua yang Anda butuhkan untuk memulai perjalanan karir</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Feature 1 -->
            <div class="group relative bg-gradient-to-br from-[#122431] to-[#1a3345] rounded-3xl p-8 overflow-hidden hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-br from-[#F8BE09]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-[#F8BE09] rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-12 transition-transform">
                        <svg class="w-7 h-7 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Lowongan Terverifikasi</h3>
                    <p class="text-gray-300 text-sm">100% peluang kerja legitimate</p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="group relative bg-gradient-to-br from-[#F8BE09] to-[#ffd54f] rounded-3xl p-8 overflow-hidden hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-br from-[#122431]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-[#122431] rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-12 transition-transform">
                        <svg class="w-7 h-7 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#122431] mb-2">Proses Cepat</h3>
                    <p class="text-[#122431]/70 text-sm">Sistem aplikasi yang mudah</p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="group relative bg-white rounded-3xl p-8 border-2 border-[#F5F6F5] overflow-hidden hover:scale-105 transition-transform duration-300 hover:border-[#F8BE09]">
                <div class="absolute inset-0 bg-gradient-to-br from-[#F8BE09]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-[#122431] rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-12 transition-transform">
                        <svg class="w-7 h-7 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#122431] mb-2">Bimbingan Karir</h3>
                    <p class="text-[#4B5057] text-sm">Konsultasi ahli tersedia</p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="group relative bg-gradient-to-br from-[#4B5057] to-[#122431] rounded-3xl p-8 overflow-hidden hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-br from-[#F8BE09]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-[#F8BE09] rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-12 transition-transform">
                        <svg class="w-7 h-7 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Komunitas</h3>
                    <p class="text-gray-300 text-sm">Bergabung dengan ribuan alumni</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Latest Jobs Section -->
<section id="lowongan-section" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
            <div>
                <span class="inline-block px-4 py-2 bg-[#F8BE09]/20 text-[#122431] rounded-full text-sm font-bold mb-4">PELUANG TERBARU</span>
                <h2 class="text-4xl md:text-5xl font-black text-[#122431]">Lowongan Pilihan</h2>
                <p class="text-lg text-[#4B5057] mt-2">Temukan langkah karir selanjutnya</p>
            </div>
            <a href="#" class="mt-6 md:mt-0 inline-flex items-center gap-2 text-[#122431] font-bold hover:text-[#F8BE09] transition-colors">
                Lihat semua lowongan
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

        <!-- Jobs Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($lowonganTerbaru as $lowongan)
            <div class="group relative bg-white rounded-3xl border border-[#F5F6F5] hover:border-[#F8BE09]/50 transition-all duration-300 overflow-hidden hover:shadow-2xl">

                <!-- Gradient Top -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#122431] via-[#F8BE09] to-[#122431]"></div>

                <div class="p-6">

                    <!-- Company -->
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center gap-3">
                            @if($lowongan->perusahaan->logo)
                            <img src="{{ asset('storage/' . $lowongan->perusahaan->logo) }}"
                                 alt="{{ $lowongan->perusahaan->nama_perusahaan }}"
                                 class="w-12 h-12 rounded-xl object-cover">
                            @else
                            <div class="w-12 h-12 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-xl flex items-center justify-center">
                                <span class="text-[#F8BE09] font-bold">{{ substr($lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
                            </div>
                            @endif
                            <div>
                                <h3 class="font-bold text-[#122431] text-sm line-clamp-1">{{ $lowongan->perusahaan->nama_perusahaan }}</h3>
                                <p class="text-xs text-[#B2B2AF]">{{ $lowongan->bidang }}</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-[#F8BE09]/20 text-[#122431] text-xs font-bold rounded-lg">
                            {{ ucfirst($lowongan->tipe_pekerjaan) }}
                        </span>
                    </div>

                    <!-- Job Title -->
                    <h4 class="text-xl font-bold text-[#122431] mb-4 line-clamp-2 group-hover:text-[#F8BE09] transition-colors">
                        {{ $lowongan->judul_lowongan }}
                    </h4>

                    <!-- Details -->
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center gap-2 text-sm text-[#4B5057]">
                            <svg class="w-4 h-4 text-[#B2B2AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            <span>{{ $lowongan->lokasi }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <svg class="w-4 h-4 text-[#B2B2AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            @if($lowongan->gaji_min && $lowongan->gaji_max)
                                <span class="font-bold text-[#122431]">Rp {{ number_format($lowongan->gaji_min, 0, ',', '.') }} - {{ number_format($lowongan->gaji_max, 0, ',', '.') }}</span>
                            @else
                                <span class="font-semibold text-[#4B5057]">Competitive Salary</span>
                            @endif
                        </div>
                    </div>

                    <!-- Action -->
                    <a href="#" class="flex items-center justify-center gap-2 w-full py-3 bg-[#122431] text-[#F8BE09] rounded-xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 group-hover:shadow-lg">
                        Lihat Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                </div>
            </div>
            @empty
            <div class="col-span-full">
                <div class="text-center py-20 bg-gradient-to-br from-[#F5F6F5] to-white rounded-3xl border-2 border-dashed border-[#B2B2AF]/30">
                    <div class="w-20 h-20 bg-[#F8BE09]/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#122431] mb-2">Belum Ada Lowongan</h3>
                    <p class="text-[#4B5057]">Periksa kembali untuk peluang baru</p>
                </div>
            </div>
            @endforelse

        </div>

    </div>
</section>

<!-- About Section -->
<section id="tentang" class="py-24 bg-gradient-to-br from-[#F5F6F5] to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-gradient-to-br from-[#122431] to-[#1a3345] rounded-[3rem] overflow-hidden">
            <div class="grid lg:grid-cols-2 gap-0">

                <!-- Image Side -->
                <div class="relative h-[400px] lg:h-auto">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80"
                         alt="Team"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#122431] to-transparent"></div>
                </div>

                <!-- Content Side -->
                <div class="p-12 lg:p-16 flex flex-col justify-center">
                    <span class="inline-block w-fit px-5 py-2 bg-[#F8BE09] text-[#122431] rounded-full text-sm font-bold mb-6">TENTANG BKK</span>

                    <h2 class="text-4xl md:text-5xl font-black text-white mb-6 leading-tight">
                        Memberdayakan Siswa,<br/>
                        Membangun Masa Depan
                    </h2>

                    <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                        BKK SMKN 1 Purwosari adalah platform yang menghubungkan lulusan dengan peluang karir terbaik dari perusahaan terpercaya di seluruh Indonesia.
                    </p>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-[#F8BE09] rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-white font-semibold">Kemitraan perusahaan terverifikasi</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-[#F8BE09] rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-white font-semibold">Proses aplikasi yang mudah</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-[#F8BE09] rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-white font-semibold">Bimbingan karir profesional</span>
                        </div>
                    </div>

                    <a href="#" class="inline-flex items-center justify-center gap-2 w-fit px-8 py-4 bg-[#F8BE09] text-[#122431] rounded-xl font-bold hover:bg-white transition-all duration-300 shadow-xl">
                        Mulai Sekarang
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Custom Animations -->
<style>
@keyframes gradient {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.animate-gradient {
    background-size: 200% 200%;
    animation: gradient 3s ease infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}
</style>

@endsection
