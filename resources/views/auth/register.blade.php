<x-layout>
  <div class="flex flex-col items-center justify-center h-screen bg-gray-100">
      <div class="bg-white py-8 px-10 rounded-lg shadow-lg w-96">
          <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Register</h1>
          <x-form action="{{ route('auth.register') }}" method="POST">
              @csrf
              <x-input name="name" label="Name" type="text" placeholder="Masukkan nama" class="mb-4" />
              <x-input name="email" label="Email" type="email" placeholder="Masukkan email" class="mb-4" />
              <x-input name="no_telp" label="No Handphone" type="text" placeholder="Masukkan nomor handphone" class="mb-4" />
              <x-input name="password" label="Password" type="password" placeholder="Masukkan password" class="mb-4" />
              <x-input name="password_confirmation" label="Password Confirmation" type="password" placeholder="Konfirmasi password" class="mb-4" />
              <button type="submit" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg w-full hover:bg-blue-700 transition duration-200">
                  Register
              </button>
              <p class="mt-4 text-sm text-gray-600 text-center">
                  Sudah punya akun? <a href="{{ route('auth.login') }}" class="text-blue-600 hover:underline">Login</a>
              </p>
              <p class="mt-2 text-sm text-gray-600 text-center">
                <a href="/" class="text-blue-600 hover:underline">Kembali ke Home</a>
              </p>
          </x-form>
      </div>
  </div>
</x-layout>