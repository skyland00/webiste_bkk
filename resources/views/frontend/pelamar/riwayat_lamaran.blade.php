{{-- /views/frontend/pelamar/riwayat_lamaran.blade.php --}}

@extends('frontend.layout')

@section('title', 'Dashboard Pelamar - BKK SMKN 1 Purwosari')

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 bg-gradient-to-b from-white via-[#F5F6F5] to-white overflow-hidden">

        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 left-0 w-full h-full"
                style="background-image: radial-gradient(circle at 2px 2px, #F8BE09 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <!-- Floating Blobs -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-[#F8BE09]/20 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-[#122431]/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>

        <div class="relative max-w-[1400px] mx-auto px-8 sm:px-16">

            <!-- Welcome Message -->
            <div class="mb-8">
                <h1 class="text-4xl md:text-6xl font-black text-[#122431] mb-4 leading-tight">
                    Halo,
                    <span class="relative inline-block">
                        <span class="relative z-10">{{ $pelamar->nama_lengkap }}</span>
                        <span class="absolute bottom-2 left-0 w-full h-4 bg-[#F8BE09] -rotate-1"></span>
                    </span>
                </h1>
                <p class="text-xl text-[#4B5057]">Kelola lamaran pekerjaan Anda di sini</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid md:grid-cols-4 gap-6">

                <!-- Total Lamaran -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5] hover:shadow-xl transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-[#122431]/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#122431]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-black text-[#122431] mb-1">{{ $totalLamaran }}</h3>
                    <p class="text-sm text-[#4B5057] font-semibold">Total Lamaran</p>
                </div>

                <!-- Pending -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5] hover:shadow-xl transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-yellow-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-black text-yellow-600 mb-1">{{ $totalPending }}</h3>
                    <p class="text-sm text-[#4B5057] font-semibold">Sedang Diproses</p>
                </div>

                <!-- Diterima -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5] hover:shadow-xl transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-black text-green-600 mb-1">{{ $totalDiterima }}</h3>
                    <p class="text-sm text-[#4B5057] font-semibold">Diterima</p>
                </div>

                <!-- Ditolak -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-[#F5F6F5] hover:shadow-xl transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-red-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-black text-red-600 mb-1">{{ $totalDitolak }}</h3>
                    <p class="text-sm text-[#4B5057] font-semibold">Ditolak</p>
                </div>

            </div>

        </div>
    </section>

    <!-- Alert Success -->
    @if(session('success'))
    <section class="py-4">
        <div class="max-w-[1400px] mx-auto px-8 sm:px-16">
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
        </div>
    </section>
    @endif

    <!-- Riwayat Lamaran -->
    <section class="py-12 bg-white">
        <div class="max-w-[1400px] mx-auto px-8 sm:px-16">

            <!-- Header & Filter -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-3xl font-black text-[#122431] mb-2">Riwayat Lamaran</h2>
                    <p class="text-[#4B5057]">Pantau status lamaran pekerjaan Anda</p>
                </div>

                <!-- Filter Status -->
                <div class="flex gap-2">
                    <button data-status="" class="filter-btn px-4 py-2 rounded-xl font-semibold transition-all text-sm {{ !$status ? 'bg-[#122431] text-white' : 'bg-white border-2 border-[#F5F6F5] text-[#4B5057] hover:border-[#122431]' }}">
                        Semua
                    </button>
                    <button data-status="pending" class="filter-btn px-4 py-2 rounded-xl font-semibold transition-all text-sm {{ $status === 'pending' ? 'bg-yellow-500 text-white' : 'bg-white border-2 border-[#F5F6F5] text-[#4B5057] hover:border-yellow-500' }}">
                        Pending
                    </button>
                    <button data-status="diterima" class="filter-btn px-4 py-2 rounded-xl font-semibold transition-all text-sm {{ $status === 'diterima' ? 'bg-green-500 text-white' : 'bg-white border-2 border-[#F5F6F5] text-[#4B5057] hover:border-green-500' }}">
                        Diterima
                    </button>
                    <button data-status="ditolak" class="filter-btn px-4 py-2 rounded-xl font-semibold transition-all text-sm {{ $status === 'ditolak' ? 'bg-red-500 text-white' : 'bg-white border-2 border-[#F5F6F5] text-[#4B5057] hover:border-red-500' }}">
                        Ditolak
                    </button>
                </div>
            </div>

            <!-- Loading Spinner -->
            <div id="loading-spinner" class="hidden text-center py-12">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-[#122431]"></div>
                <p class="text-[#4B5057] mt-4">Memuat data...</p>
            </div>

            <!-- Lamaran List -->
            <div id="lamaran-container">
                @include('frontend.partials.lamaran_list', ['lamaran' => $lamaran])
            </div>

            <!-- Pagination -->
            <div id="pagination-container">
                @if($lamaran->hasPages())
                <div class="flex justify-center mt-8">
                    <div class="inline-flex items-center gap-2 bg-white rounded-2xl p-2 shadow-lg border border-[#F5F6F5]">
                        {{ $lamaran->appends(['status' => $status])->links() }}
                    </div>
                </div>
                @endif
            </div>

        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const lamaranContainer = document.getElementById('lamaran-container');
            const paginationContainer = document.getElementById('pagination-container');
            const loadingSpinner = document.getElementById('loading-spinner');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();

                    const status = this.getAttribute('data-status');

                    // Update active button
                    filterBtns.forEach(b => {
                        b.classList.remove('bg-[#122431]', 'text-white', 'bg-yellow-500', 'bg-green-500', 'bg-red-500');
                        b.classList.add('bg-white', 'border-2', 'border-[#F5F6F5]', 'text-[#4B5057]');
                    });

                    if (status === '') {
                        this.classList.remove('bg-white', 'border-2', 'border-[#F5F6F5]', 'text-[#4B5057]');
                        this.classList.add('bg-[#122431]', 'text-white');
                    } else if (status === 'pending') {
                        this.classList.remove('bg-white', 'border-2', 'border-[#F5F6F5]', 'text-[#4B5057]');
                        this.classList.add('bg-yellow-500', 'text-white');
                    } else if (status === 'diterima') {
                        this.classList.remove('bg-white', 'border-2', 'border-[#F5F6F5]', 'text-[#4B5057]');
                        this.classList.add('bg-green-500', 'text-white');
                    } else if (status === 'ditolak') {
                        this.classList.remove('bg-white', 'border-2', 'border-[#F5F6F5]', 'text-[#4B5057]');
                        this.classList.add('bg-red-500', 'text-white');
                    }

                    // Show loading
                    loadingSpinner.classList.remove('hidden');
                    lamaranContainer.style.opacity = '0.5';

                    // AJAX request
                    const url = new URL(window.location.href);
                    url.searchParams.set('status', status);

                    fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Update content
                        lamaranContainer.innerHTML = data.html;
                        paginationContainer.innerHTML = data.pagination;

                        // Hide loading
                        loadingSpinner.classList.add('hidden');
                        lamaranContainer.style.opacity = '1';

                        // Update URL without reload
                        window.history.pushState({}, '', url);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        loadingSpinner.classList.add('hidden');
                        lamaranContainer.style.opacity = '1';
                    });
                });
            });
        });
    </script>
    @endpush
@endsection
