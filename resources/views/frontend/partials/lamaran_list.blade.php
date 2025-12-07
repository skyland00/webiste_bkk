{{-- /views/frontend/partials/lamaran_list.blade.php --}}

@forelse($lamaran as $item)
<div class="bg-white rounded-3xl shadow-lg p-6 mb-4 border border-[#F5F6F5] hover:shadow-xl transition-all">
    <div class="flex items-start gap-6">

        <!-- Logo Perusahaan -->
        <div class="flex-shrink-0">
            @if($item->lowongan->perusahaan->logo)
            <img src="{{ asset('storage/' . $item->lowongan->perusahaan->logo) }}"
                 alt="{{ $item->lowongan->perusahaan->nama_perusahaan }}"
                 class="w-16 h-16 rounded-2xl object-cover ring-4 ring-[#F5F6F5]">
            @else
            <div class="w-16 h-16 bg-gradient-to-br from-[#122431] to-[#4B5057] rounded-2xl flex items-center justify-center ring-4 ring-[#F5F6F5]">
                <span class="text-[#F8BE09] font-bold text-xl">{{ substr($item->lowongan->perusahaan->nama_perusahaan, 0, 1) }}</span>
            </div>
            @endif
        </div>

        <!-- Info Lamaran -->
        <div class="flex-1">
            <div class="flex items-start justify-between mb-2">
                <div>
                    <h3 class="text-xl font-bold text-[#122431] mb-1">{{ $item->lowongan->judul_lowongan }}</h3>
                    <p class="text-[#4B5057] font-medium">{{ $item->lowongan->perusahaan->nama_perusahaan }}</p>
                </div>

                <!-- Status Badge -->
                @if($item->status === 'pending')
                <span class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-bold flex items-center gap-2">
                    <i class="ri-time-line"></i>
                    Pending
                </span>
                @elseif($item->status === 'diterima')
                <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-bold flex items-center gap-2">
                    <i class="ri-checkbox-circle-line"></i>
                    Diterima
                </span>
                @else
                <span class="px-4 py-2 bg-red-100 text-red-700 rounded-full text-sm font-bold flex items-center gap-2">
                    <i class="ri-close-circle-line"></i>
                    Ditolak
                </span>
                @endif
            </div>

            <!-- Detail Info -->
            <div class="flex flex-wrap gap-4 text-sm text-[#4B5057] mb-4">
                <div class="flex items-center gap-2">
                    <i class="ri-map-pin-line text-base text-[#F8BE09]"></i>
                    <span>{{ $item->lowongan->lokasi }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ri-calendar-line text-base text-[#F8BE09]"></i>
                    <span>Dilamar: {{ $item->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ri-briefcase-line text-base text-[#F8BE09]"></i>
                    <span>{{ ucfirst($item->lowongan->tipe_pekerjaan) }}</span>
                </div>
            </div>

            <!-- Catatan Perusahaan (jika ada) -->
            @if($item->catatan_perusahaan)
            <div class="bg-[#F8BE09]/10 border-l-4 border-[#F8BE09] rounded-r-xl p-4 mb-4">
                <p class="text-sm font-bold text-[#122431] mb-1">Catatan dari Perusahaan:</p>
                <p class="text-sm text-[#4B5057]">{{ $item->catatan_perusahaan }}</p>
            </div>
            @endif

            <!-- Action Button -->
            <a href="{{ route('pelamar.lamaran.show', $item->id) }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-[#122431] text-white rounded-xl font-semibold hover:bg-[#1a3345] transition-all text-sm">
                Lihat Detail
                <i class="ri-arrow-right-line"></i>
            </a>
        </div>

    </div>
</div>
@empty
<div class="text-center py-24 bg-white rounded-3xl border-2 border-dashed border-[#F5F6F5]">
    <div class="w-24 h-24 bg-[#F8BE09]/20 rounded-full flex items-center justify-center mx-auto mb-6">
        <i class="ri-file-list-3-line text-5xl text-[#F8BE09]"></i>
    </div>
    <h3 class="text-3xl font-bold text-[#122431] mb-2">Belum Ada Lamaran</h3>
    <p class="text-lg text-[#4B5057] mb-6">Mulai melamar pekerjaan dan pantau statusnya di sini</p>
    <a href="{{ route('frontend.lowongan') }}"
       class="inline-flex items-center gap-2 px-8 py-4 bg-[#122431] text-white rounded-2xl font-bold hover:bg-[#F8BE09] hover:text-[#122431] transition-all duration-300 shadow-xl">
        <i class="ri-search-line text-xl"></i>
        Cari Lowongan
    </a>
</div>
@endforelse
