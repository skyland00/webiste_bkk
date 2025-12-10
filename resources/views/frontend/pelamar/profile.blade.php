{{-- /views/frontend/pelamar/profile.blade.php --}}

@extends('frontend.layout')

@section('title', 'Profile Saya')

@section('content')
    <div class="container mx-auto px-4 py-32">

        <div class="max-w-4xl mx-auto">

            <!-- Alert -->
            @if (session('success'))
                <div
                    class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-3">
                    <i class="ri-checkbox-circle-line text-xl"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-3">
                    <i class="ri-close-circle-line text-xl"></i>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Profile Card -->
            <div class="bg-white shadow-[0_4px_12px_rgba(0,0,0,0.06)] rounded-xl overflow-hidden">

                <!-- Banner Header -->
                <div class="bg-gradient-to-r from-[#122431] to-[#1b2f3f] p-8">
                    <div class="flex items-center gap-6">

                        <!-- Foto -->
                        <div class="flex-shrink-0">
                            @if ($pelamar->foto_profil)
                                <img src="{{ asset('storage/' . $pelamar->foto_profil) }}"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                            @else
                                <div
                                    class="w-32 h-32 bg-white/30 rounded-full flex items-center justify-center border-4 border-white">
                                    <i class="ri-user-line text-6xl text-white/70"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Nama & Email -->
                        <div class="text-white flex-1">
                            <h2 class="text-3xl font-bold mb-2">{{ $pelamar->nama_lengkap }}</h2>
                            <p class="flex items-center gap-2 text-gray-200">
                                <i class="ri-mail-line text-xl"></i>
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
                                <i class="ri-bank-card-line text-2xl text-blue-700"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">NISN</p>
                                <p class="font-semibold text-[#122431]">{{ $pelamar->nisn ?? '-' }}</p>
                            </div>
                        </div>

                        <!-- Tahun Lulus -->
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-graduation-cap-line text-2xl text-green-700"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Tahun Lulus</p>
                                <p class="font-semibold text-[#122431]">{{ $pelamar->tahun_lulus }}</p>
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-phone-line text-2xl text-purple-700"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">No. Telepon</p>
                                <p class="font-semibold text-[#122431]">{{ $pelamar->no_telp }}</p>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-shield-check-line text-2xl text-yellow-700"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Status Akun</p>
                                <span
                                    class="inline-block px-3 py-1 rounded-full text-sm font-medium
                                {{ $pelamar->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
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
                                        <div
                                            class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <i class="ri-file-text-line text-2xl text-red-700"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-[#122431]">Curriculum Vitae</p>
                                            <p class="text-sm {{ $pelamar->cv ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $pelamar->cv ? '✓ Tersedia' : '✗ Belum diupload' }}
                                            </p>
                                        </div>
                                    </div>

                                    @if ($pelamar->cv)
                                        <a href="{{ asset('storage/' . $pelamar->cv) }}" target="_blank"
                                            class="text-[#122431] font-medium hover:text-blue-600 text-sm flex items-center gap-1">
                                            <i class="ri-eye-line text-lg"></i>
                                            Lihat
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Foto -->
                            <div class="border border-gray-200 rounded-lg p-5 hover:border-[#122431] transition">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="ri-image-line text-2xl text-indigo-700"></i>
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
                            <i class="ri-edit-line text-xl"></i>
                            Edit Profile
                        </a>
                        <a href="{{ route('frontend.pelamar.riwayat_lamaran') }}"
                            class="flex-1 text-center bg-gray-200 hover:bg-gray-300 text-[#122431] py-3 px-6 rounded-lg font-semibold transition flex items-center justify-center gap-2">
                            <i class="ri-file-list-3-line text-xl"></i>
                            Riwayat Lamaran
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
