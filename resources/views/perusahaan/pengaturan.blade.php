@extends('perusahaan.layout')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="max-w-4xl">

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Pengaturan Akun</h1>
            <p class="text-sm text-slate-600 mt-1">Kelola keamanan dan akun Anda</p>
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

        <div class="space-y-6">

            {{-- Card 1: Ganti Password --}}
            <div class="bg-white rounded-lg border border-slate-200 shadow-sm">
                <div class="p-6 border-b border-slate-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                            <i class="ri-lock-password-line text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">Ganti Password</h2>
                            <p class="text-sm text-slate-600">Perbarui password Anda secara berkala</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('perusahaan.pengaturan.password') }}" method="POST">
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

            {{-- Card 2: Zona Berbahaya --}}
            <div class="bg-white rounded-lg border border-red-200 shadow-sm">
                <div class="p-6 border-b border-red-200 bg-red-50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                            <i class="ri-alert-line text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-red-900">Zona Berbahaya</h2>
                            <p class="text-sm text-red-700">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex-1">
                            <h3 class="text-base font-semibold text-slate-900 mb-1">
                                Hapus Akun Perusahaan
                            </h3>
                            <p class="text-sm text-slate-600">
                                Semua data perusahaan, lowongan, dan lamaran akan dihapus permanen. Tindakan ini tidak dapat dibatalkan.
                            </p>
                        </div>
                        <button type="button"
                            onclick="openDeleteModal()"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors flex items-center gap-2 whitespace-nowrap">
                            <i class="ri-delete-bin-line"></i>
                            Hapus Akun
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Modal Konfirmasi Hapus Akun --}}
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-md w-full shadow-xl">

        {{-- Header --}}
        <div class="p-6 border-b border-slate-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <i class="ri-error-warning-line text-red-600 text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Hapus Akun?</h3>
                    <p class="text-sm text-slate-600">Tindakan ini tidak dapat dibatalkan</p>
                </div>
            </div>
        </div>

        {{-- Body --}}
        <form action="{{ route('perusahaan.pengaturan.delete-account') }}" method="POST" id="deleteAccountForm">
            @csrf
            @method('DELETE')

            <div class="p-6 space-y-4">
                <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-sm text-red-800 font-medium mb-2">⚠️ Peringatan:</p>
                    <ul class="text-sm text-red-700 space-y-1 list-disc list-inside">
                        <li>Semua data perusahaan akan dihapus</li>
                        <li>Semua lowongan kerja akan dihapus</li>
                        <li>Data lamaran akan hilang permanen</li>
                        <li>Anda tidak dapat login lagi</li>
                    </ul>
                </div>

                <div>
                    <label for="delete_password" class="block text-sm font-medium text-slate-700 mb-2">
                        Masukkan Password untuk Konfirmasi <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-lock-line text-slate-400"></i>
                        </div>
                        <input type="password"
                            name="password"
                            id="delete_password"
                            required
                            class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            placeholder="Masukkan password Anda">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Footer --}}
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 rounded-b-lg flex items-center justify-end gap-3">
                <button type="button"
                    onclick="closeDeleteModal()"
                    class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors flex items-center gap-2">
                    <i class="ri-delete-bin-line"></i>
                    Ya, Hapus Akun
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openDeleteModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    document.getElementById('deleteAccountForm').reset();
}

// Close modal saat klik di luar
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

// Close modal dengan ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDeleteModal();
    }
});
</script>
@endsection
