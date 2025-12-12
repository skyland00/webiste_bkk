@extends('perusahaan.layout')

@section('content')

    <main class="flex-1 overflow-y-auto scrollbar-thin">

        <div class="w-full max-w-6xl pb-12 px-4">

            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
                <a href="{{ route('perusahaan.dashboard') }}" class="hover:text-slate-900 transition">Dashboard</a>
                <i class="ri-arrow-right-s-line text-xs"></i>
                <a href="{{ route('perusahaan.lowongan.lowongan') }}" class="hover:text-slate-900 transition">Lowongan</a>
                <i class="ri-arrow-right-s-line text-xs"></i>
                <span class="text-slate-900">Detail Lowongan</span>
            </nav>

            {{-- Header --}}
            <div class="mb-8">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-slate-900 mb-2">{{ $lowongan->judul_lowongan }}</h1>
                        <p class="text-slate-600">{{ $lowongan->bidang }}</p>
                    </div>
                    <span class="px-3 py-1 text-sm font-medium rounded-lg
                        @if ($lowongan->status === 'aktif')
                            bg-emerald-50 text-emerald-700 border border-emerald-200
                        @elseif($lowongan->status === 'nonaktif')
                            bg-slate-100 text-slate-600 border border-slate-200
                        @else
                            bg-rose-50 text-rose-700 border border-rose-200
                        @endif">
                        {{ ucfirst($lowongan->status) }}
                    </span>
                </div>

                {{-- Quick Info --}}
                <div class="flex flex-wrap gap-4 text-sm text-slate-600">
                    <span class="flex items-center gap-1.5">
                        <i class="ri-map-pin-line"></i>
                        {{ $lowongan->lokasi }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <i class="ri-time-line"></i>
                        {{ ucfirst($lowongan->tipe_pekerjaan) }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <i class="ri-team-line"></i>
                        {{ $lowongan->jumlah_orang }} orang
                    </span>
                </div>
            </div>

            {{-- Content Card --}}
            <div class="bg-white rounded-lg border border-slate-200 shadow-sm">
                <div class="p-7 space-y-8">

                    {{-- Informasi Dasar --}}
                    <div class="space-y-6">
                        <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Informasi Dasar</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-500 mb-1">Judul Lowongan</label>
                                <p class="text-slate-900">{{ $lowongan->judul_lowongan }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-500 mb-1">Bidang</label>
                                <p class="text-slate-900">{{ $lowongan->bidang }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-500 mb-1">Tipe Pekerjaan</label>
                                <p class="text-slate-900">{{ ucfirst($lowongan->tipe_pekerjaan) }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-500 mb-1">Jumlah Dibutuhkan</label>
                                <p class="text-slate-900">{{ $lowongan->jumlah_orang }} orang</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-500 mb-1">Lokasi</label>
                                <p class="text-slate-900">{{ $lowongan->lokasi }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Kompensasi & Periode --}}
                    <div class="space-y-6">
                        <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Kompensasi & Periode</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-500 mb-1">Range Gaji</label>
                                @if ($lowongan->gaji_min && $lowongan->gaji_max)
                                    <p class="text-slate-900">
                                        Rp {{ number_format($lowongan->gaji_min, 0, ',', '.') }} - 
                                        Rp {{ number_format($lowongan->gaji_max, 0, ',', '.') }}
                                    </p>
                                @else
                                    <p class="text-slate-400">Tidak ditampilkan</p>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-500 mb-1">Periode Lamaran</label>
                                <p class="text-slate-900">
                                    {{ $lowongan->tanggal_buka->format('d M Y') }} - 
                                    {{ $lowongan->tanggal_tutup->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Detail Lowongan --}}
                    <div class="space-y-6">
                        <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Detail Lowongan</h2>

                        <div class="space-y-5">
                            {{-- Deskripsi --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-500 mb-2">Deskripsi Pekerjaan</label>
                                <div class="bg-slate-50 rounded-lg p-4 border border-slate-200">
                                    <p class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $lowongan->deskripsi_pekerjaan }}</p>
                                </div>
                            </div>

                            {{-- Kualifikasi --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-500 mb-2">Kualifikasi</label>
                                <div class="bg-slate-50 rounded-lg p-4 border border-slate-200">
                                    <p class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $lowongan->kualifikasi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-end gap-3 pt-6 border-t">
                        <a href="{{ route('perusahaan.lowongan.lowongan') }}"
                            class="px-6 py-2.5 text-slate-600 hover:text-slate-900 font-medium">
                            Kembali
                        </a>
                        <a href="{{ route('perusahaan.lowongan.edit', $lowongan->id) }}"
                            class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-medium rounded-lg shadow-sm">
                            Edit Lowongan
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </main>

@endsection