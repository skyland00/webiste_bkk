@extends('admin.layout')

@section('title', 'Pengaturan Akun')

@section('content')
    <div class="w-full max-w-6xl pb-12 px-4">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-900 transition">Dashboard</a>
            <i class="ri-arrow-right-s-line text-xs"></i>
            <span class="text-slate-900">Pengaturan</span>
        </nav>

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 mb-2">Pengaturan Akun</h1>
            <p class="text-slate-600">Kelola keamanan akun admin Anda</p>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-lg flex items-start gap-3">
            <i class="ri-checkbox-circle-line text-emerald-600 text-xl flex-shrink-0 mt-0.5"></i>
            <div class="flex-1">
                <p class="text-sm font-medium text-emerald-900">Berhasil!</p>
                <p class="text-sm text-emerald-700 mt-0.5">{{ session('success') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800">
                <i class="ri-close-line text-xl"></i>
            </button>
        </div>
        @endif

        {{-- Alert Error --}}
        @if(session('error'))
        <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-lg flex items-start gap-3">
            <i class="ri-error-warning-line text-rose-600 text-xl flex-shrink-0 mt-0.5"></i>
            <div class="flex-1">
                <p class="text-sm font-medium text-rose-900">Gagal!</p>
                <p class="text-sm text-rose-700 mt-0.5">{{ session('error') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="text-rose-600 hover:text-rose-800">
                <i class="ri-close-line text-xl"></i>
            </button>
        </div>
        @endif

        {{-- Card: Ganti Password --}}
        <div class="bg-white rounded-lg border border-slate-200 shadow-sm w-full">
            
            <form action="{{ route('admin.pengaturan.password') }}" method="POST" class="p-7 space-y-8" id="passwordForm">
                @csrf
                @method('PUT')

                {{-- Header Section --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-4 pb-3 border-b">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center">
                            <i class="ri-lock-password-line text-blue-600 text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">Ganti Password</h2>
                            <p class="text-sm text-slate-600">Perbarui password Anda secara berkala untuk keamanan</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        {{-- Password Lama --}}
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-slate-700 mb-2">
                                Password Saat Ini <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-lock-line text-slate-400"></i>
                                </div>
                                <input type="password"
                                    name="current_password"
                                    id="current_password"
                                    class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('current_password') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="Masukkan password saat ini">
                            </div>
                            @error('current_password')
                                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password Baru --}}
                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                                Password Baru <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-key-line text-slate-400"></i>
                                </div>
                                <input type="password"
                                    name="password"
                                    id="password"
                                    class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('password') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="Minimal 8 karakter">
                            </div>
                            @error('password')
                                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">
                                Konfirmasi Password Baru <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-shield-check-line text-slate-400"></i>
                                </div>
                                <input type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all"
                                    placeholder="Masukkan ulang password baru">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-end gap-3 pt-6 border-t">
                    <button type="submit" id="submitBtn"
                        class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-medium rounded-lg shadow-sm flex items-center gap-2">
                        <i class="ri-save-line"></i>
                        Update Password
                    </button>
                </div>
            </form>
        </div>

        {{-- Info Box --}}
        <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <div class="flex items-start gap-3">
                <i class="ri-information-line text-blue-600 text-xl flex-shrink-0 mt-0.5"></i>
                <div>
                    <p class="text-sm font-medium text-blue-900 mb-1">Tips Keamanan Password</p>
                    <ul class="text-sm text-blue-700 space-y-1 list-disc list-inside">
                        <li>Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol</li>
                        <li>Minimal 8 karakter untuk password yang kuat</li>
                        <li>Jangan gunakan password yang sama dengan akun lain</li>
                        <li>Ganti password secara berkala setiap 3-6 bulan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('passwordForm').addEventListener('submit', function() {
                const btn = document.getElementById('submitBtn');
                btn.disabled = true;
                btn.innerHTML = '<i class="ri-loader-4-line animate-spin"></i> Memproses...';
                btn.classList.add('opacity-75');
            });
        </script>
    @endpush

@endsection