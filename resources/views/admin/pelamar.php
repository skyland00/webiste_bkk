@extends('admin.layout')

@section('title', 'Data Pelamar')

@section('content')
    <div class="space-y-8" x-data="pelamarData()" x-init="init()">

        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Data Pelamar</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola seluruh pelamar yang terdaftar</p>
            </div>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                        <i class="ri-user-line text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Total Pelamar</p>
                        <p class="text-3xl font-semibold text-slate-900">{{ $totalPelamar }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Wrapper -->
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
            
            <!-- Search -->
            <div class="p-6 border-b bg-slate-50 border-slate-200">
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-1">
                        <input type="text" x-model="search" @input.debounce.500ms="fetchData()"
                            placeholder="Cari nama, NISN, tahun lulus..."
                            class="pl-10 pr-12 py-2.5 w-full border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm">
                        <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    </div>

                    <div class="relative">
                        <select x-model="perPage" @change="fetchData()"
                            class="pl-4 pr-10 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm bg-white">
                            <option value="10">10 per halaman</option>
                            <option value="25">25 per halaman</option>
                            <option value="50">50 per halaman</option>
                        </select>
                        <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="relative" x-show="!loading || total > 0">
                <div x-show="loading"
                    class="absolute inset-0 bg-white/50 backdrop-blur-sm z-10 flex items-center justify-center">
                    <i class="ri-loader-4-line animate-spin text-4xl text-blue-600"></i>
                </div>

                <div id="table-content">
                    @include('admin.pelamar.table', ['pelamar' => $pelamar])
                </div>
            </div>

            <!-- Empty -->
            <div x-show="!loading && total === 0" class="p-12 text-center text-slate-500">
                <p class="text-lg font-medium text-slate-700">Tidak Ada Data</p>
                <p class="text-sm">Data pelamar masih kosong atau tidak ditemukan</p>
            </div>

            <!-- Pagination -->
            <div x-show="total > 0" class="p-6 border-t border-slate-200 bg-slate-50">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-slate-600">
                        Menampilkan <span class="font-semibold" x-text="from"></span> -
                        <span class="font-semibold" x-text="to"></span>
                        dari <span class="font-semibold" x-text="total"></span> data
                    </p>

                    <div id="pagination-content">
                        @include('admin.pelamar.paginate', ['pelamar' => $pelamar])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
