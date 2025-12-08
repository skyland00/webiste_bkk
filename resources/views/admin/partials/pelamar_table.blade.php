{{-- views/admin/pelamar/table.blade.php --}}
@if ($pelamar->count())
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-100 text-slate-700 text-xs uppercase border-b border-slate-200">
                <tr>
                    <th class="py-3 px-6 text-center font-semibold">No</th>
                    <th class="py-3 px-6 text-left font-semibold">Nama Pelamar</th>
                    <th class="py-3 px-6 text-center font-semibold">NISN</th>
                    <th class="py-3 px-6 text-left font-semibold">Lowongan</th>
                    <th class="py-3 px-6 text-center font-semibold">Status Lamaran</th>
                    <th class="py-3 px-6 text-center font-semibold">Tanggal Melamar</th>
                    <th class="py-3 px-6 text-center font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
                @foreach ($pelamar as $index => $lamaran)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 text-center text-slate-600">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if ($lamaran->pelamar->foto)
                                    <img src="{{ asset('storage/' . $lamaran->pelamar->foto) }}"
                                        class="w-10 h-10 rounded-full border object-cover"
                                        alt="{{ $lamaran->pelamar->nama_lengkap }}" />
                                @else
                                    <div
                                        class="w-10 h-10 flex items-center justify-center bg-slate-200 rounded-full text-slate-500">
                                        <i class="ri-user-line"></i>
                                    </div>
                                @endif

                                <div>
                                    <p class="font-medium text-slate-900">{{ $lamaran->pelamar->nama_lengkap }}</p>
                                    <p class="text-xs text-slate-500">{{ $lamaran->pelamar->user->email }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-center text-slate-700">{{ $lamaran->pelamar->nisn }}</td>

                        <td class="px-6 py-4">
                            <div>
                                <p class="font-medium text-slate-900">{{ $lamaran->lowongan->judul }}</p>
                                <p class="text-xs text-slate-500">{{ $lamaran->lowongan->perusahaan->nama_perusahaan }}</p>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if ($lamaran->status === 'pending')
                                <span
                                    class="px-3 py-1 text-xs font-medium bg-amber-100 text-amber-700 rounded-full">Pending</span>
                            @elseif($lamaran->status === 'diterima')
                                <span
                                    class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Diterima</span>
                            @else
                                <span
                                    class="px-3 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">Ditolak</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center text-slate-700">
                            {{ $lamaran->created_at->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.lamaran.show', $lamaran->id) }}"
                                    class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                    title="Lihat Detail">
                                    <i class="ri-eye-line text-lg"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
