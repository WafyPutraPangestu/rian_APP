<x-layout>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <!-- Header Section -->
          <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-xl shadow-lg p-8 mb-8">
              <div class="text-center">
                  <div class="mx-auto flex items-center justify-center h-14 w-14 rounded-full bg-white/20 mb-4">
                      <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                      </svg>
                  </div>
                 
                  <p class="mt-2 text-blue-100">Isi form di bawah untuk menambahkan data badan usaha baru</p>
              </div>
          </div>

          <!-- Error Messages -->
          @if(session('error'))
              <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8 rounded-r-xl shadow-md" 
                   x-data="{ show: true }" 
                   x-show="show" 
                   x-transition:enter="transition ease-out duration-300"
                   x-transition:enter-start="opacity-0 transform -translate-x-4"
                   x-transition:enter-end="opacity-100 transform translate-x-0"
                   x-transition:leave="transition ease-in duration-200"
                   x-transition:leave-end="opacity-0 transform -translate-x-4">
                  <div class="flex items-center justify-between">
                      <div class="flex">
                          <div class="flex-shrink-0">
                              <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                              </svg>
                          </div>
                          <div class="ml-3">
                              <h3 class="text-sm font-semibold text-red-800">Terjadi Kesalahan</h3>
                              <p class="text-sm text-red-700 mt-1">{{ session('error') }}</p>
                          </div>
                      </div>
                      <button @click="show = false" class="text-red-500 hover:text-red-700 transition-colors duration-200">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                          </svg>
                      </button>
                  </div>
              </div>
          @endif
          
          @if ($errors->any())
              <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8 rounded-r-xl shadow-md" 
                   x-data="{ show: true }" 
                   x-show="show" 
                   x-transition:enter="transition ease-out duration-300"
                   x-transition:enter-start="opacity-0 transform -translate-x-4"
                   x-transition:enter-end="opacity-100 transform translate-x-0"
                   x-transition:leave="transition ease-in duration-200"
                   x-transition:leave-end="opacity-0 transform -translate-x-4">
                  <div class="flex items-center justify-between">
                      <div class="flex">
                          <div class="flex-shrink-0">
                              <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                              </svg>
                          </div>
                          <div class="ml-3">
                              <h3 class="text-sm font-semibold text-red-800">Harap perbaiki error berikut:</h3>
                              <ul class="text-sm text-red-700 mt-2 space-y-1">
                                  @foreach ($errors->all() as $error)
                                      <li class="flex items-center">
                                          <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-2"></span>
                                          {{ $error }}
                                      </li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                      <button @click="show = false" class="text-red-500 hover:text-red-700 transition-colors duration-200">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                          </svg>
                      </button>
                  </div>
              </div>
          @endif

          <!-- Form Section -->
          <div class="bg-white shadow-xl rounded-xl border border-gray-100 hover:shadow-2xl transition-shadow duration-300">
              <form action="{{ route('kamus.update',$kamus) }}" method="POST" class="p-8" x-data="{ form: { nama_bu: '{{ old('nama_bu') }}', id_izin: '{{ old('id_izin') }}', kbli: '{{ old('kbli') }}', kode_bu: '{{ old('kode_bu') }}' } }">
                  @csrf
                  @method('PATCH')

                  <!-- Grid Layout untuk Form Fields -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <!-- Nama Badan Usaha -->
                      <div class="space-y-2">
                          <label for="nama_bu" class="block text-sm font-semibold text-gray-700">
                              Nama Badan Usaha
                              <span class="text-red-500">*</span>
                          </label>
                          <div class="relative rounded-lg shadow-sm">
                              <input 
                                  type="text" 
                                  value ="{{ old('nama_bu', $kamus->nama_bu) }}"
                                  id="nama_bu" 
                                  name="nama_bu" 
                                  x-model="form.nama_bu"
                                  class="block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50/50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all duration-200 @error('nama_bu') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                  placeholder="Masukkan nama badan usaha"
                              >
                              @error('nama_bu')
                                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                      <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                      </svg>
                                  </div>
                              @enderror
                          </div>
                          <p x-show="form.nama_bu.length > 0" class="text-xs text-gray-500" x-text="form.nama_bu.length + '/100 karakter'"></p>
                          @error('nama_bu')
                              <p class="text-sm text-red-600 flex items-center mt-1">
                                  <svg class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                  </svg>
                                  {{ $message }}
                              </p>
                          @enderror
                      </div>

                      <!-- ID Izin -->
                      <div class="space-y-2">
                          <label for="id_izin" class="block text-sm font-semibold text-gray-700">
                              ID Izin
                              <span class="text-red-500">*</span>
                          </label>
                          <div class="relative rounded-lg shadow-sm">
                              <input 
                                  type="text"
                                  value="{{ old('id_izin', $kamus->id_izin) }}" 
                                  id="id_izin" 
                                  name="id_izin" 
                                  x-model="form.id_izin"
                                  class="block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50/50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all duration-200 @error('id_izin') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                  placeholder="Masukkan ID izin"
                              >
                              @error('id_izin')
                                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                      <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                      </svg>
                                  </div>
                              @enderror
                          </div>
                          <p x-show="form.id_izin.length > 0" class="text-xs text-gray-500" x-text="form.id_izin.length + '/50 karakter'"></p>
                          @error('id_izin')
                              <p class="text-sm text-red-600 flex items-center mt-1">
                                  <svg class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                  </svg>
                                  {{ $message }}
                              </p>
                          @enderror
                      </div>

                      <!-- KBLI -->
                      <div class="space-y-2">
                          <label for="kbli" class="block text-sm font-semibold text-gray-700">
                              KBLI
                              <span class="text-red-500">*</span>
                          </label>
                          <div class="relative rounded-lg shadow-sm">
                              <input 
                                  type="text" 
                                  id="kbli" 
                                  value="{{ old('kbli', $kamus->kbli) }}"
                                  name="kbli" 
                                  x-model="form.kbli"
                                  class="block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50/50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all duration-200 @error('kbli') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                  placeholder="Masukkan kode KBLI"
                              >
                              @error('kbli')
                                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                      <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                      </svg>
                                  </div>
                              @enderror
                          </div>
                          <p x-show="form.kbli.length > 0" class="text-xs text-gray-500" x-text="form.kbli.length + '/20 karakter'"></p>
                          @error('kbli')
                              <p class="text-sm text-red-600 flex items-center mt-1">
                                  <svg class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                  </svg>
                                  {{ $message }}
                              </p>
                          @enderror
                      </div>

                      <!-- Kode Badan Usaha -->
                      <div class="space-y-2">
                          <label for="kode_bu" class="block text-sm font-semibold text-gray-700">
                              Kode Badan Usaha
                              <span class="text-red-500">*</span>
                          </label>
                          <div class="relative rounded-lg shadow-sm">
                              <input 
                                  type="text" 
                                  id="kode_bu" 
                                  value="{{ old('kode_bu', $kamus->kode_bu) }}"
                                  name="kode_bu" 
                                  x-model="form.kode_bu"
                                  class="block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50/50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all duration-200 @error('kode_bu') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                  placeholder="Masukkan kode badan usaha"
                              >
                              @error('kode_bu')
                                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                      <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                      </svg>
                                  </div>
                              @enderror
                          </div>
                          <p x-show="form.kode_bu.length > 0" class="text-xs text-gray-500" x-text="form.kode_bu.length + '/50 karakter'"></p>
                          @error('kode_bu')
                              <p class="text-sm text-red-600 flex items-center mt-1">
                                  <svg class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                  </svg>
                                  {{ $message }}
                              </p>
                          @enderror
                      </div>
                  </div>

                  <!-- Action Buttons -->
                  <div class="pt-8 border-t border-gray-200 mt-8">
                      <div class="flex flex-col sm:flex-row gap-4 sm:justify-end">
                          <a href="{{ route('kamus.index') }}" 
                             class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-200 shadow-sm text-sm font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-50 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-all duration-200">
                              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                              </svg>
                              Batal
                          </a>
                          <button type="submit" 
                                  class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-transparent text-sm font-semibold rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-md transition-all duration-200">
                              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                              </svg>
                              Simpan Perubahan
                          </button>
                      </div>
                  </div>
              </form>
          </div>

          <!-- Footer Info -->
          <div class="mt-6 text-center">
              <p class="text-sm text-gray-500">
                  <span class="text-red-500">*</span> Menandakan field yang wajib diisi
              </p>
          </div>
      </div>
  </div>
</x-layout>