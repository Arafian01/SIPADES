<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Gedung dan Bangunan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('gedung_dan_bangunan.update', $gedung_dan_bangunan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Id Barang (Auto) -->
                            <div class="mb-5">
                                <label for="id_barang"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id Barang
                                    (Auto)</label>
                                <input type="text" id="id_barang" name="id_barang" readonly
                                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('id_barang', $gedung_dan_bangunan->aset->id_barang) }}" />
                                @error('id_barang')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nomor Register -->
                            <div class="mb-5">
                                <label for="no_reg"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                    Register</label>
                                <input type="text" id="no_reg" name="no_reg"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('no_reg', $gedung_dan_bangunan->aset->nomor_register) }}" required />
                                @error('no_reg')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kode Aset -->
                            <div class="mb-5">
                                <label for="id_rekening"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Aset</label>
                                <select class="js-select2 form-control w-full" id="id_rekening" name="id_rekening"
                                    required>
                                    <option value="">Pilih...</option>
                                    @foreach ($rekening as $s)
                                        <option value="{{ $s->id }}"
                                            {{ old('id_rekening', $gedung_dan_bangunan->aset->rekening->id) == $s->id ? 'selected' : '' }}>
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
                                <label for="nama_label"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Label</label>
                                <input type="text" id="nama_label" name="nama_label"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('nama_label', $gedung_dan_bangunan->aset->nama_label) }}" required />
                                @error('nama_label')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kode Pemilik -->
                            <div class="mb-5">
                                <label for="kode_pemilik"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Pemilik</label>
                                <select class="js-select2 form-control w-full" id="kode_pemilik" name="kode_pemilik"
                                    required>
                                    <option value="">Pilih...</option>
                                    <option value="Pemerintah Desa"
                                        {{ old('kode_pemilik', $gedung_dan_bangunan->kode_pemilik) == 'Pemerintah Desa' ? 'selected' : '' }}>
                                        Pemerintah Desa</option>
                                </select>
                                @error('kode_pemilik')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="kode_belanja_bidang"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Belanja
                                    Bidang</label>
                                <select class="js-select2 form-control w-full" id="kode_belanja_bidang"
                                    name="kode_belanja_bidang" required>
                                    <option value="">Pilih...</option>
                                    <option value="Penyelengaraan Pemerintah Desa"
                                        {{ old('kode_belanja_bidang', $gedung_dan_bangunan->aset->kode_belanja_bidang) == 'Penyelengaraan Pemerintah Desa' ? 'selected' : '' }}>
                                        Penyelengaraan Pemerintah Desa</option>
                                    <option value="Pelaksanaan Pembangunan Desa"
                                        {{ old('kode_belanja_bidang', $gedung_dan_bangunan->aset->kode_belanja_bidang) == 'Pelaksanaan Pembangunan Desa' ? 'selected' : '' }}>
                                        Pelaksanaan Pembangunan Desa</option>
                                    <option value="Pembinaan Kemasyarakatan"
                                        {{ old('kode_belanja_bidang', $gedung_dan_bangunan->aset->kode_belanja_bidang) == 'Pembinaan Kemasyarakatan' ? 'selected' : '' }}>
                                        Pembinaan Kemasyarakatan</option>
                                    <option value="Pemberdayaan Masyarakat Desa"
                                        {{ old('kode_belanja_bidang', $gedung_dan_bangunan->aset->kode_belanja_bidang) == 'Pemberdayaan Masyarakat Desa' ? 'selected' : '' }}>
                                        Pemberdayaan Masyarakat</option>
                                    <option value="Penanggulangan Bencana, Darurat Dan Mendesak Desa"
                                        {{ old('kode_belanja_bidang', $gedung_dan_bangunan->aset->kode_belanja_bidang) == 'Penanggulangan Bencana, Darurat Dan Mendesak Desa' ? 'selected' : '' }}>
                                        Penanggulangan Bencana, Darurat Dan Mendesak Desa</option>
                                </select>
                                @error('kode_belanja_bidang')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="tanggal_perolehan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Perolehan</label>
                                <input type="text" id="tanggal_perolehan" name="tanggal_perolehan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('tanggal_perolehan', $gedung_dan_bangunan->tanggal_perolehan) }}" required />
                                @error('tanggal_perolehan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="luas_lantai"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Luas Lantai</label>
                                <input type="number" id="luas_lantai" name="luas_lantai"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('luas_lantai', $gedung_dan_bangunan->luas_lantai) }}" required />
                                @error('luas_lantai')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="bertingkat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bertingkat</label>
                                <input type="text" id="bertingkat" name="bertingkat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('bertingkat', $gedung_dan_bangunan->bertingkat) }}" required />
                                @error('bertingkat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="mb-5">
                            <label for="beton"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beton</label>
                            <select id="beton" name="beton"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Beton">Beton</option>
                                <option value="Tidak Beton">Tidak Beton</option>
                            </select>
                        </div> --}}
                            <div class="mb-5">
                                <label for="beton"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beton</label>
                                <select class="js-select2 form-control w-full" id="beton" name="beton" required>
                                    <option value="Beton"
                                        {{ old('beton', $gedung_dan_bangunan->beton) == 'Beton' ? 'selected' : '' }}>
                                        Beton</option>
                                    <option value="Tidak Beton"
                                        {{ old('beton', $gedung_dan_bangunan->beton) == 'Tidak Beton' ? 'selected' : '' }}>
                                        Tidak Beton</option>
                                </select>
                                @error('beton')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- no_dokumen -->
                            <div class="mb-5">
                                <label for="no_dokumen"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Dokumen</label>
                                <input type="text" id="no_dokumen" name="no_dokumen"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('no_dokumen', $gedung_dan_bangunan->aset->no_dokumen) }}" required />
                                @error('no_dokumen')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal Dokumen -->
                            <div class="mb-5">
                                <label for="tanggal_dokumen"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Dokumen</label>
                                <input type="date" id="tanggal_dokumen" name="tanggal_dokumen"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('tanggal_dokumen', $gedung_dan_bangunan->aset->tanggal_dokumen) }}" required />
                                @error('tanggal_dokumen')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanah -->
                            <div class="mb-5">
                                <label for="id_tanah"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanah</label>
                                <select class="js-select2 form-control w-full" id="id_tanah" name="id_tanah" required>
                                    <option value="">Pilih Tanah...</option>
                                    @foreach ($tanah as $t)
                                        <option value="{{ $t->id }}"
                                            {{ old('id_tanah', $gedung_dan_bangunan->id_tanah) == $t->id ? 'selected' : '' }}>
                                            {{ $t->kode }} - Luas: {{ $t->luas }} m²</option>
                                    @endforeach
                                </select>
                                @error('id_tanah')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Asal -->
                            <div class="mb-5">
                                <label for="asal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal</label>
                                <select class="js-select2 form-control w-full" id="asal" name="asal"
                                    required>
                                    <option value="Kekayaan Asli Desa"
                                        {{ old('asal', $gedung_dan_bangunan->aset->asal) == 'Kekayaan Asli Desa' ? 'selected' : '' }}>
                                        Kekayaan Asli Desa</option>
                                    <option value="APBDesa"
                                        {{ old('asal', $gedung_dan_bangunan->aset->asal) == 'APBDesa' ? 'selected' : '' }}>
                                        APBDesa</option>
                                    <option value="Perolehan Lain Yang Sah"
                                        {{ old('asal', $gedung_dan_bangunan->aset->asal) == 'Perolehan Lain Yang Sah' ? 'selected' : '' }}>
                                        Perolehan Lain Yang Sah</option>
                                </select>
                                @error('asal')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sumber Dana -->
                            <div class="mb-5">
                                <label for="sumber_dana"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber
                                    Dana</label>
                                <select class="js-select2 form-control w-full" id="sumber_dana" name="sumber_dana"
                                    required>
                                    <option value="Pendapatan Asli Desa"
                                        {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Pendapatan Asli Desa' ? 'selected' : '' }}>
                                        Pendapatan Asli Desa</option>
                                    <option value="Dana Desa"
                                        {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Dana Desa' ? 'selected' : '' }}>
                                        Dana Desa (Dropping APBN)</option>
                                    <option value="Alokasi Dana Desa"
                                        {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Alokasi Dana Desa' ? 'selected' : '' }}>
                                        Alokasi Dana Desa</option>
                                    <option value="Penerimaan Bagi Hasil Pajak Retribusi Daerah"
                                        {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Penerimaan Bagi Hasil Pajak Retribusi Daerah' ? 'selected' : '' }}>
                                        Penerimaan Bagi Hasil Pajak Retribusi Daerah</option>
                                    <option value="Penerimaan Bantuan Keuangan Kab/Kota"
                                        {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Penerimaan Bantuan Keuangan Kab/Kota' ? 'selected' : '' }}>
                                        Penerimaan Bantuan Keuangan Kab/Kota</option>
                                    <option value="Penerimaan Bantuan Keuangan Provinsi"
                                        {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Penerimaan Bantuan Keuangan Provinsi' ? 'selected' : '' }}>
                                        Penerimaan Bantuan Keuangan Provinsi</option>
                                    <option value="Swadaya Masyarakat"
                                        {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Swadaya Masyarakat' ? 'selected' : '' }}>
                                        Swadaya Masyarakat</option>
                                    <option value="Pendapatan Lain Lain"
                                        {{ old('sumber_dana', $gedung_dan_bangunan->aset->sumber_dana) == 'Pendapatan Lain Lain' ? 'selected' : '' }}>
                                        Pendapatan Lain Lain</option>
                                </select>
                                @error('sumber_dana')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nilai Perolehan -->
                            <div class="mb-5">
                                <label for="nilai_perolehan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai
                                    Perolehan</label>
                                <input type="number" id="nilai_perolehan" name="nilai_perolehan" min="0"
                                    step="0.01"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('nilai_perolehan', $gedung_dan_bangunan->aset->nilai_perolehan) }}" required />
                                @error('nilai_perolehan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Kondisi -->
                            <div class="mb-5">
                                <label for="kondisi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kondisi</label>
                                <select class="js-select2 form-control w-full" id="kondisi" name="kondisi"
                                    required>
                                    <option value="Baik"
                                        {{ old('kondisi', $gedung_dan_bangunan->aset->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Kurang Baik"
                                        {{ old('kondisi', $gedung_dan_bangunan->aset->kondisi) == 'Kurang Baik' ? 'selected' : '' }}>Kurang
                                        Baik</option>
                                    <option value="Rusak Ringan"
                                        {{ old('kondisi', $gedung_dan_bangunan->aset->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak
                                        Ringan</option>
                                    <option value="Rusak Berat"
                                        {{ old('kondisi', $gedung_dan_bangunan->aset->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak
                                        Berat</option>
                                </select>
                                @error('kondisi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal Pembukuan -->
                            <div class="mb-5">
                                <label for="tanggal_pembukuan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Pembukuan</label>
                                <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ old('tanggal_pembukuan', $gedung_dan_bangunan->aset->tanggal_pembukuan) }}"
                                    required />
                                @error('tanggal_pembukuan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Perolehan -->
                            <div class="mb-5">
                                <label for="perolehan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perolehan</label>
                                <select class="js-select2 form-control w-full" id="perolehan" name="perolehan"
                                    required>
                                    <option value="Inventarisasi"
                                        {{ old('perolehan', $gedung_dan_bangunan->perolehan) == 'Inventarisasi' ? 'selected' : '' }}>
                                        Inventarisasi</option>
                                </select>
                                @error('perolehan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- alamat -->
                            <div class="mb-5 md:col-span-2">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">alamat</label>
                                <textarea id="alamat" name="alamat" rows="4"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('alamat', $gedung_dan_bangunan->aset->alamat) }}</textarea>
                                @error('alamat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div> 

                            <!-- Keterangan -->
                            <div class="mb-5 md:col-span-2">
                                <label for="keterangan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                <textarea id="keterangan" name="keterangan" rows="4"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('keterangan', $gedung_dan_bangunan->aset->keterangan) }}</textarea>
                                @error('keterangan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end gap-4 mt-6">
                            <a href="{{ route('gedung_dan_bangunan.index') }}"
                                class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Batal</a>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                                Perubahan</button>
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
