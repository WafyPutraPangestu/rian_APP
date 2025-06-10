<header class="main-header animate-fadeIn">
    <nav class="container mx-auto h-full">
        <div class="flex justify-between items-center h-full px-4 md:px-6">
            <!-- Logo Section -->
            <div class="flex items-center animate-slideRight">
                <div class="relative overflow-hidden rounded-xl transition-all duration-300 hover:shadow-lg group">
                    <a href="/" class="flex items-center">
                        <div class="relative w-12 h-12 md:w-14 md:h-14 flex items-center justify-center overflow-hidden rounded-xl bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-2 transform transition-all duration-500 group-hover:scale-105 group-hover:rotate-3">
                            <img src="{{ asset('storage/images/WhatsApp Image 2025-04-17 at 16.56.16_d1e96c93.jpg') }}" 
                                 alt="Logo PT. Gamana Krida Bhakti" 
                                 class="h-full w-full object-contain filter drop-shadow-sm">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/0 to-purple-600/0 group-hover:from-blue-600/5 group-hover:to-purple-600/5 transition-all duration-300 rounded-xl"></div>
                        </div>
                        <div class="ml-3 hidden lg:block">
                            <div class="flex flex-col">
                                <div class="flex items-baseline">
                                    <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 text-2xl">LSBU</span>
                                    <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 text-sm">.ID</span>
                                </div>
                                <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 text-sm">Gamana Krida Bhakti</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-6 animate-fadeIn">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                
                @can('user')
                    <!-- Kamus Menu -->
                    <div class="relative group">
                        <x-nav-link>Kamus</x-nav-link>
                        <div class="absolute top-full left-0 w-56 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-2">
                                <a href="{{ route('kamus.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Input Data</a>
                                <a href="{{ route('kamus.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Lihat Data</a>
                            </div>
                        </div>
                    </div>

                    <!-- Rekapan Menu -->
                    <div class="relative group">
                        <x-nav-link>Rekapan</x-nav-link>
                        <div class="absolute top-full left-0 w-96 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="flex gap-6 py-4 px-4">
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-500 mb-2">Keuangan Global</h3>
                                    <a href="{{ route('rekapansatu.create') }}" class="block px-2 py-2 text-sm text-gray-700 hover:bg-gray-50">Input Data</a>
                                    <a href="{{ route('rekapansatu.index') }}" class="block px-2 py-2 text-sm text-gray-700 hover:bg-gray-50">Lihat Data</a>
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-500 mb-2">Berkas Pemutus LSBU</h3>
                                    <a href="{{ route('rekapandua.create') }}" class="block px-2 py-2 text-sm text-gray-700 hover:bg-gray-50">Input Data</a>
                                    <a href="{{ route('rekapandua.index') }}" class="block px-2 py-2 text-sm text-gray-700 hover:bg-gray-50">Lihat Data</a>
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-500 mb-2">Berkas Masuk Jatim</h3>
                                    <a href="{{ route('rekapantiga.create') }}" class="block px-2 py-2 text-sm text-gray-700 hover:bg-gray-50">Input Data</a>
                                    <a href="{{ route('rekapantiga.index') }}" class="block px-2 py-2 text-sm text-gray-700 hover:bg-gray-50">Lihat Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>

            <!-- Auth Section -->
            <div class="flex items-center space-x-3 animate-slideLeft">
                @auth
                    <div class="hidden md:flex items-center space-x-3">
                        <span class="text-sm text-gray-600">Selamat datang!</span>
                        <x-form action="{{ route('auth.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="relative overflow-hidden bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:shadow-lg transition-all duration-300 group text-sm">
                                <span class="relative z-10">Logout</span>
                                <span class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-red-600 to-red-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            </button>
                        </x-form>
                    </div>
                @endauth
                
                @guest
                    <div class="hidden md:flex items-center space-x-3">
                        <a href="{{ route('auth.login') }}" class="relative px-4 py-2 text-gray-700 hover:text-blue-600 transition-all duration-300 overflow-hidden group text-sm">
                            <span class="relative z-10">Login</span>
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-700 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        
                        <a href="{{ route('auth.register') }}" class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-4 py-2 rounded-lg hover:shadow-lg transition-all duration-300 group text-sm">
                            <span class="relative z-10">Register</span>
                            <span class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-blue-700 to-indigo-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        </a>
                    </div>
                @endguest

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200 shadow-lg">
            <div class="px-4 py-3 space-y-3">
                <x-nav-link href="/" :active="request()->is('/')" class="block w-full text-left">Home</x-nav-link>
                
                @can('user')
                    <!-- Mobile Kamus Section -->
                    <div class="space-y-2">
                        <div class="text-sm font-semibold text-gray-600 px-2">Kamus</div>
                        <a href="{{ route('kamus.create') }}" class="block pl-4 py-1 text-sm text-gray-700 hover:bg-gray-50">Input Data</a>
                        <a href="{{ route('kamus.index') }}" class="block pl-4 py-1 text-sm text-gray-700 hover:bg-gray-50">Lihat Data</a>
                    </div>

                    <!-- Mobile Rekapan Section -->
                    <div class="space-y-2">
                        <div class="text-sm font-semibold text-gray-600 px-2">Rekapan</div>
                        
                        <!-- Keuangan Global -->
                        <div class="space-y-1">
                            <div class="text-sm text-gray-500 px-4">Keuangan Global</div>
                            <a href="{{ route('rekapansatu.create') }}" class="block pl-6 py-1 text-sm text-gray-700 hover:bg-gray-50">Input Data</a>
                            <a href="{{ route('rekapansatu.index') }}" class="block pl-6 py-1 text-sm text-gray-700 hover:bg-gray-50">Lihat Data</a>
                        </div>
                        
                        <!-- Berkas Pemutus LSBU -->
                        <div class="space-y-1">
                            <div class="text-sm text-gray-500 px-4">Berkas Pemutus LSBU</div>
                            <a href="{{ route('rekapandua.create') }}" class="block pl-6 py-1 text-sm text-gray-700 hover:bg-gray-50">Input Data</a>
                            <a href="{{ route('rekapandua.index') }}" class="block pl-6 py-1 text-sm text-gray-700 hover:bg-gray-50">Lihat Data</a>
                        </div>
                        
                        <!-- Berkas Masuk Jatim -->
                        <div class="space-y-1">
                            <div class="text-sm text-gray-500 px-4">Berkas Masuk Jatim</div>
                            <a href="{{ route('rekapantiga.create') }}" class="block pl-6 py-1 text-sm text-gray-700 hover:bg-gray-50">Input Data</a>
                            <a href="{{ route('rekapantiga.index') }}" class="block pl-6 py-1 text-sm text-gray-700 hover:bg-gray-50">Lihat Data</a>
                        </div>
                    </div>
                @endcan

                <!-- Mobile Auth Section -->
                <div class="pt-3 border-t border-gray-200">
                    @auth
                        <x-form action="{{ route('auth.logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">Logout</button>
                        </x-form>
                    @endauth
                    
                    @guest
                        <a href="{{ route('auth.login') }}" class="block w-full text-left px-3 py-2 text-gray-700 hover:bg-gray-50">Login</a>
                        <a href="{{ route('auth.register') }}" class="block w-full text-left px-3 py-2 text-gray-700 hover:bg-gray-50">Register</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
    // Mobile Menu Toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    });
</script>