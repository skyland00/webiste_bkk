{{-- views/admin/partials/berita_pagination.blade.php --}}
@if ($berita->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($berita->onFirstPage())
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-500 bg-white border border-slate-300 cursor-default leading-5 rounded-md">
                    Sebelumnya
                </span>
            @else
                <a href="{{ $berita->appends(request()->query())->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 leading-5 rounded-md hover:text-slate-500 focus:outline-none focus:ring ring-slate-300 focus:border-blue-300 active:bg-slate-100 active:text-slate-700 transition ease-in-out duration-150">
                    Sebelumnya
                </a>
            @endif

            @if ($berita->hasMorePages())
                <a href="{{ $berita->appends(request()->query())->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-slate-700 bg-white border border-slate-300 leading-5 rounded-md hover:text-slate-500 focus:outline-none focus:ring ring-slate-300 focus:border-blue-300 active:bg-slate-100 active:text-slate-700 transition ease-in-out duration-150">
                    Selanjutnya
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-slate-500 bg-white border border-slate-300 cursor-default leading-5 rounded-md">
                    Selanjutnya
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-lg">
                    @if ($berita->onFirstPage())
                        <span aria-disabled="true" aria-label="Sebelumnya">
                            <span
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-slate-500 bg-white border border-slate-300 cursor-default rounded-l-lg leading-5"
                                aria-hidden="true">
                                <i class="ri-arrow-left-s-line text-lg"></i>
                            </span>
                        </span>
                    @else
                        <a href="{{ $berita->appends(request()->query())->previousPageUrl() }}" rel="prev"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-slate-500 bg-white border border-slate-300 rounded-l-lg leading-5 hover:text-slate-400 focus:z-10 focus:outline-none focus:ring ring-slate-300 focus:border-blue-300 active:bg-slate-100 active:text-slate-500 transition ease-in-out duration-150"
                            aria-label="Sebelumnya">
                            <i class="ri-arrow-left-s-line text-lg"></i>
                        </a>
                    @endif

                    @foreach ($berita->appends(request()->query())->getUrlRange(1, $berita->lastPage()) as $page => $url)
                        @if ($page == $berita->currentPage())
                            <span aria-current="page">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-blue-600 border border-blue-600 cursor-default leading-5">{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-slate-700 bg-white border border-slate-300 leading-5 hover:text-slate-500 focus:z-10 focus:outline-none focus:ring ring-slate-300 focus:border-blue-300 active:bg-slate-100 active:text-slate-700 transition ease-in-out duration-150"
                                aria-label="Halaman {{ $page }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    @if ($berita->hasMorePages())
                        <a href="{{ $berita->appends(request()->query())->nextPageUrl() }}" rel="next"
                            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-slate-500 bg-white border border-slate-300 rounded-r-lg leading-5 hover:text-slate-400 focus:z-10 focus:outline-none focus:ring ring-slate-300 focus:border-blue-300 active:bg-slate-100 active:text-slate-500 transition ease-in-out duration-150"
                            aria-label="Selanjutnya">
                            <i class="ri-arrow-right-s-line text-lg"></i>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="Selanjutnya">
                            <span
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-slate-500 bg-white border border-slate-300 cursor-default rounded-r-lg leading-5"
                                aria-hidden="true">
                                <i class="ri-arrow-right-s-line text-lg"></i>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
