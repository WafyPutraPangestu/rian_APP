<header class=" bg-white shadow-md rounded-2xl flex items-center ">
    <nav class="container mx-auto">
        <div class="flex justify-between items-center p-5">
            <div class="max-w-[50px]">
                <a href="/">
                    <img src="{{ asset('storage/images/WhatsApp Image 2025-04-17 at 16.56.16_d1e96c93.jpg') }}" alt="Logo" class="h-auto w-full">
                </a>
            </div>
            <div class="">
                <x-nav-link href="/" :active="request()->is('/')" >Home</x-nav-links>
                @can('user')
                <x-nav-link href="{{ route('input') }}" :active="request()->is('input')">Input Data</x-nav-link>
                <x-nav-link href="{{ route('data') }}" :active="request()->is('data')">Data</x-nav-link>
                @endcan
            </div>
            <div class="flex items-center space-x-4">
                @auth
                <x-form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-500/80 transition-all duration-300 cursor-pointer">Logout</button>
                </x-form>
                @endauth
                @guest
                <a href="{{ route('auth.login') }}" class="text-gray-700 hover:text-blue-500 transition">Login</a>
                <a href="{{ route('auth.register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-es-2xl hover:bg-blue-600 transition">Register</a>
                @endguest
            </div>
        </div>
    </nav>
</header>