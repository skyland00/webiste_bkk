{{-- /views/frontend/home.blade.php --}}

@extends('frontend.layout')

@section('title', 'BKK SMKN 1 Purwosari - Beranda')

@section('content')

    <!-- Hero Section - Centered Content -->
    <section class="relative py-32 bg-gradient-to-b from-white via-[#F5F6F5] to-white overflow-hidden">

        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 left-0 w-full h-full"
                style="background-image: radial-gradient(circle at 2px 2px, #F8BE09 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <!-- Floating Blobs -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#F8BE09]/20 rounded-full blur-3xl animate-blob"></div>
        <div
            class="absolute bottom-20 right-10 w-96 h-96 bg-[#122431]/10 rounded-full blur-3xl animate-blob animation-delay-2000">
        </div>

        <div class="relative max-w-[1400px] mx-auto px-8 sm:px-16 text-center">

            <!-- Badge -->
            <div
                class="inline-flex items-center gap-2 px-5 py-2 bg-[#122431] text-[#F8BE09] rounded-full text-sm font-bold mb-8">
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
                Platform terpercaya yang menghubungkan lulusan SMK dengan ribuan peluang kerja dari perusahaan terbaik di
                Indonesia
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                <a href="#lowongan-section"
                    class="group px-10 py-5 bg-[#122431] text-white rounded-2xl font-bold text-lg hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 shadow-xl inline-flex items-center justify-center gap-2">
                    Jelajahi Lowongan
                    <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="#tentang"
                    class="px-10 py-5 bg-white text-[#122431] rounded-2xl font-bold text-lg border-2 border-[#122431] hover:bg-[#122431] hover:text-white transition-all duration-300 shadow-xl">
                    Tentang Kami
                </a>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-[#F5F6F5]">
                    <div class="text-5xl font-black text-[#F8BE09] mb-2">{{ $totalLowongan }}+</div>
                    <div class="text-lg font-bold text-[#122431]">Lowongan Aktif</div>
                    <div class="text-sm text-[#4B5057] mt-1">Siap dilamar hari ini</div>
                </div>
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-[#F5F6F5]">
                    <div class="text-5xl font-black text-[#F8BE09] mb-2">{{ $totalPerusahaan }}+</div>
                    <div class="text-lg font-bold text-[#122431]">Perusahaan</div>
                    <div class="text-sm text-[#4B5057] mt-1">Mitra terpercaya kami</div>
                </div>
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-[#F5F6F5]">
                    <div class="text-5xl font-black text-[#F8BE09] mb-2">{{ $totalPelamar }}+</div>
                    <div class="text-lg font-bold text-[#122431]">Alumni</div>
                    <div class="text-sm text-[#4B5057] mt-1">Telah ditempatkan</div>
                </div>
            </div>

        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="pt-8 pb-20 bg-white">
        <div class="max-w-[1400px] mx-auto px-8 sm:px-16">

            <div class="text-center mb-16">
                <span
                    class="inline-block px-4 py-2 bg-[#F8BE09]/20 text-[#122431] rounded-full text-sm font-bold mb-4">KEUNGGULAN
                    KAMI</span>
                <h2 class="text-4xl md:text-5xl font-black text-[#122431] mb-4">Kenapa Memilih BKK?</h2>
                <p class="text-xl text-[#4B5057] max-w-2xl mx-auto">Kami menyediakan semua yang kamu butuhkan untuk memulai
                    karir profesional</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Feature 1 -->
                <div class="group relative bg-gradient-to-br from-[#122431] to-[#1a3345] rounded-3xl p-10 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-[#F8BE09]/20 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-[#F8BE09] rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                            <i class="ri-shield-check-line text-4xl text-[#122431]"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">Lowongan Terverifikasi</h3>
                        <p class="text-gray-300 leading-relaxed">Semua lowongan telah diverifikasi dan berasal dari
                            perusahaan terpercaya</p>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div
                    class="group relative bg-white rounded-3xl p-10 border-2 border-[#F5F6F5] hover:border-[#F8BE09] overflow-hidden transition-all duration-300 hover:shadow-2xl">
                    <div
                        class="absolute bottom-0 left-0 w-32 h-32 bg-[#F8BE09]/10 rounded-full -ml-16 -mb-16 group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[#5B6A61] rounded-full -mr-12 -mt-12 opacity-20"></div>
                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-[#F8BE09] rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                            <i class="ri-file-text-line text-4xl text-[#122431]"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-[#122431] mb-3">CV Builder</h3>
                        <p class="text-[#4B5057] leading-relaxed">Tools untuk membuat CV profesional yang menarik perhatian
                            recruiter</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative bg-gradient-to-br from-[#F8BE09] to-[#ffa000] rounded-3xl p-10 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-white/20 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                            <i class="ri-book-open-line text-4xl text-[#122431]"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-[#122431] mb-3">Bimbingan Karir</h3>
                        <p class="text-[#122431]/80 leading-relaxed">Dapatkan konsultasi dan bimbingan karir dari para ahli
                            yang berpengalaman</p>
                    </div>
                </div>



            </div>

        </div>
    </section>

<!-- Latest Jobs -->
<section id="lowongan-section" class="py-20 bg-[#F5F6F5]">
    <div class="max-w-[1400px] mx-auto px-8 sm:px-16">

        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
            <div>
                <span
                    class="inline-block px-4 py-2 bg-[#F8BE09]/20 text-[#122431] rounded-full text-sm font-bold mb-4">LOWONGAN
                    TERBARU</span>
                <h2 class="text-4xl md:text-5xl font-black text-[#122431] mb-2">Daftar Lowongan Terbaru</h2>
                <p class="text-lg text-[#4B5057]">Temukan pekerjaan yang sempurna untukmu</p>
            </div>
            <a href="#"
                class="mt-6 md:mt-0 inline-flex items-center gap-2 text-[#122431] font-bold hover:text-[#F8BE09] transition-colors group">
                Lihat Semua Lowongan
                <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- Horizontal Scroll Container -->
        <div class="relative">
            <div class="flex gap-6 overflow-x-auto pb-6 scrollbar-hide scroll-smooth snap-x snap-mandatory"
                style="scrollbar-width: none; -ms-overflow-style: none;">
                @forelse($lowonganTerbaru->take(5) as $lowongan)
                    <div
                        class="flex-none w-[340px] snap-start group bg-white rounded-3xl overflow-hidden transition-all duration-300 border border-transparent hover:border-[#F8BE09]">
                        <div class="p-6 h-full flex flex-col">
                            <!-- Company Info -->
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-3">
                                    @if ($lowongan->perusahaan->logo)
                                        <img src="{{ asset('storage/' . $lowongan->perusahaan->logo) }}"
                                            alt="{{ $lowongan->perusahaan->nama_perusahaan }}"
                                            class="w-14 h-14 rounded-xl object-cover border-2 border-[#F5F6F5]">
                                    @else
                                        <div
                                            class="w-14 h-14 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-xl flex items-center justify-center border-2 border-[#F5F6F5]">
                                            <span
                                                class="text-[#F8BE09] font-bold text-xl">{{ substr($lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
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
                            <h4
                                class="text-xl font-bold text-[#122431] mb-4 line-clamp-2 group-hover:text-[#F8BE09] transition-colors">
                                {{ $lowongan->judul_lowongan }}
                            </h4>

                            <!-- Details -->
                            <div class="space-y-3 mb-6 flex-grow">
                                <div class="flex items-center gap-2 text-sm text-[#4B5057]">
                                    <i class="ri-map-pin-line text-[#F8BE09] text-[20px]"></i>
                                    <span class="font-medium">{{ $lowongan->lokasi }}</span>
                                </div>

                                <div class="flex items-center gap-2 text-sm">
                                    <i class="ri-money-dollar-circle-line text-[#F8BE09] text-[20px]"></i>
                                    @if ($lowongan->gaji_min && $lowongan->gaji_max)
                                        <span class="font-bold text-[#122431]">Rp
                                            {{ number_format($lowongan->gaji_min, 0, ',', '.') }} -
                                            {{ number_format($lowongan->gaji_max, 0, ',', '.') }}</span>
                                    @else
                                        <span class="font-semibold text-[#4B5057]">Gaji Kompetitif</span>
                                    @endif
                                </div>

                            </div>

                            <!-- Button -->
                            <a href="#"
                                class="flex items-center justify-center gap-2 w-full py-4 bg-[#122431] text-white rounded-xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 group-hover:shadow-lg">
                                Lihat Detail
                                <i class="ri-arrow-right-line text-[18px]"></i>
                            </a>

                        </div>
                    </div>
                @empty
                    <div class="w-full">
                        <div class="text-center py-24 bg-white rounded-3xl border-2 border-dashed border-[#F5F6F5]">
                            <div
                                class="w-24 h-24 bg-[#F8BE09]/20 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="ri-briefcase-4-line text-[#F8BE09] text-[48px]"></i>
                            </div>

                            <h3 class="text-3xl font-bold text-[#122431] mb-2">Belum Ada Lowongan</h3>
                            <p class="text-lg text-[#4B5057]">Lowongan baru akan segera hadir!</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

    <!-- About CTA -->
    <section id="tentang" class="relative py-24 bg-gradient-to-b from-white to-[#F5F6F5] overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 2px 2px, #F8BE09 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <!-- Decorative Blobs -->
        <div class="absolute top-20 right-10 w-96 h-96 bg-[#F8BE09]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-[#122431]/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-[1400px] mx-auto px-8 sm:px-16">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Content -->
                <div>
                    <span
                        class="inline-block px-4 py-2 bg-[#F8BE09]/20 text-[#122431] rounded-full text-sm font-bold mb-6">TENTANG
                        BKK</span>

                    <h2 class="text-4xl md:text-5xl font-black text-[#122431] mb-6 leading-tight">
                        Wujudkan Karir Impianmu Bersama Kami
                    </h2>

                    <p class="text-xl text-[#4B5057] mb-8 leading-relaxed">
                        BKK SMKN 1 Purwosari hadir sebagai jembatan antara lulusan SMK dengan dunia industri. Kami
                        berkomitmen membantu setiap siswa menemukan karir yang tepat.
                    </p>

                    <div class="space-y-4 mb-10">
                        <div class="flex items-start gap-4 group">
                            <div
                                class="w-12 h-12 bg-[#F8BE09] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <i class="ri-shield-check-line text-[#122431] text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-[#122431] mb-1">Kemitraan Resmi</h4>
                                <p class="text-[#4B5057]">Bekerja sama dengan perusahaan nasional dan multinasional</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 group">
                            <div
                                class="w-12 h-12 bg-[#122431] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <i class="ri-user-heart-line text-[#F8BE09] text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-[#122431] mb-1">Pendampingan Lengkap</h4>
                                <p class="text-[#4B5057]">Dari persiapan dokumen hingga interview</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 group">
                            <div
                                class="w-12 h-12 bg-[#F8BE09] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <i class="ri-price-tag-3-line text-[#122431] text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-[#122431] mb-1">Gratis 100%</h4>
                                <p class="text-[#4B5057]">Tidak ada biaya apapun untuk menggunakan layanan kami</p>
                            </div>
                        </div>
                    </div>

                    <a href="#"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-[#122431] text-white rounded-2xl font-bold text-lg hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 shadow-xl group">
                        Mulai Sekarang
                        <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <!-- Visual Stats Grid -->
                <div class="grid grid-cols-2 gap-6">
                    <div
                        class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all border border-[#F5F6F5] group">
                        <div
                            class="w-16 h-16 bg-[#F8BE09]/20 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <i class="ri-team-line text-[#F8BE09] text-3xl"></i>
                        </div>
                        <div class="text-4xl font-black text-[#122431] mb-2">98%</div>
                        <div class="text-sm font-bold text-[#4B5057]">Tingkat Kepuasan Alumni</div>
                    </div>

                    <div
                        class="bg-gradient-to-br from-[#122431] to-[#1a3345] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all group">
                        <div
                            class="w-16 h-16 bg-[#F8BE09] rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <i class="ri-star-line text-[#122431] text-3xl"></i>
                        </div>
                        <div class="text-4xl font-black text-[#F8BE09] mb-2">5.0</div>
                        <div class="text-sm font-bold text-white">Rating Pengguna</div>
                    </div>

                    <div
                        class="bg-gradient-to-br from-[#F8BE09] to-[#ffa000] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all group">
                        <div
                            class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <i class="ri-building-line text-[#122431] text-3xl"></i>
                        </div>
                        <div class="text-4xl font-black text-[#122431] mb-2">{{ $totalPerusahaan }}+</div>
                        <div class="text-sm font-bold text-[#122431]">Perusahaan Partner</div>
                    </div>

                    <div
                        class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all border border-[#F5F6F5] group">
                        <div
                            class="w-16 h-16 bg-[#122431]/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <i class="ri-briefcase-line text-[#122431] text-3xl"></i>
                        </div>
                        <div class="text-4xl font-black text-[#122431] mb-2">{{ $totalPelamar }}+</div>
                        <div class="text-sm font-bold text-[#4B5057]">Alumni Ditempatkan</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20 bg-[#F5F6F5]">
        <div class="max-w-[1400px] mx-auto px-8 sm:px-16">

            <div class="text-center mb-16">
                <span
                    class="inline-block px-4 py-2 bg-[#F8BE09]/20 text-[#122431] rounded-full text-sm font-bold mb-4">TESTIMONI</span>
                <h2 class="text-4xl md:text-5xl font-black text-[#122431] mb-4">Kata Mereka</h2>
                <p class="text-xl text-[#4B5057] max-w-2xl mx-auto">Dengarkan cerita sukses dari alumni yang telah
                    menemukan karir impian mereka</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div
                    class="bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-[#F5F6F5] hover:border-[#F8BE09] group">
                    <div class="flex gap-1 mb-4">
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                    </div>

                    <p class="text-[#4B5057] mb-6 leading-relaxed italic">"Berkat BKK, saya langsung dapat pekerjaan
                        setelah lulus! Prosesnya cepat dan tim sangat membantu."</p>

                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-[#122431] to-[#F8BE09] rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="text-white font-bold">AS</span>
                        </div>
                        <div>
                            <div class="font-bold text-[#122431]">Ahmad Saputra</div>
                            <div class="text-sm text-[#4B5057]">Staff IT - PT Teknologi Maju</div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div
                    class="bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-[#F5F6F5] hover:border-[#F8BE09] group">
                    <div class="flex gap-1 mb-4">
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                    </div>

                    <p class="text-[#4B5057] mb-6 leading-relaxed italic">"Platform yang sangat memudahkan pencarian kerja.
                        Banyak pilihan lowongan dari perusahaan bonafide!"</p>

                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-[#F8BE09] to-[#122431] rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="text-white font-bold">SP</span>
                        </div>
                        <div>
                            <div class="font-bold text-[#122431]">Siti Pertiwi</div>
                            <div class="text-sm text-[#4B5057]">Admin - PT Jaya Abadi</div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div
                    class="bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-[#F5F6F5] hover:border-[#F8BE09] group">
                    <div class="flex gap-1 mb-4">
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                        <i class="ri-star-fill text-[#F8BE09] text-lg"></i>
                    </div>
                    <p class="text-[#4B5057] mb-6 leading-relaxed italic">"Bimbingan karir dari BKK sangat membantu saya
                        lolos interview. Terima kasih BKK!"</p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-[#122431] to-[#F8BE09] rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
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
@endsection
