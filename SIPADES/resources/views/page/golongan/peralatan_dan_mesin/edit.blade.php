    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center">
                    {{ __('Edit Peralatan dan Mesin') }}
                </h2>
            </div>
        </x-slot>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <!-- Info Box -->
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-800">
                                    Formulir Edit Peralatan dan Mesin
                                </h3>
                                <div class="mt-2 text-sm text-blue-700">
                                    <p>
                                        Silakan perbarui data peralatan dan mesin dengan mengisi formulir berikut. Pastikan semua field yang wajib diisi telah terisi dengan benar.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('peralatan_dan_mesin.update', $peralatan_dan_mesin->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <!-- Grid Layout -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Section 1: Identitas Aset -->
                                <div class="md:col-span-2">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        Identitas Aset
                                    </h4>
                                    <div class="border-t border-gray-200 mb-6"></div>
                                </div>
                                
                                <!-- Id Barang (Auto) -->
                                <div class="mb-5">
                                    <label for="id_barang" class="block mb-2 text-sm font-medium text-gray-700">ID Barang <span class="text-gray-500">(Auto)</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="id_barang" name="id_barang" readonly
                                            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 cursor-not-allowed"
                                            value="{{ old('id_barang', $peralatan_dan_mesin->aset->id_barang) }}" />
                                    </div>
                                    @error('id_barang')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nomor Register -->
                                <div class="mb-5">
                                    <label for="no_reg" class="block mb-2 text-sm font-medium text-gray-700">Nomor Register <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="no_reg" name="no_reg"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('no_reg', $peralatan_dan_mesin->aset->nomor_register) }}" required />
                                    </div>
                                    @error('no_reg')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Kode Aset -->
                                <div class="mb-5">
                                    <label for="id_rekening" class="block mb-2 text-sm font-medium text-gray-700">Kode Aset <span class="text-red-500">*</span></label>
                                    <select class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        id="id_rekening" name="id_rekening" required>
                                        <option value="">Pilih Kode Aset...</option>
                                        @foreach ($rekening as $s)
                                            <option value="{{ $s->id }}"
                                                {{ old('id_rekening', $peralatan_dan_mesin->aset->rekening->id) == $s->id ? 'selected' : '' }}>
                                                {{ $s->kode }} - {{ $s->nama_rekening }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_rekening')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nama Label -->
                                <div class="mb-5">
                                    <label for="nama_label" class="block mb-2 text-sm font-medium text-gray-700">Nama Label <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="nama_label" name="nama_label"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('nama_label', $peralatan_dan_mesin->aset->nama_label) }}" required />
                                    </div>
                                    @error('nama_label')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Section 2: Detail Peralatan -->
                                <div class="md:col-span-2 mt-8">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Detail Peralatan
                                    </h4>
                                    <div class="border-t border-gray-200 mb-6"></div>
                                </div>
                                
                                <!-- Kode Pemilik -->
                                <div class="mb-5">
                                    <label for="kode_pemilik" class="block mb-2 text-sm font-medium text-gray-700">Kode Pemilik <span class="text-red-500">*</span></label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        id="kode_pemilik" name="kode_pemilik" required>
                                        <option value="">Pilih Pemilik...</option>
                                        <option value="Pemerintah Desa"
                                            {{ old('kode_pemilik', $peralatan_dan_mesin->kode_pemilik) == 'Pemerintah Desa' ? 'selected' : '' }}>
                                            Pemerintah Desa
                                        </option>
                                    </select>
                                    @error('kode_pemilik')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Ruang -->
                                <div class="mb-5">
                                    <label for="ruang" class="block mb-2 text-sm font-medium text-gray-700">Ruang <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="ruang" name="ruang"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('ruang', $peralatan_dan_mesin->ruang) }}" required />
                                    </div>
                                    @error('ruang')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Kode Belanja Bidang -->
                                <div class="mb-5">
                                    <label for="kode_belanja_bidang" class="block mb-2 text-sm font-medium text-gray-700">Kode Belanja Bidang <span class="text-red-500">*</span></label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        id="kode_belanja_bidang" name="kode_belanja_bidang" required>
                                        <option value="">Pilih Belanja Bidang...</option>
                                        <option value="Penyelengaraan Pemerintah Desa"
                                            {{ old('kode_belanja_bidang', $peralatan_dan_mesin->aset->kode_belanja_bidang) == 'Penyelengaraan Pemerintah Desa' ? 'selected' : '' }}>
                                            Penyelengaraan Pemerintah Desa
                                        </option>
                                        <option value="Pelaksanaan Pembangunan Desa"
                                            {{ old('kode_belanja_bidang', $peralatan_dan_mesin->aset->kode_belanja_bidang) == 'Pelaksanaan Pembangunan Desa' ? 'selected' : '' }}>
                                            Pelaksanaan Pembangunan Desa
                                        </option>
                                        <option value="Pembinaan Kemasyarakatan"
                                            {{ old('kode_belanja_bidang', $peralatan_dan_mesin->aset->kode_belanja_bidang) == 'Pembinaan Kemasyarakatan' ? 'selected' : '' }}>
                                            Pembinaan Kemasyarakatan
                                        </option>
                                        <option value="Pemberdayaan Masyarakat Desa"
                                            {{ old('kode_belanja_bidang', $peralatan_dan_mesin->aset->kode_belanja_bidang) == 'Pemberdayaan Masyarakat Desa' ? 'selected' : '' }}>
                                            Pemberdayaan Masyarakat
                                        </option>
                                        <option value="Penanggulangan Bencana, Darurat Dan Mendesak Desa"
                                            {{ old('kode_belanja_bidang', $peralatan_dan_mesin->aset->kode_belanja_bidang) == 'Penanggulangan Bencana, Darurat Dan Mendesak Desa' ? 'selected' : '' }}>
                                            Penanggulangan Bencana, Darurat Dan Mendesak Desa
                                        </option>
                                    </select>
                                    @error('kode_belanja_bidang')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Merk/Type -->
                                <div class="mb-5">
                                    <label for="merk" class="block mb-2 text-sm font-medium text-gray-700">Merk/Type <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="merk" name="merk"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('merk', $peralatan_dan_mesin->merk) }}" required />
                                    </div>
                                    @error('merk')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Ukuran/CC -->
                                <div class="mb-5">
                                    <label for="ukuran" class="block mb-2 text-sm font-medium text-gray-700">Ukuran/CC <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                            </svg>
                                        </div>
                                        <input type="number" id="ukuran" name="ukuran"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('ukuran', $peralatan_dan_mesin->ukuran) }}" required />
                                    </div>
                                    @error('ukuran')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Bahan -->
                                <div class="mb-5">
                                    <label for="bahan" class="block mb-2 text-sm font-medium text-gray-700">Bahan <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="bahan" name="bahan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('bahan', $peralatan_dan_mesin->bahan) }}" required />
                                    </div>
                                    @error('bahan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Section 3: Informasi Kepemilikan -->
                                <div class="md:col-span-2 mt-8">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        Informasi Kepemilikan
                                    </h4>
                                    <div class="border-t border-gray-200 mb-6"></div>
                                </div>
                                
                                <!-- Asal -->
                                <div class="mb-5">
                                    <label for="asal" class="block mb-2 text-sm font-medium text-gray-700">Asal <span class="text-red-500">*</span></label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        id="asal" name="asal" required>
                                        <option value="">Pilih Asal...</option>
                                        <option value="Kekayaan Asli Desa"
                                            {{ old('asal', $peralatan_dan_mesin->aset->asal) == 'Kekayaan Asli Desa' ? 'selected' : '' }}>
                                            Kekayaan Asli Desa
                                        </option>
                                        <option value="APBDesa"
                                            {{ old('asal', $peralatan_dan_mesin->aset->asal) == 'APBDesa' ? 'selected' : '' }}>
                                            APBDesa
                                        </option>
                                        <option value="Perolehan Lain Yang Sah"
                                            {{ old('asal', $peralatan_dan_mesin->aset->asal) == 'Perolehan Lain Yang Sah' ? 'selected' : '' }}>
                                            Perolehan Lain Yang Sah
                                        </option>
                                    </select>
                                    @error('asal')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Sumber Dana -->
                                <div class="mb-5">
                                    <label for="sumber_dana" class="block mb-2 text-sm font-medium text-gray-700">Sumber Dana <span class="text-red-500">*</span></label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        id="sumber_dana" name="sumber_dana" required>
                                        <option value="">Pilih Sumber Dana...</option>
                                        <option value="Pendapatan Asli Desa"
                                            {{ old('sumber_dana', $peralatan_dan_mesin->aset->sumber_dana) == 'Pendapatan Asli Desa' ? 'selected' : '' }}>
                                            Pendapatan Asli Desa
                                        </option>
                                        <option value="Dana Desa"
                                            {{ old('sumber_dana', $peralatan_dan_mesin->aset->sumber_dana) == 'Dana Desa' ? 'selected' : '' }}>
                                            Dana Desa (Dropping APBN)
                                        </option>
                                        <option value="Alokasi Dana Desa"
                                            {{ old('sumber_dana', $peralatan_dan_mesin->aset->sumber_dana) == 'Alokasi Dana Desa' ? 'selected' : '' }}>
                                            Alokasi Dana Desa
                                        </option>
                                        <option value="Penerimaan Bagi Hasil Pajak Retribusi Daerah"
                                            {{ old('sumber_dana', $peralatan_dan_mesin->aset->sumber_dana) == 'Penerimaan Bagi Hasil Pajak Retribusi Daerah' ? 'selected' : '' }}>
                                            Penerimaan Bagi Hasil Pajak Retribusi Daerah
                                        </option>
                                        <option value="Penerimaan Bantuan Keuangan Kab/Kota"
                                            {{ old('sumber_dana', $peralatan_dan_mesin->aset->sumber_dana) == 'Penerimaan Bantuan Keuangan Kab/Kota' ? 'selected' : '' }}>
                                            Penerimaan Bantuan Keuangan Kab/Kota
                                        </option>
                                        <option value="Penerimaan Bantuan Keuangan Provinsi"
                                            {{ old('sumber_dana', $peralatan_dan_mesin->aset->sumber_dana) == 'Penerimaan Bantuan Keuangan Provinsi' ? 'selected' : '' }}>
                                            Penerimaan Bantuan Keuangan Provinsi
                                        </option>
                                        <option value="Swadaya Masyarakat"
                                            {{ old('sumber_dana', $peralatan_dan_mesin->aset->sumber_dana) == 'Swadaya Masyarakat' ? 'selected' : '' }}>
                                            Swadaya Masyarakat
                                        </option>
                                        <option value="Pendapatan Lain Lain"
                                            {{ old('sumber_dana', $peralatan_dan_mesin->aset->sumber_dana) == 'Pendapatan Lain Lain' ? 'selected' : '' }}>
                                            Pendapatan Lain Lain
                                        </option>
                                    </select>
                                    @error('sumber_dana')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Tanggal Perolehan -->
                                <div class="mb-5">
                                    <label for="tanggal_perolehan" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Perolehan <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <input type="date" id="tanggal_perolehan" name="tanggal_perolehan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('tanggal_perolehan', $peralatan_dan_mesin->tanggal_perolehan) }}" required />
                                    </div>
                                    @error('tanggal_perolehan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nilai Perolehan -->
                                <div class="mb-5">
                                    <label for="nilai_perolehan" class="block mb-2 text-sm font-medium text-gray-700">Nilai Perolehan (Rp) <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 text-sm">Rp</span>
                                        </div>
                                        <input type="number" id="nilai_perolehan" name="nilai_perolehan" min="0" step="0.01"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('nilai_perolehan', $peralatan_dan_mesin->aset->nilai_perolehan) }}" required />
                                    </div>
                                    @error('nilai_perolehan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Section 4: Nomor Identifikasi -->
                                <div class="md:col-span-2 mt-8">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Nomor Identifikasi
                                    </h4>
                                    <div class="border-t border-gray-200 mb-6"></div>
                                </div>
                                
                                <!-- Nomor Pabrik -->
                                <div class="mb-5">
                                    <label for="nomor_pabrik" class="block mb-2 text-sm font-medium text-gray-700">Nomor Pabrik <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <input type="number" id="nomor_pabrik" name="nomor_pabrik"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('nomor_pabrik', $peralatan_dan_mesin->nomor_pabrik) }}" required />
                                    </div>
                                    @error('nomor_pabrik')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nomor Rangka -->
                                <div class="mb-5">
                                    <label for="nomor_rangka" class="block mb-2 text-sm font-medium text-gray-700">Nomor Rangka <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <input type="number" id="nomor_rangka" name="nomor_rangka"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('nomor_rangka', $peralatan_dan_mesin->nomor_rangka) }}" required />
                                    </div>
                                    @error('nomor_rangka')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nomor Mesin -->
                                <div class="mb-5">
                                    <label for="nomor_mesin" class="block mb-2 text-sm font-medium text-gray-700">Nomor Mesin <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <input type="number" id="nomor_mesin" name="nomor_mesin"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('nomor_mesin', $peralatan_dan_mesin->nomor_mesin) }}" required />
                                    </div>
                                    @error('nomor_mesin')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nomor Polisi -->
                                <div class="mb-5">
                                    <label for="nomor_polisi" class="block mb-2 text-sm font-medium text-gray-700">Nomor Polisi <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <input type="number" id="nomor_polisi" name="nomor_polisi"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('nomor_polisi', $peralatan_dan_mesin->nomor_polisi) }}" required />
                                    </div>
                                    @error('nomor_polisi')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nomor BPKB -->
                                <div class="mb-5">
                                    <label for="nomor_bpkb" class="block mb-2 text-sm font-medium text-gray-700">Nomor BPKB <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <input type="number" id="nomor_bpkb" name="nomor_bpkb"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('nomor_bpkb', $peralatan_dan_mesin->nomor_bpkb) }}" required />
                                    </div>
                                    @error('nomor_bpkb')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Section 5: Kondisi dan Pembukuan -->
                                <div class="md:col-span-2 mt-8">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        Kondisi dan Pembukuan
                                    </h4>
                                    <div class="border-t border-gray-200 mb-6"></div>
                                </div>
                                
                                <!-- Kondisi -->
                                <div class="mb-5">
                                    <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-700">Kondisi <span class="text-red-500">*</span></label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        id="kondisi" name="kondisi" required>
                                        <option value="">Pilih Kondisi...</option>
                                        <option value="Baik" {{ old('kondisi', $peralatan_dan_mesin->aset->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                        <option value="Kurang Baik" {{ old('kondisi', $peralatan_dan_mesin->aset->kondisi) == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                                        <option value="Rusak Ringan" {{ old('kondisi', $peralatan_dan_mesin->aset->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                        <option value="Rusak Berat" {{ old('kondisi', $peralatan_dan_mesin->aset->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                    </select>
                                    @error('kondisi')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Perolehan -->
                                <div class="mb-5">
                                    <label for="perolehan" class="block mb-2 text-sm font-medium text-gray-700">Perolehan <span class="text-red-500">*</span></label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        id="perolehan" name="perolehan" required>
                                        <option value="">Pilih Perolehan...</option>
                                        <option value="Inventarisasi" {{ old('perolehan', $peralatan_dan_mesin->perolehan) == 'Inventarisasi' ? 'selected' : '' }}>
                                            Inventarisasi
                                        </option>
                                    </select>
                                    @error('perolehan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Tanggal Pembukuan -->
                                <div class="mb-5">
                                    <label for="tanggal_pembukuan" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Pembukuan <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            value="{{ old('tanggal_pembukuan', $peralatan_dan_mesin->aset->tanggal_pembukuan) }}" required />
                                    </div>
                                    @error('tanggal_pembukuan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Keterangan -->
                                <div class="mb-5 md:col-span-2">
                                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-700">Keterangan</label>
                                    <textarea id="keterangan" name="keterangan" rows="4"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('keterangan', $peralatan_dan_mesin->aset->keterangan) }}</textarea>
                                    @error('keterangan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Hidden Input for Pengadaan ID -->
                            <input type="hidden" name="id_pengadaan" value="{{ $id_pengadaan }}">

                            <!-- Form Actions -->
                            <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                                <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-300 transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Batal
                                </a>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                    </svg>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @push('styles')
            <style>
                .select2-container--default .select2-selection--single {
                    height: 42px;
                    padding-top: 6px;
                    border: 1px solid #d1d5db;
                    border-radius: 0.5rem;
                }
                
                .select2-container--default .select2-selection--single .select2-selection__arrow {
                    height: 40px;
                }
                
                .select2-container--default .select2-selection--single .select2-selection__rendered {
                    padding-left: 16px;
                    color: #374151;
                }
                
                .select2-container--default .select2-selection--single .select2-selection__placeholder {
                    color: #9ca3af;
                }
                
                .select2-container--default.select2-container--focus .select2-selection--single {
                    border-color: #3b82f6;
                    box-shadow: 0 0 0 1px #3b82f6;
                }
                
                .select2-dropdown {
                    border: 1px solid #d1d5db;
                    border-radius: 0.5rem;
                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                }
                
                .select2-results__option {
                    padding: 8px 16px;
                }
                
                .select2-results__option--highlighted {
                    background-color: #3b82f6;
                }
            </style>
        @endpush

        @push('scripts')
            <script>
                $(document).ready(function() {
                    $('.select2').select2({
                        placeholder: "Pilih...",
                        allowClear: true,
                        width: '100%'
                    });
                    
                    // Format nilai perolehan saat menampilkan
                    $('#nilai_perolehan').on('blur', function() {
                        let value = parseFloat($(this).val()).toFixed(2);
                        $(this).val(value);
                    });
                });
            </script>
        @endpush
    </x-app-layout>