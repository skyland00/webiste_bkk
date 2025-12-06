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
                <a href="{{ route('frontend.home') }}" class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}">
                    Home
                </a>
                <a href="{{ route('frontend.lowongan') }}" class="nav-link {{ request()->routeIs('frontend.lowongan') ? 'active' : '' }}">
                    Lowongan
                </a>

                <!-- Dropdown Informasi -->
                <div class="relative group">
                    <button class="nav-link flex items-center gap-1">
                        Informasi
                        <svg class="w-4 h-4 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <div class="py-2">
                            <a href="#" class="dropdown-item">
                                Tentang BKK
                            </a>
                            <a href="#" class="dropdown-item">
                                Berita & Artikel
                            </a>
                            <a href="#" class="dropdown-item">
                                FAQ
                            </a>
                        </div>
                    </div>
                </div>

                <a href="#" class="nav-link">
                    Survey
                </a>
                <a href="#" class="nav-link">
                    Kontak
                </a>
            </div>

            <!-- Login Button -->
           <div class="hidden md:block">
                <a href="{{ route('login') }}" id="login-btn" class="inline-block px-8 py-3 bg-white text-[#122431] rounded-full font-bold border-2 border-[#122431] hover:bg-[#122431] hover:text-white transition-all duration-300">
                    Login
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden navbar-text p-2 hover:bg-white/10 rounded-xl transition-all">
                <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden mobile-menu-bg border-t border-white/10">
        <div class="px-8 py-4 space-y-2 max-w-[1400px] mx-auto">
            <a href="{{ route('frontend.home') }}" class="nav-link-mobile {{ request()->routeIs('frontend.home') ? 'active' : '' }}">
                Home
            </a>
            <a href="{{ route('frontend.lowongan') }}" class="nav-link-mobile {{ request()->routeIs('frontend.lowongan') ? 'active' : '' }}">
                Lowongan
            </a>

            <!-- Mobile Dropdown -->
            <div class="space-y-1">
                <button id="mobile-dropdown-btn" class="nav-link-mobile-dropdown">
                    <span>Informasi</span>
                    <svg id="mobile-dropdown-icon" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="mobile-dropdown" class="hidden pl-4 space-y-1">
                    <a href="#" class="nav-link-mobile-sub">
                        Tentang BKK
                    </a>
                    <a href="#" class="nav-link-mobile-sub">
                        Berita & Artikel
                    </a>
                    <a href="#" class="nav-link-mobile-sub">
                        FAQ
                    </a>
                </div>
            </div>

            <a href="#" class="nav-link-mobile">
                Survey
            </a>
            <a href="#" class="nav-link-mobile">
                Kontak
            </a>
            <a href="{{ route('login') }}" class="block px-4 py-3 bg-white text-[#122431] rounded-xl text-center font-bold border-2 border-[#122431] hover:bg-[#122431] hover:text-white transition-all duration-300 shadow-lg mt-2">
                Login
            </a>
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
