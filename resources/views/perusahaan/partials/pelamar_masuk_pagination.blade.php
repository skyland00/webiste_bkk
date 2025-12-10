
@if ($lamaran->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">

        {{-- Mobile --}}
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($lamaran->onFirstPage())
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-500 bg-white border border-slate-300 cursor-default leading-5 rounded-md">
                    Sebelumnya
                </span>
            @else
                <a href="{{ $lamaran->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 leading-5 rounded-md hover:text-slate-500 focus:outline-none focus:ring ring-slate-300 active:bg-slate-100 active:text-slate-700 transition">
                    Sebelumnya
                </a>
            @endif

            @if ($lamaran->hasMorePages())
                <a href="{{ $lamaran->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-slate-700 bg-white border border-slate-300 leading-5 rounded-md hover:text-slate-500 focus:outline-none focus:ring ring-slate-300 active:bg-slate-100 active:text-slate-700 transition">
                    Selanjutnya
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-slate-500 bg-white border border-slate-300 cursor-default leading-5 rounded-md">
                    Selanjutnya
                </span>
            @endif
        </div>


        {{-- Desktop --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-lg">

                    {{-- Tombol Back --}}
                    @if ($lamaran->onFirstPage())
                        <span aria-disabled="true" aria-label="Sebelumnya">
                            <span
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-slate-500 bg-white border border-slate-300 cursor-default rounded-l-lg leading-5">
                                <i class="ri-arrow-left-s-line text-lg"></i>
                            </span>
                        </span>
                    @else
                        <a href="{{ $lamaran->previousPageUrl() }}" rel="prev"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-slate-500 bg-white border border-slate-300 rounded-l-lg leading-5 hover:text-slate-400 focus:z-10 focus:outline-none transition"
                            aria-label="Sebelumnya">
                            <i class="ri-arrow-left-s-line text-lg"></i>
                        </a>
                    @endif


                    {{-- Nomor halaman --}}
                    @foreach ($lamaran->getUrlRange(1, $lamaran->lastPage()) as $page => $url)
                        @if ($page == $lamaran->currentPage())
                            <span aria-current="page">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-blue-600 border border-blue-600 cursor-default leading-5">
                                    {{ $page }}
                                </span>
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-slate-700 bg-white border border-slate-300 leading-5 hover:text-slate-500 focus:z-10 focus:outline-none transition"
                                aria-label="Halaman {{ $page }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach


                    {{-- Tombol Next --}}
                    @if ($lamaran->hasMorePages())
                        <a href="{{ $lamaran->nextPageUrl() }}" rel="next"
                            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-slate-500 bg-white border border-slate-300 rounded-r-lg leading-5 hover:text-slate-400 focus:z-10 focus:outline-none transition"
                            aria-label="Selanjutnya">
                            <i class="ri-arrow-right-s-line text-lg"></i>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="Selanjutnya">
                            <span
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-slate-500 bg-white border border-slate-300 cursor-default rounded-r-lg leading-5">
                                <i class="ri-arrow-right-s-line text-lg"></i>
                            </span>
                        </span>
                    @endif

                </span>
            </div>
        </div>

    </nav>
@endif
