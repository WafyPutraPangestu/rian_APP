<header class="bg-white shadow-xl rounded-xl flex items-center sticky top-4 z-50 my-1 mx-5 max-w-[77.5rem] animate-fadeIn">
    <nav class="container mx-auto">
        <div class="flex justify-between items-center p-3">
            <!-- Logo with hover animation -->
            <div class="relative overflow-hidden rounded-lg transition-all duration-300 hover:shadow-lg group">
                <a href="/" class="flex items-center">
                    <div class="relative w-14 h-14 flex items-center justify-center overflow-hidden rounded-lg bg-gradient-to-r from-blue-50 to-indigo-50 p-2 transform transition-all duration-500 group-hover:scale-105">
                        <img src="{{ asset('storage/images/WhatsApp Image 2025-04-17 at 16.56.16_d1e96c93.jpg') }}" alt="Logo" class="h-auto w-full object-contain">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/0 to-indigo-600/0 group-hover:from-blue-600/10 group-hover:to-indigo-600/10 transition-all duration-300"></div>
                    </div>
                    <span class="ml-3 font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-700 text-lg hidden md:block">PT. Gamana Krida Bhakti</span>
                </a>
            </div>

            <!-- Navigation Links with underline animation -->
            <div class="flex space-x-1 md:space-x-3">
                <x-nav-link href="/" :active="request()->is('/')" class="relative px-3 py-2 rounded-lg text-gray-700 hover:text-blue-600 transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 overflow-hidden group ">
                    <span>Home</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-700 transition-all duration-300 group-hover:w-full"></span>
                </x-nav-link>
                
                @can('user')
                <x-nav-link href="{{ route('input') }}" :active="request()->is('input')" class="relative px-3 py-2 rounded-lg text-gray-700 hover:text-blue-600 transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 overflow-hidden group">
                    <span>Input Data</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-700 transition-all duration-300 group-hover:w-full"></span>
                </x-nav-link>
                
                <x-nav-link href="{{ route('data') }}" :active="request()->is('data')" class="relative px-3 py-2 rounded-lg text-gray-700 hover:text-blue-600 transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 overflow-hidden group">
                    <span>Data</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-700 transition-all duration-300 group-hover:w-full"></span>
                </x-nav-link>
                @endcan
            </div>

            <!-- Auth Buttons with hover effects -->
            <div class="flex items-center space-x-3">
                @auth
                <x-form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-5 py-2 rounded-lg hover:shadow-lg transition-all duration-300 group">
                        <span class="relative z-10">Logout</span>
                        <span class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-blue-700 to-indigo-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </button>
                </x-form>
                @endauth
                
                @guest
                <a href="{{ route('auth.login') }}" class="relative px-4 py-2 text-gray-700 hover:text-blue-600 transition-all duration-300 overflow-hidden group">
                    <span>Login</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-700 transition-all duration-300 group-hover:w-full"></span>
                </a>
                
                <a href="{{ route('auth.register') }}" class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-5 py-2 rounded-lg hover:shadow-lg transition-all duration-300 group">
                    <span class="relative z-10">Register</span>
                    <span class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-blue-700 to-indigo-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                </a>
                @endguest
            </div>
        </div>
    </nav>
</header>

<!-- Add animation styles to match your existing styles -->
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideRight {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    @keyframes slideLeft {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.5s ease-out forwards;
    }
    
    .animate-slideRight {
        animation: slideRight 0.5s ease-out forwards;
    }
    
    .animate-slideLeft {
        animation: slideLeft 0.5s ease-out forwards;
    }
    
    /* Active link styles */
    .nav-link-active {
        @apply text-blue-600 bg-gradient-to-r from-blue-50 to-indigo-50;
    }
    
    .nav-link-active:after {
        content: '';
        @apply absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-blue-600 to-indigo-700;
    }
</style>