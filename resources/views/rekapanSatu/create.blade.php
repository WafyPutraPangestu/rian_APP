<x-layout>
  <div class="min-h-screen bg-gray-50 py-8">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold text-gray-900 mb-6">INPUT REKAP PEMBAYARAN SBU</h1>
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
          <form action="{{ route('rekapansatu.store') }}" method="POST">
              @csrf
              <div x-data="rekapForm()">
                  <div class="mb-4">
                      <label for="nama_bu" class="block text-sm font-medium text-gray-700 mb-2">Nama BU</label>
                      <input type="text" id="nama_bu" x-model="search" @input.debounce.500ms="fetchData"
                             name="nama_bu" placeholder="Masukkan nama BU..."
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      <p x-show="error" x-text="error" class="mt-1 text-sm text-red-600"></p>
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
                      <label for="asosiasi" class="block text-sm font-medium text-gray-700 mb-2">Asosiasi</label>
                      <input type="text" id="asosiasi" name="asosiasi"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('asosiasi')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="kota_kab" class="block text-sm font-medium text-gray-700 mb-2">Kota/Kabupaten</label>
                      <input type="text" id="kota_kab" name="kota_kab"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('kota_kab')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="tanggal_pembayaran" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pembayaran</label>
                      <input type="date" id="tanggal_pembayaran" name="tanggal_pembayaran"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('tanggal_pembayaran')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="nama_ttp" class="block text-sm font-medium text-gray-700 mb-2">Nama TTP</label>
                      <input type="text" id="nama_ttp" name="nama_ttp"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('nama_ttp')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div>
                  <div class="mb-4">
                      <label for="nama_abu_1" class="block text-sm font-medium text-gray-700 mb-2">Nama ABU 1</label>
                      <input type="text" id="nama_abu_1" name="nama_abu_1"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('nama_abu_1')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="nama_abu_2" class="block text-sm font-medium text-gray-700 mb-2">Nama ABU 2</label>
                      <input type="text" id="nama_abu_2" name="nama_abu_2"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('nama_abu_2')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="nama_pemutus_1" class="block text-sm font-medium text-gray-700 mb-2">Nama Pemutus 1</label>
                      <input type="text" id="nama_pemutus_1" name="nama_pemutus_1"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('nama_pemutus_1')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="nama_pemutus_2" class="block text-sm font-medium text-gray-700 mb-2">Nama Pemutus 2</label>
                      <input type="text" id="nama_pemutus_2" name="nama_pemutus_2"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('nama_pemutus_2')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="nama_pemutus_3" class="block text-sm font-medium text-gray-700 mb-2">Nama Pemutus 3</label>
                      <input type="text" id="nama_pemutus_3" name="nama_pemutus_3"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('nama_pemutus_3')
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
                      <label for="mtd_byr" class="block text-sm font-medium text-gray-700 mb-2">Metode Pembayaran</label>
                      <input type="text" id="mtd_byr" name="mtd_byr"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('mtd_byr')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="jumlah_biaya" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Biaya</label>
                      <input type="number" id="jumlah_biaya" name="jumlah_biaya" step="0.01"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('jumlah_biaya')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="potongan_admin" class="block text-sm font-medium text-gray-700 mb-2">Potongan Admin</label>
                      <input type="number" id="potongan_admin" name="potongan_admin" step="0.01"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('potongan_admin')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <label for="status_terbit" class="block text-sm font-medium text-gray-700 mb-2">Status Terbit</label>
                      <input type="text" id="status_terbit" name="status_terbit"
                             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      @error('status_terbit')
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
              id_izin: '',
              kbli: '',
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