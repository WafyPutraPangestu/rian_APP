<x-layout>
  <div class="min-h-screen bg-gray-50 py-8">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Rekap Dua</h1>
          @if (session('success'))
              <div x-data="{ show: true }" x-show="show" x-transition
                  class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg shadow-sm">
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
          @if (session('error'))
              <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-sm">
                  {{ session('error') }}
              </div>
          @endif
          <form action="{{ route('rekapandua.update', $rekapanDua->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div x-data="rekapForm()">
                  <div class="mb-4">
                      <label for="nama_bu" class="block text-sm font-medium text-gray-700 mb-2">Nama BU</label>
                      <input type="text" id="nama_bu" x-model="search" @input.debounce.500ms="fetchData"
                             name="nama_bu" value="{{ old('nama_bu', $rekapanDua->nama_bu) }}"
                             placeholder="Masukkan nama BU..."
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      <p x-show="error" x-text="error" class="mt-1 text-sm text-red-600"></p>
                      @error('nama_bu')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="id_izin" class="block text-sm font-medium text-gray-700 mb-2">ID Izin</label>
                      <input type="text" id="id_izin" x-model="id_izin" name="id_izin" readonly
                             value="{{ old('id_izin', $rekapanDua->id_izin) }}"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
                      @error('id_izin')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="kbli" class="block text-sm font-medium text-gray-700 mb-2">KBLI</label>
                      <input type="text" id="kbli" x-model="kbli" name="kbli" readonly
                             value="{{ old('kbli', $rekapanDua->kbli) }}"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
                      @error('kbli')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="pemutus_1" class="block text-sm font-medium text-gray-700 mb-2">Pemutus 1</label>
                      <input type="text" id="pemutus_1" name="pemutus_1"
                             value="{{ old('pemutus_1', $rekapanDua->pemutus_1) }}"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('pemutus_1')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="pemutus_2" class="block text-sm font-medium text-gray-700 mb-2">Pemutus 2</label>
                      <input type="text" id="pemutus_2" name="pemutus_2"
                             value="{{ old('pemutus_2', $rekapanDua->pemutus_2) }}"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('pemutus_2')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="pemutus_3" class="block text-sm font-medium text-gray-700 mb-2">Pemutus 3</label>
                      <input type="text" id="pemutus_3" name="pemutus_3"
                             value="{{ old('pemutus_3', $rekapanDua->pemutus_3) }}"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('pemutus_3')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="tgl_penunjukan" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Penunjukan</label>
                      <input type="date" id="tgl_penunjukan" name="tgl_penunjukan"
                             value="{{ old('tgl_penunjukan', $rekapanDua->tgl_penunjukan) }}"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('tgl_penunjukan')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                      <textarea id="catatan" name="catatan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('catatan', $rekapanDua->catatan) }}</textarea>
                      @error('catatan')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="flex space-x-4">
                      <button type="submit"
                              class="mt-6 px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                          Update Rekap
                      </button>
                      <a href="{{ route('rekapandua.index') }}"
                         class="mt-6 px-5 py-3 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 transition duration-200">
                          Kembali
                      </a>
                  </div>
              </div>
          </form>
      </div>
  </div>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script>
      document.addEventListener('alpine:init', () => {
          Alpine.data('rekapForm', () => ({
              search: '{{ old('nama_bu', $rekapanDua->nama_bu) }}',
              id_izin: '{{ old('id_izin', $rekapanDua->id_izin) }}',
              kbli: '{{ old('kbli', $rekapanDua->kbli) }}',
              error: '',
              async fetchData() {
                  if (this.search.length < 2) {
                      this.id_izin = '';
                      this.kbli = '';
                      this.error = '';
                      return;
                  }
                  try {
                      const response = await fetch(`/api/kamus/search?nama_bu=${encodeURIComponent(this.search)}`);
                      const result = await response.json();
                      console.log(result); // Debug: Log respons ke konsol
                      if (result.success && result.data.length > 0) {
                          // Ambil elemen pertama dari array
                          const data = result.data[0];
                          this.id_izin = data.id_izin || '';
                          this.kbli = data.kbli || '';
                          this.error = '';
                      } else {
                          this.id_izin = '';
                          this.kbli = '';
                          this.error = result.message || 'Data tidak ditemukan';
                      }
                  } catch (error) {
                      console.error('Error:', error);
                      this.id_izin = '';
                      this.kbli = '';
                      this.error = 'Terjadi kesalahan saat mencari data';
                  }
              }
          }));
      });
  </script>
</x-layout>