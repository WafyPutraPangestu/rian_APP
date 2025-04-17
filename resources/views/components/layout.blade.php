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
    <x-navigation/>
    <div class="container mx-auto p-5 relative mt-20">
        <main class="relative container mx-auto rounded-2xl overflow-hidden p-5 bg-cover bg-center h-[500px]" style="background-image: url('/storage/images/tentang-kami.jpg')">
            <div class="absolute inset-0 bg-black/50"></div>
            {{ $slot }}
        </main>
    </div>
</body>
</html>