<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tanah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('tanah.update', $tanah->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Id Barang (Auto) -->
                            <div class="mb-5">
                                <label for="id_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id Barang (Auto)</label>
                                <input type="text" id="id_barang" name="id_barang" readonly
                                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('id_barang', $tanah->aset->id_barang) }}" />
                                @error('id_barang')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nomor Register -->
                            <div class="mb-5">
                                <label for="no_reg" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Register</label>
                                <input type="text" id="no_reg" name="no_reg"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('no_reg', $tanah->aset->nomor_register) }}" required />
                                @error('no_reg')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kode Aset -->
                            <div class="mb-5">
                                <label for="id_rekening" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Aset</label>
                                <select class="js-select2 form-control w-full" id="id_rekening" name="id_rekening" required>
                                    <option value="">Pilih...</option>
                                    @foreach ($rekening as $s)
                                        <option value="{{ $s->id }}" {{ old('id_rekening', $tanah->aset->rekening->id) == $s->id ? 'selected' : '' }}>
                                            {{ $s->kode }} - {{ $s->nama_rekening }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_rekening')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Label -->
                            <div class="mb-5">
                                <label for="nama_label" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Label</label>
                                <input type="text" id="nama_label" name="nama_label"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('nama_label', $tanah->aset->nama_label) }}" required />
                                @error('nama_label')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kode Pemilik -->
                            <div class="mb-5">
                                <label for="kode_pemilik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pemilik</label>
                                <select class="js-select2 form-control w-full" id="kode_pemilik" name="kode_pemilik" required>
                                    <option value="">Pilih...</option>
                                    <option value="Pemerintah Desa" {{ old('kode_pemilik', $tanah->kode_pemilik) == 'Pemerintah Desa' ? 'selected' : '' }}>Pemerintah Desa</option>
                                </select>
                                @error('kode_pemilik')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kode Belanja Bidang -->
                            <div class="mb-5">
                                <label for="kode_belanja_bidang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Belanja Bidang</label>
                                <select class="js-select2 form-control w-full" id="kode_belanja_bidang" name="kode_belanja_bidang" required>
                                    <option value="">Pilih...</option>
                                    <option value="Penyelengaraan Pemerintah Desa" {{ old('kode_belanja_bidang', $tanah->aset->kode_belanja_bidang) == 'Penyelengaraan Pemerintah Desa' ? 'selected' : '' }}>Penyelengaraan Pemerintah Desa</option>
                                    <option value="Pelaksanaan Pembangunan Desa" {{ old('kode_belanja_bidang', $tanah->aset->kode_belanja_bidang) == 'Pelaksanaan Pembangunan Desa' ? 'selected' : '' }}>Pelaksanaan Pembangunan Desa</option>
                                    <option value="Pembinaan Kemasyarakatan" {{ old('kode_belanja_bidang', $tanah->aset->kode_belanja_bidang) == 'Pembinaan Kemasyarakatan' ? 'selected' : '' }}>Pembinaan Kemasyarakatan</option>
                                    <option value="Pemberdayaan Masyarakat Desa" {{ old('kode_belanja_bidang', $tanah->aset->kode_belanja_bidang) == 'Pemberdayaan Masyarakat Desa' ? 'selected' : '' }}>Pemberdayaan Masyarakat</option>
                                    <option value="Penanggulangan Bencana, Darurat Dan Mendesak Desa" {{ old('kode_belanja_bidang', $tanah->aset->kode_belanja_bidang) == 'Penanggulangan Bencana, Darurat Dan Mendesak Desa' ? 'selected' : '' }}>Penanggulangan Bencana, Darurat Dan Mendesak Desa</option>
                                </select>
                                @error('kode_belanja_bidang')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal Perolehan -->
                            <div class="mb-5">
                                <label for="tanggal_perolehan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Perolehan</label>
                                <input type="date" id="tanggal_perolehan" name="tanggal_perolehan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('tanggal_perolehan', $tanah->tanggal_perolehan) }}" required />
                                @error('tanggal_perolehan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Luas -->
                            <div class="mb-5">
                                <label for="luas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Luas (M²)</label>
                                <input type="number" id="luas" name="luas" min="0" step="0.01"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('luas', $tanah->luas) }}" required />
                                @error('luas')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-5">
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select class="js-select2 form-control w-full" id="status" name="status" required>
                                    <option value="Sertifikat - Hak Pakai" {{ old('status', $tanah->status) == 'Sertifikat - Hak Pakai' ? 'selected' : '' }}>Sertifikat - Hak Pakai</option>
                                    <option value="Bukti Lainnya - Letter C" {{ old('status', $tanah->status) == 'Bukti Lainnya - Letter C' ? 'selected' : '' }}>Bukti Lainnya - Letter C</option>
                                    <option value="Bukti Lainnya - Girik" {{ old('status', $tanah->status) == 'Bukti Lainnya - Girik' ? 'selected' : '' }}>Bukti Lainnya - Girik</option>
                                    <option value="Bukti Lainnya - Surat Keterangan" {{ old('status', $tanah->status) == 'Bukti Lainnya - Surat Keterangan' ? 'selected' : '' }}>Bukti Lainnya - Surat Keterangan</option>
                                    <option value="Bukti Lainnya - Surat Penguasaan Fisik" {{ old('status', $tanah->status) == 'Bukti Lainnya - Surat Penguasaan Fisik' ? 'selected' : '' }}>Bukti Lainnya - Surat Penguasaan Fisik</option>
                                    <option value="Bukti Lainnya - Bukti Inventaritasi Aset" {{ old('status', $tanah->status) == 'Bukti Lainnya - Bukti Inventaritasi Aset' ? 'selected' : '' }}>Bukti Lainnya - Bukti Inventaritasi Aset</option>
                                </select>
                                @error('status')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal Sertifikat -->
                            <div class="mb-5">
                                <label for="tanggal_sertifikat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Sertifikat</label>
                                <input type="date" id="tanggal_sertifikat" name="tanggal_sertifikat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('tanggal_sertifikat', $tanah->tanggal_sertifikat) }}" />
                                @error('tanggal_sertifikat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nomor Sertifikat -->
                            <div class="mb-5">
                                <label for="no_sertifikat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Sertifikat</label>
                                <input type="text" id="no_sertifikat" name="no_sertifikat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('no_sertifikat', $tanah->nomor_sertifikat) }}" />
                                @error('no_sertifikat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Asal -->
                            <div class="mb-5">
                                <label for="asal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal</label>
                                <select class="js-select2 form-control w-full" id="asal" name="asal" required>
                                    <option value="Kekayaan Asli Desa" {{ old('asal', $tanah->asal) == 'Kekayaan Asli Desa' ? 'selected' : '' }}>Kekayaan Asli Desa</option>
                                    <option value="APBDesa" {{ old('asal', $tanah->asal) == 'APBDesa' ? 'selected' : '' }}>APBDesa</option>
                                    <option value="Perolehan Lain Yang Sah" {{ old('asal', $tanah->asal) == 'Perolehan Lain Yang Sah' ? 'selected' : '' }}>Perolehan Lain Yang Sah</option>
                                </select>
                                @error('asal')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sumber Dana -->
                            <div class="mb-5">
                                <label for="sumber_dana" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber Dana</label>
                                <select class="js-select2 form-control w-full" id="sumber_dana" name="sumber_dana" required>
                                    <option value="Pendapatan Asli Desa" {{ old('sumber_dana', $tanah->sumber_dana) == 'Pendapatan Asli Desa' ? 'selected' : '' }}>Pendapatan Asli Desa</option>
                                    <option value="Dana Desa" {{ old('sumber_dana', $tanah->sumber_dana) == 'Dana Desa' ? 'selected' : '' }}>Dana Desa (Dropping APBN)</option>
                                    <option value="Alokasi Dana Desa" {{ old('sumber_dana', $tanah->sumber_dana) == 'Alokasi Dana Desa' ? 'selected' : '' }}>Alokasi Dana Desa</option>
                                    <option value="Penerimaan Bagi Hasil Pajak Retribusi Daerah" {{ old('sumber_dana', $tanah->sumber_dana) == 'Penerimaan Bagi Hasil Pajak Retribusi Daerah' ? 'selected' : '' }}>Penerimaan Bagi Hasil Pajak Retribusi Daerah</option>
                                    <option value="Penerimaan Bantuan Keuangan Kab/Kota" {{ old('sumber_dana', $tanah->sumber_dana) == 'Penerimaan Bantuan Keuangan Kab/Kota' ? 'selected' : '' }}>Penerimaan Bantuan Keuangan Kab/Kota</option>
                                    <option value="Penerimaan Bantuan Keuangan Provinsi" {{ old('sumber_dana', $tanah->sumber_dana) == 'Penerimaan Bantuan Keuangan Provinsi' ? 'selected' : '' }}>Penerimaan Bantuan Keuangan Provinsi</option>
                                    <option value="Swadaya Masyarakat" {{ old('sumber_dana', $tanah->sumber_dana) == 'Swadaya Masyarakat' ? 'selected' : '' }}>Swadaya Masyarakat</option>
                                    <option value="Pendapatan Lain Lain" {{ old('sumber_dana', $tanah->sumber_dana) == 'Pendapatan Lain Lain' ? 'selected' : '' }}>Pendapatan Lain Lain</option>
                                </select>
                                @error('sumber_dana')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nilai Perolehan -->
                            <div class="mb-5">
                                <label for="nilai_perolehan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Perolehan</label>
                                <input type="number" id="nilai_perolehan" name="nilai_perolehan" min="0" step="0.01"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('nilai_perolehan', $tanah->aset->nilai_perolehan) }}" required />
                                @error('nilai_perolehan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kondisi -->
                            <div class="mb-5">
                                <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kondisi</label>
                                <select class="js-select2 form-control w-full" id="kondisi" name="kondisi" required>
                                    <option value="Baik" {{ old('kondisi', $tanah->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Kurang Baik" {{ old('kondisi', $tanah->kondisi) == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                                    <option value="Rusak Ringan" {{ old('kondisi', $tanah->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                    <option value="Rusak Berat" {{ old('kondisi', $tanah->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                </select>
                                @error('kondisi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Perolehan -->
                            <div class="mb-5">
                                <label for="perolehan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perolehan</label>
                                <select class="js-select2 form-control w-full" id="perolehan" name="perolehan" required>
                                    <option value="Inventarisasi" {{ old('perolehan', $tanah->perolehan) == 'Inventarisasi' ? 'selected' : '' }}>Inventarisasi</option>
                                </select>
                                @error('perolehan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal Pembukuan -->
                            <div class="mb-5">
                                <label for="tanggal_pembukuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pembukuan</label>
                                <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('tanggal_pembukuan', $tanah->aset->tanggal_pembukuan) }}" required />
                                @error('tanggal_pembukuan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="mb-5 md:col-span-2">
                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea id="alamat" name="alamat" rows="4"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('alamat', $tanah->alamat) }}</textarea>
                                @error('alamat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kode Lokasi -->
                            <div class="mb-5">
                                <label for="kode_lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Lokasi</label>
                                <input type="text" id="kode_lokasi" name="kode_lokasi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('kode_lokasi', $tanah->kode_lokasi) }}" required />
                                @error('kode_lokasi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Batas Utara -->
                            <div class="mb-5">
                                <label for="batas_utara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batas Utara</label>
                                <input type="text" id="batas_utara" name="batas_utara"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('batas_utara', $tanah->batas_utara) }}" required />
                                @error('batas_utara')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Batas Timur -->
                            <div class="mb-5">
                                <label for="batas_timur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batas Timur</label>
                                <input type="text" id="batas_timur" name="batas_timur"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('batas_timur', $tanah->batas_timur) }}" required />
                                @error('batas_timur')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Batas Selatan -->
                            <div class="mb-5">
                                <label for="batas_selatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batas Selatan</label>
                                <input type="text" id="batas_selatan" name="batas_selatan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('batas_selatan', $tanah->batas_selatan) }}" required />
                                @error('batas_selatan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Batas Barat -->
                            <div class="mb-5">
                                <label for="batas_barat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batas Barat</label>
                                <input type="text" id="batas_barat" name="batas_barat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('batas_barat', $tanah->batas_barat) }}" required />
                                @error('batas_barat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Keterangan -->
                            <div class="mb-5 md:col-span-2">
                                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                <textarea id="keterangan" name="keterangan" rows="4"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('keterangan', $tanah->keterangan) }}</textarea>
                                @error('keterangan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end gap-4 mt-6">
                            <a href="{{ route('tanah.index') }}"
                                class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Batal</a>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.js-select2').select2({
                    placeholder: "Pilih...",
                    allowClear: true,
                    width: '100%'
                });
            });
        </script>
    @endpush
</x-app-layout>