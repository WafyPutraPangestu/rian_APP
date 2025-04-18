<x-layout>
  <div class="flex flex-col items-center justify-center h-screen">
      <x-form action="{{ route('input.store') }}" method="POST" enctype="multipart/form-data">
          <x-input name="nik" label="NIK" type="text" placeholder="Masukkan NIK" />
          <x-input name="nama_lengkap" label="Nama" type="text" placeholder="Masukkan Nama" />
          
          <div class="mb-4 w-full">
              <label for="jenis_kelamin" class="block text-gray-700 mb-2">Jenis Kelamin</label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="border border-gray-300 rounded-md p-2 w-full">
                  <option value="" disabled selected>Pilih Jenis Kelamin</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
              </select>
          </div>

          <x-input name="agama" label="Agama" type="text" placeholder="Masukkan Agama" />
          <x-input name="pekerjaan" label="Pekerjaan" type="text" placeholder="Masukkan Pekerjaan" />

          <div class="mb-4 w-full">
              <label for="foto_ktp" class="block text-gray-700 mb-2">Foto KTP</label>
              <input type="file" name="foto_ktp" id="foto_ktp" accept="image/*" class="border border-gray-300 rounded-md p-2 w-full" />
          </div>

          <div class="flex justify-center">
              <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">Submit</button>
          </div>
      </x-form>
  </div>
</x-layout>