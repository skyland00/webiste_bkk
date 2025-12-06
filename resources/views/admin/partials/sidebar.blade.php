<aside class="w-64 bg-white border-r border-slate-200 flex-shrink-0">
    <div class="h-full flex flex-col">
        <!-- Logo -->
        <div class="h-24 px-6 flex items-center border-b border-slate-200">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-lg flex items-center justify-center">

                    <img src="{{ asset('img/logo_bkk.png') }}" alt="Logo">
                </div>
                <div>
                    <h1 class="text-2xl font-semibold text-slate-900">BKK</h1>
                    <p class="text-xs text-slate-500">SMK Negeri 1 Purwosari</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->

        <nav class="flex-1 p-4 overflow-y-auto scrollbar-thin">
            <div class="space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-100' }} rounded-lg transition-colors">
                    <i class="ri-dashboard-line text-lg"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.lowongan') }}"
                    class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium {{ request()->routeIs('admin.lowongan') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-100' }} rounded-lg transition-colors">
                    <i class="ri-briefcase-line text-lg"></i>
                    <span>Lowongan Kerja</span>
                </a>
                <a href="{{ route('admin.pelamar') }}"
                    class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium {{ request()->routeIs('admin.pelamar') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-100' }} rounded-lg transition-colors">
                    <i class="ri-group-line text-lg"></i>
                    <span>Data Pelamar</span>
                </a>
                <a href="{{ route('admin.perusahaan') }}"
                    class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium {{ request()->routeIs('admin.perusahaan*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-100' }} rounded-lg transition-colors">
                    <i class="ri-building-2-line text-lg"></i>
                    <span>Perusahaan</span>
                </a>

                <div class="pt-4 mt-4 border-t border-slate-200">
                    <p class="px-3 mb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Lainnya
                    </p>
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium {{ request()->routeIs('admin.event*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-100' }} rounded-lg transition-colors">
                        <i class="ri-calendar-event-line text-lg"></i>
                        <span>Event & Pelatihan</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium {{ request()->routeIs('admin.laporan*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-100' }} rounded-lg transition-colors">
                        <i class="ri-bar-chart-box-line text-lg"></i>
                        <span>Laporan</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium {{ request()->routeIs('admin.pengaturan*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-100' }} rounded-lg transition-colors">
                        <i class="ri-settings-3-line text-lg"></i>
                        <span>Pengaturan</span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- User Profile -->

        <div class="p-4 border-t border-slate-200 relative">
            <details class="relative group" id="userDropdown">
                <summary
                    class="flex items-center gap-3 px-3 py-2.5 hover:bg-slate-100 rounded-lg cursor-pointer list-none">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff"
                        class="w-9 h-9 rounded-full">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-900 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email }}</p>
                    </div>

                    <i class="ri-more-2-fill text-slate-400 transition-transform"></i>
                </summary>

                <!-- DROP-UP MENU -->
                <div
                    class="absolute bottom-full left-2 right-2 mb-2 bg-white border border-slate-200 shadow-lg rounded-lg py-1 z-50 hidden group-open:block">
                    <div class="px-4 py-3 border-b border-slate-100">
                        <p class="text-sm font-medium text-slate-900">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-500 mt-0.5">{{ Auth::user()->email }}</p>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>

                </div>
            </details>
        </div>


    </div>
</aside>

<script>
// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('userDropdown');
    if (dropdown && !dropdown.contains(event.target)) {
        dropdown.removeAttribute('open');
    }
});
</script>