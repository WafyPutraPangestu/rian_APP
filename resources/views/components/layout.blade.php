<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    @unless (request()->routeIs('auth.login') || request()->routeIs('auth.register'))
    <x-navigation/>
        
    @endunless
    <main class="container mx-auto px-4 ">
        {{ $slot }}
    </main>
</body>
</html>