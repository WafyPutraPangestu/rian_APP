<!DOCTYPE html>
<html lang="en" class="no-scrollbar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Scrollbar Hidden */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;  /* Chrome, Safari and Opera */
        }

        /* Header Styling */
        .main-header {
            height: 4rem;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 50;
            background: white;  /* Tambahkan background */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);  /* Tambahkan shadow */
        }

        /* Main Content Adjustment */
        .main-content {
            padding-top: 5rem;  /* Beri sedikit ruang ekstra */
            min-height: calc(100vh - 4rem);  /* Full height adjustment */
        }
    </style>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="no-scrollbar">
    @unless (request()->routeIs('auth.login') || request()->routeIs('auth.register'))
    <x-navigation/>
    @endunless
    <main class="container mx-auto px-4 ">
        {{ $slot }}
    </main>
</body>
</html>