@extends('perusahaan.layout')

@section('title', 'Detail Pelamar')

@section('content')
<div class="w-full max-w-6xl pb-12 px-4">

    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
        <a href="{{ route('perusahaan.dashboard') }}" class="hover:text-slate-900 transition">Dashboard</a>
        <i class="ri-arrow-right-s-line text-xs"></i>
        <a href="{{ route('perusahaan.pelamar_masuk') }}" class="hover:text-slate-900 transition">Pelamar Masuk</a>
        <i class="ri-arrow-right-s-line text-xs"></i>
        <span class="text-slate-900">Detail Pelamar</span>
    </nav>

    {{-- Header --}}
    <div class="mb-8 flex items-start justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 mb-2">Detail Pelamar</h1>
            <p class="text-slate-600">Informasi lengkap data pelamar</p>
        </div>

        {{-- Status --}}
        <div>
            @if ($lamaran->status === 'diterima')
                <span class="px-4 py-2 text-sm font-medium bg-emerald-100 text-emerald-700 rounded-lg inline-flex items-center gap-2">
                    <i class="ri-checkbox-circle-line"></i> Diterima
                </span>
            @elseif ($lamaran->status === 'ditolak')
                <span class="px-4 py-2 text-sm font-medium bg-red-100 text-red-700 rounded-lg inline-flex items-center gap-2">
                    <i class="ri-close-circle-line"></i> Ditolak
                </span>
            @else
                <span class="px-4 py-2 text-sm font-medium bg-slate-100 text-slate-700 rounded-lg inline-flex items-center gap-2">
                    <i class="ri-time-line"></i> Pending
                </span>
            @endif
        </div>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-lg border border-slate-200 shadow-sm w-full">
        <div class="p-7 space-y-10">

            {{-- Informasi Pelamar --}}
            <div class="space-y-6">
                <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Informasi Pelamar</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                        <div class="form-view">{{ $pelamar->nama_lengkap ?? $pelamar->nama ?? '-' }}</div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                        <div class="form-view">{{ $pelamar->user->email ?? '-' }}</div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">No. Telepon</label>
                        <div class="form-view">{{ $pelamar->no_telp ?? $pelamar->telepon ?? '-' }}</div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Alamat</label>
                        <div class="form-view">{{ $pelamar->alamat ?? '-' }}</div>
                    </div>
                </div>
            </div>

            {{-- Informasi Lamaran --}}
            <div class="space-y-6">
                <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Informasi Lamaran</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Posisi Dilamar</label>
                        <div class="form-view">
                            {{ $lamaran->lowongan->judul_lowongan ?? 'Lowongan tidak tersedia' }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Melamar</label>
                        <div class="form-view">{{ $lamaran->created_at->format('d M Y') }}</div>
                    </div>
                </div>
            </div>

            {{-- CV --}}
            <div class="space-y-4">
                <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">CV Pelamar</h2>

                @if ($lamaran->cv)
                    <a href="{{ asset('storage/' . $lamaran->cv) }}" target="_blank"
                       class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                        <i class="ri-file-paper-2-line"></i> Lihat CV
                    </a>
                @else
                    <p class="text-slate-400 italic">CV belum diunggah</p>
                @endif
            </div>

            {{-- Catatan --}}
            <div class="space-y-4">
                <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Catatan Pelamar</h2>
                <div class="form-view whitespace-pre-line">
                    {{ $lamaran->catatan_perusahaan ?? 'Tidak ada catatan tambahan.' }}
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-between pt-6 border-t">
                <a href="{{ route('perusahaan.pelamar_masuk') }}"
                   class="px-6 py-2.5 text-slate-600 hover:text-slate-900 font-medium inline-flex items-center gap-2">
                    <i class="ri-arrow-left-line"></i> Kembali
                </a>

                @if ($lamaran->status === 'pending')
                    <div class="flex gap-3">
                        <button type="button" class="btn-terima btn-success" data-form-id="form-terima">
                            Terima
                        </button>
                        <button type="button" class="btn-tolak btn-danger" data-form-id="form-tolak">
                            Tolak
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Hidden Forms --}}
    <form id="form-terima" action="{{ route('perusahaan.pelamar_masuk.terima', $lamaran->id) }}" method="POST">@csrf</form>
    <form id="form-tolak" action="{{ route('perusahaan.pelamar_masuk.tolak', $lamaran->id) }}" method="POST">@csrf</form>
</div>
@endsection
