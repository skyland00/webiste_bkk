<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Hide browser's default password reveal button */
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none;
        }
        input[type="password"]::-webkit-contacts-auto-fill-button,
        input[type="password"]::-webkit-credentials-auto-fill-button {
            visibility: hidden;
            pointer-events: none;
            position: absolute;
            right: 0;
        }
    </style>
</head>

<body
    class="bg-gradient-to-br from-slate-50 via-blue-50 to-slate-100 min-h-screen flex items-center justify-center px-4 py-8">

    <div x-data="{ role: '{{ old('role', 'pelamar') }}' }" class="w-full max-w-2xl bg-white shadow-xl rounded-2xl p-10 border border-gray-200">

        <!-- Header -->
        <div class="mb-8 flex items-center gap-4">
            <div class="w-16 h-16 flex items-center justify-center flex-shrink-0">
                <img src="{{ asset('img/logo_bkk.png') }}" alt="Logo BKK" class="w-16 h-16 object-contain">
            </div>

            <div class="flex-1">
                <h1 class="text-2xl font-bold text-slate-800 mb-1">
                    Buat Akun Baru
                </h1>
                <p class="text-slate-600 text-sm font-medium">
                    Sistem Informasi BKK
                </p>
            </div>
        </div>

        <!-- Switch Role -->
        <div class="flex mb-8 bg-slate-100 rounded-xl p-1">
            <button @click="role = 'pelamar'" :class="role === 'pelamar' ? 'bg-blue-600 text-white' : 'text-slate-600'"
                class="w-1/2 py-2.5 rounded-lg font-semibold transition">
                Pelamar / Alumni
            </button>

            <button @click="role = 'perusahaan'"
                :class="role === 'perusahaan' ? 'bg-emerald-600 text-white' : 'text-slate-600'"
                class="w-1/2 py-2.5 rounded-lg font-semibold transition">
                Perusahaan
            </button>
        </div>

        <!-- FORM PELAMAR -->
        <form x-show="role === 'pelamar'" x-transition action="{{ route('register.pelamar') }}" method="POST"
            enctype="multipart/form-data" class="space-y-5">
            @csrf

            <h3 class="text-lg font-semibold text-slate-700 mb-4">Data Pelamar</h3>

            <!-- Nama Lengkap -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                <div class="relative">
                    <i class="ri-user-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                        class="w-full pl-11 pr-3 py-2.5 border rounded-lg bg-slate-50
                @error('nama_lengkap') border-red-500 bg-red-50 @else border-slate-300 @enderror
                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none text-slate-900"
                        placeholder="Masukkan nama lengkap">
                </div>
                @error('nama_lengkap')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- NISN -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">NISN</label>
                <div class="relative">
                    <i class="ri-id-card-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="text" name="nisn" value="{{ old('nisn') }}"
                        class="w-full pl-11 pr-3 py-2.5 border rounded-lg bg-slate-50
                @error('nisn') border-red-500 bg-red-50 @else border-slate-300 @enderror
                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none text-slate-900"
                        placeholder="Nomor Induk Siswa Nasional">
                </div>
                @error('nisn')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Tahun Lulus -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tahun Lulus</label>
                <div class="relative">
                    <i class="ri-calendar-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="number" name="tahun_lulus" value="{{ old('tahun_lulus', date('Y')) }}" min="2000"
                        max="{{ date('Y') + 1 }}"
                        class="w-full pl-11 pr-3 py-2.5 border rounded-lg bg-slate-50
                @error('tahun_lulus') border-red-500 bg-red-50 @else border-slate-300 @enderror
                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none text-slate-900"
                        placeholder="{{ date('Y') }}">
                </div>
                @error('tahun_lulus')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- No Telepon -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">No Telepon</label>
                <div class="relative">
                    <i class="ri-phone-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="text" name="telepon" value="{{ old('telepon') }}"
                        class="w-full pl-11 pr-3 py-2.5 border rounded-lg bg-slate-50
                @error('telepon') border-red-500 bg-red-50 @else border-slate-300 @enderror
                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none text-slate-900"
                        placeholder="08xxxxxxxxxx">
                </div>
                @error('telepon')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <div class="relative">
                    <i class="ri-at-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full pl-11 pr-3 py-2.5 border rounded-lg bg-slate-50
                @error('email') border-red-500 bg-red-50 @else border-slate-300 @enderror
                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none text-slate-900"
                        placeholder="nama@email.com">
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Upload CV -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Upload CV (Opsional)</label>
                <div class="relative">
                    <i class="ri-file-text-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="file" name="cv" accept=".pdf"
                        class="w-full pl-11 pr-3 py-2.5 border rounded-lg bg-slate-50
                @error('cv') border-red-500 bg-red-50 @else border-slate-300 @enderror
                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none text-slate-900">
                </div>
                @error('cv')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <div class="relative">
                    <i class="ri-lock-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="password" name="password" id="password_pelamar"
                        class="w-full pl-11 pr-11 py-2.5 border rounded-lg bg-slate-50
                @error('password') border-red-500 bg-red-50 @else border-slate-300 @enderror
                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none text-slate-900"
                        placeholder="••••••••">

                    <button type="button" onclick="togglePasswordPelamar()"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                        <i id="toggleIconPelamar" class="ri-eye-off-line text-lg"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Password</label>
                <div class="relative">
                    <i class="ri-lock-check-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="password" name="password_confirmation" id="password_confirmation_pelamar"
                        class="w-full pl-11 pr-11 py-2.5 border rounded-lg bg-slate-50 border-slate-300
                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none text-slate-900"
                        placeholder="••••••••">

                    <button type="button" onclick="togglePasswordConfirmPelamar()"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                        <i id="toggleIconConfirmPelamar" class="ri-eye-off-line text-lg"></i>
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg cursor-pointer transition">
                Daftar Pelamar
            </button>
        </form>

        <!-- FORM PERUSAHAAN -->
        <form x-show="role === 'perusahaan'" x-transition action="{{ route('register.perusahaan') }}" method="POST"
            enctype="multipart/form-data" class="space-y-5">

            @csrf

            <h3 class="text-lg font-semibold text-slate-700 mb-4">Data Perusahaan</h3>

            <!-- Nama Perusahaan -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nama Perusahaan</label>
                <div class="relative">
                    <i class="ri-building-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}"
                        class="w-full pl-11 pr-3 py-2.5 border rounded-lg bg-slate-50
        @error('nama_perusahaan') border-red-500 bg-red-50 @else border-slate-300 @enderror
        focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none text-slate-900"
                        placeholder="PT. Nama Perusahaan">
                </div>

                @error('nama_perusahaan')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Kontak Perusahaan -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Kontak Perusahaan</label>
                <div class="relative">
                    <i class="ri-phone-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="text" name="kontak" value="{{ old('kontak') }}"
                        class="w-full pl-11 pr-3 py-2.5 border bg-slate-50 border-slate-300 rounded-lg
                               focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none text-slate-900"
                        placeholder="021-xxxxxxxx">
                </div>
                @error('kontak')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Alamat</label>
                <div class="relative">
                    <i class="ri-map-pin-line absolute left-3 top-3 text-slate-400 text-lg"></i>
                    <textarea name="alamat" rows="3"
                        class="w-full pl-11 pr-3 py-2.5 border bg-slate-50 border-slate-300 rounded-lg
                               focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none text-slate-900"
                        placeholder="Alamat lengkap perusahaan">{{ old('alamat') }}</textarea>
                </div>
                @error('alamat')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Bidang Usaha -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Bidang Usaha</label>
                <div class="relative">
                    <i class="ri-briefcase-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="text" name="bidang_usaha" value="{{ old('bidang_usaha') }}"
                        class="w-full pl-11 pr-3 py-2.5 border rounded-lg bg-slate-50
@error('bidang_usaha') border-red-500 bg-red-50 @else border-slate-300 @enderror
focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none text-slate-900"
                        placeholder="Teknologi, Manufaktur, dll">

                </div>
                @error('bidang_usaha')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Logo Perusahaan -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Logo Perusahaan (Opsional)</label>
                <div class="relative">
                    <i class="ri-image-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="file" name="logo" accept="image/jpeg,image/jpg,image/png"
                        class="w-full pl-11 pr-3 py-2.5 border bg-slate-50 border-slate-300 rounded-lg
                               focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none text-slate-900">
                </div>
                <p class="text-xs text-slate-500 mt-1 ml-1">Format: JPEG, JPG, PNG (Max: 2MB)</p>
                @error('logo')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <div class="relative">
                    <i class="ri-at-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full pl-11 pr-3 py-2.5 border rounded-lg bg-slate-50
@error('email') border-red-500 bg-red-50 @else border-slate-300 @enderror
focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none text-slate-900"
                        placeholder="perusahaan@email.com">

                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <div class="relative">
                    <i class="ri-lock-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="password" name="password" id="password_perusahaan"
                        class="w-full pl-11 pr-11 py-2.5 border rounded-lg bg-slate-50
@error('password') border-red-500 bg-red-50 @else border-slate-300 @enderror
focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none text-slate-900"
                        placeholder="••••••••">

                    <button type="button" onclick="togglePasswordPerusahaan()"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                        <i id="toggleIconPerusahaan" class="ri-eye-off-line text-lg"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Password</label>
                <div class="relative">
                    <i class="ri-lock-check-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="password" name="password_confirmation" id="password_confirmation_perusahaan"
                        class="w-full pl-11 pr-11 py-2.5 border bg-slate-50 border-slate-300 rounded-lg
                               focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none text-slate-900"
                        placeholder="••••••••">

                    <button type="button" onclick="togglePasswordConfirmPerusahaan()"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                        <i id="toggleIconConfirmPerusahaan" class="ri-eye-off-line text-lg"></i>
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 rounded-lg cursor-pointer transition">
                Daftar Perusahaan
            </button>

        </form>

        <!-- Divider -->
        <div class="flex items-center my-7">
            <div class="flex-1 border-t border-slate-300"></div>
            <span class="px-3 text-sm text-slate-500">atau</span>
            <div class="flex-1 border-t border-slate-300"></div>
        </div>

        <!-- Link ke Login -->
        <a href="{{ url('/login') }}"
            class="block text-center border-2 border-slate-300 py-3 rounded-lg text-slate-700 hover:bg-slate-50 hover:border-slate-400 transition font-semibold shadow-sm">
            Masuk ke Akun
        </a>

        <!-- Help -->
        <p class="text-center text-sm text-slate-500 mt-7">
            Butuh bantuan?
            <a href="#" class="text-blue-600 font-medium hover:underline hover:text-blue-700">Hubungi Admin</a>
        </p>

    </div>

    <script>
        // Toggle Password Pelamar
        function togglePasswordPelamar() {
            const passwordInput = document.getElementById('password_pelamar');
            const toggleIcon = document.getElementById('toggleIconPelamar');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('ri-eye-off-line');
                toggleIcon.classList.add('ri-eye-line');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('ri-eye-line');
                toggleIcon.classList.add('ri-eye-off-line');
            }
        }

        function togglePasswordConfirmPelamar() {
            const passwordInput = document.getElementById('password_confirmation_pelamar');
            const toggleIcon = document.getElementById('toggleIconConfirmPelamar');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('ri-eye-off-line');
                toggleIcon.classList.add('ri-eye-line');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('ri-eye-line');
                toggleIcon.classList.add('ri-eye-off-line');
            }
        }

        // Toggle Password Perusahaan
        function togglePasswordPerusahaan() {
            const passwordInput = document.getElementById('password_perusahaan');
            const toggleIcon = document.getElementById('toggleIconPerusahaan');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('ri-eye-off-line');
                toggleIcon.classList.add('ri-eye-line');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('ri-eye-line');
                toggleIcon.classList.add('ri-eye-off-line');
            }
        }

        function togglePasswordConfirmPerusahaan() {
            const passwordInput = document.getElementById('password_confirmation_perusahaan');
            const toggleIcon = document.getElementById('toggleIconConfirmPerusahaan');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('ri-eye-off-line');
                toggleIcon.classList.add('ri-eye-line');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('ri-eye-line');
                toggleIcon.classList.add('ri-eye-off-line');
            }
        }
    </script>

</body>

</html>
