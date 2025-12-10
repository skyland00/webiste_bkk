@extends('perusahaan.layout')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="max-w-4xl">

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Profil Perusahaan</h1>
            <p class="text-sm text-slate-600 mt-1">Kelola informasi perusahaan Anda</p>
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

        {{-- Main Card --}}
        <div class="bg-white rounded-lg border border-slate-200 shadow-sm">

            {{-- Logo Section --}}
            <div class="p-6 border-b border-slate-200">
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Logo Perusahaan</h2>

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
                            class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center transition-colors">
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
            </div>

            {{-- Form --}}
            <form action="{{ route('perusahaan.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-6 space-y-5">

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
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0
                                file:text-sm file:font-medium
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100
                                cursor-pointer">
                        @error('logo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nama Perusahaan --}}
                    <div>
                        <label for="nama_perusahaan" class="block text-sm font-medium text-slate-700 mb-2">
                            Nama Perusahaan <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            name="nama_perusahaan"
                            id="nama_perusahaan"
                            value="{{ old('nama_perusahaan', $perusahaan->nama_perusahaan ?? '') }}"
                            class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama_perusahaan') border-red-500 @enderror"
                            placeholder="PT. Nama Perusahaan">
                        @error('nama_perusahaan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kontak --}}
                    <div>
                        <label for="kontak" class="block text-sm font-medium text-slate-700 mb-2">
                            Kontak <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-phone-line text-slate-400"></i>
                            </div>
                            <input type="text"
                                name="kontak"
                                id="kontak"
                                value="{{ old('kontak', $perusahaan->kontak ?? '') }}"
                                class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kontak') border-red-500 @enderror"
                                placeholder="08123456789">
                        </div>
                        @error('kontak')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-slate-700 mb-2">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <i class="ri-map-pin-line text-slate-400"></i>
                            </div>
                            <textarea name="alamat"
                                id="alamat"
                                rows="3"
                                class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('alamat') border-red-500 @enderror"
                                placeholder="Jl. Nama Jalan No. XX, Kota, Provinsi">{{ old('alamat', $perusahaan->alamat ?? '') }}</textarea>
                        </div>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Bidang Usaha --}}
                    <div>
                        <label for="bidang_usaha" class="block text-sm font-medium text-slate-700 mb-2">
                            Bidang Usaha <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-briefcase-line text-slate-400"></i>
                            </div>
                            <input type="text"
                                name="bidang_usaha"
                                id="bidang_usaha"
                                value="{{ old('bidang_usaha', $perusahaan->bidang_usaha ?? '') }}"
                                class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('bidang_usaha') border-red-500 @enderror"
                                placeholder="Teknologi, Manufaktur, Jasa, dll">
                        </div>
                        @error('bidang_usaha')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- Footer Actions --}}
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 rounded-b-lg flex items-center justify-end gap-3">
                    <a href="{{ route('perusahaan.dashboard') }}"
                        class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <i class="ri-save-line"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

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
