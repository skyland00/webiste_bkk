{{-- /views/frontend/partials/header.blade.php --}}

<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-[1400px] mx-auto px-8 sm:px-16">
        <div class="flex justify-between items-center h-20">

            <!-- Logo & Brand -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('img/logo_bkk.png') }}" class="w-12 h-12 object-contain" alt="Logo">
                <div>
                    <h1 class="text-lg font-bold navbar-text leading-tight">BKK SMK NEGERI 1</h1>
                    <h1 class="text-lg font-bold navbar-text leading-tight">PURWOSARI</h1>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('frontend.home') }}"
                    class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}">
                    Home
                </a>
                <a href="{{ route('frontend.lowongan') }}"
                    class="nav-link {{ request()->routeIs('frontend.lowongan') ? 'active' : '' }}">
                    Lowongan
                </a>

                <!-- Dropdown Informasi -->
                <div class="relative group">
                    <button class="nav-link flex items-center gap-1">
                        Informasi
                        <i class="ri-arrow-down-s-line text-lg group-hover:rotate-180 transition-transform"></i>
                    </button>
                    <div class="dropdown-menu">
                        <div class="py-2">
                            <a href="{{ route('frontend.tentang') }}" class="dropdown-item">
                                Tentang BKK
                            </a>
                            <a href="{{ route('frontend.berita') }}" class="dropdown-item">
                                Berita & Artikel
                            </a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('frontend.kontak') }}"
                    class="nav-link {{ request()->routeIs('frontend.kontak') ? 'active' : '' }}">
                    Kontak
                </a>
            </div>

            <!-- Auth Section - Desktop -->
            <div class="hidden md:block">
                @auth
                    <!-- User Dropdown -->
                    <div class="relative group">
                        <button
                            class="flex items-center gap-3 px-4 py-2 bg-white/10 hover:bg-white/20 rounded-full transition-all duration-300 border border-white/20">
                            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                                <span class="text-[#122431] font-bold text-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            </div>
                            <span class="navbar-text font-semibold">{{ Auth::user()->name }}</span>
                            <i
                                class="ri-arrow-down-s-line text-lg navbar-text group-hover:rotate-180 transition-transform"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu right-0 w-56">
                            <div class="py-2">
                                <!-- User Info -->
                                <div class="px-4 py-3 border-b border-gray-200">
                                    <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                                </div>

                                <!-- Menu Items -->
                                @if (Auth::user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                        <i class="ri-dashboard-line"></i>
                                        Dashboard Admin
                                    </a>
                                @elseif(Auth::user()->role === 'perusahaan')
                                    <a href="{{ route('perusahaan.dashboard') }}" class="dropdown-item">
                                        <i class="ri-building-line"></i>
                                        Dashboard Perusahaan
                                    </a>
                                @else
                                    <a href="{{ route('frontend.pelamar.riwayat_lamaran') }}" class="dropdown-item">
                                        <i class="ri-user-line"></i>
                                        Riwayat Lamaran
                                    </a>
                                @endif

                                <a href="#" class="dropdown-item">
                                    <i class="ri-settings-3-line"></i>
                                    Pengaturan
                                </a>

                                <div class="border-t border-gray-200 my-2"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item text-red-600 hover:bg-red-50 w-full text-left">
                                        <i class="ri-logout-box-line"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" id="login-btn"
                        class="inline-block px-8 py-3 bg-white text-[#122431] rounded-full font-bold border-2 border-[#122431] hover:bg-[#122431] hover:text-white transition-all duration-300">
                        Login
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden navbar-text p-2 hover:bg-white/10 rounded-xl transition-all">
                <i id="menu-icon" class="ri-menu-line text-2xl"></i>
                <i id="close-icon" class="ri-close-line text-2xl hidden"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden mobile-menu-bg border-t border-white/10">
        <div class="px-8 py-4 space-y-2 max-w-[1400px] mx-auto">
            @auth
                <!-- User Info Mobile -->
                <div class="flex items-center gap-3 p-3 bg-white/10 rounded-xl mb-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                        <span class="text-[#122431] font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <p class="navbar-text font-semibold">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-white/60">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <!-- Dashboard Link -->
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-link-mobile">
                        Dashboard Admin
                    </a>
                @elseif(Auth::user()->role === 'perusahaan')
                    <a href="{{ route('perusahaan.dashboard') }}" class="nav-link-mobile">
                        Dashboard Perusahaan
                    </a>
                @else
                    <a href="{{ route('frontend.pelamar.riwayat_lamaran') }}" class="nav-link-mobile">
                        Dashboard Alumni
                    </a>
                @endif
            @endauth

            <a href="{{ route('frontend.home') }}"
                class="nav-link-mobile {{ request()->routeIs('frontend.home') ? 'active' : '' }}">
                Home
            </a>
            <a href="{{ route('frontend.lowongan') }}"
                class="nav-link-mobile {{ request()->routeIs('frontend.lowongan') ? 'active' : '' }}">
                Lowongan
            </a>

            <!-- Mobile Dropdown -->
            <div class="space-y-1">
                <button id="mobile-dropdown-btn" class="nav-link-mobile-dropdown">
                    <span>Informasi</span>
                    <i id="mobile-dropdown-icon" class="ri-arrow-down-s-line text-lg transition-transform"></i>
                </button>
                <div id="mobile-dropdown" class="hidden pl-4 space-y-1">
                    <a href="{{ route('frontend.tentang') }}" class="nav-link-mobile-sub">
                        Tentang BKK
                    </a>
                    <a href="{{ route('frontend.berita') }}" class="nav-link-mobile-sub">
                        Berita & Artikel
                    </a>
                </div>
            </div>
            <a href="{{ route('frontend.kontak') }}"
                class="nav-link-mobile {{ request()->routeIs('frontend.kontak') ? 'active' : '' }}">
                Kontak
            </a>

            @auth
                <a href="#" class="nav-link-mobile">
                    Pengaturan
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full px-4 py-3 bg-red-500 text-white rounded-xl text-center font-bold hover:bg-red-600 transition-all duration-300 shadow-lg mt-2">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="block px-4 py-3 bg-white text-[#122431] rounded-xl text-center font-bold border-2 border-[#122431] hover:bg-[#122431] hover:text-white transition-all duration-300 shadow-lg mt-2">
                    Login
                </a>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        const mobileDropdownBtn = document.getElementById('mobile-dropdown-btn');
        const mobileDropdown = document.getElementById('mobile-dropdown');
        const mobileDropdownIcon = document.getElementById('mobile-dropdown-icon');

        // Scroll effect for navbar
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        });

        // Mobile menu toggle
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Mobile dropdown toggle
        if (mobileDropdownBtn) {
            mobileDropdownBtn.addEventListener('click', () => {
                mobileDropdown.classList.toggle('hidden');
                mobileDropdownIcon.classList.toggle('rotate-180');
            });
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!navbar.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });

        // Close mobile menu when window is resized to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });
    });
</script>
