<aside class="w-64 bg-white border-r border-slate-200 flex-shrink-0">
    <div class="h-full flex flex-col">

        {{-- Logo --}}
        <div class="h-24 px-6 flex items-center border-b border-slate-200">
            <div class="flex items-center gap-3">
                @php
                    $perusahaan = \App\Models\PerusahaanModel::where('user_id', Auth::id())->first();
                @endphp

                <img src="{{ $perusahaan && $perusahaan->logo ? asset('storage/' . $perusahaan->logo) : asset('images/bkk.jpg') }}"
                    class="w-11 h-11 rounded-lg object-cover" alt="Logo">

                <div>
                    <h1 class="text-2xl font-semibold text-slate-900">
                        {{ $perusahaan->nama_perusahaan ?? 'Perusahaan' }}
                    </h1>
                    <p class="text-xs text-slate-500">BKK SMKN 1 Purwosari</p>
                </div>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 p-4 overflow-y-auto scrollbar-thin">
            <div class="space-y-1">

                <a href="#"
                    class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg">
                    <i class="ri-dashboard-line text-lg"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('perusahaan.lowongan.lowongan') }}"
                    class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100 rounded-lg">
                    <i class="ri-briefcase-line text-lg"></i>
                    <span>Lowongan Saya</span>
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100 rounded-lg">
                    <i class="ri-file-user-line text-lg"></i>
                    <span>Pelamar Masuk</span>
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100 rounded-lg">
                    <i class="ri-bar-chart-grouped-line text-lg"></i>
                    <span>Statistik Lamaran</span>
                </a>

                <div class="pt-4 mt-4 border-t border-slate-200">
                    <p class="px-3 mb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Pengaturan</p>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100 rounded-lg">
                        <i class="ri-building-4-line text-lg"></i>
                        <span>Profil Perusahaan</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-sate-100 rounded-lg">
                        <i class="ri-settings-3-line text-lg"></i>
                        <span>Pengaturan Akun</span>
                    </a>
                </div>

            </div>
        </nav>

        <!-- User Profile Perusahaan -->
        <div class="p-4 border-t border-slate-200 relative">
            <details class="relative group">
                <summary
                    class="flex items-center gap-3 px-3 py-2.5 hover:bg-slate-100 rounded-lg cursor-pointer list-none">

                    <img src="{{ $perusahaan && $perusahaan->logo
                        ? asset('storage/' . $perusahaan->logo)
                        : 'https://ui-avatars.com/api/?name=' .
                            urlencode($perusahaan->nama_perusahaan ?? 'Perusahaan') .
                            '&background=3b82f6&color=fff' }}"
                        class="w-9 h-9 rounded-full object-cover">


                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-900 truncate">PT Nusantara Tech</p>
                        <p class="text-xs text-slate-500 truncate">contact@nusantaratech.com</p>
                    </div>

                    <i class="ri-more-2-fill text-slate-400 transition-transform"></i>
                </summary>

                <!-- DROP-UP MENU -->
                <div
                    class="absolute bottom-full left-2 right-2 mb-2 bg-white border border-slate-200 shadow-lg rounded-lg py-1 z-50 hidden group-open:block">

                    <div class="px-4 py-3 border-b border-slate-100">
                        <p class="text-sm font-medium text-slate-900">PT Nusantara Tech</p>
                        <p class="text-xs text-slate-500 mt-0.5">contact@nusantaratech.com</p>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
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
    document.addEventListener('click', function(e) {
        const details = document.querySelector('details');
        if (!details) return;

        if (!details.contains(e.target)) {
            details.removeAttribute('open');
        }
    });
</script>
