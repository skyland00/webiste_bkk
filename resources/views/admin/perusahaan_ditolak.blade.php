@extends('admin.layout')

@section('title', 'Perusahaan Ditolak')

@section('content')
    <div class="space-y-8">

        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Perusahaan Ditolak</h1>
                <p class="text-sm text-slate-500 mt-1">Daftar perusahaan yang tidak lolos verifikasi</p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('admin.perusahaan') }}"
                    class="px-4 py-2 bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 rounded-lg flex items-center gap-2 transition">
                    <i class="ri-building-line text-lg"></i>
                    <span>Semua</span>
                </a>

                <a href="{{ route('admin.perusahaan.pending') }}"
                    class="px-4 py-2 bg-amber-50 hover:bg-amber-100 border border-amber-200 text-amber-700 rounded-lg flex items-center gap-2 transition">
                    <i class="ri-time-line text-lg"></i>
                    <span>Pending</span>
                </a>
            </div>
        </div>

        <!-- Table Wrapper -->
        <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">

            <!-- Table Header -->
            <div class="p-6 border-b bg-gradient-to-r from-slate-50 to-slate-100 border-slate-200">
                <h2 class="text-lg font-semibold text-slate-900">Daftar Perusahaan Ditolak</h2>
                <p class="text-sm text-slate-500">
                    Menampilkan {{ $perusahaan->count() }} perusahaan
                </p>
            </div>

            @if ($perusahaan->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-50 border-b border-slate-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">No</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Nama Perusahaan</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Email</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Kontak</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Bidang Usaha</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Ditolak Pada</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach ($perusahaan as $index => $p)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4 text-sm text-slate-700">{{ $index + 1 }}</td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            @if ($p->logo)
                                                <img src="{{ asset('storage/' . $p->logo) }}"
                                                    class="w-10 h-10 rounded-lg object-cover border border-slate-200"
                                                    alt="Logo">
                                            @else
                                                <div class="w-10 h-10 rounded-lg bg-slate-200 flex items-center justify-center">
                                                    <i class="ri-building-line text-slate-500"></i>
                                                </div>
                                            @endif

                                            <span class="font-medium text-slate-800">
                                                {{ $p->nama_perusahaan }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-slate-600">{{ $p->user->email }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-600">{{ $p->kontak }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-600">{{ $p->bidang_usaha }}</td>

                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $p->updated_at->format('d M Y, H:i') }}
                                    </td>

                                    <!-- Action -->
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center">
                                            <form action="{{ route('admin.perusahaan.approve', $p->id) }}" method="POST">
                                                @csrf
                                                <button
                                                    onclick="return confirm('Setujui perusahaan ini?')"
                                                    type="submit"
                                                    class="px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-sm rounded-lg flex items-center gap-1 transition">
                                                    <i class="ri-check-line"></i>
                                                    Setujui
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @else
                <!-- Empty State -->
                <div class="p-12 text-center text-slate-500">
                    <div class="mx-auto w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center mb-4">
                        <i class="ri-building-line text-4xl text-slate-400"></i>
                    </div>
                    <p class="text-lg font-medium text-slate-700 mb-1">Tidak Ada Perusahaan Ditolak</p>
                    <p class="text-sm text-slate-500">Semua perusahaan dalam status pending atau approved</p>
                </div>
            @endif

        </div>
    </div>
@endsection
