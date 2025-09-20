<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Gedung dan Bangunan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center mb-6">
                        <div class="mr-4 p-3 rounded-full bg-blue-100 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Formulir Edit Gedung dan Bangunan</h3>
                            <p class="text-sm text-gray-500">Perbarui informasi gedung dan bangunan dengan data yang valid</p>
                        </div>
                    </div>

                    <form action="{{ route('gedung_dan_bangunan.update', $gedung_dan_bangunan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <!-- Form Sections with Cards -->
                        <div class="space-y-6">
                            <!-- Section 1: Informasi Dasar -->
                            <div class="card bg-gray-50 p-6 rounded-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-1 h-6 bg-blue-500 mr-3"></div>
                                    <h4 class="text-lg font-medium text-gray-800">Informasi Dasar</h4>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Id Barang -->
                                    <div>
                                        <label for="id_barang" class="block text-sm font-medium text-gray-700 mb-1">ID Barang</label>
                                        <div class="relative">
                                            <input type="text" id="id_barang" name="id_barang" readonly
                                                class="w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-not-allowed"
                                                value="{{ old('id_barang', $gedung_dan_bangunan->aset->id_barang) }}" />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('id_barang')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Nomor Register -->
                                    <div>
                                        <label for="no_reg" class="block text-sm font-medium text-gray-700 mb-1">Nomor Register <span class="text-red-500">*</span></label>
                                        <input type="text" id="no_reg" name="no_reg" readonly
                                                class="w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-not-allowed"
                                            value="{{ old('no_reg', $gedung_dan_bangunan->aset->nomor_register) }}" required />
                                        @error('no_reg')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Kode Aset -->
                                    <div>
                                        <label for="id_rekening" class="block text-sm font-medium text-gray-700 mb-1">Kode Aset <span class="text-red-500">*</span></label>
                                        <select id="id_rekening" name="id_rekening" required
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Kode Aset...</option>
                                            @foreach ($rekening as $s)
                                                <option value="{{ $s->id }}" {{ old('id_rekening', $gedung_dan_bangunan->aset->rekening->id) == $s->id ? 'selected' : '' }}>
                                                    {{ $s->kode }} - {{ $s->nama_rekening }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_rekening')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Nama Label -->
                                    <div>
                                        <label for="nama_label" class="block text-sm font-medium text-gray-700 mb-1">Nama Label <span class="text-red-500">*</span></label>
                                        <input type="text" id="nama_label" name="nama_label"
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            value="{{ old('nama_label', $gedung_dan_bangunan->aset->nama_label) }}" required />
                                        @error('nama_label')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 2: Detail Bangunan -->
                            <div class="card bg-gray-50 p-6 rounded-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-1 h-6 bg-green-500 mr-3"></div>
                                    <h4 class="text-lg font-medium text-gray-800">Detail Bangunan</h4>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Kode Pemilik -->
                                    <div>
                                        <label for="kode_pemilik" class="block text-sm font-medium text-gray-700 mb-1">Pemilik <span class="text-red-500">*</span></label>
                                        <select id="kode_pemilik" name="kode_pemilik" required
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Pemilik...</option>
                                            <option value="Pemerintah Desa" {{ old('kode_pemilik', $gedung_dan_bangunan->kode_pemilik) == 'Pemerintah Desa' ? 'selected' : '' }}>Pemerintah Desa</option>
                                        </select>
                                        @error('kode_pemilik')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Kode Belanja Bidang -->
                                    <div>
                                        <label for="kode_belanja_bidang" class="block text-sm font-medium text-gray-700 mb-1">Belanja Bidang <span class="text-red-500">*</span></label>
                                        <select id="kode_belanja_bidang" name="kode_belanja_bidang" required
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Belanja Bidang...</option>
                                            <option value="Penyelengaraan Pemerintah Desa" {{ old('kode_belanja_bidang', $gedung_dan_bangunan->aset->kode_belanja_bidang) == 'Penyelengaraan Pemerintah Desa' ? 'selected' : '' }}>Penyelengaraan Pemerintah Desa</option>
                                            <option value="Pelaksanaan Pembangunan Desa" {{ old('kode_belanja_bidang', $gedung_dan_bangunan->aset->kode_belanja_bidang) == 'Pelaksanaan Pembangunan Desa' ? 'selected' : '' }}>Pelaksanaan Pembangunan Desa</option>
                                            <option value="Pembinaan Kemasyarakatan" {{ old('kode_belanja_bidang', $gedung_dan_bangunan->aset->kode_belanja_bidang) == 'Pembinaan Kemasyarakatan' ? 'selected' : '' }}>Pembinaan Kemasyarakatan</option>
                                            <option value="Pemberdayaan Masyarakat Desa" {{ old('kode_belanja_bidang', $gedung_dan_bangunan->aset->kode_belanja_bidang) == 'Pemberdayaan Masyarakat Desa' ? 'selected' : '' }}>Pemberdayaan Masyarakat</option>
                                            <option value="Penanggulangan Bencana, Darurat Dan Mendesak Desa" {{ old('kode_belanja_bidang', $gedung_dan_bangunan->aset->kode_belanja_bidang) == 'Penanggulangan Bencana, Darurat Dan Mendesak Desa' ? 'selected' : '' }}>Penanggulangan Bencana, Darurat Dan Mendesak Desa</option>
                                        </select>
                                        @error('kode_belanja_bidang')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Luas Lantai -->
                                    <div>
                                        <label for="luas_lantai" class="block text-sm font-medium text-gray-700 mb-1">Luas Lantai (m²) <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="number" id="luas_lantai" name="luas_lantai" min="0" step="0.01" required
                                                class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('luas_lantai', $gedung_dan_bangunan->luas_lantai) }}" />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 text-sm">m²</span>
                                            </div>
                                        </div>
                                        @error('luas_lantai')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Bertingkat -->
                                    <div>
                                        <label for="bertingkat" class="block text-sm font-medium text-gray-700 mb-1">Bertingkat <span class="text-red-500">*</span></label>
                                        <select id="bertingkat" name="bertingkat" required
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="Bertingkat" {{ old('bertingkat', $gedung_dan_bangunan->bertingkat) == 'Bertingkat' ? 'selected' : '' }}>Bertingkat</option>
                                            <option value="Tidak Bertingkat" {{ old('bertingkat', $gedung_dan_bangunan->bertingkat) == 'Tidak Bertingkat' ? 'selected' : '' }}>Tidak Bertingkat</option>
                                        </select>
                                        @error('bertingkat')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Beton -->
                                    <div>
                                        <label for="beton" class="block text-sm font-medium text-gray-700 mb-1">Beton <span class="text-red-500">*</span></label>
                                        <select id="beton" name="beton" required
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="Beton" {{ old('beton', $gedung_dan_bangunan->beton) == 'Beton' ? 'selected' : '' }}>Beton</option>
                                            <option value="Tidak Beton" {{ old('beton', $gedung_dan_bangunan->beton) == 'Tidak Beton' ? 'selected' : '' }}>Tidak Beton</option>
                                        </select>
                                        @error('beton')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Tanah -->
                                    <div>
                                        <label for="id_tanah" class="block text-sm font-medium text-gray-700 mb-1">Tanah <span class="text-red-500">*</span></label>
                                        <select id="id_tanah" name="id_tanah" required
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Tanah...</option>
                                            @foreach ($tanah as $t)
                                                <option value="{{ $t->id }}" {{ old('id_tanah', $gedung_dan_bangunan->id_tanah) == $t->id ? 'selected' : '' }}>
                                                    {{ $t->kode }} - Luas: {{ $t->luas }} m²
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_tanah')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 3: Dokumen Bangunan -->
                            <div class="card bg-gray-50 p-6 rounded-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-1 h-6 bg-yellow-500 mr-3"></div>
                                    <h4 class="text-lg font-medium text-gray-800">Dokumen Bangunan</h4>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- No Dokumen -->
                                    <div>
                                        <label for="no_dokumen" class="block text-sm font-medium text-gray-700 mb-1">No Dokumen <span class="text-red-500">*</span></label>
                                        <input type="text" id="no_dokumen" name="no_dokumen"
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            value="{{ old('no_dokumen', $gedung_dan_bangunan->no_dokumen) }}" required />
                                        @error('no_dokumen')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Dokumen -->
                                    <div>
                                        <label for="tanggal_dokumen" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Dokumen <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="date" id="tanggal_dokumen" name="tanggal_dokumen" required
                                                class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('tanggal_dokumen', $gedung_dan_bangunan->tanggal_dokumen) }}" />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('tanggal_dokumen')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 4: Kepemilikan & Pembiayaan -->
                            <div class="card bg-gray-50 p-6 rounded-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-1 h-6 bg-purple-500 mr-3"></div>
                                    <h4 class="text-lg font-medium text-gray-800">Kepemilikan & Pembiayaan</h4>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Asal -->
                                    <div>
                                        <label for="asal" class="block text-sm font-medium text-gray-700 mb-1">Asal <span class="text-red-500">*</span></label>
                                        <select id="asal" name="asal" required
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Asal...</option>
                                            <option value="Kekayaan Asli Desa" {{ old('asal', $gedung_dan_bangunan->aset->asal) == 'Kekayaan Asli Desa' ? 'selected' : '' }}>Kekayaan Asli Desa</option>
                                            <option value="APBDesa" {{ old('asal', $gedung_dan_bangunan->aset->asal) == 'APBDesa' ? 'selected' : '' }}>APBDesa</option>
                                            <option value="Perolehan Lain Yang Sah" {{ old('asal', $gedung_dan_bangunan->aset->asal) == 'Perolehan Lain Yang Sah' ? 'selected' : '' }}>Perolehan Lain Yang Sah</option>
                                        </select>
                                        @error('asal')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Sumber Dana -->
                                    <div>
                                        <label for="sumber_dana" class="block text-sm font-medium text-gray-700 mb-1">Sumber Dana <span class="text-red-500">*</span></label>
                                        <select id="sumber_dana" name="sumber_dana" required
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Sumber Dana...</option>
                                            <option value="Pendapatan Asli Desa" {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Pendapatan Asli Desa' ? 'selected' : '' }}>Pendapatan Asli Desa</option>
                                            <option value="Dana Desa" {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Dana Desa' ? 'selected' : '' }}>Dana Desa (Dropping APBN)</option>
                                            <option value="Alokasi Dana Desa" {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Alokasi Dana Desa' ? 'selected' : '' }}>Alokasi Dana Desa</option>
                                            <option value="Penerimaan Bagi Hasil Pajak Retribusi Daerah" {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Penerimaan Bagi Hasil Pajak Retribusi Daerah' ? 'selected' : '' }}>Penerimaan Bagi Hasil Pajak Retribusi Daerah</option>
                                            <option value="Penerimaan Bantuan Keuangan Kab/Kota" {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Penerimaan Bantuan Keuangan Kab/Kota' ? 'selected' : '' }}>Penerimaan Bantuan Keuangan Kab/Kota</option>
                                            <option value="Penerimaan Bantuan Keuangan Provinsi" {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Penerimaan Bantuan Keuangan Provinsi' ? 'selected' : '' }}>Penerimaan Bantuan Keuangan Provinsi</option>
                                            <option value="Swadaya Masyarakat" {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Swadaya Masyarakat' ? 'selected' : '' }}>Swadaya Masyarakat</option>
                                            <option value="Pendapatan Lain Lain" {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Pendapatan Lain Lain' ? 'selected' : '' }}>Pendapatan Lain Lain</option>
                                        </select>
                                        @error('sumber_dana')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Perolehan -->
                                    <div>
                                        <label for="tanggal_perolehan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Perolehan <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="date" id="tanggal_perolehan" name="tanggal_perolehan" required
                                                class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('tanggal_perolehan', $gedung_dan_bangunan->aset->tanggal_perolehan) }}" />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('tanggal_perolehan')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Nilai Perolehan -->
                                    <div>
                                        <label for="nilai_perolehan" class="block text-sm font-medium text-gray-700 mb-1">Nilai Perolehan (Rp) <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="number" id="nilai_perolehan" name="nilai_perolehan" min="0" step="0.01" required
                                                class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('nilai_perolehan', $gedung_dan_bangunan->aset->nilai_perolehan) }}" />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 text-sm">Rp</span>
                                            </div>
                                        </div>
                                        @error('nilai_perolehan')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 5: Kondisi dan Pembukuan -->
                            <div class="card bg-gray-50 p-6 rounded-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-1 h-6 bg-red-500 mr-3"></div>
                                    <h4 class="text-lg font-medium text-gray-800">Kondisi dan Pembukuan</h4>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Kondisi -->
                                    <div>
                                        <label for="kondisi" class="block text-sm font-medium text-gray-700 mb-1">Kondisi <span class="text-red-500">*</span></label>
                                        <select id="kondisi" name="kondisi" required
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Kondisi...</option>
                                            <option value="Baik" {{ old('kondisi', $gedung_dan_bangunan->aset->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                            <option value="Kurang Baik" {{ old('kondisi', $gedung_dan_bangunan->aset->kondisi) == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                                            <option value="Rusak Ringan" {{ old('kondisi', $gedung_dan_bangunan->aset->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                            <option value="Rusak Berat" {{ old('kondisi', $gedung_dan_bangunan->aset->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                        </select>
                                        @error('kondisi')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Perolehan -->
                                    <div>
                                        <label for="perolehan" class="block text-sm font-medium text-gray-700 mb-1">Perolehan <span class="text-red-500">*</span></label>
                                        <select id="perolehan" name="perolehan" required
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Pilih Perolehan...</option>
                                            <option value="Inventarisasi" {{ old('perolehan', $gedung_dan_bangunan->perolehan) == 'Inventarisasi' ? 'selected' : '' }}>Inventarisasi</option>
                                        </select>
                                        @error('perolehan')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Pembukuan -->
                                    <div>
                                        <label for="tanggal_pembukuan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pembukuan <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan" required
                                                class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('tanggal_pembukuan', $gedung_dan_bangunan->aset->tanggal_pembukuan) }}" />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('tanggal_pembukuan')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 6: Informasi Tambahan -->
                            <div class="card bg-gray-50 p-6 rounded-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-1 h-6 bg-indigo-500 mr-3"></div>
                                    <h4 class="text-lg font-medium text-gray-800">Informasi Tambahan</h4>
                                </div>
                                <div class="grid grid-cols-1 gap-6">
                                    <!-- Alamat -->
                                    <div>
                                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                        <textarea id="alamat" name="alamat" rows="3"
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('alamat', $gedung_dan_bangunan->alamat) }}</textarea>
                                        @error('alamat')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Keterangan -->
                                    <div>
                                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                                        <textarea id="keterangan" name="keterangan" rows="3"
                                            class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('keterangan', $gedung_dan_bangunan->aset->keterangan) }}</textarea>
                                        @error('keterangan')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_pengadaan" value="{{ $id_pengadaan }}">

                        <!-- Form Actions -->
                        <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                            <a href="{{ url()->previous() }}"
                                class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Batal</a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
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