<x-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-6">
        <div class="w-full max-w-3xl bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-500 hover:shadow-2xl animate-fadeIn">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6">
                <h2 class="text-2xl font-bold text-white">Formulir Pendaftaran</h2>
                <p class="text-blue-100">Silakan lengkapi informasi berikut dengan benar</p>
            </div>
            
            <x-form action="{{ route('input.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Section 1: Identitas pribadi/penanggung jawab -->
                    <div class="md:col-span-2">
                        <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">
                            <span class="text-blue-600 mr-2">01</span>Identitas Pribadi / Penanggung Jawab
                        </h3>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="nik" label="NIK" type="text" placeholder="Masukkan NIK (16 digit)" :value="old('nik')" maxlength="16" required />
                        <div class="text-xs text-gray-500 mt-1">NIK harus terdiri dari 16 digit</div>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="nama_lengkap" label="Nama Lengkap" type="text" placeholder="Masukkan Nama Lengkap" :value="old('nama_lengkap')" required />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <label for="jenis_kelamin" class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 ease-in-out">
                            <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="agama" label="Agama" type="text" placeholder="Masukkan Agama" :value="old('agama')" />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="pekerjaan" label="Pekerjaan" type="text" placeholder="Masukkan Pekerjaan" :value="old('pekerjaan')" />
                    </div>
                    
                    <div class="md:col-span-2 transform transition-all duration-500 hover:scale-[1.02]">
                        <div class="mb-6 p-4 border border-dashed border-blue-300 rounded-lg bg-blue-50">
                            <label for="foto_ktp" class="block text-gray-700 font-medium mb-2">
                                <div class="flex items-center justify-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Foto KTP
                                </div>
                                <div class="text-center text-sm text-gray-500">Klik atau seret file ke area ini</div>
                            </label>
                            <input type="file" name="foto_ktp" id="foto_ktp" accept="image/*" class="w-full border border-gray-300 rounded-lg p-2 cursor-pointer bg-white" />
                        </div>
                    </div>
                    
                    <!-- Section 2: Informasi Badan Usaha -->
                    <div class="md:col-span-2 mt-6">
                        <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">
                            <span class="text-blue-600 mr-2">02</span>Informasi Badan Usaha
                        </h3>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="nama_badan_usaha" label="Nama Badan Usaha" type="text" placeholder="Masukkan Nama Badan Usaha" :value="old('nama_badan_usaha')" required />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="nib" label="Nomor Induk Berusaha (NIB)" type="text" placeholder="Masukkan NIB" :value="old('nib')" required />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="npwp" label="NPWP" type="text" placeholder="Masukkan NPWP" :value="old('npwp')" />
                        <div class="text-xs text-gray-500 mt-1">Opsional</div>
                    </div>
                    
                    <div class="md:col-span-2 transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="alamat_kantor" label="Alamat Kantor" type="text" placeholder="Masukkan Alamat Kantor" :value="old('alamat_kantor')" required />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="provinsi" label="Provinsi" type="text" placeholder="Masukkan Provinsi" :value="old('provinsi')" required />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="kabupaten" label="Kabupaten/Kota" type="text" placeholder="Masukkan Kabupaten/Kota" :value="old('kabupaten')" required />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="kode_pos" label="Kode Pos" type="text" placeholder="Masukkan Kode Pos" :value="old('kode_pos')" />
                        <div class="text-xs text-gray-500 mt-1">Opsional</div>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="no_telepon" label="No. Telepon" type="tel" placeholder="Masukkan Nomor Telepon" :value="old('no_telepon')" />
                        <div class="text-xs text-gray-500 mt-1">Opsional</div>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="email_perusahaan" label="Email Perusahaan" type="email" placeholder="Masukkan Email Perusahaan" :value="old('email_perusahaan')" />
                        <div class="text-xs text-gray-500 mt-1">Opsional</div>
                    </div>
                    
                    <!-- Section 3: Dokumen Pendukung -->
                    <div class="md:col-span-2 mt-6">
                        <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">
                            <span class="text-blue-600 mr-2">03</span>Dokumen Pendukung
                        </h3>
                        <p class="text-sm text-gray-500 mb-4">Semua dokumen di bawah ini bersifat opsional</p>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="akte_pendirian" label="Akte Pendirian" type="text" placeholder="Masukkan Akte Pendirian" :value="old('akte_pendirian')" />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="siup" label="SIUP" type="text" placeholder="Masukkan SIUP" :value="old('siup')" />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="tdp" label="TDP" type="text" placeholder="Masukkan TDP" :value="old('tdp')" />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="sertifikat_iso" label="Sertifikat ISO" type="text" placeholder="Masukkan Sertifikat ISO" :value="old('sertifikat_iso')" />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="struktur_organisasi" label="Struktur Organisasi" type="text" placeholder="Masukkan Struktur Organisasi" :value="old('struktur_organisasi')" />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="dokumen_pendukung_lain" label="Dokumen Pendukung Lain" type="text" placeholder="Masukkan Dokumen Pendukung Lain" :value="old('dokumen_pendukung_lain')" />
                    </div>
                    
                    <!-- Section 4: Keterangan Tambahan -->
                    <div class="md:col-span-2 mt-6">
                        <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">
                            <span class="text-blue-600 mr-2">04</span>Keterangan Tambahan
                        </h3>
                    </div>
                    
                    <div class="md:col-span-2 transform transition-all duration-500 hover:scale-[1.02]">
                        <label for="catatan" class="block text-gray-700 font-medium mb-2">Catatan</label>
                        <textarea name="catatan" id="catatan" rows="4" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="Masukkan Catatan tambahan (jika ada)">{{ old('catatan') }}</textarea>
                    </div>
                </div>
                
                <div class="flex justify-center mt-8">
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-medium px-8 py-3 rounded-lg hover:from-blue-700 hover:to-indigo-800 transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-lg hover:shadow-xl">
                        <div class="flex items-center">
                            <span>Submit Formulir</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </div>
            </x-form>
        </div>
    </div>
    
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        /* Override x-input styles for consistency */
        [x-input] input, [x-input] select, [x-input] textarea {
            @apply bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300;
        }
        
        [x-input] label {
            @apply block text-gray-700 font-medium mb-2;
        }
        
        /* Add input validation animation */
        input:invalid:focus, select:invalid:focus, textarea:invalid:focus {
            animation: shake 0.3s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        /* Input focus animation */
        input:focus, select:focus, textarea:focus {
            animation: pulse 1s;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.5); }
            70% { box-shadow: 0 0 0 5px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation sequence to form elements
            const formElements = document.querySelectorAll('.transform');
            formElements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.animation = `fadeIn 0.5s ease-out ${index * 0.05}s forwards`;
            });
            
            // Add ripple effect to submit button
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = submitBtn.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = `${size}px`;
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                ripple.classList.add('ripple');
                
                submitBtn.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
            
            // File input preview (for foto_ktp)
            const fotoKtpInput = document.getElementById('foto_ktp');
            fotoKtpInput.addEventListener('change', function() {
                const parent = this.parentElement;
                const preview = parent.querySelector('.preview');
                
                if (preview) {
                    preview.remove();
                }
                
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('div');
                        img.classList.add('preview', 'mt-2', 'p-2', 'bg-white', 'rounded', 'flex', 'items-center', 'justify-center');
                        img.innerHTML = `<img src="${e.target.result}" class="h-20 rounded" alt="Preview KTP">
                                       <span class="ml-2 text-sm text-green-600">File terpilih</span>`;
                        parent.appendChild(img);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
    
    <style>
        .ripple {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.4);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</x-layout>