@extends('admin.layout')

@section('title', 'Tambah Berita')

@section('content')
    <div class="w-full max-w-6xl pb-12 px-4">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-900 transition">Dashboard</a>
            <i class="ri-arrow-right-s-line text-xs"></i>
            <a href="{{ route('admin.berita.index') }}" class="hover:text-slate-900 transition">Berita</a>
            <i class="ri-arrow-right-s-line text-xs"></i>
            <span class="text-slate-900">Tambah Berita</span>
        </nav>

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 mb-2">Tambah Berita Baru</h1>
            <p class="text-slate-600">Buat berita baru untuk dipublikasikan</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-lg border border-slate-200 shadow-sm w-full">

            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" 
                  class="p-7 space-y-8" id="beritaForm">
                @csrf

                {{-- Informasi Dasar --}}
                <div class="space-y-6">
                    <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Informasi Dasar</h2>

                    <div class="space-y-5">
                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Judul Berita <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="judul" value="{{ old('judul') }}"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('judul') border-rose-300 bg-rose-50 @enderror"
                                placeholder="Masukkan judul berita yang menarik">
                            @error('judul')
                                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Grid 2 --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Kategori <span class="text-rose-500">*</span>
                                </label>
                                <select name="kategori"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('kategori') border-rose-300 bg-rose-50 @enderror">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Berita Terkini" {{ old('kategori') == 'Berita Terkini' ? 'selected' : '' }}>Berita Terkini</option>
                                    <option value="Info Loker" {{ old('kategori') == 'Info Loker' ? 'selected' : '' }}>Info Loker</option>
                                    <option value="Tips Karir" {{ old('kategori') == 'Tips Karir' ? 'selected' : '' }}>Tips Karir</option>
                                    <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                    <option value="Event" {{ old('kategori') == 'Event' ? 'selected' : '' }}>Event</option>
                                </select>
                                @error('kategori')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Lokasi <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 focus:ring-slate-200 transition-all @error('lokasi') border-rose-300 bg-rose-50 @enderror"
                                    placeholder="contoh: Jakarta, Bandung, Online">
                                @error('lokasi')
                                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Konten Berita --}}
                <div class="space-y-6">
                    <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Konten Berita</h2>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Konten <span class="text-rose-500">*</span>
                            </label>
                            <textarea name="konten" rows="10"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:border-slate-400 focus:ring-2 resize-none @error('konten') border-rose-300 bg-rose-50 @enderror"
                                placeholder="Tulis konten berita di sini...">{{ old('konten') }}</textarea>
                            @error('konten')
                                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Media & Publikasi --}}
                <div class="space-y-6">
                    <h2 class="text-lg font-semibold text-slate-900 pb-3 border-b">Media & Publikasi</h2>

                    <div class="space-y-5">
                        {{-- Gambar --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Gambar Berita <span class="text-slate-400 text-xs">(opsional)</span>
                            </label>
                            
                            <div class="flex items-start gap-4">
                                <label for="gambar" 
                                    class="cursor-pointer px-4 py-2.5 bg-slate-100 hover:bg-slate-200 border border-slate-200 rounded-lg transition-all flex items-center gap-2 text-slate-700 font-medium">
                                    <i class="ri-image-add-line text-lg"></i>
                                    <span>Pilih Gambar</span>
                                </label>
                                <div class="flex-1">
                                    <span id="file-name" class="text-sm text-slate-500 block">Belum ada file dipilih</span>
                                    <p class="text-xs text-slate-400 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB</p>
                                </div>
                            </div>
                            
                            <input type="file" name="gambar" id="gambar" accept="image/*" class="hidden" onchange="updateFileName(this)">
                            
                            @error('gambar')
                                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                            
                            {{-- Preview --}}
                            <div id="preview-container" class="mt-4 hidden">
                                <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg">
                                    <p class="text-sm font-medium text-slate-700 mb-3">Preview:</p>
                                    <img id="preview-image" src="" alt="Preview" class="max-w-md h-auto rounded-lg shadow-sm">
                                </div>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-3">
                                Status Publikasi <span class="text-rose-500">*</span>
                            </label>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-2 cursor-pointer group">
                                    <input type="radio" name="status" value="draft" {{ old('status') == 'draft' ? 'checked' : '' }}
                                        class="w-4 h-4 text-slate-900 focus:ring-2 focus:ring-slate-400">
                                    <span class="text-slate-700 group-hover:text-slate-900">Draft</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer group">
                                    <input type="radio" name="status" value="published" {{ old('status') == 'published' ? 'checked' : '' }}
                                        class="w-4 h-4 text-slate-900 focus:ring-2 focus:ring-slate-400">
                                    <span class="text-slate-700 group-hover:text-slate-900">Publish</span>
                                </label>
                            </div>
                            @error('status')
                                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-end gap-3 pt-6 border-t">
                    <a href="{{ route('admin.berita.index') }}"
                        class="px-6 py-2.5 text-slate-600 hover:text-slate-900 font-medium">
                        Batal
                    </a>
                    <button type="submit" id="submitBtn"
                        class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-medium rounded-lg shadow-sm">
                        Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            function updateFileName(input) {
                const fileName = document.getElementById('file-name');
                const previewContainer = document.getElementById('preview-container');
                const previewImage = document.getElementById('preview-image');
                
                if (input.files && input.files[0]) {
                    fileName.textContent = input.files[0].name;
                    
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

            document.getElementById('beritaForm').addEventListener('submit', function() {
                const btn = document.getElementById('submitBtn');
                btn.disabled = true;
                btn.textContent = 'Menyimpan...';
                btn.classList.add('opacity-75');
            });
        </script>
    @endpush

@endsection