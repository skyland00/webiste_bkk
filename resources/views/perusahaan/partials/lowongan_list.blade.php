@if ($lowongan->count())
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-100 text-slate-700 text-xs uppercase border-b border-slate-200">
                <tr>
                    <th class="py-3 px-6 text-left font-semibold">No</th>
                    <th class="py-3 px-6 text-left font-semibold">Lowongan</th>
                    <th class="py-3 px-6 text-left font-semibold">Lokasi</th>
                    <th class="py-3 px-6 text-left font-semibold">Tipe</th>
                    <th class="py-3 px-6 text-left font-semibold">Kuota</th>
                    <th class="py-3 px-6 text-left font-semibold">Gaji</th>
                    <th class="py-3 px-6 text-left font-semibold">Status</th>
                    <th class="py-3 px-6 text-left font-semibold">Periode</th>
                    <th class="py-3 px-6 text-right font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
                @foreach ($lowongan as $index => $item)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 text-slate-600">
                            {{ ($lowongan->currentPage() - 1) * $lowongan->perPage() + $index + 1 }}
                        </td>

                        <td class="px-6 py-4">
                            <div>
                                <div class="font-medium text-slate-900 mb-1">{{ $item->judul_lowongan }}</div>
                                <div class="text-xs text-slate-500 flex items-center gap-1">
                                    <i class="ri-building-line"></i>
                                    {{ $item->bidang }}
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-slate-700">
                            <div class="flex items-center gap-1">
                                <i class="ri-map-pin-line text-slate-400"></i>
                                {{ $item->lokasi }}
                            </div>
                        </td>

                        <td class="px-6 py-4 text-slate-700">
                            <div class="flex items-center gap-1">
                                <i class="ri-briefcase-line text-slate-400"></i>
                                {{ ucfirst($item->tipe_pekerjaan) }}
                            </div>
                        </td>

                        <td class="px-6 py-4 text-slate-700">
                            <div class="flex items-center gap-1">
                                <i class="ri-team-line text-slate-400"></i>
                                {{ $item->jumlah_orang }} orang
                            </div>
                        </td>

                        <td class="px-6 py-4 text-slate-700">
                            @if ($item->gaji_min && $item->gaji_max)
                                <div class="text-xs">
                                    <div>Rp {{ number_format($item->gaji_min, 0, ',', '.') }}</div>
                                    <div class="text-slate-500">- Rp {{ number_format($item->gaji_max, 0, ',', '.') }}
                                    </div>
                                </div>
                            @else
                                <span class="text-slate-400">-</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            @if ($item->status === 'aktif')
                                <span
                                    class="px-3 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">Aktif</span>
                            @elseif($item->status === 'nonaktif')
                                <span
                                    class="px-3 py-1 text-xs font-medium bg-slate-100 text-slate-700 rounded-full">Nonaktif</span>
                            @else
                                <span
                                    class="px-3 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">Ditutup</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-slate-700">
                            <div class="text-xs">
                                <div>{{ $item->tanggal_buka->format('d M Y') }}</div>
                                <div class="text-slate-500">{{ $item->tanggal_tutup->format('d M Y') }}</div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                {{-- Toggle Status --}}
                                <form action="{{ route('perusahaan.lowongan.toggle-status', $item->id) }}"
                                    method="POST" class="form-toggle">
                                    @csrf
                                    <button type="submit"
                                        class="btn-toggle p-2 {{ $item->status === 'aktif' ? 'text-slate-600 hover:bg-slate-50' : 'text-green-600 hover:bg-green-50' }} rounded-lg transition cursor-pointer"
                                        title="{{ $item->status === 'aktif' ? 'Nonaktifkan' : 'Aktifkan' }}">
                                        <i
                                            class="ri-{{ $item->status === 'aktif' ? 'pause' : 'play' }}-circle-line text-lg"></i>
                                    </button>
                                </form>

                                {{-- Edit --}}
                                <a href="{{ route('perusahaan.lowongan.edit', $item->id) }}"
                                    class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                    <i class="ri-edit-line text-lg"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('perusahaan.lowongan.destroy', $item->id) }}" method="POST"
                                    class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn-delete p-2 text-red-600 hover:bg-red-50 rounded-lg transition cursor-pointer"
                                        title="Hapus">
                                        <i class="ri-delete-bin-line text-lg"></i>
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
    // Toggle Status
    document.querySelectorAll('.form-toggle').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const button = this.querySelector('.btn-toggle');
            const isActive = button.classList.contains('text-slate-600');

            Swal.fire({
                title: isActive ? "Nonaktifkan lowongan ini?" : "Aktifkan lowongan ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: isActive ? "#64748b" : "#10b981",
                cancelButtonColor: "#6b7280",
                confirmButtonText: isActive ? "Ya, nonaktifkan" : "Ya, aktifkan",
                cancelButtonText: "Batal",
                showClass: {
                    popup: 'swal-zoom-in'
                },
                hideClass: {
                    popup: 'swal-zoom-out'
                }
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });
    });

    // Delete
    document.querySelectorAll('.form-delete').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Hapus lowongan ini?",
                text: "Data tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ef4444",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Batal",
                showClass: {
                    popup: 'swal-zoom-in'
                },
                hideClass: {
                    popup: 'swal-zoom-out'
                }
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
</script>
