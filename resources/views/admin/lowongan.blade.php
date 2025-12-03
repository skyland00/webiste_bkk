@extends('admin.layout')

@section('title', 'Semua Lowongan')

@section('content')
    <div class="space-y-8" x-data="lowonganData()" x-init="init()">

        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Semua Lowongan</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola lowongan pekerjaan dari semua perusahaan</p>
            </div>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total -->
            <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow transition">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                        <i class="ri-briefcase-line text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Total Lowongan</p>
                        <p class="text-3xl font-semibold text-slate-900">{{ $totalLowongan }}</p>
                        <p class="text-xs text-slate-400 mt-1">Semua status</p>
                    </div>
                </div>
            </div>

            <!-- Aktif -->
            <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow transition">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
                        <i class="ri-check-line text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Aktif</p>
                        <p class="text-3xl font-semibold text-slate-900">{{ $activeCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Nonaktif -->
            <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow transition">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center">
                        <i class="ri-close-circle-line text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Nonaktif</p>
                        <p class="text-3xl font-semibold text-slate-900">{{ $inactiveCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Content Wrapper -->
        <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
            <!-- Table header -->
            <div class="p-6 border-b bg-gradient-to-r from-slate-50 to-slate-100 border-slate-200">
                <div class="flex flex-col gap-4">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <!-- Search Bar -->
                        <div class="relative flex-1">
                            <input type="text" x-model="search" @input.debounce.500ms="fetchData()"
                                placeholder="Cari perusahaan, email, bidang..."
                                class="pl-10 pr-12 py-2.5 w-full border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>

                            <!-- Loading Indicator -->
                            <div x-show="loading" class="absolute right-3 top-1/2 -translate-y-1/2">
                                <i class="ri-loader-4-line animate-spin text-lg text-blue-500"></i>
                            </div>
                        </div>

                        <!-- Filter Status -->
                        <select x-model="statusFilter" @change="fetchData()"
                            class="px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white cursor-pointer">
                            <option value="all">Semua</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table Data AJAX -->
            <div id="table-content">
                @include('admin.partials.lowongan_table', ['lowongans' => $lowongans])
            </div>
        </div>

    </div>

    <script>
        function lowonganData() {
            return {
                search: '{{ $search }}',
                statusFilter: '{{ $statusFilter }}',
                init() {
                    document.addEventListener('click', (e) => {
                        if (e.target.closest('.pagination a')) {
                            e.preventDefault();
                            this.fetch(e.target.closest('a').href);
                        }
                    });
                },
                fetchData() {
                    const url = new URL('{{ route('admin.lowongan') }}');
                    url.searchParams.set('search', this.search);
                    url.searchParams.set('status', this.statusFilter);
                    this.fetch(url.toString());
                },
                async fetch(url) {
                    const response = await fetch(url + '&ajax=1');
                    const data = await response.json();
                    document.getElementById('table-content').innerHTML = data.html;
                    window.history.pushState({}, '', url);
                }
            }
        }
    </script>

@endsection