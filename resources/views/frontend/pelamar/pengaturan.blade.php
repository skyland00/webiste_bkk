{{-- /views/frontend/pelamar/pengaturan.blade.php --}}

@extends('frontend.layout')

@section('title', 'Pengaturan Akun')

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

            <!-- Settings Card -->
            <div class="bg-white shadow-[0_4px_12px_rgba(0,0,0,0.06)] rounded-xl overflow-hidden">

                <!-- Banner Header -->
                <div class="bg-gradient-to-r from-[#122431] to-[#1b2f3f] p-8">
                    <div class="flex items-center gap-4">
                        <div class="text-white flex-1">
                            <h1 class="text-3xl font-bold mb-2">Pengaturan Akun</h1>
                            <p class="text-gray-200">Kelola keamanan dan pengaturan akun Anda</p>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8">

                    <!-- SECTION 1: UBAH PASSWORD -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-[#122431] mb-6">Keamanan Akun</h3>

                        <div class="border border-gray-200 rounded-lg p-6 hover:border-[#122431] transition">
                            <div class="flex items-start gap-4 mb-6">
                                <div
                                    class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="ri-lock-password-line text-2xl text-blue-700"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[#122431] text-lg mb-1">Ubah Password</h4>
                                    <p class="text-sm text-gray-600">Perbarui password untuk keamanan akun Anda</p>
                                </div>
                            </div>

                            <form action="{{ route('pelamar.pengaturan.update-password') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Password Lama -->
                                <div class="mb-5">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Password Lama <span class="text-red-500">*</span>
                                    </label>
                                    <input type="password" name="current_password" required
                                        placeholder="Masukkan password lama"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#122431] focus:border-[#122431] transition">
                                    @error('current_password')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Password Baru -->
                                <div class="mb-5">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Password Baru <span class="text-red-500">*</span>
                                    </label>
                                    <input type="password" name="new_password" required placeholder="Minimal 8 karakter"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#122431] focus:border-[#122431] transition">
                                    @error('new_password')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <p class="text-xs text-gray-500 mt-2">Password minimal 8 karakter</p>
                                </div>

                                <!-- Konfirmasi Password Baru -->
                                <div class="mb-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Konfirmasi Password Baru <span class="text-red-500">*</span>
                                    </label>
                                    <input type="password" name="new_password_confirmation" required
                                        placeholder="Ketik ulang password baru"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#122431] focus:border-[#122431] transition">
                                </div>

                                <button type="submit"
                                    class="w-full bg-[#122431] hover:bg-[#0e1c28] text-white py-3 px-6 rounded-lg font-semibold transition flex items-center justify-center gap-2">
                                    <i class="ri-check-line text-xl"></i>
                                    Simpan Password Baru
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- SECTION 2: ZONA BERBAHAYA -->
                    <div class="pt-8 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-[#122431] mb-6">Zona Berbahaya</h3>

                        <div class="border-2 border-red-200 rounded-lg p-6 bg-red-50">
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="ri-alert-line text-2xl text-red-700"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-red-900 text-lg mb-1">Hapus Akun Permanen</h4>
                                    <p class="text-sm text-gray-700">Tindakan ini tidak dapat dibatalkan</p>
                                </div>
                            </div>

                            <p class="text-sm text-gray-700 mb-4 leading-relaxed">
                                Menghapus akun akan <strong>menghilangkan semua data Anda secara permanen</strong>,
                                termasuk:
                            </p>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                <div class="flex items-start gap-2">
                                    <i class="ri-close-line text-xl text-red-600 flex-shrink-0 mt-0.5"></i>
                                    <span class="text-sm text-gray-700">Informasi profil dan dokumen</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i class="ri-close-line text-xl text-red-600 flex-shrink-0 mt-0.5"></i>
                                    <span class="text-sm text-gray-700">Riwayat lamaran</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i class="ri-close-line text-xl text-red-600 flex-shrink-0 mt-0.5"></i>
                                    <span class="text-sm text-gray-700">Akses ke sistem BKK</span>
                                </div>
                            </div>

                            <div class="bg-red-100 border border-red-300 rounded-lg p-4 mb-6">
                                <p class="text-sm text-red-800 font-medium flex items-center gap-2">
                                    <i class="ri-error-warning-line text-xl"></i>
                                    Tindakan ini TIDAK DAPAT DIBATALKAN!
                                </p>
                            </div>

                            <button type="button" onclick="openDeleteModal()"
                                class="w-full px-5 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold transition flex items-center justify-center gap-2">
                                <i class="ri-delete-bin-line text-xl"></i>
                                Hapus Akun Saya Selamanya
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- MODAL KONFIRMASI HAPUS AKUN -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl max-w-md w-full p-6 shadow-2xl">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="ri-alert-line text-4xl text-red-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Hapus Akun</h3>
                <p class="text-gray-600 text-sm">
                    Untuk melanjutkan penghapusan akun, masukkan password Anda sebagai konfirmasi.
                </p>
            </div>

            <form id="deleteAccountForm" action="{{ route('pelamar.pengaturan.delete-account') }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password Anda</label>
                    <input type="password" name="password" id="passwordInput" required placeholder="Masukkan password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    <p class="text-xs text-gray-500 mt-2">Masukkan password untuk memverifikasi identitas Anda</p>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="closeDeleteModal()"
                        class="flex-1 px-4 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg font-semibold transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold transition">
                        Ya, Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('passwordInput').focus();
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('passwordInput').value = '';
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeDeleteModal();
            }
        });
    </script>
@endsection
