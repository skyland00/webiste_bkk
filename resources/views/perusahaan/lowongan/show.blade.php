@extends('perusahaan.layout')

@section('content')
<div class="space-y-6">

    {{-- Header Section --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6 rounded-xl shadow text-white">
        <h1 class="text-2xl font-bold">{{ $lowongan->judul_lowongan }}</h1>
        <p class="text-sm opacity-90 mt-1 flex items-center gap-2">
            <i class="ri-briefcase-line"></i>
            Detail informasi lowongan pekerjaan
        </p>

        {{-- Status Badge --}}
        <span class="mt-4 inline-block px-3 py-1 text-xs font-semibold rounded-full
            @if ($lowongan->status === 'aktif')
                bg-green-100 text-green-800
            @elseif($lowongan->status === 'nonaktif')
                bg-slate-200 text-slate-700
            @else
                bg-red-200 text-red-800
            @endif">
            {{ ucfirst($lowongan->status) }}
        </span>
    </div>

    {{-- Content Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

        {{-- Grid Info --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm mb-6">

            <div class="space-y-1">
                <p class="text-slate-500 flex items-center gap-1">
                    <i class="ri-building-line"></i> Bidang
                </p>
                <p class="font-medium text-slate-900">{{ $lowongan->bidang }}</p>
            </div>

            <div class="space-y-1">
                <p class="text-slate-500 flex items-center gap-1">
                    <i class="ri-map-pin-line"></i> Lokasi
                </p>
                <p class="font-medium text-slate-900">{{ $lowongan->lokasi }}</p>
            </div>

            <div class="space-y-1">
                <p class="text-slate-500 flex items-center gap-1">
                    <i class="ri-time-line"></i> Tipe Pekerjaan
                </p>
                <p class="font-medium text-slate-900">{{ ucfirst($lowongan->tipe_pekerjaan) }}</p>
            </div>

            <div class="space-y-1">
                <p class="text-slate-500 flex items-center gap-1">
                    <i class="ri-team-line"></i> Kuota
                </p>
                <p class="font-medium text-slate-900">{{ $lowongan->jumlah_orang }} Orang</p>
            </div>

            <div class="space-y-1">
                <p class="text-slate-500 flex items-center gap-1">
                    <i class="ri-money-dollar-circle-line"></i> Range Gaji
                </p>
                @if ($lowongan->gaji_min && $lowongan->gaji_max)
                    <p class="font-medium text-slate-900">
                        Rp {{ number_format($lowongan->gaji_min, 0, ',', '.') }} - 
                        Rp {{ number_format($lowongan->gaji_max, 0, ',', '.') }}
                    </p>
                @else
                    <p class="text-slate-400 italic">Tidak ditampilkan</p>
                @endif
            </div>

            <div class="space-y-1">
                <p class="text-slate-500 flex items-center gap-1">
                    <i class="ri-calendar-check-line"></i> Periode Lamaran
                </p>
                <p class="font-medium text-slate-900">
                    {{ $lowongan->tanggal_buka->format('d M Y') }} -
                    {{ $lowongan->tanggal_tutup->format('d M Y') }}
                </p>
            </div>

        </div>

        {{-- Divider --}}
        <div class="border-t border-slate-200 my-6"></div>

        {{-- Deskripsi & Kualifikasi --}}
        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-semibold text-slate-700 mb-2">Deskripsi Pekerjaan</h3>
                <p class="text-slate-600 leading-relaxed whitespace-pre-line">
                    {{ $lowongan->deskripsi_pekerjaan }}
                </p>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-slate-700 mb-2">Kualifikasi</h3>
                <p class="text-slate-600 leading-relaxed whitespace-pre-line">
                    {{ $lowongan->kualifikasi }}
                </p>
            </div>
        </div>

    </div>

    {{-- Action Buttons --}}
    <div class="flex items-center gap-3 pb-6">
        <a href="{{ route('perusahaan.lowongan.lowongan') }}"
           class="px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition">
           Kembali
        </a>

        <a href="{{ route('perusahaan.lowongan.edit', $lowongan->id) }}"
           class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">
           Edit
        </a>
    </div>

</div>
@endsection
