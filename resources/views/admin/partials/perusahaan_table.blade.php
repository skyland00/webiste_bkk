@if ($perusahaan->count())
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-100 text-slate-700 text-xs uppercase border-b border-slate-200">
                <tr>
                    <th class="py-3 px-6 text-left font-semibold">No</th>
                    <th class="py-3 px-6 text-left font-semibold">Perusahaan</th>
                    <th class="py-3 px-6 text-left font-semibold">Email</th>
                    <th class="py-3 px-6 text-left font-semibold">Kontak</th>
                    <th class="py-3 px-6 text-left font-semibold">Bidang</th>
                    <th class="py-3 px-6 text-left font-semibold">Status</th>
                    <th class="py-3 px-6 text-left font-semibold">Tanggal</th>
                    <th class="py-3 px-6 text-right font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
                @foreach ($perusahaan as $index => $p)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 text-slate-600">
                            {{ ($perusahaan->currentPage() - 1) * $perusahaan->perPage() + $index + 1 }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if ($p->logo)
                                    <img src="{{ asset('storage/' . $p->logo) }}"
                                        class="w-10 h-10 rounded-lg border object-cover" alt="{{ $p->nama_perusahaan }}" />
                                @else
                                    <div
                                        class="w-10 h-10 flex items-center justify-center bg-slate-200 rounded-lg text-slate-500">
                                        <i class="ri-building-line"></i>
                                    </div>
                                @endif

                                <span class="font-medium text-slate-900">{{ $p->nama_perusahaan }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-slate-700">{{ $p->user->email }}</td>
                        <td class="px-6 py-4 text-slate-700">{{ $p->kontak }}</td>
                        <td class="px-6 py-4 text-slate-700">{{ $p->bidang_usaha }}</td>

                        <td class="px-6 py-4">
                            @if ($p->status === 'pending')
                                <span
                                    class="px-3 py-1 text-xs font-medium bg-amber-100 text-amber-700 rounded-full">Pending</span>
                            @elseif($p->status === 'approved')
                                <span
                                    class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Approved</span>
                            @else
                                <span
                                    class="px-3 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">Ditolak</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-slate-700">
                            {{ $p->created_at->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                @if ($p->status !== 'approved')
                                    <form action="{{ route('admin.perusahaan.approve', $p->id) }}" method="POST">
                                        @csrf
                                        <button class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition"
                                            onclick="return confirm('Setujui perusahaan ini?')" title="Setujui">
                                            <i class="ri-check-line text-lg"></i>
                                        </button>
                                    </form>
                                @endif

                                @if ($p->status !== 'rejected')
                                    <form action="{{ route('admin.perusahaan.reject', $p->id) }}" method="POST">
                                        @csrf
                                        <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition"
                                            onclick="return confirm('Tolak perusahaan ini?')" title="Tolak">
                                            <i class="ri-close-line text-lg"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
