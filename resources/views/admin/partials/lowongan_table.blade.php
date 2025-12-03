@if ($lowongans->count())
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-100 text-slate-700 text-xs uppercase border-b border-slate-200">
                <tr>
                    <th class="py-3 px-6 text-center font-semibold">No</th>
                    <th class="py-3 px-6 text-center font-semibold">Lowongan</th>
                    <th class="py-3 px-6 text-center font-semibold">Perusahaan</th>
                    <th class="py-3 px-6 text-center font-semibold">Lokasi</th>
                    <th class="py-3 px-6 text-center font-semibold">Status</th>
                    <th class="py-3 px-6 text-center font-semibold">Tanggal</th>
                    <th class="py-3 px-6 text-center font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200 text-center">
                @foreach ($lowongans as $index => $l)
                    <tr class="hover:bg-slate-50 transition">
                        {{-- No --}}
                        <td class="px-6 py-4 text-slate-600">
                            {{ ($lowongans->currentPage() - 1) * $lowongans->perPage() + $index + 1 }}
                        </td>

                        {{-- Judul Lowongan --}}
                        <td class="px-6 py-4 font-medium text-slate-900">
                            {{ $l->judul }}
                        </td>

                        {{-- Nama Perusahaan --}}
                        <td class="px-6 py-4 text-slate-700">
                            {{ $l->perusahaan->nama_perusahaan ?? '-' }}
                        </td>

                        {{-- Lokasi --}}
                        <td class="px-6 py-4 text-slate-700">
                            {{ $l->lokasi }}
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4">
                            @if ($l->status === 'aktif')
                                <span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Aktif</span>
                            @else
                                <span class="px-3 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">Nonaktif</span>
                            @endif
                        </td>

                        {{-- Tanggal --}}
                        <td class="px-6 py-4 text-slate-700">
                            {{ $l->created_at->format('d M Y') }}
                        </td>

                        {{-- Action --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">

                                {{-- Detail --}}
                                <a href="{{ route('admin.lowongan.show', $l->id) }}"
                                    class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                    title="Detail">
                                    <i class="ri-eye-line text-lg"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.lowongan.destroy', $l->id) }}"
                                      method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition cursor-pointer"
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

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $lowongans->links() }}
    </div>
@endif


{{-- SweetAlert Delete --}}
<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Hapus lowongan ini?",
                text: "Data tidak akan bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ef4444",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Ya, hapus",
                showClass: { popup: 'swal-zoom-in' },
                hideClass: { popup: 'swal-zoom-out' },
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
</script>
