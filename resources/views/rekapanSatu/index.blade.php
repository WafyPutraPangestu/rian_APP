<x-layout>
  <div class="min-h-screen bg-gray-50 py-8">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold text-gray-900 mb-6">Daftar Rekap Satu</h1>
          
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

          <div class="mb-4 flex space-x-4">
              <a href="{{ route('rekapansatu.create') }}"
                 class="inline-block px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                  Tambah Rekap
              </a>
              <a href="{{ route('rekapansatu.export') }}"
                 class="inline-block px-5 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-200">
                  Download Excel
              </a>
          </div>

          <div class="overflow-x-auto">
              <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                  <thead class="bg-gray-100">
                      <tr>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama BU</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">ID Izin</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">KBLI</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Asosiasi</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Kota/Kab</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tgl Pembayaran</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama TTP</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama ABU 1</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama ABU 2</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Pemutus 1</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Pemutus 2</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Pemutus 3</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">KUA</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Metode Bayar</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah Biaya</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Potongan Admin</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Status Terbit</th>
                          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($rekapanSatus as $rekap)
                          <tr class="border-b border-gray-200 hover:bg-gray-50">
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->nama_bu }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->id_izin }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->kbli }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->asosiasi }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->kota_kab }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->tanggal_pembayaran }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->nama_ttp }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->nama_abu_1 }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->nama_abu_2 }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->nama_pemutus_1 }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->nama_pemutus_2 }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->nama_pemutus_3 }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->kua }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->mtd_byr }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ number_format($rekap->jumlah_biaya, 2) }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ number_format($rekap->potongan_admin, 2) }}</td>
                              <td class="px-4 py-3 text-sm text-gray-900">{{ $rekap->status_terbit }}</td>
                              <td class="px-4 py-3 text-sm">
                                  <a href="{{ route('rekapansatu.edit', $rekap->id) }}"
                                     class="text-blue-600 hover:text-blue-800 mr-3">Edit</a>
                                  <form action="{{ route('rekapansatu.destroy', $rekap->id) }}" method="POST" class="inline-block">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="text-red-600 hover:text-red-800"
                                              onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                  </form>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="18" class="px-4 py-3 text-sm text-gray-500 text-center">Belum ada data rekap.</td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</x-layout>