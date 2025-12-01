{{-- resources/views/perusahaan/dashboard.blade.php --}}
@extends('perusahaan.layout')

@section('content')

        <main class="flex-1 overflow-y-auto scrollbar-thin">

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

                <div class="bg-white rounded-lg border border-slate-200 p-7">
                    <div class="flex items-start justify-between mb-5">
                        <div class="w-14 h-14 bg-blue-50 rounded-lg flex items-center justify-center">
                            <i class="ri-briefcase-line text-blue-600 text-2xl"></i>
                        </div>
                        <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2.5 py-1.5 rounded">+4</span>
                    </div>
                    <p class="text-sm text-slate-600 mb-1.5">Lowongan Aktif</p>
                    <p class="text-3xl font-semibold text-slate-900">12</p>
                    <p class="text-xs text-slate-500 mt-2">Bulan ini kamu menambah 2 lowongan</p>
                </div>

                <div class="bg-white rounded-lg border border-slate-200 p-7">
                    <div class="flex items-start justify-between mb-5">
                        <div class="w-14 h-14 bg-violet-50 rounded-lg flex items-center justify-center">
                            <i class="ri-file-user-line text-violet-600 text-2xl"></i>
                        </div>
                        <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2.5 py-1.5 rounded">+12</span>
                    </div>
                    <p class="text-sm text-slate-600 mb-1.5">Pelamar Baru</p>
                    <p class="text-3xl font-semibold text-slate-900">47</p>
                    <p class="text-xs text-slate-500 mt-2">Dalam 7 hari terakhir</p>
                </div>

                <div class="bg-white rounded-lg border border-slate-200 p-7">
                    <div class="flex items-start justify-between mb-5">
                        <div class="w-14 h-14 bg-amber-50 rounded-lg flex items-center justify-center">
                            <i class="ri-time-line text-amber-600 text-2xl"></i>
                        </div>
                        <span class="text-xs font-medium text-amber-600 bg-amber-50 px-2.5 py-1.5 rounded">3</span>
                    </div>
                    <p class="text-sm text-slate-600 mb-1.5">Lowongan Mendekati Deadline</p>
                    <p class="text-3xl font-semibold text-slate-900">3</p>
                    <p class="text-xs text-slate-500 mt-2">Perlu diperpanjang</p>
                </div>

                <div class="bg-white rounded-lg border border-slate-200 p-7">
                    <div class="flex items-start justify-between mb-5">
                        <div class="w-14 h-14 bg-emerald-50 rounded-lg flex items-center justify-center">
                            <i class="ri-user-follow-line text-emerald-600 text-2xl"></i>
                        </div>
                        <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2.5 py-1.5 rounded">+8</span>
                    </div>
                    <p class="text-sm text-slate-600 mb-1.5">Siswa Diterima</p>
                    <p class="text-3xl font-semibold text-slate-900">19</p>
                    <p class="text-xs text-slate-500 mt-2">Bulan ini diterima 4 siswa</p>
                </div>

            </div>

            <!-- Recent Applications -->
            <div class="bg-white rounded-lg border border-slate-200">
                <div class="p-6 border-b border-slate-200 flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-semibold text-slate-900">Pelamar Terbaru</h3>
                        <p class="text-sm text-slate-500 mt-0.5">Update pelamar masuk</p>
                    </div>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">Lihat Semua</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="py-3 px-6 text-left text-xs font-semibold text-slate-700 uppercase">Pelamar</th>
                            <th class="py-3 px-6 text-left text-xs font-semibold text-slate-700 uppercase">Posisi</th>
                            <th class="py-3 px-6 text-left text-xs font-semibold text-slate-700 uppercase">Tanggal</th>
                            <th class="py-3 px-6 text-left text-xs font-semibold text-slate-700 uppercase">Status</th>
                            <th class="py-3 px-6 text-right text-xs font-semibold text-slate-700 uppercase">Aksi</th>
                        </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-200">
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Andi+Saputra&background=3b82f6&color=fff"
                                         class="w-9 h-9 rounded-full">
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">Andi Saputra</p>
                                        <p class="text-xs text-slate-500">andi@mail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-sm text-slate-700">Web Developer</td>
                            <td class="py-4 px-6 text-sm text-slate-700">18 Nov 2025</td>
                            <td class="py-4 px-6 text-sm">
                                <span class="px-2.5 py-1 bg-blue-50 text-blue-700 rounded text-xs">Baru</span>
                            </td>
                            <td class="py-4 px-6 text-right text-sm">
                                <button class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded text-xs">
                                    Lihat CV
                                </button>
                            </td>
                        </tr>

                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                        </tbody>

                    </table>
                </div>
            </div>

        </main>

@endsection
