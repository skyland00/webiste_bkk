@extends('perusahaan.layout')

@section('content')

    <main class="flex-1 overflow-y-auto scrollbar-thin">

        <div class="w-full max-w-6xl pb-12 px-4">

            {{-- Breadcrumb --}}
            <!-- <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
                <a href="{{ route('perusahaan.dashboard') }}" class="hover:text-slate-900 transition">Dashboard</a>
                <i class="ri-arrow-right-s-line text-xs"></i>
                <span class="text-slate-900">Profil Perusahaan</span>
            </nav> -->

            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-slate-900 mb-2">Profil Perusahaan</h1>
                <p class="text-slate-600">Kelola informasi perusahaan Anda</p>
            </div>

            {{-- Alert Success --}}
            @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-start gap-3">
                <i class="ri-checkbox-circle-line text-green-600 text-xl flex-shrink-0 mt-0.5"></i>
                <div class="flex-1">
                    <p class="text-sm font-medium text-green-900">Berhasil!</p>
                    <p class="text-sm text-green-700 mt-0.5">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            @endif

            {{-- Form Card --}}
            <div class="bg-white rounded-lg border border-slate-200 shadow-sm w-full">

                <form action="{{ route('perusahaan.profile.update') }}" method="POST" enctype="multipart/form-data" class="p-7 space-y-8">
                    @csrf
                    @method('PUT')

                    {{-- Logo Section --}}
                    <div class="space-y-6">
                        <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Logo Perusahaan</h2>

                        <div class="flex items-start gap-6">
                            {{-- Current Logo --}}
                            <div class="relative">
                                <img id="logoPreview"
                                    src="{{ $perusahaan && $perusahaan->logo ? asset('storage/' . $perusahaan->logo) : asset('images/bkk.jpg') }}"
                                    class="w-24 h-24 rounded-lg object-cover border-2 border-slate-200"
                                    alt="Logo Perusahaan">

                                @if($perusahaan && $perusahaan->logo)
                                <button type="button"
                                    onclick="deleteLogo()"
                                    class="absolute -top-2 -right-2 w-6 h-6 bg-rose-500 hover:bg-rose-600 text-white rounded-full flex items-center justify-center transition-colors">
                                    <i class="ri-close-line text-sm"></i>
                                </button>
                                @endif
                            </div>

                            {{-- Upload Info --}}
                            <div class="flex-1">
                                <p class="text-sm text-slate-600 mb-2">
                                    Format: JPG, PNG, JPEG (Maks. 2MB)
                                </p>
                                <p class="text-xs text-slate-500">
                                    Logo akan ditampilkan di profil perusahaan dan daftar lowongan
                                </p>
                            </div>
                        </div>

                        {{-- Upload Logo --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Ganti Logo
                            </label>
                            <input type="file"
                                name="logo"
                                id="logoInput"
                                accept="image/jpeg,image/png,image/jpg"
                                onchange="previewLogo(event)"
                                class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2.5 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-medium
                                    file:bg-slate-100 file:text-slate-700
                                    hover:file:bg-slate-200
                                    cursor-pointer transition-all">
                            @error('logo')
                                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Informasi Perusahaan --}}
                    <div class="space-y-6">
                        <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Informasi Perusahaan</h2>

                        <div class="space-y-5">
                            {{-- Nama Perusahaan --}}
                            <div>
                                <label for="nama_perusahaan" class="block text-sm font-medium text-slate-700 mb-2">
                                    Nama Perusahaan <span class="text-rose-500">*</span>
                                </label>
                                <input type="text"
                                    name="nama_perusahaan"
                                    id="nama_perusahaan"
                                    value="{{ old('nama_perusahaan', $perusahaan->nama_perusahaan ?? '') }}"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('nama_perusahaan') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="PT. Nama Perusahaan">
                                @error('nama_perusahaan')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Bidang Usaha --}}
                            <div>
                                <label for="bidang_usaha" class="block text-sm font-medium text-slate-700 mb-2">
                                    Bidang Usaha <span class="text-rose-500">*</span>
                                </label>
                                <input type="text"
                                    name="bidang_usaha"
                                    id="bidang_usaha"
                                    value="{{ old('bidang_usaha', $perusahaan->bidang_usaha ?? '') }}"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('bidang_usaha') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="contoh: Teknologi, Manufaktur, Jasa">
                                @error('bidang_usaha')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Kontak & Alamat --}}
                    <div class="space-y-6">
                        <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Kontak & Alamat</h2>

                        <div class="space-y-5">
                            {{-- Kontak --}}
                            <div>
                                <label for="kontak" class="block text-sm font-medium text-slate-700 mb-2">
                                    Kontak <span class="text-rose-500">*</span>
                                </label>
                                <input type="text"
                                    name="kontak"
                                    id="kontak"
                                    value="{{ old('kontak', $perusahaan->kontak ?? '') }}"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('kontak') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="08123456789">
                                @error('kontak')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-slate-700 mb-2">
                                    Alamat <span class="text-rose-500">*</span>
                                </label>
                                <textarea name="alamat"
                                    id="alamat"
                                    rows="4"
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 resize-none transition-all @error('alamat') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="Jl. Nama Jalan No. XX, Kota, Provinsi">{{ old('alamat', $perusahaan->alamat ?? '') }}</textarea>
                                @error('alamat')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-end gap-3 pt-6 border-t">
                        <a href="{{ route('perusahaan.dashboard') }}"
                            class="px-6 py-2.5 text-slate-600 hover:text-slate-900 font-medium transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-medium rounded-lg shadow-sm transition-colors flex items-center gap-2">
                            <i class="ri-save-line"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </main>

    <script>
    // Preview logo sebelum upload
    function previewLogo(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('logoPreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    // Delete logo dengan AJAX
    function deleteLogo() {
        if (!confirm('Yakin ingin menghapus logo?')) return;

        fetch('{{ route("perusahaan.profile.delete-logo") }}', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('logoPreview').src = '{{ asset("images/bkk.jpg") }}';
                location.reload();
            } else {
                alert(data.message || 'Gagal menghapus logo');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus logo');
        });
    }
    </script>
@endsection