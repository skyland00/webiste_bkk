{{-- /views/frontend/pelamar/profile.blade.php --}}

@extends('frontend.layout')

@section('title', 'Profile Saya')

@section('content')
<div class="container mx-auto px-4 py-32">

    <div class="max-w-4xl mx-auto">

        <!-- Alert -->
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
        @endif

        <!-- Profile Card -->
        <div class="bg-white shadow-[0_4px_12px_rgba(0,0,0,0.06)] rounded-xl overflow-hidden">

            <!-- Banner Header -->
            <div class="bg-gradient-to-r from-[#122431] to-[#1b2f3f] p-8">
                <div class="flex items-center gap-6">

                    <!-- Foto -->
                    <div class="flex-shrink-0">
                        @if($pelamar->foto_profil)
                            <img src="{{ asset('storage/' . $pelamar->foto_profil) }}"
                                class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                        @else
                            <div class="w-32 h-32 bg-white/30 rounded-full flex items-center justify-center border-4 border-white">
                                <svg class="w-14 h-14 text-white/70" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Nama & Email -->
                    <div class="text-white flex-1">
                        <h2 class="text-3xl font-bold mb-2">{{ $pelamar->nama_lengkap }}</h2>
                        <p class="flex items-center gap-2 text-gray-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            {{ $pelamar->user->email }}
                        </p>
                    </div>

                </div>
            </div>

            <!-- Detail Content -->
            <div class="p-8">

                <h3 class="text-lg font-semibold text-[#122431] mb-6">Informasi Personal</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- NISN -->
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">NISN</p>
                            <p class="font-semibold text-[#122431]">{{ $pelamar->nisn ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Tahun Lulus -->
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Tahun Lulus</p>
                            <p class="font-semibold text-[#122431]">{{ $pelamar->tahun_lulus }}</p>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">No. Telepon</p>
                            <p class="font-semibold text-[#122431]">{{ $pelamar->no_telp }}</p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-yellow-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Status Akun</p>
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                                {{ $pelamar->status=='aktif'
                                    ? 'bg-green-100 text-green-800'
                                    : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($pelamar->status ?? 'aktif') }}
                            </span>
                        </div>
                    </div>

                </div>

                <!-- Dokumen -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-[#122431] mb-6">Dokumen</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- CV -->
                        <div class="border border-gray-200 rounded-lg p-5 hover:border-[#122431] transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#122431]">Curriculum Vitae</p>
                                        <p class="text-sm {{ $pelamar->cv ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $pelamar->cv ? '✓ Tersedia' : '✗ Belum diupload' }}
                                        </p>
                                    </div>
                                </div>

                                @if($pelamar->cv)
                                <a href="{{ asset('storage/'.$pelamar->cv) }}"
                                   target="_blank"
                                   class="text-[#122431] font-medium hover:text-blue-600 text-sm">
                                    Lihat
                                </a>
                                @endif
                            </div>
                        </div>

                        <!-- Foto -->
                        <div class="border border-gray-200 rounded-lg p-5 hover:border-[#122431] transition">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-indigo-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-[#122431]">Foto Profil</p>
                                    <p class="text-sm {{ $pelamar->foto_profil ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $pelamar->foto_profil ? '✓ Tersedia' : '✗ Belum diupload' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Button Aksi -->
                <div class="mt-8 flex gap-4">
                    <a href="{{ route('pelamar.profile.edit') }}"
                       class="flex-1 text-center bg-[#122431] hover:bg-[#0e1c28] text-white py-3 px-6 rounded-lg font-semibold transition flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Profile
                    </a>
                    <a href="{{ route('frontend.pelamar.riwayat_lamaran') }}"
                       class="flex-1 text-center bg-gray-200 hover:bg-gray-300 text-[#122431] py-3 px-6 rounded-lg font-semibold transition flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Riwayat Lamaran
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
