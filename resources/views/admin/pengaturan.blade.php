@extends('admin.layout')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="max-w-4xl">

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Pengaturan Akun</h1>
            <p class="text-sm text-slate-600 mt-1">Kelola keamanan akun admin Anda</p>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-start gap-3">
            <i class="ri-checkbox-circle-line text-green-600 text-xl flex-shrink-0 mt-0.5"></i>
            <div class="flex-1">
                <p class="text-sm font-medium text-green-900">Berhasil!</p>
                <p class="text-sm text-green-700 mt-0.5">{{ session('success') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">
                <i class="ri-close-line text-xl"></i>
            </button>
        </div>
        @endif

        {{-- Alert Error --}}
        @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg flex items-start gap-3">
            <i class="ri-error-warning-line text-red-600 text-xl flex-shrink-0 mt-0.5"></i>
            <div class="flex-1">
                <p class="text-sm font-medium text-red-900">Gagal!</p>
                <p class="text-sm text-red-700 mt-0.5">{{ session('error') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800">
                <i class="ri-close-line text-xl"></i>
            </button>
        </div>
        @endif

        <div class="space-y-6">

            {{-- Card: Ganti Password --}}
            <div class="bg-white rounded-lg border border-slate-200 shadow-sm">
                <div class="p-6 border-b border-slate-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                            <i class="ri-lock-password-line text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">Ganti Password</h2>
                            <p class="text-sm text-slate-600">Perbarui password Anda secara berkala untuk keamanan</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.pengaturan.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="p-6 space-y-5">

                        {{-- Password Lama --}}
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-slate-700 mb-2">
                                Password Saat Ini <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-lock-line text-slate-400"></i>
                                </div>
                                <input type="password"
                                    name="current_password"
                                    id="current_password"
                                    class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('current_password') border-red-500 @enderror"
                                    placeholder="Masukkan password saat ini">
                            </div>
                            @error('current_password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password Baru --}}
                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                                Password Baru <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-key-line text-slate-400"></i>
                                </div>
                                <input type="password"
                                    name="password"
                                    id="password"
                                    class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror"
                                    placeholder="Minimal 8 karakter">
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">
                                Konfirmasi Password Baru <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-shield-check-line text-slate-400"></i>
                                </div>
                                <input type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan ulang password baru">
                            </div>
                        </div>

                    </div>

                    {{-- Footer Actions --}}
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 rounded-b-lg flex items-center justify-end">
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                            <i class="ri-save-line"></i>
                            Update Password
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
