<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manajemen Golongan Tanah') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Daftar Golongan Tanah
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                        <!-- Search Input -->
                        <div class="relative w-full sm:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="searchInput" placeholder="Cari tanah..."
                                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                oninput="searchTable()" autocomplete="off">
                        </div>
                        <!-- Add Button -->
                        <button onclick="functionAdd()"
                            class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center justify-center w-full sm:w-auto">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah
                        </button>
                    </div>
                </div>

                <div class="p-4 sm:p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <table id="tanahTable" class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300 sticky top-0">
                                <tr>
                                    <th scope="col" class="px-4 py-3 w-12">No</th>
                                    <th scope="col" class="px-4 py-3">ID Aset</th>
                                    <th scope="col" class="px-4 py-3">No Reg</th>
                                    <th scope="col" class="px-4 py-3">Kode Rekening</th>
                                    <th scope="col" class="px-4 py-3">Nama Rekening</th>
                                    <th scope="col" class="px-4 py-3">Tgl Perolehan</th>
                                    <th scope="col" class="px-4 py-3">Luas</th>
                                    <th scope="col" class="px-4 py-3">Nilai (Rp)</th>
                                    <th scope="col" class="px-4 py-3">Alamat</th>
                                    <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tanahTableBody">
                                @php $no = 1; @endphp
                                @foreach ($tanah as $t)
                                    <tr class="tanah-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $no++ }}</td>
                                        <td class="px-4 py-3 font-mono text-blue-600 dark:text-blue-400">{{ $t->aset->id_barang }}</td>
                                        <td class="px-4 py-3">{{ $t->aset->nomor_register }}</td>
                                        <td class="px-4 py-3">{{ $t->aset->rekening->kode }}</td>
                                        <td class="px-4 py-3">{{ $t->aset->rekening->nama_rekening }}</td>
                                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($t->tanggal_perolehan)->format('d/m/Y') }}</td>
                                        <td class="px-4 py-3">{{ number_format($t->luas, 2) }} m²</td>
                                        <td class="px-4 py-3">Rp {{ number_format($t->aset->nilai_perolehan, 2) }}</td>
                                        <td class="px-4 py-3">{{ Str::limit($t->alamat, 20) }}</td>
                                        <td class="px-4 py-3 flex flex-wrap justify-center gap-2">
                                            <button type="button" data-id="{{ $t->id }}"
                                                data-modal-target="sourceModalEdit" data-id_barang="{{ $t->aset->id_barang }}"
                                                data-nomor_register="{{ $t->aset->nomor_register }}"
                                                data-id_rekening="{{ $t->aset->id_rekening }}"
                                                data-tanggal_perolehan="{{ \Carbon\Carbon::parse($t->tanggal_perolehan)->format('Y-m-d') }}"
                                                data-luas="{{ $t->luas }}"
                                                data-nilai_perolehan="{{ $t->aset->nilai_perolehan }}"
                                                data-alamat="{{ $t->alamat }}"
                                                onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white flex items-center">
                                                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </button>
                                            <button onclick="tanahDelete('{{ $t->id }}','{{ $t->aset->rekening->nama_rekening }}')"
                                                class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md text-xs text-white flex items-center">
                                                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 flex justify-center">
                        {{ $tanah->links() }}
                    </div>
                    <!-- Empty State -->
                    <div id="emptyState" class="hidden text-center py-10">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak ada data ditemukan</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Coba kata kunci lain atau tambahkan data baru.</p>
                        <div class="mt-6">
                            <button onclick="functionAdd()"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Tanah
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="sourceModalClose()"></div>
        <div class="flex items-center justify-center p-4 w-full">
            <div class="w-full max-w-md sm:max-w-lg relative bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-blue-500 to-blue-600">
                    <h3 class="text-lg sm:text-xl font-semibold text-white">
                        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Tanah
                    </h3>
                </div>
                <form method="POST" id="formSourceModal" action="{{ route('tanah.store') }}">
                    @csrf
                    <div class="p-4 sm:p-6 space-y-4">
                        <div>
                            <label for="id_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                ID Aset
                            </label>
                            <input type="text" id="id_barang" name="id_barang" placeholder="Masukkan ID aset"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="nomor_register" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                Nomor Register
                            </label>
                            <input type="text" id="nomor_register" name="nomor_register" placeholder="Masukkan nomor register"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="id_rekening" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Kode Rekening
                            </label>
                            <select id="id_rekening" name="id_rekening"
                                class="js-example-placeholder-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">Pilih Kode Rekening</option>
                                @foreach ($rekening as $r)
                                    <option value="{{ $r->id }}">{{ $r->kode }} - {{ $r->nama_rekening }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="tanggal_perolehan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Tanggal Perolehan
                            </label>
                            <input type="date" id="tanggal_perolehan" name="tanggal_perolehan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="luas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4z"></path>
                                </svg>
                                Luas (m²)
                            </label>
                            <input type="number" id="luas" name="luas" placeholder="Masukkan luas tanah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                step="0.01" required />
                        </div>
                        <div>
                            <label for="nilai_perolehan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nilai Perolehan (Rp)
                            </label>
                            <input type="number" id="nilai_perolehan" name="nilai_perolehan" placeholder="Masukkan nilai perolehan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                step="0.01" required />
                        </div>
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Alamat
                            </label>
                            <textarea id="alamat" name="alamat" placeholder="Masukkan alamat tanah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="flex items-center justify-end p-4 sm:p-6 space-x-3 border-t border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" onclick="sourceModalClose()"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-4 sm:px-5 py-2.5 hover:text-gray-900 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                            Batal
                        </button>
                        <button type="submit"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 sm:px-5 py-2.5 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModalEdit">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="sourceModalClose()"></div>
        <div class="flex items-center justify-center p-4 w-full">
            <div class="w-full max-w-md sm:max-w-lg relative bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-amber-500 to-amber-600">
                    <h3 class="text-lg sm:text-xl font-semibold text-white">
                        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Tanah
                    </h3>
                </div>
                <form method="POST" id="formSourceModalEdit">
                    @csrf
                    @method('PATCH')
                    <div class="p-4 sm:p-6 space-y-4">
                        <div>
                            <label for="id_barang_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                ID Aset
                            </label>
                            <input type="text" id="id_barang_edit" name="id_barang" placeholder="Masukkan ID aset"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required />
                        </div>
                        <div>
                            <label for="nomor_register_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                Nomor Register
                            </label>
                            <input type="text" id="nomor_register_edit" name="nomor_register" placeholder="Masukkan nomor register"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required />
                        </div>
                        <div>
                            <label for="id_rekening_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Kode Rekening
                            </label>
                            <select id="id_rekening_edit" name="id_rekening"
                                class="js-example-placeholder-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required>
                                <option value="">Pilih Kode Rekening</option>
                                @foreach ($rekening as $r)
                                    <option value="{{ $r->id }}">{{ $r->kode }} - {{ $r->nama_rekening }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="tanggal_perolehan_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Tanggal Perolehan
                            </label>
                            <input type="date" id="tanggal_perolehan_edit" name="tanggal_perolehan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required />
                        </div>
                        <div>
                            <label for="luas_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4z"></path>
                                </svg>
                                Luas (m²)
                            </label>
                            <input type="number" id="luas_edit" name="luas" placeholder="Masukkan luas tanah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                step="0.01" required />
                        </div>
                        <div>
                            <label for="nilai_perolehan_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nilai Perolehan (Rp)
                            </label>
                            <input type="number" id="nilai_perolehan_edit" name="nilai_perolehan" placeholder="Masukkan nilai perolehan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                step="0.01" required />
                        </div>
                        <div>
                            <label for="alamat_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Alamat
                            </label>
                            <textarea id="alamat_edit" name="alamat" placeholder="Masukkan alamat tanah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="flex items-center justify-end p-4 sm:p-6 space-x-3 border-t border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" onclick="sourceModalClose()"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-4 sm:px-5 py-2.5 hover:text-gray-900 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                            Batal
                        </button>
                        <button type="submit"
                            class="text-white bg-amber-600 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-4 sm:px-5 py-2.5 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        @if (session('success_message'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success_message') }}",
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if (session('validation_error'))
            @foreach ($errors->all() as $error)
                Swal.fire({
                    title: 'Validasi Gagal!',
                    text: "{{ $error }}",
                    icon: 'error',
                    timer: 3000,
                    showConfirmButton: false
                });
                @break
            @endforeach
        @endif

        function searchTable() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.getElementsByClassName('tanah-row');
            const emptyState = document.getElementById('emptyState');
            let hasResults = false;

            for (let row of rows) {
                const cells = row.querySelectorAll('td');
                let found = false;
                for (let cell of cells) {
                    if (cell.textContent.toLowerCase().includes(input)) {
                        found = true;
                        break;
                    }
                }
                row.style.display = found ? '' : 'none';
                if (found) hasResults = true;
            }

            emptyState.style.display = hasResults || input === '' ? 'none' : 'block';
        }

        function functionAdd() {
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');
            formModal.reset();
            $('#id_rekening').val('').trigger('change');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function editSourceModal(button) {
            const formModal = document.getElementById('formSourceModalEdit');
            const modal = document.getElementById('sourceModalEdit');
            const id = button.dataset.id;
            const id_barang = button.dataset.id_barang;
            const nomor_register = button.dataset.nomor_register;
            const id_rekening = button.dataset.id_rekening;
            const tanggal_perolehan = button.dataset.tanggal_perolehan;
            const luas = button.dataset.luas;
            const nilai_perolehan = button.dataset.nilai_perolehan;
            const alamat = button.dataset.alamat;

            formModal.action = "{{ route('tanah.update', ':id') }}".replace(':id', id);
            document.getElementById('id_barang_edit').value = id_barang;
            document.getElementById('nomor_register_edit').value = nomor_register;
            $('#id_rekening_edit').val(id_rekening).trigger('change');
            document.getElementById('tanggal_perolehan_edit').value = tanggal_perolehan;
            document.getElementById('luas_edit').value = luas;
            document.getElementById('nilai_perolehan_edit').value = nilai_perolehan;
            document.getElementById('alamat_edit').value = alamat;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function sourceModalClose() {
            document.getElementById('sourceModal').classList.add('hidden');
            document.getElementById('sourceModalEdit').classList.add('hidden');
        }

        async function tanahDelete(id, tanah) {
            const result = await Swal.fire({
                title: `Hapus Tanah ${tanah}?`,
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            });

            if (result.isConfirmed) {
                try {
                    await axios.post(`/tanah/${id}`, {
                        '_method': 'DELETE',
                        '_token': '{{ csrf_token() }}'
                    });
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Data tanah telah dihapus.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => location.reload());
                } catch (error) {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menghapus data.',
                        icon: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            }
        }

        $(document).ready(function() {
            $('.js-example-placeholder-single').select2({
                placeholder: "Pilih Kode Rekening",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
</x-app-layout>