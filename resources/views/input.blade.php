<x-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-6">
        <!-- Notification Area -->
        <div id="notification" class="fixed top-4 right-4 z-50 transform translate-x-full transition-all duration-500 ease-in-out opacity-0">
            <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span id="notification-text">Data berhasil disimpan!</span>
            </div>
        </div>

        <div class="w-full max-w-3xl bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-500 hover:shadow-2xl animate-fadeIn">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6">
                <h2 class="text-2xl font-bold text-white">Formulir Pendaftaran Data</h2>
                <p class="text-blue-100">Silakan lengkapi informasi berikut dengan benar</p>
            </div>
            
            <x-form action="{{ route('input.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Section 1: Informasi Dasar -->
                    <div class="md:col-span-2">
                        <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">
                            <span class="text-blue-600 mr-2">01</span>Informasi Dasar
                        </h3>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="id_izin" label="ID Izin" type="text" placeholder="Masukkan ID Izin (16 karakter)" :value="old('id_izin')" maxlength="16" required />
                        <div class="text-xs text-gray-500 mt-1">ID Izin harus terdiri dari 16 karakter dan unik</div>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="nib" label="Nomor Induk Berusaha (NIB)" type="text" placeholder="Masukkan NIB (13 digit)" :value="old('nib')" maxlength="13" required />
                        <div class="text-xs text-gray-500 mt-1">NIB harus terdiri dari 13 digit dan unik</div>
                    </div>
                    
                    <div class="md:col-span-2 transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="nama_badan_usaha" label="Nama Badan Usaha" type="text" placeholder="Masukkan Nama Badan Usaha" :value="old('nama_badan_usaha')" required />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="provinsi" label="Provinsi" type="text" placeholder="Masukkan Provinsi" :value="old('provinsi')" />
                        <div class="text-xs text-gray-500 mt-1">Opsional</div>
                    </div>
                    
                    <!-- Section 2: Klasifikasi Usaha -->
                    <div class="md:col-span-2 mt-6">
                        <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">
                            <span class="text-blue-600 mr-2">02</span>Klasifikasi Usaha
                        </h3>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="kode_kbli" label="Kode KBLI" type="text" placeholder="Masukkan Kode KBLI" :value="old('kode_kbli')" required />
                        <div class="text-xs text-gray-500 mt-1">Klasifikasi Baku Lapangan Usaha Indonesia</div>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="subklasifikasi" label="Subklasifikasi" type="text" placeholder="Masukkan Subklasifikasi" :value="old('subklasifikasi')" required />
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <label for="kualifikasi" class="block text-gray-700 font-medium mb-2">Kualifikasi</label>
                        <select name="kualifikasi" id="kualifikasi" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 ease-in-out" required>
                            <option value="" disabled {{ old('kualifikasi') ? '' : 'selected' }}>Pilih Kualifikasi</option>
                            <option value="Mikro" {{ old('kualifikasi') == 'Mikro' ? 'selected' : '' }}>Mikro</option>
                            <option value="Kecil" {{ old('kualifikasi') == 'Kecil' ? 'selected' : '' }}>Kecil</option>
                            <option value="Menengah" {{ old('kualifikasi') == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                            <option value="Besar" {{ old('kualifikasi') == 'Besar' ? 'selected' : '' }}>Besar</option>
                        </select>
                    </div>
                    
                    <!-- Section 3: Status -->
                    <div class="md:col-span-2 mt-6">
                        <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">
                            <span class="text-blue-600 mr-2">03</span>Status
                        </h3>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <x-input name="kode_status" label="Kode Status" type="text" placeholder="Masukkan Kode Status" :value="old('kode_status')" />
                        <div class="text-xs text-gray-500 mt-1">Opsional</div>
                    </div>
                    
                    <div class="transform transition-all duration-500 hover:scale-[1.02]">
                        <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                        <select name="status" id="status" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 ease-in-out">
                            <option value="" disabled {{ old('status') ? '' : 'selected' }}>Pilih Status</option>
                            <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        <div class="text-xs text-gray-500 mt-1">Opsional</div>
                    </div>
                    
                    <div class="md:col-span-2 transform transition-all duration-500 hover:scale-[1.02]">
                        <label for="detail_status" class="block text-gray-700 font-medium mb-2">Detail Status</label>
                        <textarea name="detail_status" id="detail_status" rows="3" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="Masukkan detail status (jika ada)">{{ old('detail_status') }}</textarea>
                        <div class="text-xs text-gray-500 mt-1">Opsional</div>
                    </div>
                </div>
                
                <div class="flex justify-center mt-8">
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-medium px-8 py-3 rounded-lg hover:from-blue-700 hover:to-indigo-800 transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-lg hover:shadow-xl">
                        <div class="flex items-center">
                            <span>Submit Data</span>
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

        /* Notification styles */
        .notification-show {
            transform: translateX(0) !important;
            opacity: 1 !important;
        }

        .notification-success {
            background-color: #10b981;
        }

        .notification-error {
            background-color: #ef4444;
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

            // Form submission with notification
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <div class="flex items-center">
                        <svg class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Menyimpan...</span>
                    </div>
                `;

                // Simulate form submission (replace with actual AJAX call)
                setTimeout(() => {
                    showNotification('Data berhasil disimpan!', 'success');
                    
                    // Reset form
                    form.reset();
                    
                    // Reset button
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = `
                        <div class="flex items-center">
                            <span>Submit Data</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    `;
                }, 2000);
            });

            // Notification function
            function showNotification(message, type = 'success') {
                const notification = document.getElementById('notification');
                const notificationText = document.getElementById('notification-text');
                
                notificationText.textContent = message;
                
                // Reset classes
                notification.className = 'fixed top-4 right-4 z-50 transform translate-x-full transition-all duration-500 ease-in-out opacity-0';
                
                // Add type-specific styling
                const notificationContent = notification.querySelector('div');
                if (type === 'success') {
                    notificationContent.className = 'bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3';
                    notificationContent.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
                } else if (type === 'error') {
                    notificationContent.className = 'bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3';
                    notificationContent.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                }
                
                // Show notification
                setTimeout(() => {
                    notification.classList.add('notification-show');
                }, 100);
                
                // Hide notification after 4 seconds
                setTimeout(() => {
                    notification.classList.remove('notification-show');
                }, 4000);
            }

            // Input validation
            const requiredInputs = document.querySelectorAll('input[required], select[required]');
            requiredInputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (!this.value.trim()) {
                        this.classList.add('border-red-300');
                        this.classList.remove('border-gray-300');
                    } else {
                        this.classList.remove('border-red-300');
                        this.classList.add('border-gray-300');
                    }
                });
            });

            // NIB and ID Izin validation
            const nibInput = document.querySelector('input[name="nib"]');
            const idIzinInput = document.querySelector('input[name="id_izin"]');

            nibInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 13);
            });

            idIzinInput.addEventListener('input', function() {
                this.value = this.value.slice(0, 16);
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