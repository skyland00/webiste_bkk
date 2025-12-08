{{-- views/admin/pelamar/show.blade.php --}}

@extends('admin.layout')

@section('title', 'Detail Lamaran')

@section('content')
    <div class="space-y-6">

        <!-- Header with Back Button -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.pelamar') }}"
                    class="w-10 h-10 flex items-center justify-center bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition">
                    <i class="ri-arrow-left-line text-xl text-slate-600"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Detail Lamaran</h1>
                    <p class="text-sm text-slate-500 mt-1">Informasi lengkap lamaran pelamar</p>
                </div>
            </div>

            <!-- Status Badge -->
            <div>
                @if ($lamaran->status === 'pending')
                    <span class="px-4 py-2 text-sm font-medium bg-amber-100 text-amber-700 rounded-full">
                        <i class="ri-time-line"></i> Pending
                    </span>
                @elseif($lamaran->status === 'diterima')
                    <span class="px-4 py-2 text-sm font-medium bg-emerald-100 text-emerald-700 rounded-full">
                        <i class="ri-check-line"></i> Diterima
                    </span>
                @else
                    <span class="px-4 py-2 text-sm font-medium bg-red-100 text-red-700 rounded-full">
                        <i class="ri-close-line"></i> Ditolak
                    </span>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:items-start">

            <!-- Informasi Pelamar -->
            <div class="lg:col-span-1 space-y-6 lg:sticky lg:top-6">

                <!-- Profile Card -->
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-8 bg-gradient-to-br from-blue-50 to-indigo-50">
                        <div class="flex flex-col items-center text-center">
                            @if ($lamaran->pelamar->foto ?? false)
                                <img src="{{ asset('storage/' . $lamaran->pelamar->foto) }}"
                                    class="w-28 h-28 rounded-2xl border-4 border-white shadow-md object-cover"
                                    alt="{{ $lamaran->pelamar->nama_lengkap }}" />
                            @else
                                <div
                                    class="w-28 h-28 rounded-2xl border-4 border-white shadow-md bg-slate-200 flex items-center justify-center">
                                    <i class="ri-user-line text-5xl text-slate-500"></i>
                                </div>
                            @endif
                            <h3 class="text-xl font-bold text-slate-900 mt-5">{{ $lamaran->pelamar->nama_lengkap }}</h3>
                            <p class="text-sm text-slate-600 mt-1">{{ $lamaran->pelamar->user->email }}</p>
                        </div>
                    </div>

                    <div class="p-6 space-y-3">
                        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">
                            <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="ri-id-card-line text-blue-600 text-xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-slate-500 font-medium">NISN</p>
                                <p class="font-semibold text-slate-900 truncate">{{ $lamaran->pelamar->nisn }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">
                            <div class="w-11 h-11 bg-amber-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="ri-calendar-line text-amber-600 text-xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-slate-500 font-medium">Tahun Lulus</p>
                                <p class="font-semibold text-slate-900">{{ $lamaran->pelamar->tahun_lulus }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">
                            <div class="w-11 h-11 bg-purple-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="ri-phone-line text-purple-600 text-xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-slate-500 font-medium">No. Telepon</p>
                                <p class="font-semibold text-slate-900">{{ $lamaran->pelamar->no_telp }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">
                            <div class="w-11 h-11 bg-slate-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="ri-user-add-line text-slate-600 text-xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-slate-500 font-medium">Terdaftar Sejak</p>
                                <p class="font-semibold text-slate-900">
                                    {{ $lamaran->pelamar->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CV Download -->
                @if ($lamaran->pelamar->cv)
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                        <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                            <i class="ri-file-text-line text-blue-600 text-lg"></i>
                            Curriculum Vitae
                        </h4>
                        <a href="{{ asset('storage/' . $lamaran->pelamar->cv) }}" target="_blank"
                            class="flex items-center justify-between p-4 bg-slate-50 border border-slate-200 rounded-xl hover:bg-slate-100 hover:shadow-md transition-all group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                                    <i class="ri-file-pdf-line text-red-600 text-2xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-900">CV Pelamar</p>
                                    <p class="text-xs text-slate-500">PDF Document</p>
                                </div>
                            </div>
                            <i class="ri-download-line text-2xl text-slate-400 group-hover:text-blue-600 transition"></i>
                        </a>
                    </div>
                @endif

            </div>

            <!-- Informasi Lamaran & Lowongan -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Informasi Lowongan -->
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-6 bg-slate-50">
                        <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="ri-briefcase-line text-blue-600"></i>
                            </div>
                            Informasi Lowongan
                        </h3>
                    </div>

                    <div class="p-6">
                        <div class="flex items-start gap-4 p-5 bg-slate-50 rounded-xl mb-6">
                            @if ($lamaran->lowongan->perusahaan->logo)
                                <img src="{{ asset('storage/' . $lamaran->lowongan->perusahaan->logo) }}"
                                    class="w-16 h-16 rounded-xl border-2 border-white shadow-sm object-cover"
                                    alt="{{ $lamaran->lowongan->perusahaan->nama_perusahaan }}" />
                            @else
                                <div
                                    class="w-16 h-16 flex items-center justify-center bg-slate-200 rounded-xl text-slate-500">
                                    <i class="ri-building-line text-2xl"></i>
                                </div>
                            @endif

                            <div class="flex-1">
                                <h4 class="text-xl font-bold text-slate-900">{{ $lamaran->lowongan->judul_lowongan }}</h4>
                                <p class="text-sm text-slate-600 mt-1 font-medium">
                                    {{ $lamaran->lowongan->perusahaan->nama_perusahaan }}
                                </p>
                                <div class="flex items-center gap-4 mt-3 text-sm text-slate-500">
                                    <span class="flex items-center gap-1.5">
                                        <i class="ri-map-pin-line"></i>
                                        {{ $lamaran->lowongan->lokasi }}
                                    </span>
                                    <span class="flex items-center gap-1.5">
                                        <i class="ri-briefcase-line"></i>
                                        {{ ucfirst($lamaran->lowongan->tipe_pekerjaan) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-50 rounded-xl">
                                <p class="text-xs text-slate-500 mb-1 font-medium">Bidang Pekerjaan</p>
                                <p class="font-semibold text-slate-900">{{ $lamaran->lowongan->bidang }}</p>
                            </div>

                            <div class="p-4 bg-slate-50 rounded-xl">
                                <p class="text-xs text-slate-500 mb-1 font-medium">Tipe Pekerjaan</p>
                                <p class="font-semibold text-slate-900">
                                    {{ ucfirst(str_replace('-', ' ', $lamaran->lowongan->tipe_pekerjaan)) }}
                                </p>
                            </div>

                            <div class="p-4 bg-slate-50 rounded-xl">
                                <p class="text-xs text-slate-500 mb-1 font-medium">Rentang Gaji</p>
                                <p class="font-semibold text-slate-900 text-sm">
                                    @if ($lamaran->lowongan->gaji_min && $lamaran->lowongan->gaji_max)
                                        Rp {{ number_format($lamaran->lowongan->gaji_min, 0, ',', '.') }} -
                                        Rp {{ number_format($lamaran->lowongan->gaji_max, 0, ',', '.') }}
                                    @else
                                        Negotiable
                                    @endif
                                </p>
                            </div>

                            <div class="p-4 bg-slate-50 rounded-xl">
                                <p class="text-xs text-slate-500 mb-1 font-medium">Jumlah Posisi</p>
                                <p class="font-semibold text-slate-900">{{ $lamaran->lowongan->jumlah_orang }} Orang</p>
                            </div>

                            <div class="p-4 bg-slate-50 rounded-xl">
                                <p class="text-xs text-slate-500 mb-1 font-medium">Tanggal Buka</p>
                                <p class="font-semibold text-slate-900">
                                    {{ \Carbon\Carbon::parse($lamaran->lowongan->tanggal_buka)->format('d M Y') }}
                                </p>
                            </div>

                            <div class="p-4 bg-slate-50 rounded-xl">
                                <p class="text-xs text-slate-500 mb-1 font-medium">Tanggal Tutup</p>
                                <p class="font-semibold text-slate-900">
                                    {{ \Carbon\Carbon::parse($lamaran->lowongan->tanggal_tutup)->format('d M Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- Deskripsi Pekerjaan -->
                        <div class="mt-6 p-5 bg-blue-50 border border-blue-200 rounded-xl">
                            <h5 class="font-bold text-slate-900 mb-3 flex items-center gap-2">
                                <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="ri-file-list-3-line text-blue-600 text-sm"></i>
                                </div>
                                Deskripsi Pekerjaan
                            </h5>
                            <p class="text-sm text-slate-700 leading-relaxed whitespace-pre-line">{{ $lamaran->lowongan->deskripsi_pekerjaan }}</p>
                        </div>

                        <!-- Kualifikasi -->
                        <div class="mt-4 p-5 bg-emerald-50 border border-emerald-200 rounded-xl">
                            <h5 class="font-bold text-slate-900 mb-3 flex items-center gap-2">
                                <div class="w-7 h-7 bg-emerald-100 rounded-lg flex items-center justify-center">
                                    <i class="ri-check-double-line text-emerald-600 text-sm"></i>
                                </div>
                                Kualifikasi
                            </h5>
                            <p class="text-sm text-slate-700 leading-relaxed whitespace-pre-line">{{ $lamaran->lowongan->kualifikasi }}</p>
                        </div>
                    </div>
                </div>

                <!-- Detail Lamaran -->
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-6 bg-slate-50">
                        <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="ri-file-list-line text-blue-600"></i>
                            </div>
                            Detail Lamaran
                        </h3>
                    </div>

                    <div class="p-6 space-y-3">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                            <div>
                                <p class="text-xs text-slate-500 mb-1 font-medium">Tanggal Melamar</p>
                                <p class="font-bold text-slate-900">
                                    {{ $lamaran->created_at->format('d M Y, H:i') }} WIB
                                </p>
                            </div>
                            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="ri-calendar-check-line text-xl text-blue-600"></i>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 rounded-xl
                            {{ $lamaran->status === 'pending' ? 'bg-amber-50' : ($lamaran->status === 'diterima' ? 'bg-emerald-50' : 'bg-red-50') }}">
                            <div>
                                <p class="text-xs mb-1 font-medium
                                    {{ $lamaran->status === 'pending' ? 'text-amber-600' : ($lamaran->status === 'diterima' ? 'text-emerald-600' : 'text-red-600') }}">
                                    Status Lamaran
                                </p>
                                <p class="font-bold text-slate-900">
                                    @if ($lamaran->status === 'pending')
                                        <span class="text-amber-600">Menunggu Review</span>
                                    @elseif($lamaran->status === 'diterima')
                                        <span class="text-emerald-600">Diterima</span>
                                    @else
                                        <span class="text-red-600">Ditolak</span>
                                    @endif
                                </p>
                            </div>
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center
                                {{ $lamaran->status === 'pending' ? 'bg-amber-100' : ($lamaran->status === 'diterima' ? 'bg-emerald-100' : 'bg-red-100') }}">
                                <i class="ri-checkbox-circle-line text-xl
                                    {{ $lamaran->status === 'pending' ? 'text-amber-600' : ($lamaran->status === 'diterima' ? 'text-emerald-600' : 'text-red-600') }}">
                                </i>
                            </div>
                        </div>

                        @if ($lamaran->updated_at != $lamaran->created_at)
                            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                                <div>
                                    <p class="text-xs text-slate-500 mb-1 font-medium">Terakhir Diupdate</p>
                                    <p class="font-bold text-slate-900">
                                        {{ $lamaran->updated_at->format('d M Y, H:i') }} WIB
                                    </p>
                                </div>
                                <div class="w-11 h-11 bg-slate-100 rounded-xl flex items-center justify-center">
                                    <i class="ri-refresh-line text-xl text-slate-600"></i>
                                </div>
                            </div>
                        @endif

                        @if ($lamaran->catatan ?? false)
                            <div class="p-5 bg-blue-50 border border-blue-200 rounded-xl">
                                <p class="text-xs text-blue-600 font-bold mb-2 flex items-center gap-2">
                                    <div class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="ri-message-3-line text-xs"></i>
                                    </div>
                                    Catatan
                                </p>
                                <p class="text-sm text-slate-700 leading-relaxed">{{ $lamaran->catatan }}</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
