{{-- /views/frontend/kontak.blade.php --}}

@extends('frontend.layout')

@section('title', 'Kontak Kami - BKK SMKN 1 Purwosari')

@section('content')

<!-- Hero Section -->
<section class="relative pt-32 pb-16 bg-gradient-to-b from-white via-[#F5F6F5] to-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-full h-full"
            style="background-image: radial-gradient(circle at 2px 2px, #F8BE09 1px, transparent 0); background-size: 40px 40px;">
        </div>
    </div>

    <!-- Floating Blobs -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-[#F8BE09]/20 rounded-full blur-3xl animate-blob"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#122431]/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>

    <div class="relative max-w-5xl mx-auto px-8 text-center">
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 px-5 py-2 bg-[#122431] text-[#F8BE09] rounded-full text-sm font-bold mb-8">
            Hubungi BKK SMKN 1 Purwosari
        </div>

        <h1 class="text-5xl md:text-6xl font-black text-[#122431] mb-4 leading-tight">
            Hubungi Kami
        </h1>
        <p class="text-xl text-[#4B5057] max-w-2xl mx-auto">
            Kami siap membantu menjawab pertanyaan Anda
        </p>
    </div>
</section>

<!-- Main Contact Section -->
<section class="py-16 bg-gradient-to-b from-white to-[#F5F6F5]">
    <div class="max-w-6xl mx-auto px-8">
        
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            
            <!-- Left: Contact Info -->
            <div class="space-y-6">
                
                <!-- Card 1: Location -->
                <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-14 h-14 bg-[#F8BE09] rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="ri-map-pin-line text-2xl text-[#122431]"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-[#122431] mb-2">Lokasi</h3>
                            <p class="text-[#4B5057] leading-relaxed mb-3">
                                Jl. Raya Purwosari - Kedungjati No.1<br>
                                Bakalankrajan, Purwosari<br>
                                Kab. Pasuruan, Jawa Timur 67162
                            </p>
                            <a href="https://maps.google.com/?q=SMK+Negeri+1+Purwosari" target="_blank" 
                               class="inline-flex items-center gap-2 text-[#F8BE09] font-semibold hover:gap-3 transition-all">
                                Buka Maps
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Contact Details -->
                <div class="bg-gradient-to-br from-[#122431] to-[#1a3345] rounded-2xl p-8 shadow-lg">
                    <h3 class="text-xl font-bold text-white mb-6">Informasi Kontak</h3>
                    
                    <div class="space-y-5">
                        <!-- Phone -->
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#F8BE09]/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="ri-phone-line text-xl text-[#F8BE09]"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400 mb-1">Telepon</div>
                                <a href="tel:+622341838330" class="text-white font-semibold hover:text-[#F8BE09] transition">
                                    +62 2341 838330
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#F8BE09]/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="ri-mail-line text-xl text-[#F8BE09]"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400 mb-1">Email</div>
                                <a href="mailto:info@smkn1purwosari.sch.id" class="text-white font-semibold hover:text-[#F8BE09] transition break-all">
                                    info@smkn1purwosari.sch.id
                                </a>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#25D366]/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="ri-whatsapp-line text-xl text-[#25D366]"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400 mb-1">WhatsApp</div>
                                <a href="https://wa.me/6281234567890" target="_blank" class="text-white font-semibold hover:text-[#F8BE09] transition">
                                    0812-xxxx-xxxx
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="mt-8 pt-6 border-t border-white/10">
                        <div class="text-sm text-gray-400 mb-4">Ikuti Kami</div>
                        <div class="flex gap-3">
                            <a href="#" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-[#F8BE09] rounded-lg flex items-center justify-center transition-all group">
                                <i class="ri-facebook-fill text-lg text-white group-hover:text-[#122431]"></i>
                            </a>
                            <a href="#" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-[#F8BE09] rounded-lg flex items-center justify-center transition-all group">
                                <i class="ri-instagram-line text-lg text-white group-hover:text-[#122431]"></i>
                            </a>
                            <a href="#" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-[#F8BE09] rounded-lg flex items-center justify-center transition-all group">
                                <i class="ri-youtube-fill text-lg text-white group-hover:text-[#122431]"></i>
                            </a>
                            <a href="#" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-[#F8BE09] rounded-lg flex items-center justify-center transition-all group">
                                <i class="ri-twitter-line text-lg text-white group-hover:text-[#122431]"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Operating Hours -->
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h3 class="text-xl font-bold text-[#122431] mb-6">Jam Operasional</h3>
                    
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-[#4B5057] font-medium">Senin - Jumat</span>
                            <span class="text-[#122431] font-bold">07:00 - 15:00</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-[#4B5057] font-medium">Sabtu</span>
                            <span class="text-[#122431] font-bold">07:00 - 12:00</span>
                        </div>
                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <span class="text-[#4B5057] font-medium">Minggu & Libur</span>
                            <span class="text-red-600 font-bold">Tutup</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right: Map -->
            <div class="lg:sticky lg:top-24">
                <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100">
                    <div class="relative rounded-xl overflow-hidden" style="height: 600px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5619447890746!2d112.82398931477636!3d-7.856667994385468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7c5f3b2e5e5e5%3A0x5e5e5e5e5e5e5e5e!2sSMK%20Negeri%201%20Purwosari!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    
                    <!-- Map Actions -->
                    <div class="mt-4 flex gap-3">
                        <a href="https://maps.google.com/?q=SMK+Negeri+1+Purwosari" target="_blank" 
                           class="flex-1 bg-[#122431] hover:bg-[#F8BE09] text-white hover:text-[#122431] font-bold py-3 px-4 rounded-xl transition-all flex items-center justify-center gap-2 group">
                            <i class="ri-map-pin-line"></i>
                            Google Maps
                            <i class="ri-external-link-line text-sm group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="https://www.waze.com/ul?q=SMK+Negeri+1+Purwosari" target="_blank" 
                           class="bg-[#F8BE09] hover:bg-[#122431] text-[#122431] hover:text-white font-bold py-3 px-4 rounded-xl transition-all flex items-center gap-2">
                            <i class="ri-navigation-line"></i>
                            Waze
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Quick FAQ -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-8">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-[#122431] mb-3">
                Pertanyaan Umum
            </h2>
            <p class="text-lg text-[#4B5057]">
                Jawaban cepat untuk pertanyaan Anda
            </p>
        </div>

        <div class="space-y-3">
            
            <!-- FAQ 1 -->
            <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open" class="w-full p-5 text-left flex items-center justify-between hover:bg-gray-50 transition">
                    <span class="font-bold text-[#122431]">Apa itu BKK SMKN 1 Purwosari?</span>
                    <i class="ri-arrow-down-s-line text-xl text-[#122431] transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-collapse class="px-5 pb-5 border-t border-gray-100">
                    <p class="text-[#4B5057] pt-4">
                        BKK adalah lembaga yang memberikan pelayanan kepada lulusan SMK dalam penempatan kerja dan informasi lowongan pekerjaan.
                    </p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open" class="w-full p-5 text-left flex items-center justify-between hover:bg-gray-50 transition">
                    <span class="font-bold text-[#122431]">Siapa yang bisa mendaftar?</span>
                    <i class="ri-arrow-down-s-line text-xl text-[#122431] transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-collapse class="px-5 pb-5 border-t border-gray-100">
                    <p class="text-[#4B5057] pt-4">
                        Semua alumni dan siswa kelas 12 SMKN 1 Purwosari dapat mendaftar untuk mengakses layanan BKK.
                    </p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open" class="w-full p-5 text-left flex items-center justify-between hover:bg-gray-50 transition">
                    <span class="font-bold text-[#122431]">Apakah ada biaya pendaftaran?</span>
                    <i class="ri-arrow-down-s-line text-xl text-[#122431] transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-collapse class="px-5 pb-5 border-t border-gray-100">
                    <p class="text-[#4B5057] pt-4">
                        Tidak ada biaya sama sekali. Semua layanan BKK SMKN 1 Purwosari 100% GRATIS.
                    </p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open" class="w-full p-5 text-left flex items-center justify-between hover:bg-gray-50 transition">
                    <span class="font-bold text-[#122431]">Bagaimana cara melamar kerja?</span>
                    <i class="ri-arrow-down-s-line text-xl text-[#122431] transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-collapse class="px-5 pb-5 border-t border-gray-100">
                    <p class="text-[#4B5057] pt-4">
                        Daftar akun di website, browse lowongan yang tersedia, lalu klik "Lamar" pada lowongan yang sesuai.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <!-- Subtle Pattern -->
    <div class="absolute inset-0 opacity-[0.02]">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #122431 2px, transparent 0); background-size: 48px 48px;"></div>
    </div>

    <!-- Accent Elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#F8BE09]/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#122431]/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-4xl mx-auto px-8 text-center">
        <!-- Icon -->
        <div class="w-20 h-20 bg-gradient-to-br from-[#F8BE09] to-[#ffd54f] rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
            <i class="ri-customer-service-2-line text-4xl text-[#122431]"></i>
        </div>

        <h2 class="text-3xl md:text-4xl font-black text-[#122431] mb-4">
            Butuh Bantuan Lebih Lanjut?
        </h2>
        <p class="text-lg text-[#4B5057] mb-10 max-w-2xl mx-auto">
            Tim kami siap membantu Anda dengan senang hati. Pilih cara komunikasi yang paling nyaman untuk Anda
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6281234567890" target="_blank" 
               class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#122431] text-white rounded-xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all shadow-lg group">
                <i class="ri-whatsapp-line text-xl"></i>
                Chat WhatsApp
                <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a href="mailto:info@smkn1purwosari.sch.id" 
               class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-[#122431] border-2 border-[#122431] rounded-xl font-bold hover:bg-[#122431] hover:text-white transition-all shadow-lg">
                <i class="ri-mail-line text-xl"></i>
                Kirim Email
            </a>
        </div>

        <!-- Trust Badge -->
        <div class="mt-10 pt-8 border-t border-gray-200">
            <p class="text-sm text-[#4B5057] flex items-center justify-center gap-2">
                <i class="ri-shield-check-line text-[#F8BE09] text-lg"></i>
                <span>Respon cepat dalam 1x24 jam di hari kerja</span>
            </p>
        </div>
    </div>
</section>

@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
@endpush