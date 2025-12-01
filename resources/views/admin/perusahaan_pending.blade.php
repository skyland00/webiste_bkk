@extends('admin.layout')

@section('title', 'Perusahaan Pending')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Perusahaan Menunggu Persetujuan</h1>
            <p class="text-slate-600 mt-1">Kelola pendaftaran perusahaan baru</p>
        </div>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
        <i class="ri-checkbox-circle-line text-xl"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    <!-- Card Container -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        @if($perusahaan->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Nama Perusahaan</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Kontak</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Bidang Usaha</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Tanggal Daftar</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-slate-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach($perusahaan as $index => $p)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($p->logo)
                                        <img src="{{ asset('storage/' . $p->logo) }}"
                                             alt="Logo"
                                             class="w-10 h-10 rounded-lg object-cover border border-slate-200">
                                    @else
                                        <div class="w-10 h-10 rounded-lg bg-slate-200 flex items-center justify-center">
                                            <i class="ri-building-line text-slate-500"></i>
                                        </div>
                                    @endif
                                    <span class="font-medium text-slate-800">{{ $p->nama_perusahaan }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $p->user->email }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $p->kontak }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $p->bidang_usaha }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $p->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Button Approve -->
                                    <form action="{{ route('admin.perusahaan.approve', $p->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                                onclick="return confirm('Setujui perusahaan ini?')"
                                                class="px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition flex items-center gap-1">
                                            <i class="ri-check-line"></i>
                                            Setujui
                                        </button>
                                    </form>

                                    <!-- Button Reject -->
                                    <form action="{{ route('admin.perusahaan.reject', $p->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                                onclick="return confirm('Tolak perusahaan ini?')"
                                                class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition flex items-center gap-1">
                                            <i class="ri-close-line"></i>
                                            Tolak
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
            <div class="p-12 text-center">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-slate-100 flex items-center justify-center">
                    <i class="ri-building-line text-4xl text-slate-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-800 mb-2">Tidak Ada Perusahaan Pending</h3>
                <p class="text-slate-600">Semua pendaftaran perusahaan sudah diproses</p>
            </div>
        @endif
    </div>
</div>
@endsection
