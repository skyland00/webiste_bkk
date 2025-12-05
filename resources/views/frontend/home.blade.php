{{-- /views/frontend/home.blade.php --}}

@extends('frontend.layout')

@section('title', 'BKK SMKN 1 Purwosari - Beranda')

@section('content')

<!-- Hero Section - Centered Content -->
<section class="relative py-32 bg-gradient-to-b from-white via-[#F5F6F5] to-white overflow-hidden">
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 2px 2px, #F8BE09 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <!-- Floating Blobs -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-[#F8BE09]/20 rounded-full blur-3xl animate-blob"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#122431]/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>

    <div class="relative max-w-6xl mx-auto px-6 sm:px-12 text-center">
        
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 px-5 py-2 bg-[#122431] text-[#F8BE09] rounded-full text-sm font-bold mb-8">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            Bursa Kerja Khusus SMKN 1 Purwosari
        </div>

        <!-- Main Heading -->
        <h1 class="text-5xl md:text-7xl font-black text-[#122431] mb-6 leading-tight">
            Temukan Karir
            <span class="relative inline-block mt-2">
                <span class="relative z-10">Impianmu</span>
                <span class="absolute bottom-2 left-0 w-full h-4 bg-[#F8BE09] -rotate-1"></span>
            </span>
        </h1>

        <p class="text-xl md:text-2xl text-[#4B5057] max-w-3xl mx-auto mb-12 leading-relaxed">
            Platform terpercaya yang menghubungkan lulusan SMK dengan ribuan peluang kerja dari perusahaan terbaik di Indonesia
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
            <a href="#lowongan-section" class="group px-10 py-5 bg-[#122431] text-white rounded-2xl font-bold text-lg hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 shadow-xl inline-flex items-center justify-center gap-2">
                Jelajahi Lowongan
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
            <a href="#tentang" class="px-10 py-5 bg-white text-[#122431] rounded-2xl font-bold text-lg border-2 border-[#122431] hover:bg-[#122431] hover:text-white transition-all duration-300 shadow-xl">
                Tentang Kami
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-[#F5F6F5]">
                <div class="text-5xl font-black text-[#F8BE09] mb-2">{{ $totalLowongan }}+</div>
                <div class="text-lg font-bold text-[#122431]">Lowongan Aktif</div>
                <div class="text-sm text-[#4B5057] mt-1">Siap dilamar hari ini</div>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-[#F5F6F5]">
                <div class="text-5xl font-black text-[#F8BE09] mb-2">{{ $totalPerusahaan }}+</div>
                <div class="text-lg font-bold text-[#122431]">Perusahaan</div>
                <div class="text-sm text-[#4B5057] mt-1">Mitra terpercaya kami</div>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-[#F5F6F5]">
                <div class="text-5xl font-black text-[#F8BE09] mb-2">{{ $totalPelamar }}+</div>
                <div class="text-lg font-bold text-[#122431]">Alumni</div>
                <div class="text-sm text-[#4B5057] mt-1">Telah ditempatkan</div>
            </div>
        </div>

    </div>
</section>

<!-- Why Choose Us -->
<section class="pt-8 pb-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-12">
        
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-[#F8BE09]/20 text-[#122431] rounded-full text-sm font-bold mb-4">KEUNGGULAN KAMI</span>
            <h2 class="text-4xl md:text-5xl font-black text-[#122431] mb-4">Kenapa Memilih BKK?</h2>
            <p class="text-xl text-[#4B5057] max-w-2xl mx-auto">Kami menyediakan semua yang kamu butuhkan untuk memulai karir profesional</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Feature 1 -->
            <div class="group relative bg-gradient-to-br from-[#122431] to-[#1a3345] rounded-3xl p-10 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#F8BE09]/20 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-[#F8BE09] rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                        <svg class="w-8 h-8 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Lowongan Terverifikasi</h3>
                    <p class="text-gray-300 leading-relaxed">Semua lowongan telah diverifikasi dan berasal dari perusahaan terpercaya</p>
                </div>
            </div>

           <!-- Feature 2 -->
            <div class="group relative bg-white rounded-3xl p-10 border-2 border-[#F5F6F5] hover:border-[#F8BE09] overflow-hidden transition-all duration-300 hover:shadow-2xl">
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-[#F8BE09]/10 rounded-full -ml-16 -mb-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#5B6A61] rounded-full -mr-12 -mt-12 opacity-20"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-[#F8BE09] rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                        <svg class="w-8 h-8 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#122431] mb-3">CV Builder</h3>
                    <p class="text-[#4B5057] leading-relaxed">Tools untuk membuat CV profesional yang menarik perhatian recruiter</p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="group relative bg-gradient-to-br from-[#F8BE09] to-[#ffa000] rounded-3xl p-10 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/20 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                        <svg class="w-8 h-8 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#122431] mb-3">Bimbingan Karir</h3>
                    <p class="text-[#122431]/80 leading-relaxed">Dapatkan konsultasi dan bimbingan karir dari para ahli yang berpengalaman</p>
                </div>
            </div>

            

        </div>

    </div>
</section>

<!-- Latest Jobs -->
<section id="lowongan-section" class="py-20 bg-[#F5F6F5]">
    <div class="max-w-7xl mx-auto px-6 sm:px-12">
        
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
            <div>
                <span class="inline-block px-4 py-2 bg-[#F8BE09]/20 text-[#122431] rounded-full text-sm font-bold mb-4">LOWONGAN TERBARU</span>
                <h2 class="text-4xl md:text-5xl font-black text-[#122431] mb-2">Peluang Minggu Ini</h2>
                <p class="text-lg text-[#4B5057]">Temukan pekerjaan yang sempurna untukmu</p>
            </div>
            <a href="#" class="mt-6 md:mt-0 inline-flex items-center gap-2 text-[#122431] font-bold hover:text-[#F8BE09] transition-colors group">
                Lihat Semua Lowongan
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            @forelse($lowonganTerbaru as $lowongan)
            <div class="group bg-white rounded-3xl overflow-hidden hover:shadow-2xl transition-all duration-300 border border-transparent hover:border-[#F8BE09]">
                
                <!-- Header Gradient -->
                <div class="h-2 bg-gradient-to-r from-[#122431] via-[#F8BE09] to-[#122431]"></div>

                <div class="p-6">
                    <!-- Company Info -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            @if($lowongan->perusahaan->logo)
                            <img src="{{ asset('storage/' . $lowongan->perusahaan->logo) }}"
                                 alt="{{ $lowongan->perusahaan->nama_perusahaan }}"
                                 class="w-14 h-14 rounded-xl object-cover border-2 border-[#F5F6F5]">
                            @else
                            <div class="w-14 h-14 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-xl flex items-center justify-center border-2 border-[#F5F6F5]">
                                <span class="text-[#F8BE09] font-bold text-xl">{{ substr($lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
                            </div>
                            @endif
                        </div>
                        <span class="px-3 py-1 bg-[#F8BE09] text-[#122431] text-xs font-bold rounded-full">
                            {{ ucfirst($lowongan->tipe_pekerjaan) }}
                        </span>
                    </div>

                    <!-- Company Name -->
                    <h3 class="font-bold text-[#122431] mb-1">{{ $lowongan->perusahaan->nama_perusahaan }}</h3>
                    <p class="text-sm text-[#B2B2AF] mb-4">{{ $lowongan->bidang }}</p>

                    <!-- Job Title -->
                    <h4 class="text-xl font-bold text-[#122431] mb-4 line-clamp-2 group-hover:text-[#F8BE09] transition-colors">
                        {{ $lowongan->judul_lowongan }}
                    </h4>

                    <!-- Details -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2 text-sm text-[#4B5057]">
                            <svg class="w-5 h-5 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="font-medium">{{ $lowongan->lokasi }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <svg class="w-5 h-5 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            @if($lowongan->gaji_min && $lowongan->gaji_max)
                                <span class="font-bold text-[#122431]">Rp {{ number_format($lowongan->gaji_min, 0, ',', '.') }} - {{ number_format($lowongan->gaji_max, 0, ',', '.') }}</span>
                            @else
                                <span class="font-semibold text-[#4B5057]">Gaji Kompetitif</span>
                            @endif
                        </div>
                    </div>

                    <!-- Button -->
                    <a href="#" class="flex items-center justify-center gap-2 w-full py-4 bg-[#122431] text-white rounded-xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 group-hover:shadow-lg">
                        Lihat Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full">
                <div class="text-center py-24 bg-white rounded-3xl border-2 border-dashed border-[#F5F6F5]">
                    <div class="w-24 h-24 bg-[#F8BE09]/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-[#F8BE09]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-[#122431] mb-2">Belum Ada Lowongan</h3>
                    <p class="text-lg text-[#4B5057]">Lowongan baru akan segera hadir!</p>
                </div>
            </div>
            @endforelse

        </div>

    </div>
</section>

<!-- About CTA -->
<section id="tentang" class="py-24 bg-[#122431] relative overflow-hidden">
    
    <!-- Decorative Circles -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#F8BE09] rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#F8BE09] rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-6 sm:px-12">
        
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            
            <!-- Content -->
            <div class="text-white">
                <span class="inline-block px-4 py-2 bg-[#F8BE09] text-[#122431] rounded-full text-sm font-bold mb-6">TENTANG BKK</span>
                
                <h2 class="text-4xl md:text-5xl font-black mb-6 leading-tight">
                    Wujudkan Karir Impianmu Bersama Kami
                </h2>

                <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                    BKK SMKN 1 Purwosari hadir sebagai jembatan antara lulusan SMK dengan dunia industri. Kami berkomitmen membantu setiap siswa menemukan karir yang tepat.
                </p>

                <div class="space-y-4 mb-10">
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-[#F8BE09] rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Kemitraan Resmi</h4>
                            <p class="text-gray-300">Bekerja sama dengan perusahaan nasional dan multinasional</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-[#F8BE09] rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Pendampingan Lengkap</h4>
                            <p class="text-gray-300">Dari persiapan dokumen hingga interview</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-[#F8BE09] rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Gratis 100%</h4>
                            <p class="text-gray-300">Tidak ada biaya apapun untuk menggunakan layanan kami</p>
                        </div>
                    </div>
                </div>

                <a href="#" class="inline-flex items-center gap-2 px-8 py-4 bg-[#F8BE09] text-[#122431] rounded-2xl font-bold text-lg hover:bg-white transition-all duration-300 shadow-2xl">
                    Mulai Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>

            <!-- Image -->
            <div class="relative">
                <div class="relative rounded-3xl overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80" 
                         alt="Tim BKK" 
                         class="w-full h-auto rounded-3xl shadow-2xl">
                </div>
                
                <!-- Floating Stats -->
                <div class="absolute -bottom-6 -left-6 bg-[#F8BE09] rounded-2xl p-6 shadow-2xl">
                    <div class="text-4xl font-black text-[#122431] mb-1">98%</div>
                    <div class="text-sm text-[#122431] font-bold">Tingkat Kepuasan</div>
                </div>
                
                <div class="absolute -top-6 -right-6 bg-white rounded-2xl p-6 shadow-2xl">
                    <div class="text-4xl font-black text-[#F8BE09] mb-1">5.0</div>
                    <div class="text-sm text-[#122431] font-bold">Rating Pengguna</div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Testimonials -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-12">
        
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-[#F8BE09]/20 text-[#122431] rounded-full text-sm font-bold mb-4">TESTIMONI</span>
            <h2 class="text-4xl md:text-5xl font-black text-[#122431] mb-4">Kata Mereka</h2>
            <p class="text-xl text-[#4B5057] max-w-2xl mx-auto">Dengarkan cerita sukses dari alumni yang telah menemukan karir impian mereka</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            
            <!-- Testimonial 1 -->
            <div class="bg-[#F5F6F5] rounded-3xl p-8 hover:shadow-xl transition-all duration-300">
                <div class="flex gap-1 mb-4">
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <p class="text-[#4B5057] mb-6 leading-relaxed italic">"Berkat BKK, saya langsung dapat pekerjaan setelah lulus! Prosesnya cepat dan tim sangat membantu."</p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#122431] to-[#F8BE09] rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">AS</span>
                    </div>
                    <div>
                        <div class="font-bold text-[#122431]">Ahmad Saputra</div>
                        <div class="text-sm text-[#4B5057]">Staff IT - PT Teknologi Maju</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-[#F5F6F5] rounded-3xl p-8 hover:shadow-xl transition-all duration-300">
                <div class="flex gap-1 mb-4">
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <p class="text-[#4B5057] mb-6 leading-relaxed italic">"Platform yang sangat memudahkan pencarian kerja. Banyak pilihan lowongan dari perusahaan bonafide!"</p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#F8BE09] to-[#122431] rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">SP</span>
                    </div>
                    <div>
                        <div class="font-bold text-[#122431]">Siti Pertiwi</div>
                        <div class="text-sm text-[#4B5057]">Admin - PT Jaya Abadi</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-[#F5F6F5] rounded-3xl p-8 hover:shadow-xl transition-all duration-300">
                <div class="flex gap-1 mb-4">
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-[#F8BE09]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <p class="text-[#4B5057] mb-6 leading-relaxed italic">"Bimbingan karir dari BKK sangat membantu saya lolos interview. Terima kasih BKK!"</p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#122431] to-[#F8BE09] rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">BP</span>
                    </div>
                    <div>
                        <div class="font-bold text-[#122431]">Budi Prasetyo</div>
                        <div class="text-sm text-[#4B5057]">Designer - Creative Studio</div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Custom Animations -->
<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    25% { transform: translate(20px, -20px) scale(1.1); }
    50% { transform: translate(-20px, 20px) scale(0.9); }
    75% { transform: translate(20px, 20px) scale(1.05); }
}

.animate-blob {
    animation: blob 20s ease-in-out infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}
</style>

@endsection