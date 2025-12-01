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
                    <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded">+12.5%</span>
                </div>
                <div>
                    <p class="text-sm text-slate-600 mb-1">Lowongan Aktif</p>
                    <p class="text-2xl font-semibold text-slate-900">156</p>
                    <p class="text-xs text-slate-500 mt-2">+18 dari bulan lalu</p>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center">
                        <i class="ri-building-line text-emerald-600 text-xl"></i>
                    </div>
                    <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded">+8.2%</span>
                </div>
                <div>
                    <p class="text-sm text-slate-600 mb-1">Perusahaan Mitra</p>
                    <p class="text-2xl font-semibold text-slate-900">89</p>
                    <p class="text-xs text-slate-500 mt-2">+7 perusahaan baru</p>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-violet-50 rounded-lg flex items-center justify-center">
                        <i class="ri-group-line text-violet-600 text-xl"></i>
                    </div>
                    <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded">+23.1%</span>
                </div>
                <div>
                    <p class="text-sm text-slate-600 mb-1">Total Siswa</p>
                    <p class="text-2xl font-semibold text-slate-900">1,234</p>
                    <p class="text-xs text-slate-500 mt-2">Siswa terdaftar aktif</p>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center">
                        <i class="ri-user-star-line text-amber-600 text-xl"></i>
                    </div>
                    <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded">+15.3%</span>
                </div>
                <div>
                    <p class="text-sm text-slate-600 mb-1">Siswa Diterima</p>
                    <p class="text-2xl font-semibold text-slate-900">342</p>
                    <p class="text-xs text-slate-500 mt-2">Bulan ini: 28 siswa</p>
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
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">
                            Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div
                            class="flex items-start gap-4 p-4 border border-slate-200 rounded-lg hover:border-slate-300 hover:shadow-sm transition-all cursor-pointer">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-code-s-slash-line text-white text-xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-slate-900 mb-1">Web Developer</h4>
                                <p class="text-sm text-slate-600 mb-2">PT. Digital Teknologi Indonesia</p>
                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                    <span class="flex items-center gap-1">
                                        <i class="ri-map-pin-line"></i>
                                        Jakarta
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="ri-wallet-line"></i>
                                        Rp 8-12 Juta
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="ri-time-line"></i>
                                        Full Time
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span
                                    class="inline-block px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded">Aktif</span>
                                <p class="text-xs text-slate-500 mt-2">2 hari lalu</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-4 p-4 border border-slate-200 rounded-lg hover:border-slate-300 hover:shadow-sm transition-all cursor-pointer">
                            <div class="w-12 h-12 bg-violet-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-palette-line text-white text-xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-slate-900 mb-1">UI/UX Designer</h4>
                                <p class="text-sm text-slate-600 mb-2">PT. Creative Studio Nusantara</p>
                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                    <span class="flex items-center gap-1">
                                        <i class="ri-map-pin-line"></i>
                                        Bandung
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="ri-wallet-line"></i>
                                        Rp 7-10 Juta
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="ri-time-line"></i>
                                        Full Time
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span
                                    class="inline-block px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded">Aktif</span>
                                <p class="text-xs text-slate-500 mt-2">3 hari lalu</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-4 p-4 border border-slate-200 rounded-lg hover:border-slate-300 hover:shadow-sm transition-all cursor-pointer">
                            <div class="w-12 h-12 bg-amber-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-megaphone-line text-white text-xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-slate-900 mb-1">Digital Marketing</h4>
                                <p class="text-sm text-slate-600 mb-2">CV. Maju Bersama Sejahtera</p>
                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                    <span class="flex items-center gap-1">
                                        <i class="ri-map-pin-line"></i>
                                        Surabaya
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="ri-wallet-line"></i>
                                        Rp 6-9 Juta
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="ri-time-line"></i>
                                        Full Time
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span
                                    class="inline-block px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded">Aktif</span>
                                <p class="text-xs text-slate-500 mt-2">5 hari lalu</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-4 p-4 border border-slate-200 rounded-lg hover:border-slate-300 hover:shadow-sm transition-all cursor-pointer">
                            <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-calculator-line text-white text-xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-slate-900 mb-1">Staff Accounting</h4>
                                <p class="text-sm text-slate-600 mb-2">PT. Mandiri Finansial Group</p>
                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                    <span class="flex items-center gap-1">
                                        <i class="ri-map-pin-line"></i>
                                        Jakarta
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="ri-wallet-line"></i>
                                        Rp 5-8 Juta
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="ri-time-line"></i>
                                        Full Time
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span
                                    class="inline-block px-2.5 py-1 bg-amber-50 text-amber-700 text-xs font-medium rounded">Review</span>
                                <p class="text-xs text-slate-500 mt-2">1 minggu lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Notifications -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-lg border border-slate-200 p-6">
                    <h3 class="text-base font-semibold text-slate-900 mb-4">Aksi Cepat</h3>
                    <div class="space-y-2">
                        <button
                            class="w-full flex items-center gap-3 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                            <i class="ri-add-line text-lg"></i>
                            <span>Tambah Lowongan</span>
                        </button>
                        <button
                            class="w-full flex items-center gap-3 px-4 py-3 border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                            <i class="ri-building-line text-lg"></i>
                            <span>Tambah Perusahaan</span>
                        </button>
                        <button
                            class="w-full flex items-center gap-3 px-4 py-3 border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                            <i class="ri-user-add-line text-lg"></i>
                            <span>Tambah Siswa</span>
                        </button>
                        <button
                            class="w-full flex items-center gap-3 px-4 py-3 border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                            <i class="ri-calendar-event-line text-lg"></i>
                            <span>Buat Event</span>
                        </button>
                    </div>
                </div>

                <!-- Recent Notifications -->
                <div class="bg-white rounded-lg border border-slate-200 p-6">
                    <h3 class="text-base font-semibold text-slate-900 mb-4">Notifikasi</h3>
                    <div class="space-y-3">
                        <div class="flex gap-3 p-3 bg-blue-50 border border-blue-100 rounded-lg">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-file-text-line text-white text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">15 lamaran baru</p>
                                <p class="text-xs text-slate-600">Menunggu review Anda</p>
                            </div>
                        </div>
                        <div class="flex gap-3 p-3 bg-amber-50 border border-amber-100 rounded-lg">
                            <div class="w-8 h-8 bg-amber-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-alert-line text-white text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">3 lowongan akan berakhir</p>
                                <p class="text-xs text-slate-600">Dalam 7 hari ke depan</p>
                            </div>
                        </div>
                        <div class="flex gap-3 p-3 bg-violet-50 border border-violet-100 rounded-lg">
                            <div class="w-8 h-8 bg-violet-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-calendar-line text-white text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Event Job Fair</p>
                                <p class="text-xs text-slate-600">24 November 2025</p>
                            </div>
                        </div>
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
                    <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">
                        Lihat Semua
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="text-left py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                Siswa</th>
                            <th class="text-left py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                Posisi</th>
                            <th class="text-left py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                Perusahaan</th>
                            <th class="text-left py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                Tanggal</th>
                            <th class="text-left py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                Status</th>
                            <th class="text-right py-3 px-6 text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Ahmad+Rizki&background=3b82f6&color=fff"
                                        alt="Siswa" class="w-9 h-9 rounded-full">
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">Ahmad Rizki</p>
                                        <p class="text-xs text-slate-500">XII RPL 1</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-slate-900">Web Developer</p>
                                <p class="text-xs text-slate-500">Full Time</p>
                            </td>
                            <td class="py-4 px-6 text-sm text-slate-700">PT. Digital Teknologi</td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-slate-700">18 Nov 2025</p>
                                <p class="text-xs text-slate-500">09:30 WIB</p>
                            </td>
                            <td class="py-4 px-6">
                                <span
                                    class="inline-flex items-center gap-1 px-2.5 py-1 bg-amber-50 text-amber-700 text-xs font-medium rounded">
                                    <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                    Review
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button
                                    class="text-slate-600 hover:text-slate-900 hover:bg-slate-100 p-2 rounded-lg transition-colors">
                                    <i class="ri-eye-line text-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=ec4899&color=fff"
                                        alt="Siswa" class="w-9 h-9 rounded-full">
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">Siti Nurhaliza</p>
                                        <p class="text-xs text-slate-500">XII DKV 2</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-slate-900">UI/UX Designer</p>
                                <p class="text-xs text-slate-500">Full Time</p>
                            </td>
                            <td class="py-4 px-6 text-sm text-slate-700">PT. Creative Studio</td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-slate-700">18 Nov 2025</p>
                                <p class="text-xs text-slate-500">08:15 WIB</p>
                            </td>
                            <td class="py-4 px-6">
                                <span
                                    class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                    Diterima
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button
                                    class="text-slate-600 hover:text-slate-900 hover:bg-slate-100 p-2 rounded-lg transition-colors">
                                    <i class="ri-eye-line text-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=10b981&color=fff"
                                        alt="Siswa" class="w-9 h-9 rounded-full">
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">Budi Santoso</p>
                                        <p class="text-xs text-slate-500">XII TKJ 1</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-slate-900">Digital Marketing</p>
                                <p class="text-xs text-slate-500">Full Time</p>
                            </td>
                            <td class="py-4 px-6 text-sm text-slate-700">CV. Maju Bersama</td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-slate-700">17 Nov 2025</p>
                                <p class="text-xs text-slate-500">14:20 WIB</p>
                            </td>
                            <td class="py-4 px-6">
                                <span
                                    class="inline-flex items-center gap-1 px-2.5 py-1 bg-blue-50 text-blue-700 text-xs font-medium rounded">
                                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                    Proses
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button
                                    class="text-slate-600 hover:text-slate-900 hover:bg-slate-100 p-2 rounded-lg transition-colors">
                                    <i class="ri-eye-line text-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Dewi+Kartika&background=8b5cf6&color=fff"
                                        alt="Siswa" class="w-9 h-9 rounded-full">
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">Dewi Kartika</p>
                                        <p class="text-xs text-slate-500">XII AKL 1</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-slate-900">Staff Accounting</p>
                                <p class="text-xs text-slate-500">Full Time</p>
                            </td>
                            <td class="py-4 px-6 text-sm text-slate-700">PT. Mandiri Finansial</td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-slate-700">16 Nov 2025</p>
                                <p class="text-xs text-slate-500">11:45 WIB</p>
                            </td>
                            <td class="py-4 px-6">
                                <span
                                    class="inline-flex items-center gap-1 px-2.5 py-1 bg-blue-50 text-blue-700 text-xs font-medium rounded">
                                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                    Proses
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button
                                    class="text-slate-600 hover:text-slate-900 hover:bg-slate-100 p-2 rounded-lg transition-colors">
                                    <i class="ri-eye-line text-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Eko+Prasetyo&background=f59e0b&color=fff"
                                        alt="Siswa" class="w-9 h-9 rounded-full">
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">Eko Prasetyo</p>
                                        <p class="text-xs text-slate-500">XII OTKP 2</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-slate-900">Admin Kantor</p>
                                <p class="text-xs text-slate-500">Full Time</p>
                            </td>
                            <td class="py-4 px-6 text-sm text-slate-700">CV. Sentosa Jaya</td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-slate-700">15 Nov 2025</p>
                                <p class="text-xs text-slate-500">16:00 WIB</p>
                            </td>
                            <td class="py-4 px-6">
                                <span
                                    class="inline-flex items-center gap-1 px-2.5 py-1 bg-red-50 text-red-700 text-xs font-medium rounded">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                                    Ditolak
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button
                                    class="text-slate-600 hover:text-slate-900 hover:bg-slate-100 p-2 rounded-lg transition-colors">
                                    <i class="ri-eye-line text-lg"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
