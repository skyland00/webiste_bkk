<!-- views/admin/lowongan.blade.php -->
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

        <!-- Table Wrapper -->
        <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
            <!-- Header dengan Search dan Filter -->
            <div class="p-6 border-b bg-gradient-to-r from-slate-50 to-slate-100 border-slate-200">
                <div class="flex flex-col gap-4">
                    <!-- Title dan Filter Status -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">Daftar Lowongan</h2>
                            <p class="text-sm text-slate-500">Menampilkan <span x-text="total"></span> lowongan</p>
                        </div>

                        <!-- Filter Status Tabs -->
                        <div class="flex flex-wrap gap-2">
                            <button @click="setStatus('all')"
                                :class="statusFilter === 'all' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-700 border-slate-300 hover:bg-slate-50'"
                                class="px-4 py-2 rounded-lg border font-medium text-sm transition flex items-center gap-2 cursor-pointer">
                                <i class="ri-briefcase-line"></i>
                                <span>Semua</span>
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold"
                                    :class="statusFilter === 'all' ? 'bg-blue-500' : 'bg-slate-200'">
                                    {{ $activeCount + $inactiveCount }}
                                </span>
                            </button>

                            <button @click="setStatus('aktif')"
                                :class="statusFilter === 'aktif' ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-white text-slate-700 border-slate-300 hover:bg-slate-50'"
                                class="px-4 py-2 rounded-lg border font-medium text-sm transition flex items-center gap-2 cursor-pointer">
                                <i class="ri-checkbox-circle-line"></i>
                                <span>Aktif</span>
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold"
                                    :class="statusFilter === 'aktif' ? 'bg-emerald-500' : 'bg-slate-200'">
                                    {{ $activeCount }}
                                </span>
                            </button>

                            <button @click="setStatus('nonaktif')"
                                :class="statusFilter === 'nonaktif' ? 'bg-red-600 text-white border-red-600' : 'bg-white text-slate-700 border-slate-300 hover:bg-slate-50'"
                                class="px-4 py-2 rounded-lg border font-medium text-sm transition flex items-center gap-2 cursor-pointer">
                                <i class="ri-close-circle-line"></i>
                                <span>Nonaktif</span>
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold"
                                    :class="statusFilter === 'nonaktif' ? 'bg-red-500' : 'bg-slate-200'">
                                    {{ $inactiveCount }}
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Search and Per Page -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <!-- Search Bar -->
                        <div class="relative flex-1">
                            <input type="text" x-model="search" @input.debounce.500ms="fetchData()"
                                placeholder="Cari lowongan, perusahaan, lokasi..."
                                class="pl-10 pr-12 py-2.5 w-full border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>

                            <!-- Loading Indicator -->
                            <div x-show="loading" class="absolute right-3 top-1/2 -translate-y-1/2">
                                <i class="ri-loader-4-line animate-spin text-lg text-blue-500"></i>
                            </div>
                        </div>

                        <!-- Per Page Dropdown -->
                        <div class="relative">
                            <select x-model="perPage" @change="fetchData()"
                                class="pl-4 pr-10 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white appearance-none cursor-pointer w-full sm:w-auto">
                                <option value="10">10 per halaman</option>
                                <option value="15">15 per halaman</option>
                                <option value="25">25 per halaman</option>
                                <option value="50">50 per halaman</option>
                                <option value="100">100 per halaman</option>
                            </select>
                            <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg pointer-events-none"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div x-show="!loading || total > 0" class="relative">
                <!-- Loading Overlay -->
                <div x-show="loading"
                    class="absolute inset-0 bg-white/50 backdrop-blur-sm z-10 flex items-center justify-center">
                    <div class="text-center">
                        <i class="ri-loader-4-line animate-spin text-5xl text-blue-500 block mb-3"></i>
                        <p class="text-sm text-slate-600">Memuat data...</p>
                    </div>
                </div>

                <div id="table-content">
                    @include('admin.partials.lowongan_table', ['lowongans' => $lowongans])
                </div>
            </div>

            <!-- Empty State -->
            <div x-show="!loading && total === 0" class="p-12 text-center text-slate-500">
                <div class="mx-auto w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center mb-4">
                    <i class="ri-briefcase-line text-4xl text-slate-400"></i>
                </div>
                <p class="text-lg font-medium text-slate-700 mb-1">
                    <span x-show="search || statusFilter !== 'all'">Tidak Ada Hasil</span>
                    <span x-show="!search && statusFilter === 'all'">Belum Ada Lowongan</span>
                </p>
                <p class="text-sm text-slate-500">
                    <span x-show="search || statusFilter !== 'all'">Coba kata kunci lain atau ubah filter</span>
                    <span x-show="!search && statusFilter === 'all'">Data lowongan masih kosong.</span>
                </p>
            </div>

            <!-- Pagination -->
            <div x-show="total > 0" class="p-6 border-t border-slate-200 bg-slate-50">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <!-- Info -->
                    <div class="text-sm text-slate-600">
                        Menampilkan
                        <span class="font-semibold text-slate-900" x-text="from"></span>
                        sampai
                        <span class="font-semibold text-slate-900" x-text="to"></span>
                        dari
                        <span class="font-semibold text-slate-900" x-text="total"></span>
                        data
                    </div>

                    <!-- Pagination Links -->
                    <div id="pagination-content">
                        @include('admin.partials.lowongan_pagination', ['lowongans' => $lowongans])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function lowonganData() {
            return {
                search: '{{ $search }}',
                perPage: {{ $perPage ?? 10 }},
                statusFilter: '{{ $statusFilter }}',
                loading: false,
                total: {{ $lowongans->total() }},
                from: {{ $lowongans->firstItem() ?? 0 }},
                to: {{ $lowongans->lastItem() ?? 0 }},

                init() {
                    // Handle pagination clicks
                    document.addEventListener('click', (e) => {
                        if (e.target.closest('.pagination a')) {
                            e.preventDefault();
                            const url = e.target.closest('a').href;
                            this.fetchDataFromUrl(url);
                        }
                    });
                },

                setStatus(status) {
                    this.statusFilter = status;
                    this.fetchData();
                },

                fetchData(page = 1) {
                    const url = new URL('{{ route('admin.lowongan') }}');
                    url.searchParams.set('search', this.search);
                    url.searchParams.set('per_page', this.perPage);
                    url.searchParams.set('status', this.statusFilter);
                    url.searchParams.set('page', page);
                    this.fetchDataFromUrl(url.toString());
                },

                async fetchDataFromUrl(url) {
                    this.loading = true;

                    try {
                        const response = await fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            }
                        });

                        const data = await response.json();

                        document.getElementById('table-content').innerHTML = data.html;
                        document.getElementById('pagination-content').innerHTML = data.pagination;

                        this.total = data.total;
                        this.from = data.from || 0;
                        this.to = data.to || 0;

                        // Update URL without reload
                        window.history.pushState({}, '', url);
                    } catch (error) {
                        console.error('Error fetching data:', error);
                    } finally {
                        this.loading = false;
                    }
                }
            }
        }
    </script>
@endsection