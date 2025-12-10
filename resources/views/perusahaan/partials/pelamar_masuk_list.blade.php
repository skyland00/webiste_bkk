{{-- views/perusahaan/partials/pelamar_masuk_list.blade.php --}}

@if ($lamaran->count())
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-100 text-slate-700 text-xs uppercase border-b border-slate-200">
                <tr>
                    <th class="py-3 px-6 text-center font-semibold">No</th>
                    <th class="py-3 px-6 text-center font-semibold">Pelamar</th>
                    <th class="py-3 px-6 text-center font-semibold">NISN</th>
                    <th class="py-3 px-6 text-center font-semibold">Lowongan</th>
                    <th class="py-3 px-6 text-center font-semibold">Status</th>
                    <th class="py-3 px-6 text-center font-semibold">Tanggal Lamar</th>
                    <th class="py-3 px-6 text-center font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200 text-center">
                @foreach ($lamaran as $index => $item)
                    <tr class="hover:bg-slate-50 transition">
                        {{-- NO --}}
                        <td class="px-6 py-4 text-slate-600">
                            {{ ($lamaran->currentPage() - 1) * $lamaran->perPage() + $index + 1 }}
                        </td>

                        {{-- PELAMAR --}}
                        <td class="px-6 py-4">
                            <div>
                                <div class="font-medium text-slate-900 mb-1">{{ $item->pelamar->nama_lengkap }}</div>
                                <div class="text-xs text-slate-500 flex items-center gap-1">
                                    <i class="ri-phone-line"></i>
                                    {{ $item->pelamar->no_telp }}
                                </div>
                            </div>
                        </td>

                        {{-- NISN --}}
                        <td class="px-6 py-4 text-slate-700">
                            <div class="flex items-center gap-1 justify-center">
                                <i class="ri-id-card-line text-slate-400"></i>
                                {{ $item->pelamar->nisn }}
                            </div>
                        </td>

                        {{-- LOWONGAN --}}
                        <td class="px-6 py-4">
                            <div>
                                <div class="font-medium text-slate-900">{{ $item->lowongan->judul_lowongan ?? '-' }}</div>
                                <div class="text-xs text-slate-500 flex items-center gap-1 justify-center mt-1">
                                    <i class="ri-building-line"></i>
                                    {{ $item->lowongan->bidang ?? '-' }}
                                </div>
                            </div>
                        </td>

                        {{-- STATUS --}}
                        <td class="px-6 py-4">
                            @if ($item->status === 'pending')
                                <span class="px-3 py-1 text-xs font-medium bg-yellow-100 text-yellow-700 rounded-full">
                                    Pending
                                </span>
                            @elseif($item->status === 'diterima')
                                <span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">
                                    Diterima
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">
                                    Ditolak
                                </span>
                            @endif
                        </td>

                        {{-- TANGGAL MELAMAR --}}
                        <td class="px-6 py-4 text-slate-700">
                            <div class="text-xs">{{ $item->created_at->format('d M Y') }}</div>
                        </td>

                        {{-- AKSI --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                {{-- Detail --}}
                                <a href="{{ route('perusahaan.pelamar_masuk.show', $item->id) }}"
                                   class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                   title="Detail">
                                   <i class="ri-eye-line text-lg"></i>
                                </a>

                                {{-- Terima --}}
<form action="{{ route('perusahaan.pelamar_masuk.terima', $item->id) }}"
      method="POST" class="form-terima">
    @csrf
    <button type="submit"
        class="p-2 rounded-lg transition
               {{ $item->status === 'pending' ? 'text-green-600 hover:bg-green-50' : 'bg-slate-200 text-slate-400 cursor-not-allowed' }}"
        title="Terima Lamaran"
        {{ $item->status !== 'pending' ? 'disabled' : '' }}>
        <i class="ri-check-line text-lg"></i>
    </button>
</form>

{{-- Tolak --}}
<form action="{{ route('perusahaan.pelamar_masuk.tolak', $item->id) }}"
      method="POST" class="form-tolak">
    @csrf
    <button type="submit"
        class="p-2 rounded-lg transition
               {{ $item->status === 'pending' ? 'text-red-600 hover:bg-red-50' : 'bg-slate-200 text-slate-400 cursor-not-allowed' }}"
        title="Tolak Lamaran"
        {{ $item->status !== 'pending' ? 'disabled' : '' }}>
        <i class="ri-close-line text-lg"></i>
    </button>
</form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<script>
    // TERIMA
    document.querySelectorAll('.form-terima').forEach(form => {
        form.addEventListener('submit', function(e) {
            const btn = form.querySelector('button');
            if(btn.disabled) return; // skip jika disable
            e.preventDefault();
            Swal.fire({
                title: "Terima lamaran ini?",
                text: "Keputusan tidak dapat diubah!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#10b981",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Ya, terima",
                cancelButtonText: "Batal",
                showClass: { popup: 'swal-zoom-in' },
                hideClass: { popup: 'swal-zoom-out' },
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });
    });

    // TOLAK
    document.querySelectorAll('.form-tolak').forEach(form => {
        form.addEventListener('submit', function(e) {
            const btn = form.querySelector('button');
            if(btn.disabled) return; // skip jika disable
            e.preventDefault();
            Swal.fire({
                title: "Tolak lamaran ini?",
                text: "Keputusan tidak dapat diubah!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ef4444",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Ya, tolak",
                cancelButtonText: "Batal",
                showClass: { popup: 'swal-zoom-in' },
                hideClass: { popup: 'swal-zoom-out' },
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
</script>
