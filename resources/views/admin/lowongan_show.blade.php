@extends('admin.layout')

@section('title', 'Detail Lowongan')

@section('content')
    <div class="w-full max-w-6xl pb-12 px-4">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-900 transition">Dashboard</a>
            <i class="ri-arrow-right-s-line text-xs"></i>
            <a href="{{ route('admin.lowongan') }}" class="hover:text-slate-900 transition">Lowongan</a>
            <i class="ri-arrow-right-s-line text-xs"></i>
            <span class="text-slate-900">Detail Lowongan</span>
        </nav>

        {{-- Header --}}
        <div class="mb-8 flex items-start justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900 mb-2">Detail Lowongan</h1>
                <p class="text-slate-600">Informasi lengkap lowongan pekerjaan</p>
            </div>
            
            {{-- Status Badge --}}
            <div>
                @if ($lowongan->status === 'aktif')
                    <span class="px-4 py-2 text-sm font-medium bg-emerald-100 text-emerald-700 rounded-lg inline-flex items-center gap-2">
                        <i class="ri-checkbox-circle-line"></i>
                        Aktif
                    </span>
                @else
                    <span class="px-4 py-2 text-sm font-medium bg-red-100 text-red-700 rounded-lg inline-flex items-center gap-2">
                        <i class="ri-close-circle-line"></i>
                        Nonaktif
                    </span>
                @endif
            </div>
        </div>

        {{-- Detail Card --}}
        <div class="bg-white rounded-lg border border-slate-200 shadow-sm w-full">
            <div class="p-7 space-y-8">

                {{-- Informasi Dasar --}}
                <div class="space-y-6">
                    <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Informasi Dasar</h2>

                    <div class="space-y-5">
                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Judul Lowongan
                            </label>
                            <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                {{ $lowongan->judul_lowongan }}
                            </div>
                        </div>

                        {{-- Bidang --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Bidang
                            </label>
                            <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                {{ $lowongan->bidang }}
                            </div>
                        </div>

                        {{-- Grid 2 --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Tipe Pekerjaan
                                </label>
                                <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 capitalize">
                                    {{ str_replace('-', ' ', $lowongan->tipe_pekerjaan) }}
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Jumlah Dibutuhkan
                                </label>
                                <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                    {{ $lowongan->jumlah_orang }} Orang
                                </div>
                            </div>
                        </div>

                        {{-- Lokasi --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Lokasi
                            </label>
                            <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                {{ $lowongan->lokasi }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Informasi Perusahaan --}}
                <div class="space-y-6">
                    <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Informasi Perusahaan</h2>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Nama Perusahaan
                            </label>
                            <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                {{ $lowongan->perusahaan->nama_perusahaan ?? '-' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kompensasi & Periode --}}
                <div class="space-y-6">
                    <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Kompensasi & Periode</h2>

                    <div class="space-y-5">
                        {{-- Gaji --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Range Gaji
                            </label>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                    Min: {{ $lowongan->gaji_min ? 'Rp ' . number_format($lowongan->gaji_min, 0, ',', '.') : 'Tidak disebutkan' }}
                                </div>
                                <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                    Max: {{ $lowongan->gaji_max ? 'Rp ' . number_format($lowongan->gaji_max, 0, ',', '.') : 'Tidak disebutkan' }}
                                </div>
                            </div>
                        </div>

                        {{-- Tanggal --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Tanggal Buka
                                </label>
                                <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                    {{ $lowongan->tanggal_buka->format('d M Y') }}
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Tanggal Tutup
                                </label>
                                <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                    {{ $lowongan->tanggal_tutup->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Detail Lowongan --}}
                <div class="space-y-6">
                    <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Detail Lowongan</h2>

                    <div class="space-y-5">
                        {{-- Deskripsi --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Deskripsi Pekerjaan
                            </label>
                            <div class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 whitespace-pre-wrap">{{ $lowongan->deskripsi_pekerjaan }}</div>
                        </div>

                        {{-- Kualifikasi --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Kualifikasi
                            </label>
                            <div class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 whitespace-pre-wrap">{{ $lowongan->kualifikasi }}</div>
                        </div>
                    </div>
                </div>

                {{-- Metadata --}}
                <div class="space-y-6">
                    <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Informasi Tambahan</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Dibuat Pada
                            </label>
                            <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                {{ $lowongan->created_at->format('d M Y, H:i') }} WIB
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Terakhir Diupdate
                            </label>
                            <div class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900">
                                {{ $lowongan->updated_at->format('d M Y, H:i') }} WIB
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-between pt-6 border-t">
                    <a href="{{ route('admin.lowongan') }}"
                        class="px-6 py-2.5 text-slate-600 hover:text-slate-900 font-medium inline-flex items-center gap-2">
                        <i class="ri-arrow-left-line"></i>
                        Kembali
                    </a>
                    
                    <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete()"
                            class="px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm inline-flex items-center gap-2">
                            <i class="ri-delete-bin-line"></i>
                            Hapus Lowongan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmDelete() {
            Swal.fire({
                title: "Hapus lowongan ini?",
                text: "Data tidak akan bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ef4444",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Batal",
                showClass: { popup: 'swal-zoom-in' },
                hideClass: { popup: 'swal-zoom-out' },
            }).then(result => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                }
            });
        }
    </script>
    @endpush

@endsection