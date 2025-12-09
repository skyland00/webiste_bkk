@extends('admin.layout')

@section('content')
<div class="container mx-auto ">
    <!-- Header -->
    <div class="mb-6">
        <a href="{{ route('admin.berita.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center gap-2 mb-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar Berita
        </a>
        <h1 class="text-3xl font-bold text-gray-800">Edit Berita</h1>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-6">
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                    Judul Berita <span class="text-red-500">*</span>
                </label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('judul') border-red-500 @enderror"
                    placeholder="Masukkan judul berita">
                @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select name="kategori" id="kategori"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('kategori') border-red-500 @enderror">
                        <option value="">Pilih Kategori</option>
                        <option value="Berita Terkini" {{ old('kategori', $berita->kategori) == 'Berita Terkini' ? 'selected' : '' }}>Berita Terkini</option>
                        <option value="Info Loker" {{ old('kategori', $berita->kategori) == 'Info Loker' ? 'selected' : '' }}>Info Loker</option>
                        <option value="Tips Karir" {{ old('kategori', $berita->kategori) == 'Tips Karir' ? 'selected' : '' }}>Tips Karir</option>
                        <option value="Pengumuman" {{ old('kategori', $berita->kategori) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        <option value="Event" {{ old('kategori', $berita->kategori) == 'Event' ? 'selected' : '' }}>Event</option>
                    </select>
                    @error('kategori')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lokasi -->
                <div>
                    <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $berita->lokasi) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('lokasi') border-red-500 @enderror"
                        placeholder="Contoh: Jakarta, Bandung, Online">
                    @error('lokasi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Konten -->
            <div class="mb-6">
                <label for="konten" class="block text-sm font-medium text-gray-700 mb-2">
                    Konten Berita <span class="text-red-500">*</span>
                </label>
                <textarea name="konten" id="konten" rows="10"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('konten') border-red-500 @enderror"
                    placeholder="Tulis konten berita di sini...">{{ old('konten', $berita->konten) }}</textarea>
                @error('konten')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div class="mb-6">
                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                    Gambar Berita
                </label>

                <!-- Gambar Saat Ini -->
                @if($berita->gambar)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="max-w-md h-auto rounded-lg shadow-md">
                </div>
                @endif

                <div class="flex items-center gap-4">
                    <label for="gambar" class="cursor-pointer bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $berita->gambar ? 'Ganti Gambar' : 'Pilih Gambar' }}
                    </label>
                    <span id="file-name" class="text-sm text-gray-500">Belum ada file dipilih</span>
                </div>
                <input type="file" name="gambar" id="gambar" accept="image/*" class="hidden" onchange="updateFileName(this)">
                <p class="text-xs text-gray-500 mt-2">Format: JPG, JPEG, PNG. Maksimal 2MB</p>
                @error('gambar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <!-- Preview Gambar Baru -->
                <div id="preview-container" class="mt-4 hidden">
                    <p class="text-sm text-gray-600 mb-2">Preview gambar baru:</p>
                    <img id="preview-image" src="" alt="Preview" class="max-w-md h-auto rounded-lg shadow-md">
                </div>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Status <span class="text-red-500">*</span>
                </label>
                <div class="flex gap-6">
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="status" value="draft" {{ old('status', $berita->status) == 'draft' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700">Draft</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="status" value="published" {{ old('status', $berita->status) == 'published' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700">Publish</span>
                    </label>
                </div>
                @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200 flex items-center gap-2 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Berita
                </button>
                <a href="{{ route('admin.berita.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-2 rounded-lg transition duration-200">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function updateFileName(input) {
    const fileName = document.getElementById('file-name');
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-image');

    if (input.files && input.files[0]) {
        fileName.textContent = input.files[0].name;

        // Show preview
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        fileName.textContent = 'Belum ada file dipilih';
        previewContainer.classList.add('hidden');
    }
}
</script>
@endsection
