{{-- views/admin/pelamar.blade.php --}}

@extends('admin.layout')

@section('title', 'Data Pelamar')

@section('content')
    <div class="space-y-8">

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
                    <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center">
                        <i class="ri-file-list-line text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Total Lamaran</p>
                        <p class="text-3xl font-semibold text-slate-900">{{ $pelamar->total() }}</p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
                        <i class="ri-check-line text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Lamaran Diterima</p>
                        <p class="text-3xl font-semibold text-slate-900">
                            {{ \App\Models\LamaranModel::where('status', 'diterima')->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center">
                        <i class="ri-close-line text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Lamaran Ditolak</p>
                        <p class="text-3xl font-semibold text-slate-900">
                            {{ \App\Models\LamaranModel::where('status', 'ditolak')->count() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Wrapper -->
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

            <!-- Search -->
            <div class="p-6 border-b bg-slate-50 border-slate-200">
                <form action="{{ route('admin.pelamar') }}" method="GET" id="search-form">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="relative flex-1">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari nama, NISN, lowongan..."
                                class="pl-10 pr-12 py-2.5 w-full border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                        </div>

                        <div class="relative">
                            <select name="per_page" id="per-page-select"
                                class="appearance-none pl-4 pr-10 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm bg-white">
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 per halaman
                                </option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 per halaman
                                </option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 per halaman
                                </option>
                            </select>
                            <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        </div>

                        <button type="submit"
                            class="px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                            <i class="ri-search-line"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <!-- Table Content -->
            @if ($pelamar->count() > 0)
                <div id="table-content">
                    @include('admin.partials.pelamar_table', ['pelamar' => $pelamar])
                </div>
            @else
                <!-- Empty -->
                <div class="p-12 text-center text-slate-500">
                    <i class="ri-inbox-line text-5xl text-slate-300 mb-4"></i>
                    <p class="text-lg font-medium text-slate-700">Tidak Ada Data</p>
                    <p class="text-sm">Data lamaran masih kosong atau tidak ditemukan</p>
                </div>
            @endif

            <!-- Pagination -->
            @if ($pelamar->count() > 0)
                <div class="p-6 border-t border-slate-200 bg-slate-50">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <p class="text-sm text-slate-600">
                            Menampilkan <span class="font-semibold">{{ $pelamar->firstItem() }}</span> -
                            <span class="font-semibold">{{ $pelamar->lastItem() }}</span>
                            dari <span class="font-semibold">{{ $pelamar->total() }}</span> data
                        </p>

                        <div id="pagination-content">
                            @include('admin.partials.pelamar_pagination', ['pelamar' => $pelamar])
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const perPageSelect = document.getElementById('per-page-select');
            const searchInput = document.querySelector('input[name="search"]');
            const searchForm = document.getElementById('search-form');

            // Handle perubahan per_page
            perPageSelect.addEventListener('change', function() {
                loadData();
            });

            // Handle form submit untuk search
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                loadData();
            });

            // Handle pagination links
            document.addEventListener('click', function(e) {
                if (e.target.closest('.pagination a')) {
                    e.preventDefault();
                    const url = e.target.closest('.pagination a').href;
                    loadData(url);
                }
            });

            function loadData(url = null) {
                const searchValue = searchInput.value;
                const perPageValue = perPageSelect.value;

                // Buat URL dengan parameter
                const baseUrl = url || '{{ route('admin.pelamar') }}';
                const params = new URLSearchParams();

                if (searchValue) params.append('search', searchValue);
                params.append('per_page', perPageValue);

                // Parse existing page param jika ada
                if (url) {
                    const urlObj = new URL(url);
                    const page = urlObj.searchParams.get('page');
                    if (page) params.append('page', page);
                }

                const finalUrl = `${baseUrl.split('?')[0]}?${params.toString()}`;

                // Fetch data
                fetch(finalUrl, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        // Parse HTML response
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');

                        // Update table content
                        const newTableContent = doc.querySelector('#table-content');
                        const currentTableContent = document.querySelector('#table-content');
                        if (newTableContent && currentTableContent) {
                            currentTableContent.innerHTML = newTableContent.innerHTML;
                        }

                        // Update pagination
                        const newPagination = doc.querySelector('#pagination-content');
                        const currentPagination = document.querySelector('#pagination-content');
                        if (newPagination && currentPagination) {
                            currentPagination.innerHTML = newPagination.innerHTML;
                        }

                        // Update info text
                        const newInfo = doc.querySelector('.text-sm.text-slate-600');
                        const currentInfo = document.querySelector('.text-sm.text-slate-600');
                        if (newInfo && currentInfo) {
                            currentInfo.innerHTML = newInfo.innerHTML;
                        }

                        // Update URL without reload
                        window.history.pushState({}, '', finalUrl);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    </script>
@endsection
