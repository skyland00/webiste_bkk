<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lowongan->judul_lowongan }} - BKK SMKN 1 Purwosari</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-slate-50">
    
    <!-- Header -->
    @include('publicc.partials.header')

    <!-- Breadcrumb -->
    <section class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="{{ route('publicc.home') }}" class="hover:text-blue-600 transition">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('publicc.lowongan') }}" class="hover:text-blue-600 transition">Lowongan</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium">Detail</span>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Header Card -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                        <div class="flex items-start gap-6 mb-6">
                            @if($lowongan->perusahaan->logo)
                            <img src="{{ asset('storage/' . $lowongan->perusahaan->logo) }}" alt="{{ $lowongan->perusahaan->nama_perusahaan }}" class="w-20 h-20 rounded-2xl object-cover ring-4 ring-gray-100">
                            @else
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center ring-4 ring-gray-100">
                                <span class="text-white font-bold text-2xl">{{ substr($lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
                            </div>
                            @endif
                            
                            <div class="flex-1">
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $lowongan->judul_lowongan }}</h1>
                                <p class="text-lg text-gray-600 mb-3">{{ $lowongan->perusahaan->nama_perusahaan }}</p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-sm font-semibold rounded-full">{{ ucfirst($lowongan->tipe_pekerjaan) }}</span>
                                    <span class="px-4 py-2 bg-blue-100 text-blue-700 text-sm font-semibold rounded-full">{{ $lowongan->bidang }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Info Grid -->
                        <div class="grid md:grid-cols-2 gap-4 pt-6 border-t border-gray-200">
                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-blue-100 rounded-xl">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Lokasi</p>
                                    <p class="font-semibold text-gray-900">{{ $lowongan->lokasi }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-green-100 rounded-xl">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Gaji</p>
                                    @if($lowongan->gaji_min && $lowongan->gaji_max)
                                        <p class="font-semibold text-gray-900">Rp {{ number_format($lowongan->gaji_min, 0, ',', '.') }} - {{ number_format($lowongan->gaji_max, 0, ',', '.') }}</p>
                                    @else
                                        <p class="font-semibold text-gray-900">Gaji Kompetitif</p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-purple-100 rounded-xl">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Posisi Tersedia</p>
                                    <p class="font-semibold text-gray-900">{{ $lowongan->jumlah_orang }} orang</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-orange-100 rounded-xl">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Batas Lamaran</p>
                                    <p class="font-semibold text-gray-900">{{ $lowongan->tanggal_tutup->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi Pekerjaan -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-blue-600 to-indigo-600 rounded-full"></span>
                            Deskripsi Pekerjaan
                        </h2>
                        <div class="prose max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($lowongan->deskripsi_pekerjaan)) !!}
                        </div>
                    </div>

                    <!-- Kualifikasi -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-green-600 to-emerald-600 rounded-full"></span>
                            Kualifikasi
                        </h2>
                        <div class="prose max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($lowongan->kualifikasi)) !!}
                        </div>
                    </div>

                    <!-- Info Perusahaan -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-purple-600 to-pink-600 rounded-full"></span>
                            Tentang Perusahaan
                        </h2>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500">Nama Perusahaan</p>
                                    <p class="font-semibold text-gray-900">{{ $lowongan->perusahaan->nama_perusahaan }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500">Bidang Usaha</p>
                                    <p class="font-semibold text-gray-900">{{ $lowongan->perusahaan->bidang_usaha }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500">Alamat</p>
                                    <p class="font-semibold text-gray-900">{{ $lowongan->perusahaan->alamat }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500">Kontak</p>
                                    <p class="font-semibold text-gray-900">{{ $lowongan->perusahaan->kontak }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">
                        
                        <!-- CTA Card -->
                        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl shadow-xl p-8 text-white">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-2xl mb-4 backdrop-blur-sm">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold mb-2">Tertarik?</h3>
                                <p class="text-blue-100 text-sm">Login untuk melamar posisi ini</p>
                            </div>
                            
                            <a href="{{ route('login') }}" class="block w-full bg-white text-blue-600 text-center py-4 rounded-2xl font-bold hover:bg-blue-50 transition shadow-lg hover:shadow-xl hover:scale-105 duration-300">
                                Lamar Sekarang
                            </a>
                            
                            <p class="text-center text-xs text-blue-100 mt-4">
                                Belum punya akun? <a href="{{ route('register') }}" class="text-white font-semibold hover:underline">Daftar disini</a>
                            </p>
                        </div>

                        <!-- Share Card -->
                        <div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">
                            <h3 class="font-bold text-gray-900 mb-4">Bagikan Lowongan</h3>
                            <div class="flex gap-3">
                                <a href="#" class="flex-1 p-3 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-xl transition flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="#" class="flex-1 p-3 bg-sky-100 hover:bg-sky-200 text-sky-600 rounded-xl transition flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="#" class="flex-1 p-3 bg-green-100 hover:bg-green-200 text-green-600 rounded-xl transition flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Lowongan Terkait -->
            @if($lowonganTerkait->count() > 0)
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Lowongan Terkait</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($lowonganTerkait as $item)
                    <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    @if($item->perusahaan->logo)
                                    <img src="{{ asset('storage/' . $item->perusahaan->logo) }}" alt="{{ $item->perusahaan->nama_perusahaan }}" class="w-12 h-12 rounded-xl object-cover ring-2 ring-gray-100">
                                    @else
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center ring-2 ring-gray-100">
                                        <span class="text-white font-bold">{{ substr($item->perusahaan->nama_perusahaan, 0, 1) }}</span>
                                    </div>
                                    @endif
                                    <div>
                                        <h3 class="font-bold text-gray-900 text-sm">{{ $item->perusahaan->nama_perusahaan }}</h3>
                                        <p class="text-xs text-gray-500">{{ $item->bidang }}</p>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $item->judul_lowongan }}</h4>
                            <div class="text-sm text-gray-600 mb-4">
                                <p>{{ $item->lokasi }}</p>
                            </div>
                            <a href="{{ route('publicc.lowongan.detail', $item->id) }}" class="block text-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all font-semibold text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </section>

    <!-- Footer -->
    @include('publicc.partials.footer')

</body>
</html>