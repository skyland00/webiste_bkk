<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKK SMKN 1 Purwosari - Beranda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-slate-50">
    
    <!-- Header -->
    @include('publicc.partials.header')

    <!-- Hero Section - Modern Minimalist -->
    <section class="relative overflow-hidden pt-20 pb-32">
        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 opacity-90"></div>
        
        <!-- Animated Circles -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-40 left-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                
                <!-- Text Content -->
                <div class="text-white space-y-8">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full border border-white/20">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                        </span>
                        <span class="text-sm font-medium">Platform BKK Online</span>
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight">
                        Wujudkan
                        <span class="block bg-gradient-to-r from-yellow-300 to-pink-300 bg-clip-text text-transparent">
                            Karir Impian
                        </span>
                        Bersama Kami
                    </h1>
                    
                    <p class="text-xl text-blue-100 leading-relaxed max-w-xl">
                        Jembatan antara talenta muda dan peluang karir terbaik. Mulai perjalanan profesionalmu dari sini.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#lowongan-section" class="group relative inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 rounded-2xl font-semibold overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                            <span class="relative z-10 flex items-center gap-2">
                                Jelajahi Lowongan
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </span>
                        </a>
                        <a href="#tentang" class="group inline-flex items-center justify-center px-8 py-4 bg-white/10 backdrop-blur-sm text-white rounded-2xl font-semibold border-2 border-white/20 hover:bg-white/20 transition-all duration-300">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    
                    <!-- Mini Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold">{{ $totalLowongan }}+</div>
                            <div class="text-sm text-blue-200 mt-1">Lowongan</div>
                        </div>
                        <div class="text-center border-x border-white/20">
                            <div class="text-3xl font-bold">{{ $totalPerusahaan }}+</div>
                            <div class="text-sm text-blue-200 mt-1">Perusahaan</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">{{ $totalPelamar }}+</div>
                            <div class="text-sm text-blue-200 mt-1">Alumni</div>
                        </div>
                    </div>
                </div>

                <!-- Image Side -->
                <div class="relative lg:block hidden">
                    <div class="relative z-10">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&q=80" alt="Students" class="rounded-3xl shadow-2xl">
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-gradient-to-br from-yellow-400 to-pink-500 rounded-3xl -z-10 blur-2xl opacity-30"></div>
                    <div class="absolute -top-10 -left-10 w-64 h-64 bg-gradient-to-br from-blue-400 to-purple-500 rounded-3xl -z-10 blur-2xl opacity-30"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- Stats Section - Card Style -->
    <section class="-mt-20 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-start gap-4">
                        <div class="p-4 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-4xl font-bold text-gray-900 mb-1">{{ $totalLowongan }}+</h3>
                            <p class="text-gray-600 font-medium">Lowongan Aktif</p>
                            <p class="text-sm text-gray-500 mt-1">Tersedia setiap hari</p>
                        </div>
                    </div>
                </div>

                <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-start gap-4">
                        <div class="p-4 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-4xl font-bold text-gray-900 mb-1">{{ $totalPerusahaan }}+</h3>
                            <p class="text-gray-600 font-medium">Perusahaan Partner</p>
                            <p class="text-sm text-gray-500 mt-1">Tersertifikasi & terpercaya</p>
                        </div>
                    </div>
                </div>

                <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-start gap-4">
                        <div class="p-4 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-4xl font-bold text-gray-900 mb-1">{{ $totalPelamar }}+</h3>
                            <p class="text-gray-600 font-medium">Alumni Sukses</p>
                            <p class="text-sm text-gray-500 mt-1">Telah bekerja di berbagai industri</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Lowongan Terbaru Section -->
    <section id="lowongan-section" class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold mb-4">Peluang Karir</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Lowongan Terbaru</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan posisi yang sesuai dengan passion dan keahlianmu</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @forelse($lowonganTerbaru as $lowongan)
                <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <!-- Header Card -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                @if($lowongan->perusahaan->logo)
                                <img src="{{ asset('storage/' . $lowongan->perusahaan->logo) }}" alt="{{ $lowongan->perusahaan->nama_perusahaan }}" class="w-14 h-14 rounded-xl object-cover ring-2 ring-gray-100">
                                @else
                                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center ring-2 ring-gray-100">
                                    <span class="text-white font-bold text-lg">{{ substr($lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
                                </div>
                                @endif
                                <div>
                                    <h3 class="font-bold text-gray-900 text-sm">{{ $lowongan->perusahaan->nama_perusahaan }}</h3>
                                    <p class="text-xs text-gray-500">{{ $lowongan->bidang }}</p>
                                </div>
                            </div>
                            <span class="px-3 py-1.5 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs font-semibold rounded-full shadow-sm">{{ ucfirst($lowongan->tipe_pekerjaan) }}</span>
                        </div>
                        
                        <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $lowongan->judul_lowongan }}</h4>
                        
                        <div class="space-y-2.5 mb-6">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                </svg>
                                <span class="font-medium">{{ $lowongan->lokasi }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                @if($lowongan->gaji_min && $lowongan->gaji_max)
                                    <span class="font-semibold text-gray-900">Rp {{ number_format($lowongan->gaji_min, 0, ',', '.') }} - {{ number_format($lowongan->gaji_max, 0, ',', '.') }}</span>
                                @else
                                    <span class="font-medium">Gaji Kompetitif</span>
                                @endif
                            </div>
                        </div>
                        
                        <a href="#" class="block text-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all font-semibold shadow-md hover:shadow-xl group-hover:scale-105 duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full">
                    <div class="text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-200">
                        <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg font-medium">Belum ada lowongan tersedia saat ini</p>
                        <p class="text-gray-400 text-sm mt-2">Periksa kembali nanti untuk peluang terbaru</p>
                    </div>
                </div>
                @endforelse

            </div>

            <div class="text-center mt-12">
                <a href="#lowongan-section" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl hover:from-blue-700 hover:to-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl hover:scale-105">
                    Lihat Semua Lowongan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

        </div>
    </section>

    <!-- Tentang BKK Section -->
    <section id="tentang" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                
                <div class="relative">
                    <div class="relative z-10">
                        <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=800&q=80" alt="Tentang BKK" class="rounded-3xl shadow-2xl">
                    </div>
                    <!-- Decorative -->
                    <div class="absolute -bottom-8 -right-8 w-64 h-64 bg-gradient-to-br from-blue-500 to-purple-600 rounded-3xl -z-10 blur-2xl opacity-20"></div>
                </div>

                <div class="space-y-6">
                    <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold">Tentang Kami</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">BKK SMKN 1 Purwosari</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Kami adalah jembatan yang menghubungkan talenta muda dengan peluang karir terbaik. Dengan jaringan perusahaan yang luas dan sistem yang terorganisir, kami berkomitmen membantu setiap lulusan menemukan pekerjaan impian mereka.
                    </p>
                    <div class="space-y-4 pt-4">
                        <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-2xl border border-blue-100">
                            <div class="p-2 bg-blue-600 rounded-xl">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Informasi Lowongan Terpercaya</h4>
                                <p class="text-gray-600 text-sm">Akses ke ratusan lowongan dari perusahaan terverifikasi</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 p-4 bg-green-50 rounded-2xl border border-green-100">
                            <div class="p-2 bg-green-600 rounded-xl">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Proses Rekrutmen Mudah</h4>
                                <p class="text-gray-600 text-sm">Sistem aplikasi online yang cepat dan efisien</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 p-4 bg-purple-50 rounded-2xl border border-purple-100">
                            <div class="p-2 bg-purple-600 rounded-xl">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Bimbingan Karir Profesional</h4>
                                <p class="text-gray-600 text-sm">Konsultasi dan pelatihan untuk persiapan kerja</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('publicc.partials.footer')

    <style>
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
    </style>

</body>
</html>