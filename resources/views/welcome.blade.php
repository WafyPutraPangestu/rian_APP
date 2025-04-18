<x-layout>
    <!-- Hero Section dengan Parallax Effect -->
    <div class="parallax-container h-screen relative overflow-hidden rounded-2xl">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="container mx-auto px-4 h-full flex items-center justify-center relative">
            <div class="text-center animate-slideUp">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fadeIn">
                    <span class="text-white drop-shadow-2xl">
                        PT. Gamana Krida Bhakti
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto mb-8 animate-fadeIn delay-100">
                    Lembaga Sertifikasi Terakreditasi untuk Usaha Konstruksi Nasional
                </p>
            </div>
        </div>
    </div>


    <!-- Features Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 animate-slideUp delay-300">
                    <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Sertifikasi Digital</h3>
                    <p class="text-gray-600">Proses sertifikasi terintegrasi melalui platform digital modern</p>
                </div>

                <!-- Feature Card 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 animate-slideUp delay-400">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Proses Cepat</h3>
                    <p class="text-gray-600">Pelayanan cepat dan transparan dengan sistem terotomasi</p>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 animate-slideUp delay-500">
                    <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Keamanan Data</h3>
                    <p class="text-gray-600">Sistem keamanan berlapis untuk proteksi data optimal</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <div class="py-20 bg-indigo-900 text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="animate-fadeIn">
                    <div class="text-4xl font-bold mb-2">500+</div>
                    <div class="text-gray-300">Perusahaan Terdaftar</div>
                </div>
                <div class="animate-fadeIn delay-100">
                    <div class="text-4xl font-bold mb-2">98%</div>
                    <div class="text-gray-300">Kepuasan Pengguna</div>
                </div>
                <div class="animate-fadeIn delay-200">
                    <div class="text-4xl font-bold mb-2">24/7</div>
                    <div class="text-gray-300">Layanan Support</div>
                </div>
                <div class="animate-fadeIn delay-300">
                    <div class="text-4xl font-bold mb-2">100%</div>
                    <div class="text-gray-300">Sertifikasi Resmi</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-white text-lg font-bold mb-4">Gamana Krida Bhakti</h4>
                    <p class="text-sm">Lembaga Sertifikasi Terpercaya untuk Pembangunan Indonesia Modern</p>
                </div>
                <div>
                    <h4 class="text-white text-lg font-bold mb-4">Layanan</h4>
                    <ul class="space-y-2">
                        <li>Sertifikasi Digital</li>
                        <li>Pelatihan</li>
                        <li>Konsultasi</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white text-lg font-bold mb-4">Kontak</h4>
                    <ul class="space-y-2">
                        <li>Jl. Konstruksi No. 123</li>
                        <li>info@gamanakrida.id</li>
                        <li>(021) 1234-5678</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white text-lg font-bold mb-4">Sosial Media</h4>
                    <div class="flex space-x-4">
                        <!-- Twitter (existing) -->
                        <a href="#" class="p-2 bg-indigo-800 rounded-lg hover:bg-indigo-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                
                        <!-- Instagram -->
                        <a href="#" class="p-2 bg-indigo-800 rounded-lg hover:bg-indigo-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                            </svg>
                        </a>
                
                        <!-- TikTok -->
                        <a href="#" class="p-2 bg-indigo-800 rounded-lg hover:bg-indigo-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.394 10.692 6.33 6.33 0 0 0 10.857-4.424V8.687a8.182 8.182 0 0 0 4.773 1.526V7.79a4.831 4.831 0 0 1-3.771-1.105z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm">
                © 2024 PT. Gamana Krida Bhakti. All rights reserved.
            </div>
        </div>
    </footer>

    <style>
        .parallax-container {
            background-image: url('/storage/images/tentang-kami.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        @keyframes slideUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .animate-slideUp {
            animation: slideUp 0.8s ease-out forwards;
        }

        .animate-fadeIn {
            animation: fadeIn 1s ease-out forwards;
        }

        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
        .delay-400 { animation-delay: 400ms; }
        .delay-500 { animation-delay: 500ms; }
    </style>
</x-layout>