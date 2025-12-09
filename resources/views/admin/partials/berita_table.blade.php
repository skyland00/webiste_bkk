{{-- views/admin/partial/berita_table.blade.php --}}
@if ($berita->count())
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-100 text-slate-700 text-xs uppercase border-b border-slate-200">
                <tr>
                    <th class="py-3 px-6 text-center font-semibold">No</th>
                    <th class="py-3 px-6 text-center font-semibold">Gambar</th>
                    <th class="py-3 px-6 text-center font-semibold">Judul</th>
                    <th class="py-3 px-6 text-center font-semibold">Kategori</th>
                    <th class="py-3 px-6 text-center font-semibold">Lokasi</th>
                    <th class="py-3 px-6 text-center font-semibold">Status</th>
                    <th class="py-3 px-6 text-center font-semibold">Tanggal</th>
                    <th class="py-3 px-6 text-center font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200 text-center">
                @foreach ($berita as $index => $item)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 text-slate-600">
                            {{ ($berita->currentPage() - 1) * $berita->perPage() + $index + 1 }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center">
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                        class="w-16 h-16 rounded-lg border object-cover"
                                        alt="{{ $item->judul }}" />
                                @else
                                    <div class="w-16 h-16 flex items-center justify-center bg-slate-200 rounded-lg text-slate-500">
                                        <i class="ri-image-line text-2xl"></i>
                                    </div>
                                @endif
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="max-w-xs mx-auto">
                                <p class="font-medium text-slate-900 truncate">{{ $item->judul }}</p>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-700 rounded-full">
                                {{ $item->kategori }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-slate-700">{{ $item->lokasi }}</td>

                        <td class="px-6 py-4">
                            @if ($item->status === 'published')
                                <span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Published</span>
                            @else
                                <span class="px-3 py-1 text-xs font-medium bg-amber-100 text-amber-700 rounded-full">Draft</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-slate-700">
                            {{ $item->created_at->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                {{-- Toggle Status Button --}}
                                <form action="{{ route('admin.berita.toggle-status', $item->id) }}" method="POST" class="form-toggle-status">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="p-2 {{ $item->status === 'published' ? 'text-amber-600 hover:bg-amber-50' : 'text-emerald-600 hover:bg-emerald-50' }} rounded-lg transition"
                                        title="{{ $item->status === 'published' ? 'Jadikan Draft' : 'Publikasikan' }}">
                                        <i class="{{ $item->status === 'published' ? 'ri-draft-line' : 'ri-checkbox-circle-line' }} text-lg"></i>
                                    </button>
                                </form>

                                <a href="{{ route('admin.berita.edit', $item->id) }}"
                                    class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                    title="Edit">
                                    <i class="ri-edit-line text-lg"></i>
                                </a>

                                <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="form-delete">
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
    // Toggle status confirmation
    document.querySelectorAll('.form-toggle-status').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const button = form.querySelector('button');
            const icon = button.querySelector('i');
            const isDraft = icon.classList.contains('ri-checkbox-circle-line');

            Swal.fire({
                title: isDraft ? "Publikasikan berita?" : "Jadikan draft?",
                text: isDraft ? "Berita akan ditampilkan ke publik" : "Berita akan disembunyikan dari publik",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: isDraft ? "#10b981" : "#f59e0b",
                cancelButtonColor: "#6b7280",
                confirmButtonText: isDraft ? "Ya, publikasikan" : "Ya, jadikan draft",
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

    // Delete confirmation
    document.querySelectorAll('.form-delete').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Hapus berita ini?",
                text: "Data yang dihapus tidak dapat dikembalikan",
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
