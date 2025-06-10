<x-layout>
  <div class="min-h-screen bg-gray-50 py-8">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <!-- Header -->
          <div class="mb-8">
              <div class="flex justify-between items-center">
                  <div>
                      <h1 class="text-4xl font-extrabold text-gray-900">Data Kamus BU</h1>
                      <p class="mt-2 text-lg text-gray-600">Kelola data kamus badan usaha dengan mudah</p>
                  </div>
                  <a href="{{ route('kamus.create') }}" 
                     class="inline-flex items-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200">
                      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                      </svg>
                      Tambah Data
                  </a>
              </div>
          </div>

          <!-- Success Message -->
          @if(session('success'))
              <div x-data="{ show: true }" 
                   x-show="show" 
                   x-transition
                   class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg shadow-md">
                  <div class="flex justify-between items-center">
                      <span>{{ session('success') }}</span>
                      <button @click="show = false" class="text-green-600 hover:text-green-800">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                          </svg>
                      </button>
                  </div>
              </div>
          @endif

          <!-- Search and Filter -->
          <div class="mb-6 bg-white rounded-lg shadow-md border border-gray-200 p-4">
              <div x-data="{ search: '' }" class="flex flex-col md:flex-row gap-4">
                  <div class="flex-1">
                      <label class="block text-sm font-medium text-gray-700 mb-2">Cari Data</label>
                      <input type="text" 
                             x-model="search"
                             placeholder="Cari berdasarkan nama BU, ID izin, atau KBLI..."
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                  </div>
                  <div class="flex items-end">
                      <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                          </svg>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Data Table -->
          <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
              <div class="overflow-x-auto">
                  <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                          <tr>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama BU</th>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Izin</th>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">KBLI</th>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode BU</th>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                          </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                          @forelse($kamusBUs as $index => $kamus)
                              <tr class="hover:bg-gray-50 transition-colors duration-150">
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                      {{ $kamusBUs->firstItem() + $index }}
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="text-sm font-medium text-gray-900">{{ $kamus->nama_bu }}</div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                      {{ $kamus->id_izin }}
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                      {{ $kamus->kbli }}
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                      {{ $kamus->kode_bu }}
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                      <div class="flex items-center gap-2">
                                          <a href="{{ route('kamus.edit', $kamus) }}" 
                                             title="Edit"
                                             class="text-blue-600 hover:text-blue-800 p-1 transition-colors duration-150">
                                              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                              </svg>
                                          </a>
                                          <form action="{{ route('kamus.destroy', $kamus) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" 
                                                      title="Hapus"
                                                      onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                      class="text-red-600 hover:text-red-800 p-1 transition-colors duration-150">
                                                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                  </svg>
                                              </button>
                                          </form>
                                      </div>
                                  </td>
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="6" class="px-6 py-8 text-center">
                                      <div class="flex flex-col items-center">
                                          <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                          </svg>
                                          <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data</h3>
                                          <p class="text-gray-500 mb-4">Mulai tambahkan data kamus badan usaha</p>
                                          <a href="{{ route('kamus.create') }}" 
                                             class="inline-flex items-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200">
                                              Tambah Data Pertama
                                          </a>
                                      </div>
                                  </td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
              </div>

              <!-- Pagination -->
              @if($kamusBUs->hasPages())
                  <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                      <div class="flex items-center justify-between">
                          <div class="flex-1 flex justify-between sm:hidden">
                              @if($kamusBUs->onFirstPage())
                                  <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-white cursor-not-allowed">
                                      Previous
                                  </span>
                              @else
                                  <a href="{{ $kamusBUs->previousPageUrl() }}" 
                                     class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                      Previous
                                  </a>
                              @endif

                              @if($kamusBUs->hasMorePages())
                                  <a href="{{ $kamusBUs->nextPageUrl() }}" 
                                     class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                      Next
                                  </a>
                              @else
                                  <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-white cursor-not-allowed">
                                      Next
                                  </span>
                              @endif
                          </div>
                          <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                              <div>
                                  <p class="text-sm text-gray-700">
                                      Menampilkan
                                      <span class="font-medium">{{ $kamusBUs->firstItem() }}</span>
                                      sampai
                                      <span class="font-medium">{{ $kamusBUs->lastItem() }}</span>
                                      dari
                                      <span class="font-medium">{{ $kamusBUs->total() }}</span>
                                      hasil
                                  </p>
                              </div>
                              <div>
                                  {{ $kamusBUs->links() }}
                              </div>
                          </div>
                      </div>
                  </div>
              @endif
          </div>
      </div>
  </div>
</x-layout>