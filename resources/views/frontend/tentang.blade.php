{{-- /views/frontend/tentang.blade.php --}}

@extends('frontend.layout')

@section('title', 'Tentang BKK - BKK SMKN 1 Purwosari')

@section('content')

<!-- Hero Section -->
<section class="relative pt-32 pb-20 bg-gradient-to-b from-white via-[#F5F6F5] to-white overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-full h-full"
            style="background-image: radial-gradient(circle at 2px 2px, #F8BE09 1px, transparent 0); background-size: 40px 40px;">
        </div>
    </div>

    <div class="absolute top-20 left-10 w-72 h-72 bg-[#F8BE09]/20 rounded-full blur-3xl animate-blob"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#122431]/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>

    <div class="relative max-w-4xl mx-auto px-8 text-center">
        <span class="inline-block px-4 py-2 bg-[#F8BE09]/20 text-[#122431] rounded-full text-sm font-bold mb-4">
            BERITA & INFORMASI
        </span>

        <h1 class="text-5xl md:text-6xl font-black text-[#122431] mb-6 leading-tight">
            Bursa Kerja Khusus
            <span class="relative inline-block mt-2">
                <span class="relative z-10">SMKN 1 Purwosari</span>
                <span class="absolute bottom-2 left-0 w-full h-4 bg-[#F8BE09] -rotate-1"></span>
            </span>
        </h1>

        <p class="text-xl text-[#4B5057] max-w-2xl mx-auto">
            Membangun jembatan antara pendidikan dan dunia kerja
        </p>
    </div>
</section>

<!-- Profil BKK -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div>
                <span class="text-[#F8BE09] font-bold mb-4 block">Profil BKK</span>
                <h2 class="text-4xl font-black text-[#122431] mb-6">
                    Tentang Bursa Kerja Khusus
                </h2>
                <div class="space-y-4 text-lg text-[#4B5057] leading-relaxed">
                    <p>
                        Bursa Kerja Khusus (BKK) SMKN 1 Purwosari adalah lembaga yang memfasilitasi lulusan SMK dalam mendapatkan pekerjaan yang sesuai dengan kompetensi mereka.
                    </p>
                    <p>
                        Kami berkomitmen menjembatani kesenjangan antara dunia pendidikan dan dunia kerja untuk membantu setiap siswa mencapai karir impian mereka.
                    </p>
                </div>
            </div>

            <div class="relative">
                <div class="aspect-[4/3] rounded-2xl overflow-hidden ">
                    <img src="{{ asset('img/bkk-office.jpg') }}" 
                         alt="BKK SMKN 1 Purwosari" 
                         class="w-full h-full object-cover">
                    
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Visi & Misi -->
<section class="py-20 bg-[#F5F6F5]">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="text-center mb-16">
            <span class="text-[#F8BE09] font-bold mb-4 block">Visi & Misi</span>
            <h2 class="text-4xl font-black text-[#122431]">
                Arah dan Tujuan BKK
            </h2>
        </div>

        <div class="grid md:grid-cols-2 gap-8">

            <!-- Visi -->
            <div class="bg-white rounded-2xl p-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-[#F8BE09] rounded-xl flex items-center justify-center">
                        <i class="ri-eye-line text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-black text-[#122431]">Visi</h3>
                </div>
                <p class="text-[#4B5057] leading-relaxed">
                    Menjadi lembaga terdepan dalam penempatan kerja lulusan SMK yang profesional, inovatif, dan terpercaya di tingkat nasional pada tahun 2030.
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-white rounded-2xl p-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-[#122431] rounded-xl flex items-center justify-center">
                        <i class="ri-task-line text-2xl text-[#F8BE09]"></i>
                    </div>
                    <h3 class="text-2xl font-black text-[#122431]">Misi</h3>
                </div>
                <ul class="space-y-2 text-[#4B5057]">
                    <li class="flex gap-2">
                        <span class="text-[#F8BE09] mt-1.5">•</span>
                        <span>Membangun kemitraan dengan industri</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="text-[#F8BE09] mt-1.5">•</span>
                        <span>Menyediakan informasi lowongan terpercaya</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="text-[#F8BE09] mt-1.5">•</span>
                        <span>Memberikan bimbingan karir</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="text-[#F8BE09] mt-1.5">•</span>
                        <span>Memfasilitasi penempatan kerja</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- Tugas & Fungsi -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="text-center mb-16">
            <span class="text-[#F8BE09] font-bold mb-4 block">Tugas & Fungsi</span>
            <h2 class="text-4xl font-black text-[#122431] mb-4">
                Layanan BKK
            </h2>
            <p class="text-lg text-[#4B5057]">
                Program untuk mendukung kesuksesan karir alumni
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-[#F5F6F5] rounded-2xl p-6 hover:bg-white hover:shadow-lg transition-all">
                <i class="ri-search-line text-3xl text-[#F8BE09] mb-3 block"></i>
                <h3 class="text-lg font-bold text-[#122431] mb-2">Pencarian Lowongan</h3>
                <p class="text-sm text-[#4B5057]">
                    Menyebarluaskan informasi lowongan dari perusahaan mitra
                </p>
            </div>

            <div class="bg-[#F5F6F5] rounded-2xl p-6 hover:bg-white hover:shadow-lg transition-all">
                <i class="ri-user-heart-line text-3xl text-[#122431] mb-3 block"></i>
                <h3 class="text-lg font-bold text-[#122431] mb-2">Bimbingan Karir</h3>
                <p class="text-sm text-[#4B5057]">
                    Konseling untuk membantu siswa menemukan jalan yang tepat
                </p>
            </div>

            <div class="bg-[#F5F6F5] rounded-2xl p-6 hover:bg-white hover:shadow-lg transition-all">
                <i class="ri-building-line text-3xl text-[#F8BE09] mb-3 block"></i>
                <h3 class="text-lg font-bold text-[#122431] mb-2">Kemitraan Industri</h3>
                <p class="text-sm text-[#4B5057]">
                    Membangun hubungan dengan perusahaan dan industri
                </p>
            </div>

            <div class="bg-[#F5F6F5] rounded-2xl p-6 hover:bg-white hover:shadow-lg transition-all">
                <i class="ri-presentation-line text-3xl text-[#122431] mb-3 block"></i>
                <h3 class="text-lg font-bold text-[#122431] mb-2">Pelatihan & Workshop</h3>
                <p class="text-sm text-[#4B5057]">
                    Program pelatihan untuk meningkatkan daya saing
                </p>
            </div>

            <div class="bg-[#F5F6F5] rounded-2xl p-6 hover:bg-white hover:shadow-lg transition-all">
                <i class="ri-line-chart-line text-3xl text-[#F8BE09] mb-3 block"></i>
                <h3 class="text-lg font-bold text-[#122431] mb-2">Monitoring Alumni</h3>
                <p class="text-sm text-[#4B5057]">
                    Pemantauan terhadap alumni yang telah bekerja
                </p>
            </div>

            <div class="bg-[#F5F6F5] rounded-2xl p-6 hover:bg-white hover:shadow-lg transition-all">
                <i class="ri-team-line text-3xl text-[#122431] mb-3 block"></i>
                <h3 class="text-lg font-bold text-[#122431] mb-2">Job Fair & Rekrutmen</h3>
                <p class="text-sm text-[#4B5057]">
                    Memfasilitasi proses rekrutmen perusahaan
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Statistik -->
<section class="py-20 bg-[#F5F6F5]">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="text-center mb-16">
            <span class="text-[#F8BE09] font-bold mb-4 block">Pencapaian</span>
            <h2 class="text-4xl font-black text-[#122431]">
                BKK dalam Angka
            </h2>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-2xl p-6 text-center">
                <div class="text-5xl font-black text-[#F8BE09] mb-2">850+</div>
                <div class="text-sm text-[#4B5057] font-medium">Alumni Tersalurkan</div>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center">
                <div class="text-5xl font-black text-[#122431] mb-2">120+</div>
                <div class="text-sm text-[#4B5057] font-medium">Perusahaan Mitra</div>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center">
                <div class="text-5xl font-black text-[#F8BE09] mb-2">92%</div>
                <div class="text-sm text-[#4B5057] font-medium">Tingkat Penempatan</div>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center">
                <div class="text-5xl font-black text-[#122431] mb-2">10+</div>
                <div class="text-sm text-[#4B5057] font-medium">Tahun Pengalaman</div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="max-w-3xl mx-auto text-center">
            <div class="w-16 h-16 bg-[#F8BE09] rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="ri-rocket-line text-3xl text-white"></i>
            </div>

            <h2 class="text-3xl md:text-4xl font-black text-[#122431] mb-4">
                Siap Memulai Karir Impianmu?
            </h2>
            <p class="text-lg text-[#4B5057] mb-8">
                Bergabunglah dengan ribuan alumni yang telah sukses berkarir
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('frontend.lowongan') }}"
                   class="px-8 py-4 bg-[#122431] text-white rounded-xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all">
                    Lihat Lowongan
                </a>
                <a href="{{ route('frontend.kontak') }}"
                   class="px-8 py-4 bg-white text-[#122431] border-2 border-[#122431] rounded-xl font-bold hover:bg-[#122431] hover:text-white transition-all">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
@endpush