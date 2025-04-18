<x-layout>
  <div class="container mx-auto p-6">
      <div class="overflow-x-auto rounded-lg shadow-lg">
          <table class="table-auto w-full bg-white">
              <thead class="bg-gray-100">
                  <tr class="text-center">
                      <th class="px-4 py-2">Name</th>
                      <th class="px-4 py-2">Jenis Kelamin</th>
                      <th class="px-4 py-2">Agama</th>
                      <th class="px-4 py-2">Pekerjaan</th>
                      <th class="px-4 py-2">Gambar</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($data as $item)
                  <tr class="text-center hover:bg-gray-50 transition">
                      <td class="px-4 py-2">{{ $item->nama_lengkap }}</td>
                      <td class="px-4 py-2">{{ $item->jenis_kelamin }}</td>
                      <td class="px-4 py-2">{{ $item->agama }}</td>
                      <td class="px-4 py-2">{{ $item->pekerjaan }}</td>
                      <td class="px-5 py-2">
                          <div class="flex justify-center">
                              <img src="{{ $item->foto_ktp }}" alt="{{ $item->nama_lengkap }}" class="max-w-[100px] h-auto object-cover rounded-xl">
                          </div>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>

      <div class="mt-4">
          {{ $item->links }}
      </div>
  </div>
</x-layout>