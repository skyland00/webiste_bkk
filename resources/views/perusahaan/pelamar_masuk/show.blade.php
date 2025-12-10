@extends('perusahaan.layout')

@section('content')
    <div class="space-y-6">

        {{-- Header Section --}}
        <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6 rounded-xl shadow text-white">
            <h1 class="text-2xl font-bold">Detail Pelamar</h1>
            <p class="text-sm opacity-90 mt-1 flex items-center gap-2">
                <i class="ri-user-3-line"></i>
                Informasi lengkap pelamar yang masuk
            </p>

            {{-- Status Lamaran --}}
            <span class="mt-4 inline-block px-3 py-1 text-xs font-semibold rounded-full
                            @if ($lamaran->status === 'diterima')
                                bg-green-100 text-green-800
                            @elseif($lamaran->status === 'ditolak')
                                bg-red-100 text-red-800
                            @else
                                bg-slate-200 text-slate-700
                            @endif">
                {{ ucfirst($lamaran->status) }}
            </span>

            {{-- Posisi Dilamar --}}
            <p class="mt-2 font-medium text-slate-900">
                {{ $lamaran->lowongan->judul_lowongan ?? 'Lowongan tidak tersedia' }}
            </p>

            {{-- Tanggal Melamar --}}
            <p class="text-sm opacity-90">{{ $lamaran->created_at->format('d M Y') }}</p>
        </div>

        {{-- Content Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

            {{-- Grid Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm mb-6">

                <div class="space-y-1">
                    <p class="text-slate-500 flex items-center gap-1">
                        <i class="ri-user-line"></i> Nama Pelamar
                    </p>
                    <p class="font-medium text-slate-900">{{ $pelamar->nama_lengkap ?? $pelamar->nama ?? 'Tidak tersedia' }}
                    </p>
                </div>

                <div class="space-y-1">
                    <p class="text-slate-500 flex items-center gap-1">
                        <i class="ri-mail-line"></i> Email
                    </p>
                    <p class="font-medium text-slate-900">{{ $pelamar->user->email ?? 'Tidak tersedia' }}</p>
                </div>

                <div class="space-y-1">
                    <p class="text-slate-500 flex items-center gap-1">
                        <i class="ri-phone-line"></i> No. Telepon
                    </p>
                    <p class="font-medium text-slate-900">{{ $pelamar->no_telp ?? $pelamar->telepon ?? 'Tidak tersedia' }}
                    </p>
                </div>

                <div class="space-y-1">
                    <p class="text-slate-500 flex items-center gap-1">
                        <i class="ri-map-pin-line"></i> Alamat
                    </p>
                    <p class="font-medium text-slate-900">{{ $pelamar->alamat ?? 'Tidak tersedia' }}</p>
                </div>

                <div class="space-y-1">
                    <p class="text-slate-500 flex items-center gap-1">
                        <i class="ri-briefcase-4-line"></i> Posisi Dilamar
                    </p>
                    <p class="font-medium text-slate-900">
                        {{ $lamaran->lowongan->judul_lowongan ?? 'Lowongan tidak tersedia' }}
                    </p>
                </div>

                <div class="space-y-1">
                    <p class="text-slate-500 flex items-center gap-1">
                        <i class="ri-calendar-check-line"></i> Tanggal Melamar
                    </p>
                    <p class="font-medium text-slate-900">{{ $lamaran->created_at->format('d M Y') }}</p>
                </div>

            </div>

            {{-- Divider --}}
            <div class="border-t border-slate-200 my-6"></div>

            {{-- CV & Catatan --}}
            <div class="space-y-6">
                <div>
                    <h3 class="text-sm font-semibold text-slate-700 mb-2">CV Pelamar</h3>
                    @if ($lamaran->cv)
                        <a href="{{ asset('storage/' . $lamaran->cv) }}" target="_blank"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition">
                            <i class="ri-file-paper-2-line"></i> Lihat CV
                        </a>
                    @else
                        <p class="text-slate-400 italic">Belum ada CV</p>
                    @endif
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-slate-700 mb-2">Catatan Pelamar</h3>
                    <p class="text-slate-600 leading-relaxed whitespace-pre-line">
                        {{ $lamaran->catatan_perusahaan ?? 'Tidak ada catatan tambahan.' }}
                    </p>
                </div>
            </div>

        </div>

        {{-- Action Buttons --}}
        <div class="flex items-center gap-3 pb-6">

            <a href="{{ route('perusahaan.pelamar_masuk') }}"
                class="px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition">
                Kembali
            </a>

            @if($lamaran->status === 'pending')
                {{-- Button Terima --}}
                <button type="button"
                    class="btn-terima px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition"
                    data-form-id="form-terima">
                    Terima
                </button>
                <form id="form-terima" action="{{ route('perusahaan.pelamar_masuk.terima', $lamaran->id) }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>

                {{-- Button Tolak --}}
                <button type="button"
                    class="btn-tolak px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition"
                    data-form-id="form-tolak">
                    Tolak
                </button>
                <form id="form-tolak" action="{{ route('perusahaan.pelamar_masuk.tolak', $lamaran->id) }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
            @else
                {{-- Sudah diproses --}}
                <span class="px-4 py-2 text-sm font-medium rounded-lg
                    @if($lamaran->status === 'diterima') bg-green-50 text-green-800
                    @elseif($lamaran->status === 'ditolak') bg-red-50 text-red-800
                    @else bg-gray-100 text-gray-600
                    @endif">
                    Anda telah
                    @if($lamaran->status === 'diterima')
                        menerima
                    @elseif($lamaran->status === 'ditolak')
                        menolak
                    @endif
                    pelamar
                </span>
            @endif
        </div>

    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Terima
        document.querySelector('.btn-terima').addEventListener('click', function () {
            Swal.fire({
                title: 'Yakin ingin menerima pelamar ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: "#10b981",
                cancelButtonColor: "#6b7280",
                confirmButtonText: 'Ya, terima',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(this.dataset.formId).submit();
                }
            });
        });

        // Tolak
        document.querySelector('.btn-tolak').addEventListener('click', function () {
            Swal.fire({
                title: 'Yakin ingin menolak pelamar ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#ef4444",
                cancelButtonColor: "#6b7280",
                confirmButtonText: 'Ya, tolak',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(this.dataset.formId).submit();
                }
            });
        });
    });
</script>