<x-layout>
  <div class="min-h-screen bg-gray-50 py-8">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold text-gray-900 mb-6">Input Data Rekap Tiga</h1>
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
          <form action="{{ route('rekapantiga.store') }}" method="POST">
              @csrf
              <div x-data="rekapForm()">
                  <div class="mb-4">
                      <label for="kode_bu" class="block text-sm font-medium text-gray-700 mb-2">Kode BU</label>
                      <input type="text" id="kode_bu" x-model="search" @input.debounce.500ms="fetchData"
                             name="kode_bu" placeholder="Masukkan kode BU..."
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      <p x-show="error" x-text="error" class="mt-1 text-sm text-red-600"></p>
                      @error('kode_bu')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="nama_bu" class="block text-sm font-medium text-gray-700 mb-2">Nama BU</label>
                      <input type="text" id="nama_bu" x-model="nama_bu" name="nama_bu" readonly
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
                      @error('nama_bu')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="id_izin" class="block text-sm font-medium text-gray-700 mb-2">ID Izin</label>
                      <input type="text" id="id_izin" x-model="id_izin" name="id_izin" readonly
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
                      @error('id_izin')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="kbli" class="block text-sm font-medium text-gray-700 mb-2">KBLI</label>
                      <input type="text" id="kbli" x-model="kbli" name="kbli" readonly
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
                      @error('kbli')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="nib" class="block text-sm font-medium text-gray-700 mb-2">NIB</label>
                      <input type="text" id="nib" name="nib"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('nib')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="kab_kota" class="block text-sm font-medium text-gray-700 mb-2">Kab/Kota</label>
                      <input type="text" id="kab_kota" name="kab_kota"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('kab_kota')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="kua" class="block text-sm font-medium text-gray-700 mb-2">KUA</label>
                      <input type="text" id="kua" name="kua"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('kua')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="tgl_oss" class="block text-sm font-medium text-gray-700 mb-2">Tanggal OSS</label>
                      <input type="date" id="tgl_oss" name="tgl_oss"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('tgl_oss')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="tgl_lsbu" class="block text-sm font-medium text-gray-700 mb-2">Tanggal LSBU</label>
                      <input type="date" id="tgl_lsbu" name="tgl_lsbu"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('tgl_lsbu')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="admin" class="block text-sm font-medium text-gray-700 mb-2">Admin</label>
                      <input type="text" id="admin" name="admin"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('admin')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="kode_ttp" class="block text-sm font-medium text-gray-700 mb-2">Kode TTP</label>
                      <input type="text" id="kode_ttp" name="kode_ttp"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('kode_ttp')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="tim_tinjauan" class="block text-sm font-medium text-gray-700 mb-2">Tim Tinjauan</label>
                      <input type="text" id="tim_tinjauan" name="tim_tinjauan"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('tim_tinjauan')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="tgl_penunjukan" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Penunjukan</label>
                      <input type="date" id="tgl_penunjukan" name="tgl_penunjukan"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('tgl_penunjukan')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                      <textarea id="catatan" name="catatan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                      @error('catatan')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <button type="submit" class="mt-6 px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                      Simpan Rekap
                  </button>
              </div>
          </form>
      </div>
  </div>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script>
      document.addEventListener('alpine:init', () => {
          Alpine.data('rekapForm', () => ({
              search: '',
              nama_bu: '',
              id_izin: '',
              kbli: '',
              error: '',
              async fetchData() {
                  if (this.search.length < 2) {
                      this.nama_bu = '';
                      this.id_izin = '';
                      this.kbli = '';
                      this.error = '';
                      return;
                  }
                  try {
                      const response = await fetch(`/api/kamus/search?kode_bu=${encodeURIComponent(this.search)}`);
                      const result = await response.json();
                      console.log(result); // Debug: Log respons ke konsol
                      if (result.success && result.data.length > 0) {
                          // Ambil elemen pertama dari array
                          const data = result.data[0];
                          this.nama_bu = data.nama_bu || '';
                          this.id_izin = data.id_izin || '';
                          this.kbli = data.kbli || '';
                          this.error = '';
                      } else {
                          this.nama_bu = '';
                          this.id_izin = '';
                          this.kbli = '';
                          this.error = result.message || 'Data tidak ditemukan';
                      }
                  } catch (error) {
                      console.error('Error:', error);
                      this.nama_bu = '';
                      this.id_izin = '';
                      this.kbli = '';
                      this.error = 'Terjadi kesalahan saat mencari data';
                  }
              }
          }));
      });
  </script>
</x-layout>