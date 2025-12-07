{{-- /views/frontend/pelamar/detail_lamaran.blade.php --}}

@extends('frontend.layout')

@section('title', 'Detail Lamaran - BKK SMKN 1 Purwosari')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-[#F5F6F5] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-sm text-[#4B5057]">
                <a href="{{ route('frontend.home') }}" class="hover:text-[#122431] transition">Home</a>
                <i class="ri-arrow-right-s-line text-lg"></i>
                <a href="{{ route('frontend.pelamar.riwayat_lamaran') }}"
                    class="hover:text-[#122431] transition">Dashboard</a>
                <i class="ri-arrow-right-s-line text-lg"></i>
                <span class="text-[#122431] font-medium">Detail Lamaran</span>
            </div>
        </div>
    </section>

    <!-- Alert Messages -->
    @if (session('success'))
        <section class="py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
                    <i class="ri-checkbox-circle-line text-2xl"></i>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            </div>
        </section>
    @endif

    @if (session('error'))
        <section class="py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-2xl flex items-center gap-3">
                    <i class="ri-error-warning-line text-2xl"></i>
                    <span class="font-semibold">{{ session('error') }}</span>
                </div>
            </div>
        </section>
    @endif

    <!-- Main Content -->
    <section class="py-12 bg-[#F5F6F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Header Card -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <div class="flex items-start gap-6 mb-6">
                            @if ($lamaran->lowongan->perusahaan->logo)
                                <img src="{{ asset('storage/' . $lamaran->lowongan->perusahaan->logo) }}"
                                    alt="{{ $lamaran->lowongan->perusahaan->nama_perusahaan }}"
                                    class="w-20 h-20 rounded-2xl object-cover ring-4 ring-[#F5F6F5]">
                            @else
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-2xl flex items-center justify-center ring-4 ring-[#F5F6F5]">
                                    <span
                                        class="text-[#F8BE09] font-bold text-2xl">{{ substr($lamaran->lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
                                </div>
                            @endif

                            <div class="flex-1">
                                <h1 class="text-3xl font-bold text-[#122431] mb-2">{{ $lamaran->lowongan->judul_lowongan }}
                                </h1>
                                <p class="text-lg text-[#4B5057] mb-3">{{ $lamaran->lowongan->perusahaan->nama_perusahaan }}
                                </p>

                                <!-- Status Badge -->
                                <div class="flex items-center gap-3">
                                    @if ($lamaran->status === 'pending')
                                        <span
                                            class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-bold flex items-center gap-2">
                                            <i class="ri-time-line"></i>
                                            Sedang Diproses
                                        </span>
                                    @elseif($lamaran->status === 'diterima')
                                        <span
                                            class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-bold flex items-center gap-2">
                                            <i class="ri-checkbox-circle-line"></i>
                                            Diterima
                                        </span>
                                    @elseif($lamaran->status === 'dibatalkan')
                                        <span
                                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm font-bold flex items-center gap-2">
                                            <i class="ri-close-circle-line"></i>
                                            Dibatalkan
                                        </span>
                                    @else
                                        <span
                                            class="px-4 py-2 bg-red-100 text-red-700 rounded-full text-sm font-bold flex items-center gap-2">
                                            <i class="ri-close-circle-line"></i>
                                            Ditolak
                                        </span>
                                    @endif

                                    <span
                                        class="px-4 py-2 bg-[#F8BE09]/10 text-[#122431] rounded-full text-sm font-semibold">
                                        {{ ucfirst($lamaran->lowongan->tipe_pekerjaan) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Info Grid -->
                        <div class="grid md:grid-cols-2 gap-4 pt-6 border-t border-[#F5F6F5]">
                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <i class="ri-calendar-line text-xl text-[#122431]"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Tanggal Melamar</p>
                                    <p class="font-semibold text-[#122431]">
                                        {{ $lamaran->created_at->format('d M Y, H:i') }} WIB</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <i class="ri-map-pin-line text-xl text-[#122431]"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Lokasi</p>
                                    <p class="font-semibold text-[#122431]">{{ $lamaran->lowongan->lokasi }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <i class="ri-money-dollar-circle-line text-xl text-[#122431]"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Gaji</p>
                                    @if ($lamaran->lowongan->gaji_min && $lamaran->lowongan->gaji_max)
                                        <p class="font-semibold text-[#122431]">Rp
                                            {{ number_format($lamaran->lowongan->gaji_min, 0, ',', '.') }} -
                                            {{ number_format($lamaran->lowongan->gaji_max, 0, ',', '.') }}</p>
                                    @else
                                        <p class="font-semibold text-[#122431]">Gaji Kompetitif</p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="p-3 bg-[#F8BE09]/10 rounded-xl">
                                    <i class="ri-briefcase-line text-xl text-[#122431]"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-[#B2B2AF] mb-1">Bidang</p>
                                    <p class="font-semibold text-[#122431]">{{ $lamaran->lowongan->bidang }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CV yang Diupload -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <h2 class="text-2xl font-bold text-[#122431] mb-4 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-[#122431] to-[#4B5057] rounded-full"></span>
                            Curriculum Vitae (CV)
                        </h2>
                        <div
                            class="bg-[#F8BE09]/10 border-2 border-[#F8BE09] rounded-2xl p-6 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-[#F8BE09] rounded-2xl flex items-center justify-center">
                                    <i class="ri-file-text-line text-3xl text-[#122431]"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-[#122431] text-lg">CV Lamaran</p>
                                    <p class="text-sm text-[#4B5057]">File yang dikirim untuk lamaran ini</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $lamaran->cv) }}" target="_blank"
                                class="px-6 py-3 bg-[#122431] text-white rounded-xl font-bold hover:bg-[#1a3345] transition-all shadow-lg hover:shadow-xl flex items-center gap-2">
                                <i class="ri-eye-line text-lg"></i>
                                Lihat CV
                            </a>
                        </div>
                    </div>

                    <!-- Cover Letter -->
                    @if ($lamaran->cover_letter)
                        <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                            <h2 class="text-2xl font-bold text-[#122431] mb-4 flex items-center gap-3">
                                <span class="w-2 h-8 bg-gradient-to-b from-[#F8BE09] to-[#ffd54f] rounded-full"></span>
                                Cover Letter
                            </h2>
                            <div class="bg-[#F5F6F5] rounded-2xl p-6">
                                <p class="text-[#4B5057] leading-relaxed whitespace-pre-line">{{ $lamaran->cover_letter }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <!-- Catatan dari Perusahaan -->
                    @if ($lamaran->catatan_perusahaan)
                        <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                            <h2 class="text-2xl font-bold text-[#122431] mb-4 flex items-center gap-3">
                                <span class="w-2 h-8 bg-gradient-to-b from-[#4B5057] to-[#122431] rounded-full"></span>
                                Catatan dari Perusahaan
                            </h2>
                            <div class="bg-[#F8BE09]/10 border-l-4 border-[#F8BE09] rounded-r-2xl p-6">
                                <p class="text-[#122431] leading-relaxed">{{ $lamaran->catatan_perusahaan }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Info Lowongan -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-[#F5F6F5]">
                        <h2 class="text-2xl font-bold text-[#122431] mb-6 flex items-center gap-3">
                            <span class="w-2 h-8 bg-gradient-to-b from-[#122431] to-[#4B5057] rounded-full"></span>
                            Detail Lowongan
                        </h2>

                        <div class="space-y-6">
                            <!-- Deskripsi Pekerjaan -->
                            <div>
                                <h3 class="font-bold text-[#122431] mb-3 flex items-center gap-2">
                                    <i class="ri-file-list-line text-xl text-[#F8BE09]"></i>
                                    Deskripsi Pekerjaan
                                </h3>
                                <div class="text-[#4B5057] leading-relaxed">
                                    {!! nl2br(e($lamaran->lowongan->deskripsi_pekerjaan)) !!}
                                </div>
                            </div>

                            <!-- Kualifikasi -->
                            <div>
                                <h3 class="font-bold text-[#122431] mb-3 flex items-center gap-2">
                                    <i class="ri-checkbox-multiple-line text-xl text-[#F8BE09]"></i>
                                    Kualifikasi
                                </h3>
                                <div class="text-[#4B5057] leading-relaxed">
                                    {!! nl2br(e($lamaran->lowongan->kualifikasi)) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">

                        <!-- Status Card -->
                        <div class="bg-gradient-to-br from-[#122431] to-[#1a3345] rounded-3xl shadow-xl p-8 text-white">
                            <div class="text-center mb-6">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-[#F8BE09]/20 rounded-2xl mb-4 backdrop-blur-sm">
                                    @if ($lamaran->status === 'pending')
                                        <i class="ri-time-line text-3xl text-[#F8BE09]"></i>
                                    @elseif($lamaran->status === 'diterima')
                                        <i class="ri-checkbox-circle-line text-3xl text-[#F8BE09]"></i>
                                    @elseif($lamaran->status === 'dibatalkan')
                                        <i class="ri-close-circle-line text-3xl text-[#F8BE09]"></i>
                                    @else
                                        <i class="ri-close-circle-line text-3xl text-[#F8BE09]"></i>
                                    @endif
                                </div>
                                <h3 class="text-2xl font-bold mb-2">Status Lamaran</h3>
                                <p class="text-[#F5F6F5] text-sm mb-4">
                                    @if ($lamaran->status === 'pending')
                                        Lamaran Anda sedang ditinjau oleh perusahaan
                                    @elseif($lamaran->status === 'diterima')
                                        Selamat! Lamaran Anda diterima
                                    @elseif($lamaran->status === 'dibatalkan')
                                        Lamaran ini telah dibatalkan
                                    @else
                                        Mohon maaf, lamaran Anda ditolak
                                    @endif
                                </p>

                                @if ($lamaran->status === 'pending')
                                    <div class="px-4 py-2 bg-yellow-500/20 rounded-full text-yellow-300 font-bold text-sm">
                                        Sedang Diproses
                                    </div>
                                @elseif($lamaran->status === 'diterima')
                                    <div class="px-4 py-2 bg-green-500/20 rounded-full text-green-300 font-bold text-sm">
                                        Diterima
                                    </div>
                                @elseif($lamaran->status === 'dibatalkan')
                                    <div class="px-4 py-2 bg-gray-500/20 rounded-full text-gray-300 font-bold text-sm">
                                        Dibatalkan
                                    </div>
                                @else
                                    <div class="px-4 py-2 bg-red-500/20 rounded-full text-red-300 font-bold text-sm">
                                        Ditolak
                                    </div>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <a href="{{ route('frontend.pelamar.riwayat_lamaran') }}"
                                    class="block w-full bg-[#F8BE09] text-[#122431] text-center py-4 rounded-2xl font-bold hover:bg-[#ffd54f] transition shadow-lg hover:shadow-xl hover:scale-105 duration-300">
                                    Kembali ke Riwayat
                                </a>

                                @if ($lamaran->status === 'pending')
                                    <form id="cancel-form" action="{{ route('pelamar.lamaran.cancel', $lamaran->id) }}"
                                        method="POST">
                                        @csrf
                                        <button type="button" onclick="confirmCancel()"
                                            class="block w-full bg-red-500 text-white text-center py-4 rounded-2xl font-bold hover:bg-red-600 transition shadow-lg hover:shadow-xl">
                                            Batalkan Lamaran
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <!-- Kontak Perusahaan -->
                        <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5]">
                            <h3 class="font-bold text-[#122431] mb-4">Kontak Perusahaan</h3>
                            <div class="space-y-3">
                                <div class="flex items-start gap-3">
                                    <i class="ri-phone-line text-xl text-[#F8BE09] mt-1"></i>
                                    <div>
                                        <p class="text-sm text-[#B2B2AF]">Telepon</p>
                                        <p class="font-semibold text-[#122431]">
                                            {{ $lamaran->lowongan->perusahaan->kontak }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <i class="ri-map-pin-line text-xl text-[#F8BE09] mt-1"></i>
                                    <div>
                                        <p class="text-sm text-[#B2B2AF]">Alamat</p>
                                        <p class="font-semibold text-[#122431]">
                                            {{ $lamaran->lowongan->perusahaan->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cari Lowongan Lain -->
                        <div class="bg-[#F8BE09]/10 rounded-3xl p-6 border-2 border-[#F8BE09]">
                            <h3 class="font-bold text-[#122431] mb-2">Cari Lowongan Lain</h3>
                            <p class="text-sm text-[#4B5057] mb-4">Jelajahi lowongan kerja lainnya yang sesuai dengan Anda
                            </p>
                            <a href="{{ route('frontend.lowongan') }}"
                                class="block w-full bg-[#122431] text-white text-center py-3 rounded-xl font-bold hover:bg-[#1a3345] transition">
                                Lihat Lowongan
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function confirmCancel() {
                Swal.fire({
                    title: 'Batalkan Lamaran?',
                    text: "Apakah Anda yakin ingin membatalkan lamaran ini? Tindakan ini tidak dapat dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, Batalkan!',
                    cancelButtonText: 'Tidak',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('cancel-form').submit();
                    }
                });
            }
        </script>
    @endpush
@endsection
