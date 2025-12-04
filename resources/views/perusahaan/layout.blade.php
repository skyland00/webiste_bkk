<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Dashboard Perusahaan - Bursa Kerja Khusus' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @layer utilities {
            .scrollbar-thin::-webkit-scrollbar {
                width: 6px;
            }

            .scrollbar-thin::-webkit-scrollbar-track {
                background: #f1f5f9;
            }

            .scrollbar-thin::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 3px;
            }

            .scrollbar-thin::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }
        }
    </style>
</head>

<body class="bg-slate-50 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">

        {{-- Sidebar --}}
        @include('perusahaan.partials.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">


            {{-- Content --}}
            <main class="flex-1 overflow-y-auto p-6 scrollbar-thin">
                @yield('content')
            </main>

        </div>

    </div>
</body>

</html>
