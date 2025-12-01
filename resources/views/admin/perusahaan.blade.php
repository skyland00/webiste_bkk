@extends('admin.layout')

@section('title', 'Semua Perusahaan')

@section('content')
<div class="space-y-8">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Semua Perusahaan</h1>
            <p class="text-sm text-slate-500 mt-1">Kelola seluruh perusahaan yang terdaftar</p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.perusahaan.pending') }}" class="px-4 py-2 bg-amber-50 hover:bg-amber-100 border border-amber-200 text-amber-700 rounded-lg flex items-center gap-2 transition">
                <i class="ri-time-line text-lg"></i>
                <span>Pending</span>
                @if ($pendingCount)
                    <span class="px-2 py-0.5 bg-amber-600 text-white text-xs rounded-full font-semibold">{{ $pendingCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.perusahaan.rejected') }}" class="px-4 py-2 bg-red-50 hover:bg-red-100 border border-red-200 text-red-700 rounded-lg flex items-center gap-2 transition">
                <i class="ri-close-circle-line text-lg"></i>
                <span>Ditolak</span>
                @if ($rejectedCount)
                    <span class="px-2 py-0.5 bg-red-600 text-white text-xs rounded-full font-semibold">{{ $rejectedCount }}</span>
                @endif
            </a>
        </div>
    </div>

    <!-- Cards Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total -->
        <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                    <i class="ri-building-line text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Total Perusahaan</p>
                    <p class="text-3xl font-semibold text-slate-900">{{ $totalClean }}</p>
                    <p class="text-xs text-slate-400 mt-1">Hanya yang disetujui</p>
                </div>
            </div>
        </div>

        <!-- Approved -->
        <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
                    <i class="ri-checkbox-circle-line text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Disetujui</p>
                    <p class="text-3xl font-semibold text-slate-900">{{ $approvedCount }}</p>
                    <p class="text-xs text-slate-400 mt-1">Perusahaan aktif</p>
                </div>
            </div>
        </div>

        <!-- Pending -->
        <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center">
                    <i class="ri-time-line text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Pending</p>
                    <p class="text-3xl font-semibold text-slate-900">{{ $pendingCount }}</p>
                    <p class="text-xs text-slate-400 mt-1">Menunggu verifikasi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Wrapper -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <div class="p-6 border-b bg-slate-50 border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Daftar Perusahaan</h2>
            <p class="text-sm text-slate-500">Data lengkap seluruh perusahaan</p>
        </div>

        @if($perusahaan->count())
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
                        @foreach($perusahaan as $index => $p)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($p->logo)
                                        <img src="{{ asset('storage/' . $p->logo) }}" class="w-10 h-10 rounded-lg border object-cover" />
                                    @else
                                        <div class="w-10 h-10 flex items-center justify-center bg-slate-200 rounded-lg text-slate-500">
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
                                @if($p->status === 'pending')
                                    <span class="px-3 py-1 text-xs bg-amber-100 text-amber-700 rounded-full">Pending</span>
                                @elseif($p->status === 'approved')
                                    <span class="px-3 py-1 text-xs bg-emerald-100 text-emerald-700 rounded-full">Approved</span>
                                @else
                                    <span class="px-3 py-1 text-xs bg-red-100 text-red-700 rounded-full">Ditolak</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-slate-700">
                                {{ $p->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4 text-right flex items-center justify-end gap-2">
                                @if($p->status !== 'approved')
                                    <form action="{{ route('admin.perusahaan.approve', $p->id) }}" method="POST">
                                        @csrf
                                        <button class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" onclick="return confirm('Setujui perusahaan ini?')">
                                            <i class="ri-check-line text-lg"></i>
                                        </button>
                                    </form>
                                @endif

                                @if($p->status !== 'rejected')
                                    <form action="{{ route('admin.perusahaan.reject', $p->id) }}" method="POST">
                                        @csrf
                                        <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" onclick="return confirm('Tolak perusahaan ini?')">
                                            <i class="ri-close-line text-lg"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <div class="p-12 text-center text-slate-500">
                <div class="mx-auto w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center mb-3">
                    <i class="ri-building-line text-4xl text-slate-400"></i>
                </div>
                <p class="text-lg font-medium text-slate-700">Belum Ada Perusahaan</p>
                <p class="text-sm">Data perusahaan masih kosong.</p>
            </div>
        @endif
    </div>
</div>
@endsection
