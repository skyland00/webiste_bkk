{{-- /views/frontend/partials/header.blade.php --}}

<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                <a href="{{ route('frontend.home') }}" class="px-4 py-2 navbar-text hover:text-[#F8BE09] font-semibold transition-all rounded-xl hover:bg-white/10">
                    Home
                </a>
                <a href="{{ route('frontend.lowongan') }}" class="px-4 py-2 navbar-text hover:text-[#F8BE09] font-semibold transition-all rounded-xl hover:bg-white/10">
                    Lowongan
                </a>

                <!-- Dropdown Informasi -->
                <div class="relative group">
                    <button class="px-4 py-2 navbar-text hover:text-[#F8BE09] font-semibold transition-all rounded-xl hover:bg-white/10 flex items-center gap-1">
                        Informasi
                        <svg class="w-4 h-4 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 border border-[#F5F6F5] overflow-hidden">
                        <div class="py-2">
                            <a href="#" class="block px-4 py-3 text-[#122431] hover:bg-[#F8BE09] hover:text-white transition-all font-semibold rounded-xl mx-2">
                                Tentang BKK
                            </a>
                            <a href="#" class="block px-4 py-3 text-[#122431] hover:bg-[#F8BE09] hover:text-white transition-all font-semibold rounded-xl mx-2">
                                Berita & Artikel
                            </a>
                            <a href="#" class="block px-4 py-3 text-[#122431] hover:bg-[#F8BE09] hover:text-white transition-all font-semibold rounded-xl mx-2">
                                FAQ
                            </a>
                        </div>
                    </div>
                </div>

                <a href="#" class="px-4 py-2 navbar-text hover:text-[#F8BE09] font-semibold transition-all rounded-xl hover:bg-white/10">
                    Survey
                </a>
                <a href="#" class="px-4 py-2 navbar-text hover:text-[#F8BE09] font-semibold transition-all rounded-xl hover:bg-white/10">
                    Kontak
                </a>
            </div>

            <!-- Login Button -->
            <div class="hidden md:block">
                <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-[#F8BE09] text-[#122431] rounded-xl hover:bg-[#ffd54f] transition-all font-bold shadow-lg hover:shadow-xl hover:scale-105">
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
        <div class="px-4 py-4 space-y-2 max-w-7xl mx-auto">
            <a href="{{ route('frontend.home') }}" class="block px-4 py-3 navbar-text hover:bg-white/10 hover:text-[#F8BE09] font-semibold rounded-xl transition-all">
                Home
            </a>
            <a href="{{ route('frontend.lowongan') }}" class="block px-4 py-3 navbar-text hover:bg-white/10 hover:text-[#F8BE09] font-semibold rounded-xl transition-all">
                Lowongan
            </a>

            <!-- Mobile Dropdown -->
            <div class="space-y-1">
                <button id="mobile-dropdown-btn" class="w-full flex items-center justify-between px-4 py-3 navbar-text hover:bg-white/10 hover:text-[#F8BE09] font-semibold rounded-xl transition-all">
                    <span>Informasi</span>
                    <svg id="mobile-dropdown-icon" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="mobile-dropdown" class="hidden pl-4 space-y-1">
                    <a href="#" class="block px-4 py-2 navbar-text hover:bg-white/10 hover:text-[#F8BE09] font-medium rounded-xl transition-all text-sm">
                        Tentang BKK
                    </a>
                    <a href="#" class="block px-4 py-2 navbar-text hover:bg-white/10 hover:text-[#F8BE09] font-medium rounded-xl transition-all text-sm">
                        Berita & Artikel
                    </a>
                    <a href="#" class="block px-4 py-2 navbar-text hover:bg-white/10 hover:text-[#F8BE09] font-medium rounded-xl transition-all text-sm">
                        FAQ
                    </a>
                </div>
            </div>

            <a href="#" class="block px-4 py-3 navbar-text hover:bg-white/10 hover:text-[#F8BE09] font-semibold rounded-xl transition-all">
                Survey
            </a>
            <a href="#" class="block px-4 py-3 navbar-text hover:bg-white/10 hover:text-[#F8BE09] font-semibold rounded-xl transition-all">
                Kontak
            </a>
            <a href="{{ route('login') }}" class="block px-4 py-3 bg-[#F8BE09] text-[#122431] rounded-xl text-center font-bold shadow-lg hover:bg-[#ffd54f] transition-all mt-2">
                Login
            </a>
        </div>
    </div>
</nav>

<style>
/* Default state - transparent */
#navbar {
    background-color: transparent;
}

.navbar-text {
    color: white;
}

/* Scrolled state - with background */
#navbar.scrolled {
    background-color: rgba(18, 36, 49, 0.95);
    backdrop-filter: blur(20px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

/* Mobile menu background */
.mobile-menu-bg {
    background-color: rgba(15, 27, 36, 0.95);
    backdrop-filter: blur(20px);
}

/* Smooth transitions */
#navbar,
.navbar-text {
    transition: all 0.3s ease;
}
</style>

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
