{{-- /views/frontend/lowongan/detail_lowongan.blade.php --}}

@extends('frontend.layout')

@section('title', $lowongan->judul_lowongan . ' - BKK SMKN 1 Purwosari')

@section('content')

    <!-- Main Content -->
    <section class="py-30 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Header Card -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <div class="flex items-start gap-6 mb-6">
                            @if ($lowongan->perusahaan->logo)
                                <img src="{{ asset('storage/' . $lowongan->perusahaan->logo) }}"
                                    alt="{{ $lowongan->perusahaan->nama_perusahaan }}"
                                    class="w-20 h-20 rounded-2xl object-cover ring-4 ring-[#F5F6F5]">
                            @else
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-2xl flex items-center justify-center ring-4 ring-[#F5F6F5]">
                                    <span
                                        class="text-[#F8BE09] font-bold text-2xl">{{ substr($lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
                                </div>
                            @endif

                            <div class="flex-1">
                                <h1 class="text-3xl font-bold text-[#122431] mb-2">{{ $lowongan->judul_lowongan }}</h1>
                                <p class="text-lg text-[#4B5057] mb-3">{{ $lowongan->perusahaan->nama_perusahaan }}</p>
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-4 py-2 bg-gradient-to-r from-[#F8BE09] to-[#ffd54f] text-[#122431] text-sm font-semibold rounded-full">{{ ucfirst($lowongan->tipe_pekerjaan) }}</span>
                                    <span
                                        class="px-4 py-2 bg-[#F8BE09]/10 text-[#122431] text-sm font-semibold rounded-full">{{ $lowongan->bidang }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Info Grid -->
                        <div class="grid md:grid-cols-2 gap-4 pt-6 border-t border-[#F5F6F5]">
                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <i class="ri-map-pin-line text-xl text-[#122431]"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Lokasi</p>
                                    <p class="font-semibold text-[#122431]">{{ $lowongan->lokasi }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <i class="ri-money-dollar-circle-line text-xl text-[#122431]"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Gaji</p>
                                    @if ($lowongan->gaji_min && $lowongan->gaji_max)
                                        <p class="font-semibold text-[#122431]">Rp
                                            {{ number_format($lowongan->gaji_min, 0, ',', '.') }} -
                                            {{ number_format($lowongan->gaji_max, 0, ',', '.') }}</p>
                                    @else
                                        <p class="font-semibold text-[#122431]">Gaji Kompetitif</p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <i class="ri-team-line text-xl text-[#122431]"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Posisi Tersedia</p>
                                    <p class="font-semibold text-[#122431]">{{ $lowongan->jumlah_orang }} orang</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <i class="ri-calendar-line text-xl text-[#122431]"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Batas Lamaran</p>
                                    <p class="font-semibold text-[#122431]">{{ $lowongan->tanggal_tutup->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi Pekerjaan -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <h2 class="text-2xl font-bold text-[#122431] mb-4 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-[#122431] to-[#4B5057] rounded-full"></span>
                            Deskripsi Pekerjaan
                        </h2>
                        <div class="prose max-w-none text-[#4B5057] leading-relaxed">
                            {!! nl2br(e($lowongan->deskripsi_pekerjaan)) !!}
                        </div>
                    </div>

                    <!-- Kualifikasi -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <h2 class="text-2xl font-bold text-[#122431] mb-4 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-[#F8BE09] to-[#ffd54f] rounded-full"></span>
                            Kualifikasi
                        </h2>
                        <div class="prose max-w-none text-[#4B5057] leading-relaxed">
                            {!! nl2br(e($lowongan->kualifikasi)) !!}
                        </div>
                    </div>

                    <!-- Info Perusahaan -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <h2 class="text-2xl font-bold text-[#122431] mb-6 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-[#4B5057] to-[#122431] rounded-full"></span>
                            Tentang Perusahaan
                        </h2>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <i class="ri-building-line text-xl text-[#B2B2AF] mt-1"></i>
                                <div>
                                    <p class="text-sm text-[#B2B2AF]">Nama Perusahaan</p>
                                    <p class="font-semibold text-[#122431]">{{ $lowongan->perusahaan->nama_perusahaan }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="ri-briefcase-line text-xl text-[#B2B2AF] mt-1"></i>
                                <div>
                                    <p class="text-sm text-[#B2B2AF]">Bidang Usaha</p>
                                    <p class="font-semibold text-[#122431]">{{ $lowongan->perusahaan->bidang_usaha }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="ri-map-pin-line text-xl text-[#B2B2AF] mt-1"></i>
                                <div>
                                    <p class="text-sm text-[#B2B2AF]">Alamat</p>
                                    <p class="font-semibold text-[#122431]">{{ $lowongan->perusahaan->alamat }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="ri-phone-line text-xl text-[#B2B2AF] mt-1"></i>
                                <div>
                                    <p class="text-sm text-[#B2B2AF]">Kontak</p>
                                    <p class="font-semibold text-[#122431]">{{ $lowongan->perusahaan->kontak }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">

                        <!-- CTA Card -->
                        <div class="bg-gradient-to-br from-[#122431] to-[#1a3345] rounded-3xl shadow-xl p-8 text-white">
                            <div class="text-center mb-6">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-[#F8BE09]/20 rounded-2xl mb-4 backdrop-blur-sm">
                                    <i class="ri-file-text-line text-3xl text-[#F8BE09]"></i>
                                </div>
                                <h3 class="text-2xl font-bold mb-2">Tertarik?</h3>

                                @auth
                                    @if (auth()->user()->role === 'pelamar')
                                        <p class="text-[#F5F6F5] text-sm">Kirim lamaran Anda sekarang</p>
                                    @else
                                        <p class="text-[#F5F6F5] text-sm">Login sebagai pelamar untuk melamar</p>
                                    @endif
                                @else
                                    <p class="text-[#F5F6F5] text-sm">Login untuk melamar posisi ini</p>
                                @endauth
                            </div>

                            @auth
                                @if (auth()->user()->role === 'pelamar')
                                    <a href="{{ route('lamaran.create', $lowongan->id) }}"
                                        class="block w-full bg-[#F8BE09] text-[#122431] text-center py-4 rounded-2xl font-bold hover:bg-[#ffd54f] transition shadow-lg hover:shadow-xl hover:scale-105 duration-300">
                                        Lamar Sekarang
                                    </a>
                                @else
                                    <button disabled
                                        class="block w-full bg-gray-500 text-white text-center py-4 rounded-2xl font-bold cursor-not-allowed opacity-50">
                                        Hanya untuk Pelamar
                                    </button>
                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                    class="block w-full bg-[#F8BE09] text-[#122431] text-center py-4 rounded-2xl font-bold hover:bg-[#ffd54f] transition shadow-lg hover:shadow-xl hover:scale-105 duration-300">
                                    Login untuk Melamar
                                </a>
                            @endauth

                            @guest
                                <p class="text-center text-xs text-[#F5F6F5] mt-4">
                                    Belum punya akun? <a href="{{ route('register') }}"
                                        class="text-[#F8BE09] font-semibold hover:underline">Daftar disini</a>
                                </p>
                            @endguest
                        </div>

                        <!-- Share Card -->
                        <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5]">
                            <h3 class="font-bold text-[#122431] mb-4">Bagikan Lowongan</h3>
                            <div class="flex gap-3">
                                <a href="#"
                                    class="flex-1 p-3 bg-[#F8BE09]/10 hover:bg-[#F8BE09]/20 text-[#122431] rounded-xl transition flex items-center justify-center">
                                    <i class="ri-facebook-fill text-xl"></i>
                                </a>
                                <a href="#"
                                    class="flex-1 p-3 bg-[#F8BE09]/10 hover:bg-[#F8BE09]/20 text-[#122431] rounded-xl transition flex items-center justify-center">
                                    <i class="ri-twitter-x-fill text-xl"></i>
                                </a>
                                <a href="#"
                                    class="flex-1 p-3 bg-[#F8BE09]/10 hover:bg-[#F8BE09]/20 text-[#122431] rounded-xl transition flex items-center justify-center">
                                    <i class="ri-whatsapp-fill text-xl"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Lowongan Terkait -->
            @if ($lowonganTerkait->count() > 0)
                <div class="mt-16">
                    <h2 class="text-3xl font-bold text-[#122431] mb-8">Lowongan Terkait</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach ($lowonganTerkait as $item)
                            <div
                                class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-[#F5F6F5]">
                                <div class="p-6">
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex items-center gap-3">
                                            @if ($item->perusahaan->logo)
                                                <img src="{{ asset('storage/' . $item->perusahaan->logo) }}"
                                                    alt="{{ $item->perusahaan->nama_perusahaan }}"
                                                    class="w-12 h-12 rounded-xl object-cover ring-2 ring-[#F5F6F5]">
                                            @else
                                                <div
                                                    class="w-12 h-12 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-xl flex items-center justify-center ring-2 ring-[#F5F6F5]">
                                                    <span
                                                        class="text-[#F8BE09] font-bold">{{ substr($item->perusahaan->nama_perusahaan, 0, 1) }}</span>
                                                </div>
                                            @endif
                                            <div>
                                                <h3 class="font-bold text-[#122431] text-sm">
                                                    {{ $item->perusahaan->nama_perusahaan }}</h3>
                                                <p class="text-xs text-[#B2B2AF]">{{ $item->bidang }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <h4
                                        class="text-lg font-bold text-[#122431] mb-3 group-hover:text-[#4B5057] transition-colors line-clamp-2">
                                        {{ $item->judul_lowongan }}</h4>
                                    <div class="text-sm text-[#4B5057] mb-4">
                                        <p>{{ $item->lokasi }}</p>
                                    </div>
                                    <a href="{{ route('frontend.lowongan.detail', $item->id) }}"
                                        class="block text-center bg-gradient-to-r from-[#122431] to-[#1a3345] text-[#F8BE09] py-2.5 rounded-xl hover:from-[#0f1b24] hover:to-[#122431] transition-all font-semibold text-sm">
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
@endsection