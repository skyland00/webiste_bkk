<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - BKK</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @vite('resources/js/custom.js')

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

        @include('admin.partials.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- @include('admin.partials.header') --}}

            <main class="flex-1 overflow-y-auto p-10 scrollbar-thin">
                @yield('content')
            </main>

        </div>
    </div>
</body>

</html>
