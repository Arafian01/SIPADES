<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TAMBAH KONTRUKSI DALAM PENGERJAAN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="w-full  mx-auto" method="POST" action="{{ route('kontruksi_dalam_pengerjaan.store') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="id_barang"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id Barang
                                (Auto)</label>
                            <input type="text" id="id_barang" name="id_barang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="no_reg"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Register</label>
                            <input type="text" id="no_reg" name="no_reg"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="id_rekening"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">rekening</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="id_rekening" name="id_rekening" data-placeholder="Pilih aset">
                                <option value="">Pilih...</option>
                                @foreach ($rekening as $s)
                                    <option value="{{ $s->id }}">{{ $s->kode }} - {{ $s->nama_rekening }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="nama_label"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Label</label>
                            <input type="text" id="nama_label" name="nama_label"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>

                        <div class="mb-5">
                            <label for="kode_belanja_bidang"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Belanja
                                Bidang</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="kode_belanja_bidang" name="kode_belanja_bidang"
                                data-placeholder="Pilih Belanja Bidang">
                                <option value="">Pilih...</option>
                                <option value="Penyelengaraan Pemerintah Desa">Penyelengaraan Pemerintah Desa</option>
                                <option value="Pelaksanaan Pembangunan Desa">Pelaksanaan Pembangunan Desa</option>
                                <option value="Pembinaan Kemasyarakatan">Pembinaan Kemasyarakatan</option>
                                <option value="Pemberdayaan Masyarakat Desa">Pemberdayaan Masyarakat</option>
                                <option value="Penanggulangan Bencana, Darurat Dan Mendesak Desa">Penanggulangan
                                    Bencana, Darurat Dan Mendesak Desa</option>
                            </select>
                        </div>
                        
                        <div class="mb-5">
                            <label for="no_dokumen"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Dokumen</label>
                            <input type="text" id="no_dokumen" name="no_dokumen"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_dokumen"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Dokumen</label>
                            <input type="date" id="tanggal_dokumen" name="tanggal_dokumen"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>


                        <div class="mb-5">
                            <label for="asal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal</label>
                            <select id="asal" name="asal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Kekayaan Asli Desa">Kekayaan Asli Desa</option>
                                <option value="APBDesa">APBDesa</option>
                                <option value="Perolehan Lain Yang Sah">Perolehan Lain Yang Sah</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="sumber_dana"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber
                                Dana</label>
                            <select id="sumber_dana" name="sumber_dana"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Pendapatan Asli Desa">Pendapatan Asli Desa</option>
                                <option value="Dana Desa">Dana Desa(Dropping APBN)</option>
                                <option value="Alokasi Dana Desa">Alokasi Dana Desa</option>
                                <option value="Penerimaan Bagi Hasil Pajak Retribusi Daerah">Penerimaan Bagi Hasil
                                    Pajak Retribusi Daerah</option>
                                <option value="Penerimaan Bantuan Keuangan Kab/Kota">Penerimaan Bantuan Keuangan
                                    Kab/Kota</option>
                                <option value="Penerimaan Bantuan Keuangan Provinsi">Penerimaan Bantuan Keuangan
                                    Provinsi</option>
                                <option value="Swadaya Masyarakat">Swadaya Masyarakat</option>
                                <option value="Pendapatan Lain Lain">Pendapatan Lain Lain</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="nilai_perolehan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai
                                Perolehan</label>
                            <input type="number" id="nilai_perolehan" name="nilai_perolehan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="kondisi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kondisi</label>
                            <select id="kondisi" name="kondisi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Baik">Baik</option>
                                <option value="Kurang Baik">Kurang Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_pembukuan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Pembukuan</label>
                            <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="keterangan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea id="keterangan" name="keterangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <input type="hidden" name="id_pengadaan" value="{{ $id }}">
                         <a href="{{ url()->previous() }}"
                                class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Batal</a>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
