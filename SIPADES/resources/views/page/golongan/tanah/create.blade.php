<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800 leading-tight">
                <i class="fas fa-landmark mr-2 text-blue-600"></i> {{ __('TAMBAH ASET TANAH') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <!-- Form Header -->
                    <div class="mb-8 bg-blue-50 p-4 rounded-lg border border-blue-100">
                        <h3 class="text-lg font-semibold text-blue-800 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i> Formulir Pendaftaran Aset Tanah
                        </h3>
                        <p class="text-sm text-blue-600 mt-1">
                            Silakan isi semua field yang diperlukan dengan data yang valid.
                        </p>
                    </div>

                    <form class="w-full mx-auto" method="POST" action="{{ route('tanah.store') }}">
                        @csrf

                        <!-- Grid Layout for Better Organization -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Column 1 -->
                            <div class="space-y-4">
                                <!-- ID Barang -->
                                <div class="form-group">
                                    <label for="id_barang" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> ID Barang (Auto)
                                    </label>
                                    <div class="relative">
                                        <input type="text" id="id_barang" name="id_barang"
                                            class="block w-full px-4 py-2 text-gray-700 bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            required />
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nomor Register -->
                                <div class="form-group">
                                    <label for="no_reg" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Nomor Register
                                    </label>
                                    <input type="text" id="no_reg" name="no_reg"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        required />
                                </div>

                                <!-- Rekening -->
                                <div class="form-group">
                                    <label for="id_rekening" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Rekening
                                    </label>
                                    <select id="id_rekening" name="id_rekening"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="">Pilih Rekening...</option>
                                        @foreach ($rekening as $s)
                                            <option value="{{ $s->id }}">{{ $s->kode }} -
                                                {{ $s->nama_rekening }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Nama Label -->
                                <div class="form-group">
                                    <label for="nama_label" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Nama Label
                                    </label>
                                    <input type="text" id="nama_label" name="nama_label"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        required />
                                </div>

                                <!-- Kode Pemilik -->
                                <div class="form-group">
                                    <label for="kode_pemilik" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Kode Pemilik
                                    </label>
                                    <select id="kode_pemilik" name="kode_pemilik"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="">Pilih Kode Pemilik...</option>
                                        <option value="Pemerintah Desa">Pemerintah Desa</option>
                                    </select>
                                </div>

                                <!-- Kode Belanja Bidang -->
                                <div class="form-group">
                                    <label for="kode_belanja_bidang"
                                        class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Kode Belanja Bidang
                                    </label>
                                    <select id="kode_belanja_bidang" name="kode_belanja_bidang"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="">Pilih Belanja Bidang...</option>
                                        <option value="Penyelengaraan Pemerintah Desa">Penyelengaraan Pemerintah Desa
                                        </option>
                                        <option value="Pelaksanaan Pembangunan Desa">Pelaksanaan Pembangunan Desa
                                        </option>
                                        <option value="Pembinaan Kemasyarakatan">Pembinaan Kemasyarakatan</option>
                                        <option value="Pemberdayaan Masyarakat Desa">Pemberdayaan Masyarakat</option>
                                        <option value="Penanggulangan Bencana, Darurat Dan Mendesak Desa">Penanggulangan
                                            Bencana, Darurat Dan Mendesak Desa</option>
                                    </select>
                                </div>

                                <!-- Tanggal Perolehan -->
                                <div class="form-group">
                                    <label for="tanggal_perolehan" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Tanggal Perolehan
                                    </label>
                                    <div class="relative">
                                        <input type="date" id="tanggal_perolehan" name="tanggal_perolehan"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            required />
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <i class="far fa-calendar-alt text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Luas -->
                                <div class="form-group">
                                    <label for="luas" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Luas (M²)
                                    </label>
                                    <div class="relative">
                                        <input type="number" id="luas" name="luas"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            required />
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <span class="text-gray-500 text-sm">m²</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Column 2 -->
                            <div class="space-y-4">
                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Status
                                    </label>
                                    <select id="status" name="status"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="Sertifikat - Hak Pakai">Sertifikat - Hak Pakai</option>
                                        <option value="Bukti Lainnya - Letter C">Bukti Lainnya - Letter C</option>
                                        <option value="Bukti Lainnya - Girik">Bukti Lainnya - Girik</option>
                                        <option value="Bukti Lainnya - Surat Keterangan">Bukti Lainnya - Surat
                                            Keterangan</option>
                                        <option value="Bukti Lainnya - Surat Penguasaan Fisik">Bukti Lainnya - Surat
                                            Penguasaan Fisik</option>
                                        <option value="Bukti Lainnya - Bukti Inventaritasi Aset">Bukti Lainnya - Bukti
                                            Inventaritasi Aset</option>
                                    </select>
                                </div>

                                <!-- Tanggal Sertifikat -->
                                <div class="form-group">
                                    <label for="tanggal_sertifikat"
                                        class="block text-sm font-medium text-gray-700 mb-1">
                                        Tanggal Sertifikat
                                    </label>
                                    <div class="relative">
                                        <input type="date" id="tanggal_sertifikat" name="tanggal_sertifikat"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <i class="far fa-calendar-alt text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nomor Sertifikat -->
                                <div class="form-group">
                                    <label for="no_sertifikat" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nomor Sertifikat
                                    </label>
                                    <input type="number" id="no_sertifikat" name="no_sertifikat"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                                </div>

                                <!-- Asal -->
                                <div class="form-group">
                                    <label for="asal" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Asal
                                    </label>
                                    <select id="asal" name="asal"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="Kekayaan Asli Desa">Kekayaan Asli Desa</option>
                                        <option value="APBDesa">APBDesa</option>
                                        <option value="Perolehan Lain Yang Sah">Perolehan Lain Yang Sah</option>
                                    </select>
                                </div>

                                <!-- Sumber Dana -->
                                <div class="form-group">
                                    <label for="sumber_dana" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Sumber Dana
                                    </label>
                                    <select id="sumber_dana" name="sumber_dana"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="Pendapatan Asli Desa">Pendapatan Asli Desa</option>
                                        <option value="Dana Desa">Dana Desa(Dropping APBN)</option>
                                        <option value="Alokasi Dana Desa">Alokasi Dana Desa</option>
                                        <option value="Penerimaan Bagi Hasil Pajak Retribusi Daerah">Penerimaan Bagi
                                            Hasil Pajak Retribusi Daerah</option>
                                        <option value="Penerimaan Bantuan Keuangan Kab/Kota">Penerimaan Bantuan
                                            Keuangan Kab/Kota</option>
                                        <option value="Penerimaan Bantuan Keuangan Provinsi">Penerimaan Bantuan
                                            Keuangan Provinsi</option>
                                        <option value="Swadaya Masyarakat">Swadaya Masyarakat</option>
                                        <option value="Pendapatan Lain Lain">Pendapatan Lain Lain</option>
                                    </select>
                                </div>

                                <!-- Nilai Perolehan -->
                                <div class="form-group">
                                    <label for="nilai_perolehan" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Nilai Perolehan (Rp)
                                    </label>
                                    <div class="relative">
                                        <input type="number" id="nilai_perolehan" name="nilai_perolehan"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            required />
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <span class="text-gray-500 text-sm">Rp</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kondisi -->
                                <div class="form-group">
                                    <label for="kondisi" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Kondisi
                                    </label>
                                    <select id="kondisi" name="kondisi"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="Baik">Baik</option>
                                        <option value="Kurang Baik">Kurang Baik</option>
                                        <option value="Rusak Ringan">Rusak Ringan</option>
                                        <option value="Rusak Berat">Rusak Berat</option>
                                    </select>
                                </div>

                                <!-- Perolehan -->
                                <div class="form-group">
                                    <label for="perolehan" class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Perolehan
                                    </label>
                                    <select id="perolehan" name="perolehan"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="Inventarisasi">Inventarisasi</option>
                                    </select>
                                </div>

                                <!-- Tanggal Pembukuan -->
                                <div class="form-group">
                                    <label for="tanggal_pembukuan"
                                        class="block text-sm font-medium text-gray-700 mb-1">
                                        <span class="text-red-500">*</span> Tanggal Pembukuan
                                    </label>
                                    <div class="relative">
                                        <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            required />
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <i class="far fa-calendar-alt text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Full Width Fields -->
                        <div class="mt-6 space-y-4">
                            <!-- Alamat -->
                            <div class="form-group">
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                                    Alamat
                                </label>
                                <textarea id="alamat" name="alamat" rows="3"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>

                            <!-- Kode Lokasi -->
                            <div class="form-group">
                                <label for="kode_lokasi" class="block text-sm font-medium text-gray-700 mb-1">
                                    <span class="text-red-500">*</span> Kode Lokasi
                                </label>
                                <input type="text" id="kode_lokasi" name="kode_lokasi"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    required />
                            </div>

                            <!-- Batas Tanah Section -->
                            <div class="border border-gray-200 rounded-lg p-4 mt-6">
                                <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-map-marked-alt mr-2 text-blue-600"></i> Batas Tanah
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Batas Utara -->
                                    <div class="form-group">
                                        <label for="batas_utara" class="block text-sm font-medium text-gray-700 mb-1">
                                            <span class="text-red-500">*</span> Batas Utara
                                        </label>
                                        <input type="text" id="batas_utara" name="batas_utara"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            required />
                                    </div>

                                    <!-- Batas Timur -->
                                    <div class="form-group">
                                        <label for="batas_timur" class="block text-sm font-medium text-gray-700 mb-1">
                                            <span class="text-red-500">*</span> Batas Timur
                                        </label>
                                        <input type="text" id="batas_timur" name="batas_timur"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            required />
                                    </div>

                                    <!-- Batas Selatan -->
                                    <div class="form-group">
                                        <label for="batas_selatan"
                                            class="block text-sm font-medium text-gray-700 mb-1">
                                            <span class="text-red-500">*</span> Batas Selatan
                                        </label>
                                        <input type="text" id="batas_selatan" name="batas_selatan"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            required />
                                    </div>

                                    <!-- Batas Barat -->
                                    <div class="form-group">
                                        <label for="batas_barat" class="block text-sm font-medium text-gray-700 mb-1">
                                            <span class="text-red-500">*</span> Batas Barat
                                        </label>
                                        <input type="text" id="batas_barat" name="batas_barat"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            required />
                                    </div>
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div class="form-group">
                                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                                    Keterangan
                                </label>
                                <textarea id="keterangan" name="keterangan" rows="3"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                        </div>

                        <!-- Hidden Field -->
                        <input type="hidden" name="id_pengadaan" value="{{ $id }}">

                        <!-- Form Actions -->
                        <div class="mt-8 flex justify-end space-x-4">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <a href="{{ route('tanah.index') }}">
                                    <i class="fas fa-arrow-left mr-1"></i> Batal
                                </a>
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            .form-group {
                margin-bottom: 1.25rem;
            }

            select {
                appearance: none;
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
                background-position: right 0.75rem center;
                background-repeat: no-repeat;
                background-size: 1.5em 1.5em;
                padding-right: 2.5rem;
            }

            .required-field::after {
                content: " *";
                color: #ef4444;
            }
        </style>
    @endpush
</x-app-layout>
