@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <main class="flex-1 overflow-y-auto scrollbar-thin">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                        <i class="ri-briefcase-line text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div>
                    <p class="text-sm text-slate-600 mb-1">Lowongan Aktif</p>
                    <p class="text-2xl font-semibold text-slate-900">{{ $totalLowongan }}</p>
                    <p class="text-xs text-slate-500 mt-2">Lowongan yang sedang berjalan</p>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center">
                        <i class="ri-building-line text-emerald-600 text-xl"></i>
                    </div>
                </div>
                <div>
                    <p class="text-sm text-slate-600 mb-1">Perusahaan Mitra</p>
                    <p class="text-2xl font-semibold text-slate-900">{{ $totalPerusahaan }}</p>
                    <p class="text-xs text-slate-500 mt-2">Perusahaan terverifikasi</p>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-violet-50 rounded-lg flex items-center justify-center">
                        <i class="ri-group-line text-violet-600 text-xl"></i>
                    </div>
                </div>
                <div>
                    <p class="text-sm text-slate-600 mb-1">Total Siswa</p>
                    <p class="text-2xl font-semibold text-slate-900">{{ $totalSiswa }}</p>
                    <p class="text-xs text-slate-500 mt-2">Siswa terdaftar aktif</p>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center">
                        <i class="ri-user-star-line text-amber-600 text-xl"></i>
                    </div>
                </div>
                <div>
                    <p class="text-sm text-slate-600 mb-1">Siswa Diterima</p>
                    <p class="text-2xl font-semibold text-slate-900">{{ $siswaDiterima }}</p>
                    <p class="text-xs text-slate-500 mt-2">Total lamaran diterima</p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Recent Jobs -->
            <div class="lg:col-span-2 bg-white rounded-lg border border-slate-200">
                <div class="p-6 border-b border-slate-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-base font-semibold text-slate-900">Lowongan Terbaru</h3>
                            <p class="text-sm text-slate-500 mt-0.5">Peluang karir terbaik minggu ini</p>
                        </div>
                        <a href="{{ route('admin.lowongan') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700">
                            Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    @if($lowonganTerbaru->count() > 0)
                        <div class="space-y-4">
                            @foreach($lowonganTerbaru as $lowongan)
                                <div class="flex items-start gap-4 p-4 border border-slate-200 rounded-lg hover:border-slate-300 hover:shadow-sm transition-all cursor-pointer">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="ri-briefcase-line text-white text-xl"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-semibold text-slate-900 mb-1">{{ $lowongan->judul_lowongan }}</h4>
                                        <p class="text-sm text-slate-600 mb-2">{{ $lowongan->perusahaan->nama_perusahaan ?? 'Perusahaan' }}</p>
                                        <div class="flex items-center gap-3 text-xs text-slate-500">
                                            <span class="flex items-center gap-1">
                                                <i class="ri-map-pin-line"></i>
                                                {{ $lowongan->lokasi }}
                                            </span>
                                            @if($lowongan->gaji_min && $lowongan->gaji_max)
                                                <span class="flex items-center gap-1">
                                                    <i class="ri-wallet-line"></i>
                                                    Rp {{ number_format($lowongan->gaji_min / 1000000, 0) }}-{{ number_format($lowongan->gaji_max / 1000000, 0) }} Jt
                                                </span>
                                            @endif
                                            <span class="flex items-center gap-1 capitalize">
                                                <i class="ri-time-line"></i>
                                                {{ str_replace('-', ' ', $lowongan->tipe_pekerjaan) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="inline-block px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded capitalize">
                                            {{ $lowongan->status }}
                                        </span>
                                        <p class="text-xs text-slate-500 mt-2">{{ $lowongan->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12 text-slate-500">
                            <i class="ri-briefcase-line text-4xl mb-3 block"></i>
                            <p class="text-sm">Belum ada lowongan terbaru</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions & Notifications -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-lg border border-slate-200 p-6">
                    <h3 class="text-base font-semibold text-slate-900 mb-4">Aksi Cepat</h3>
                    <div class="space-y-2">
                        <a href="{{ route('admin.lowongan') }}"
                            class="w-full flex items-center gap-3 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                            <i class="ri-briefcase-line text-lg"></i>
                            <span>Kelola Lowongan</span>
                        </a>
                        <a href="{{ route('admin.perusahaan') }}"
                            class="w-full flex items-center gap-3 px-4 py-3 border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                            <i class="ri-building-line text-lg"></i>
                            <span>Kelola Perusahaan</span>
                        </a>
                        <a href="{{ route('admin.pelamar') }}"
                            class="w-full flex items-center gap-3 px-4 py-3 border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                            <i class="ri-group-line text-lg"></i>
                            <span>Kelola Siswa</span>
                        </a>
                        <a href="{{ route('admin.berita.index') }}"
                            class="w-full flex items-center gap-3 px-4 py-3 border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                            <i class="ri-newspaper-line text-lg"></i>
                            <span>Kelola Berita</span>
                        </a>
                    </div>
                </div>

                <!-- Recent Notifications -->
                <div class="bg-white rounded-lg border border-slate-200 p-6">
                    <h3 class="text-base font-semibold text-slate-900 mb-4">Notifikasi</h3>
                    <div class="space-y-3">
                        @if($lamaranMenunggu > 0)
                            <div class="flex gap-3 p-3 bg-blue-50 border border-blue-100 rounded-lg">
                                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="ri-file-text-line text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-slate-900">{{ $lamaranMenunggu }} lamaran baru</p>
                                    <p class="text-xs text-slate-600">Menunggu review Anda</p>
                                </div>
                            </div>
                        @endif

                        @if($lowonganBerakhir > 0)
                            <div class="flex gap-3 p-3 bg-amber-50 border border-amber-100 rounded-lg">
                                <div class="w-8 h-8 bg-amber-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="ri-alert-line text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-slate-900">{{ $lowonganBerakhir }} lowongan akan berakhir</p>
                                    <p class="text-xs text-slate-600">Dalam 7 hari ke depan</p>
                                </div>
                            </div>
                        @endif

                        @if($lamaranMenunggu == 0 && $lowonganBerakhir == 0)
                            <div class="flex gap-3 p-3 bg-emerald-50 border border-emerald-100 rounded-lg">
                                <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="ri-check-line text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-slate-900">Semua lancar!</p>
                                    <p class="text-xs text-slate-600">Tidak ada notifikasi penting</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Applications Table -->
        <div class="bg-white rounded-lg border border-slate-200">
            <div class="p-6 border-b border-slate-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-semibold text-slate-900">Lamaran Terbaru</h3>
                        <p class="text-sm text-slate-500 mt-0.5">Pantau status lamaran siswa secara real-time</p>
                    </div>
                    <a href="{{ route('admin.pelamar') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700">
                        Lihat Semua
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                @if($lamaranTerbaru->count() > 0)
                    <table class="w-full">
                        <thead class="bg-slate-50 border-b border-slate-200">
                            <tr>
                                <th class="text-left py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">Siswa</th>
                                <th class="text-left py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">Posisi</th>
                                <th class="text-left py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">Perusahaan</th>
                                <th class="text-left py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">Tanggal</th>
                                <th class="text-left py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">Status</th>
                                <th class="text-right py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach($lamaranTerbaru as $lamaran)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($lamaran->pelamar->nama_lengkap) }}&background=random&color=fff"
                                                alt="{{ $lamaran->pelamar->nama_lengkap }}" class="w-9 h-9 rounded-full">
                                            <div>
                                                <p class="text-sm font-medium text-slate-900">{{ $lamaran->pelamar->nama_lengkap }}</p>
                                                <p class="text-xs text-slate-500">{{ $lamaran->pelamar->nisn ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-sm text-slate-900">{{ $lamaran->lowongan->judul_lowongan }}</p>
                                        <p class="text-xs text-slate-500 capitalize">{{ str_replace('-', ' ', $lamaran->lowongan->tipe_pekerjaan) }}</p>
                                    </td>
                                    <td class="py-4 px-6 text-sm text-slate-700">{{ $lamaran->lowongan->perusahaan->nama_perusahaan ?? '-' }}</td>
                                    <td class="py-4 px-6">
                                        <p class="text-sm text-slate-700">{{ $lamaran->created_at->format('d M Y') }}</p>
                                        <p class="text-xs text-slate-500">{{ $lamaran->created_at->format('H:i') }} WIB</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($lamaran->status === 'menunggu')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-amber-50 text-amber-700 text-xs font-medium rounded">
                                                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                                Menunggu
                                            </span>
                                        @elseif($lamaran->status === 'diterima')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded">
                                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                                Diterima
                                            </span>
                                        @elseif($lamaran->status === 'ditolak')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-red-50 text-red-700 text-xs font-medium rounded">
                                                <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                                                Ditolak
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-blue-50 text-blue-700 text-xs font-medium rounded">
                                                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                                {{ ucfirst($lamaran->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="{{ route('admin.pelamar.show', $lamaran->id) }}"
                                            class="text-slate-600 hover:text-slate-900 hover:bg-slate-100 p-2 rounded-lg transition-colors inline-block">
                                            <i class="ri-eye-line text-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center py-12 text-slate-500">
                        <i class="ri-file-list-line text-4xl mb-3 block"></i>
                        <p class="text-sm">Belum ada lamaran masuk</p>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection