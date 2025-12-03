<nav class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo & Brand -->
            <div class="flex items-center space-x-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-xl">B</span>
                </div>
                <div>
                    <span class="text-xl font-bold text-gray-900">BKK</span>
                    <p class="text-xs text-gray-500 font-medium">SMKN 1 Purwosari</p>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('publicc.home') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600 font-medium transition rounded-xl hover:bg-blue-50">Home</a>
                <a href="{{ route('publicc.lowongan') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600 font-medium transition rounded-xl hover:bg-blue-50">Lowongan</a>
                
                <!-- Dropdown Informasi -->
                <div class="relative group">
                    <button class="px-4 py-2 text-gray-700 hover:text-blue-600 font-medium transition rounded-xl hover:bg-blue-50 flex items-center gap-1">
                        Informasi
                        <svg class="w-4 h-4 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 border border-gray-100">
                        <div class="py-2">
                            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium rounded-xl mx-2">Tentang BKK</a>
                            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium rounded-xl mx-2">Berita & Artikel</a>
                            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium rounded-xl mx-2">FAQ</a>
                        </div>
                    </div>
                </div>

                <a href="#" class="px-4 py-2 text-gray-700 hover:text-blue-600 font-medium transition rounded-xl hover:bg-blue-50">Survey</a>
                <a href="#" class="px-4 py-2 text-gray-700 hover:text-blue-600 font-medium transition rounded-xl hover:bg-blue-50">Kontak</a>
            </div>

            <!-- Login Button -->
            <div class="hidden md:block">
                <a href="{{ route('login') }}" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl hover:scale-105">
                    Login
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-gray-700 p-2 hover:bg-gray-100 rounded-xl transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
        <div class="px-4 py-4 space-y-2">
            <a href="{{ route('publicc.home') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium rounded-xl transition">Home</a>
            <a href="{{ route('publicc.lowongan') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium rounded-xl transition">Lowongan</a>
            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium rounded-xl transition">Tentang BKK</a>
            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium rounded-xl transition">Survey Kepuasan</a>
            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium rounded-xl transition">Kontak</a>
            <a href="{{ route('login') }}" class="block px-4 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl text-center font-semibold shadow-lg mt-2">Login</a>
        </div>
    </div>
</nav>

<script>
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>