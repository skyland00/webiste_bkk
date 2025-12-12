<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
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
    class="bg-gradient-to-br from-slate-50 via-blue-50 to-slate-100 flex items-center justify-center min-h-screen px-4">

    <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-10 border border-gray-200">

        <!-- Header -->
        <div class="mb-8 flex items-center gap-4">
            <div class="w-16 h-16 flex items-center justify-center flex-shrink-0">
                <img src="{{ asset('img/logo_bkk.png') }}" alt="Logo BKK" class="w-16 h-16 object-contain">
            </div>

            <div class="flex-1">
                <h1 class="text-2xl font-bold text-slate-800 mb-1">
                    Selamat Datang
                </h1>
                <p class="text-slate-600 text-sm font-medium">
                    Sistem Informasi BKK
                </p>
            </div>
        </div>

        <!-- Form -->
        <form class="space-y-5" method="POST" action="{{ url('/login') }}">
            @csrf
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <div class="relative">
                    <i class="ri-at-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full pl-11 pr-3 py-2.5 border rounded-lg bg-slate-50
    @error('email') border-red-500 bg-red-50 @else border-slate-300 @enderror
    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none
    text-slate-900"
                        placeholder="nama@email.com">
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
                    <input type="password" name="password" id="password"
                        class="w-full pl-11 pr-11 py-2.5 border rounded-lg bg-slate-50
    @error('password') border-red-500 bg-red-50 @else border-slate-300 @enderror
    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none
    text-slate-900"
                        placeholder="••••••••">
                    
                    <!-- Toggle Password Icon -->
                    <button type="button" onclick="togglePassword()" 
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                        <i id="toggleIcon" class="ri-eye-off-line text-lg"></i>
                    </button>
                </div>

                @error('password')
                    <p class="text-red-500 text-sm mt-1 ml-1 flex items-start gap-1">
                        <i class="ri-error-warning-line text-red-500 mt-0.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 text-sm cursor-pointer text-slate-600">
                    <input type="checkbox" class="h-4 w-4 text-blue-600 rounded border-slate-300 focus:ring-blue-500">
                    Ingat saya
                </label>
                <a href="#" class="text-sm text-blue-600 hover:text-blue-700 hover:underline font-medium">Lupa
                    password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg cursor-pointer transition">
                Masuk
            </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-7">
            <div class="flex-1 border-t border-slate-300"></div>
            <span class="px-3 text-sm text-slate-500">atau</span>
            <div class="flex-1 border-t border-slate-300"></div>
        </div>

        <!-- Register -->
        <a href="{{ url('/register') }}"
            class="block text-center border-2 border-slate-300 py-3 rounded-lg text-slate-700 hover:bg-slate-50 hover:border-slate-400 transition font-semibold shadow-sm">
            Daftar Akun Baru
        </a>

        <!-- Help -->
        <p class="text-center text-sm text-slate-500 mt-7">
            Butuh bantuan?
            <a href="#" class="text-blue-600 font-medium hover:underline hover:text-blue-700">Hubungi Admin</a>
        </p>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
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