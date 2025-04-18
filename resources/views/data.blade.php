<x-layout>
    <div class="container mx-auto p-6 animate-fadeIn">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Data Pendaftaran</h1>
            <div class="h-1 w-20 bg-gradient-to-r from-blue-600 to-indigo-700 rounded-full"></div>
        </div>

        <div class="relative overflow-hidden rounded-xl shadow-xl mb-6 bg-white border border-gray-100">
            <!-- Pencarian dan Filter -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 border-b border-gray-200 flex flex-col md:flex-row justify-between items-center gap-3">
                <div class="relative w-full md:w-64 animate-slideRight">
                    <input type="text" id="search" placeholder="Cari data..." class="pl-10 pr-4 py-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <div class="absolute left-3 top-2.5 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center gap-2 animate-slideLeft">
                    <button class="px-4 py-2 bg-white text-indigo-600 border border-indigo-200 rounded-lg hover:bg-indigo-50 transition-all duration-300 flex items-center gap-1 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter
                    </button>
                    <button class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-lg hover:from-blue-700 hover:to-indigo-800 transition-all duration-300 flex items-center gap-1 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Data
                    </button>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="overflow-x-auto min-h-[400px]">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-gray-100 text-gray-700 text-sm">
                            <th class="px-4 py-3 font-semibold text-left border-b border-gray-200">NIK</th>
                            <th class="px-4 py-3 font-semibold text-left border-b border-gray-200">Nama Lengkap</th>
                            <th class="px-4 py-3 font-semibold text-center border-b border-gray-200">Jenis Kelamin</th>
                            <th class="px-4 py-3 font-semibold text-left border-b border-gray-200">Agama</th>
                            <th class="px-4 py-3 font-semibold text-left border-b border-gray-200">Pekerjaan</th>
                            <th class="px-4 py-3 font-semibold text-center border-b border-gray-200">Foto KTP</th>
                            <th class="px-4 py-3 font-semibold text-left border-b border-gray-200">Nama Badan Usaha</th>
                            <th class="px-4 py-3 font-semibold text-left border-b border-gray-200">NIB</th>
                            <th class="px-4 py-3 font-semibold text-left border-b border-gray-200">NPWP</th>
                            <th class="px-4 py-3 font-semibold text-center border-b border-gray-200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $item)
                        <tr class="hover:bg-blue-50 text-gray-700 border-b border-gray-100 animate-fadeIn" style="animation-delay: {{ $index * 0.05 }}s">
                            <td class="px-4 py-3">{{ $item->nik }}</td>
                            <td class="px-4 py-3 font-medium">{{ $item->nama_lengkap }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="{{ $item->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }} text-xs px-2 py-1 rounded-full">
                                    {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $item->agama ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $item->pekerjaan ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center">
                                    @if($item->foto_ktp)
                                    <div class="relative group">
                                        <!-- Container gambar dengan relative positioning -->
                                        <div class="relative h-16 w-24 overflow-hidden rounded-lg shadow-sm transition-transform duration-300 group-hover:scale-105">
                                            <!-- Gambar utama -->
                                            <img src="{{ $item->foto_ktp }}" alt="{{ $item->nama_lengkap }}" 
                                                 class="h-full w-full object-cover brightness-125 contrast-125">
                                            
                                            <!-- Overlay gradient untuk lighting effect -->
                                            <div class="absolute inset-0 bg-gradient-to-b from-white/20 to-transparent"></div>
                                            
                                            <!-- Hover effect -->
                                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white/90 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="h-16 w-24 rounded-lg bg-gray-50 flex items-center justify-center text-gray-300 border-2 border-dashed border-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                                
                            </td>
                            <td class="px-4 py-3">{{ $item->nama_badan_usaha }}</td>
                            <td class="px-4 py-3">{{ $item->nib }}</td>
                            <td class="px-4 py-3">{{ $item->npwp ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-1">
                                    <button class="p-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition-all duration-300" title="Lihat Detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button class="p-1.5 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition-all duration-300" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button class="p-1.5 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 transition-all duration-300" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if(count($data) == 0)
                        <tr>
                            <td colspan="10" class="px-4 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-lg font-medium">Belum ada data</span>
                                    <p class="text-sm text-gray-400 mt-1">Data pendaftaran akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            <div class="bg-white rounded-xl shadow-md p-4 animate-fadeIn" style="animation-delay: 0.3s">
                {{ $data->links() }}
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
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
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const rows = document.querySelectorAll('tbody tr');
            
            searchInput.addEventListener('keyup', function() {
                const searchText = this.value.toLowerCase();
                
                rows.forEach(function(row) {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchText) ? '' : 'none';
                });
            });
            
            rows.forEach(function(row) {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.transition = 'transform 0.2s ease-out';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</x-layout>