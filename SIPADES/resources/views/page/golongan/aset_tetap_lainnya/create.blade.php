<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight flex items-center">
            {{ __('Tambah Aset Tetap Lainnya') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center mb-6">
                        <div class="mr-4 p-3 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Formulir Tambah Aset Tetap Lainnya</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Masukkan informasi aset tetap lainnya dengan data yang valid</p>
                        </div>
                    </div>

                    <form action="{{ route('aset_tetap_lainnya.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <!-- Form Sections with Cards -->
                        <div class="space-y-6">
                            <!-- Section 1: Informasi Dasar -->
                            <div class="card bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-1 h-6 bg-blue-500 mr-3"></div>
                                    <h4 class="text-lg font-medium text-gray-800 dark:text-gray-200">Informasi Dasar</h4>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Id Barang -->
                                    {{-- <div>
                                        <label for="id_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">ID Barang</label>
                                        <div class="relative">
                                            <input type="text" id="id_barang" name="id_barang" readonly
                                                class="w-full bg-gray-100 dark:bg-gray-600 border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-not-allowed"
                                                />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('id_barang')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Nomor Register -->
                                    <div>
                                        <label for="no_reg" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nomor Register <span class="text-red-500">*</span></label>
                                        <input type="text" id="no_reg" name="no_reg"
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            />
                                        @error('no_reg')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div> --}}

                                    <!-- Kode Aset -->
                                    <div>
                                        <label for="id_rekening" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kode Aset <span class="text-red-500">*</span></label>
                                        <select id="id_rekening" name="id_rekening" required
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Kode Aset...</option>
                                            @foreach ($rekening as $s)
                                                <option value="{{ $s->id }}" {{ old('id_rekening') == $s->id ? 'selected' : '' }}>
                                                    {{ $s->kode }} - {{ $s->nama_rekening }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_rekening')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Nama Label -->
                                    <div>
                                        <label for="nama_label" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Label <span class="text-red-500">*</span></label>
                                        <input type="text" id="nama_label" name="nama_label"
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                             required />
                                        @error('nama_label')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 2: Detail Aset -->
                            <div class="card bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-1 h-6 bg-green-500 mr-3"></div>
                                    <h4 class="text-lg font-medium text-gray-800 dark:text-gray-200">Detail Aset</h4>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Kode Pemilik -->
                                    <div>
                                        <label for="kode_pemilik" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pemilik <span class="text-red-500">*</span></label>
                                        <select id="kode_pemilik" name="kode_pemilik" required
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Pemilik...</option>
                                            <option value="Pemerintah Desa" {{ old('kode_pemilik') == 'Pemerintah Desa' ? 'selected' : '' }}>Pemerintah Desa</option>
                                        </select>
                                        @error('kode_pemilik')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Ruang -->
                                    <div>
                                        <label for="ruang" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ruang <span class="text-red-500">*</span></label>
                                        <input type="text" id="ruang" name="ruang"
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            value="{{ old('ruang') }}" required />
                                        @error('ruang')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Kode Belanja Bidang -->
                                    <div>
                                        <label for="kode_belanja_bidang" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Belanja Bidang <span class="text-red-500">*</span></label>
                                        <select id="kode_belanja_bidang" name="kode_belanja_bidang" required
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Belanja Bidang...</option>
                                            <option value="Penyelengaraan Pemerintah Desa" {{ old('kode_belanja_bidang') == 'Penyelengaraan Pemerintah Desa' ? 'selected' : '' }}>Penyelengaraan Pemerintah Desa</option>
                                            <option value="Pelaksanaan Pembangunan Desa" {{ old('kode_belanja_bidang') == 'Pelaksanaan Pembangunan Desa' ? 'selected' : '' }}>Pelaksanaan Pembangunan Desa</option>
                                            <option value="Pembinaan Kemasyarakatan" {{ old('kode_belanja_bidang') == 'Pembinaan Kemasyarakatan' ? 'selected' : '' }}>Pembinaan Kemasyarakatan</option>
                                            <option value="Pemberdayaan Masyarakat Desa" {{ old('kode_belanja_bidang') == 'Pemberdayaan Masyarakat Desa' ? 'selected' : '' }}>Pemberdayaan Masyarakat</option>
                                            <option value="Penanggulangan Bencana, Darurat Dan Mendesak Desa" {{ old('kode_belanja_bidang') == 'Penanggulangan Bencana, Darurat Dan Mendesak Desa' ? 'selected' : '' }}>Penanggulangan Bencana, Darurat Dan Mendesak Desa</option>
                                        </select>
                                        @error('kode_belanja_bidang')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Judul -->
                                    <div>
                                        <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Judul <span class="text-red-500">*</span></label>
                                        <input type="text" id="judul" name="judul"
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            value="{{ old('judul') }}" required />
                                        @error('judul')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Pencipta -->
                                    <div>
                                        <label for="pencipta" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pencipta <span class="text-red-500">*</span></label>
                                        <input type="text" id="pencipta" name="pencipta"
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            value="{{ old('pencipta') }}" required />
                                        @error('pencipta')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Ukuran -->
                                    <div>
                                        <label for="ukuran" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ukuran <span class="text-red-500">*</span></label>
                                        <input type="text" id="ukuran" name="ukuran"
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            value="{{ old('ukuran') }}" required />
                                        @error('ukuran')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Bahan -->
                                    <div>
                                        <label for="bahan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Bahan <span class="text-red-500">*</span></label>
                                        <input type="text" id="bahan" name="bahan"
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            value="{{ old('bahan') }}" required />
                                        @error('bahan')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 3: Kepemilikan & Pembiayaan -->
                            <div class="card bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-1 h-6 bg-yellow-500 mr-3"></div>
                                    <h4 class="text-lg font-medium text-gray-800 dark:text-gray-200">Kepemilikan & Pembiayaan</h4>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Asal -->
                                    <div>
                                        <label for="asal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Asal <span class="text-red-500">*</span></label>
                                        <select id="asal" name="asal" required
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Asal...</option>
                                            <option value="Kekayaan Asli Desa" {{ old('asal') == 'Kekayaan Asli Desa' ? 'selected' : '' }}>Kekayaan Asli Desa</option>
                                            <option value="APBDesa" {{ old('asal') == 'APBDesa' ? 'selected' : '' }}>APBDesa</option>
                                            <option value="Perolehan Lain Yang Sah" {{ old('asal') == 'Perolehan Lain Yang Sah' ? 'selected' : '' }}>Perolehan Lain Yang Sah</option>
                                        </select>
                                        @error('asal')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Sumber Dana -->
                                    <div>
                                        <label for="sumber_dana" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sumber Dana <span class="text-red-500">*</span></label>
                                        <select id="sumber_dana" name="sumber_dana" required
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Sumber Dana...</option>
                                            <option value="Pendapatan Asli Desa" {{ old('sumber_dana') == 'Pendapatan Asli Desa' ? 'selected' : '' }}>Pendapatan Asli Desa</option>
                                            <option value="Dana Desa" {{ old('sumber_dana') == 'Dana Desa' ? 'selected' : '' }}>Dana Desa (Dropping APBN)</option>
                                            <option value="Alokasi Dana Desa" {{ old('sumber_dana') == 'Alokasi Dana Desa' ? 'selected' : '' }}>Alokasi Dana Desa</option>
                                            <option value="Penerimaan Bagi Hasil Pajak Retribusi Daerah" {{ old('sumber_dana') == 'Penerimaan Bagi Hasil Pajak Retribusi Daerah' ? 'selected' : '' }}>Penerimaan Bagi Hasil Pajak Retribusi Daerah</option>
                                            <option value="Penerimaan Bantuan Keuangan Kab/Kota" {{ old('sumber_dana') == 'Penerimaan Bantuan Keuangan Kab/Kota' ? 'selected' : '' }}>Penerimaan Bantuan Keuangan Kab/Kota</option>
                                            <option value="Penerimaan Bantuan Keuangan Provinsi" {{ old('sumber_dana') == 'Penerimaan Bantuan Keuangan Provinsi' ? 'selected' : '' }}>Penerimaan Bantuan Keuangan Provinsi</option>
                                            <option value="Swadaya Masyarakat" {{ old('sumber_dana') == 'Swadaya Masyarakat' ? 'selected' : '' }}>Swadaya Masyarakat</option>
                                            <option value="Pendapatan Lain Lain" {{ old('sumber_dana') == 'Pendapatan Lain Lain' ? 'selected' : '' }}>Pendapatan Lain Lain</option>
                                        </select>
                                        @error('sumber_dana')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Perolehan -->
                                    <div>
                                        <label for="tanggal_perolehan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Perolehan <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="date" id="tanggal_perolehan" name="tanggal_perolehan" required
                                                class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('tanggal_perolehan') }}" />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('tanggal_perolehan')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Nilai Perolehan -->
                                    <div>
                                        <label for="nilai_perolehan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nilai Perolehan (Rp) <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="number" id="nilai_perolehan" name="nilai_perolehan" min="0" step="0.01" required
                                                class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('nilai_perolehan') }}" />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 dark:text-gray-400 text-sm">Rp</span>
                                            </div>
                                        </div>
                                        @error('nilai_perolehan')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 4: Kondisi dan Pembukuan -->
                            <div class="card bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-1 h-6 bg-red-500 mr-3"></div>
                                    <h4 class="text-lg font-medium text-gray-800 dark:text-gray-200">Kondisi dan Pembukuan</h4>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Kondisi -->
                                    <div>
                                        <label for="kondisi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kondisi <span class="text-red-500">*</span></label>
                                        <select id="kondisi" name="kondisi" required
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Kondisi...</option>
                                            <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                            <option value="Kurang Baik" {{ old('kondisi') == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                                            <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                            <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                        </select>
                                        @error('kondisi')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Perolehan -->
                                    <div>
                                        <label for="perolehan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Perolehan <span class="text-red-500">*</span></label>
                                        <input type="text" id="perolehan" name="perolehan"
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            value="{{ old('perolehan') }}" required />
                                        @error('perolehan')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Pembukuan -->
                                    <div>
                                        <label for="tanggal_pembukuan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Pembukuan <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan" required
                                                class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('tanggal_pembukuan') }}" />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('tanggal_pembukuan')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Keterangan -->
                                    <div class="md:col-span-2">
                                        <label for="keterangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Keterangan</label>
                                        <textarea id="keterangan" name="keterangan" rows="3"
                                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('keterangan') }}</textarea>
                                        @error('keterangan')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_pengadaan" value="{{ $id ?? '0' }}">

                        <!-- Form Actions -->
                        <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ url()->previous() }}"
                                class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 transition-colors duration-200">Batal</a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Aset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .card {
                transition: all 0.3s ease;
            }
            .card:hover {
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Initialize select2
                $('select').select2({
                    placeholder: "Pilih...",
                    allowClear: true,
                    width: '100%',
                    minimumResultsForSearch: 10
                });

                // Format currency input
                $('#nilai_perolehan').on('keyup', function() {
                    let value = $(this).val().replace(/[^0-9]/g, '');
                    $(this).val(value);
                });
            });
        </script>
    @endpush
</x-app-layout>