<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Perangkat Desa dan Pengguna') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Data Perangkat Desa dan Pengguna
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                        <!-- Search Input -->
                        <div class="relative w-full sm:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="searchInput" placeholder="Cari pengguna..."
                                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                oninput="searchTable()">
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
                        <table id="penggunaTable" class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-4 py-3 w-12">No</th>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Jabatan</th>
                                    <th scope="col" class="px-4 py-3">Nama Jabatan</th>
                                    <th scope="col" class="px-4 py-3">Jabatan Tim</th>
                                    <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="penggunaTableBody">
                                @php $no = 1; @endphp
                                @foreach ($pengguna as $p)
                                    <tr class="pengguna-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $no++ }}</td>
                                        <td class="nama-pengguna px-4 py-3">{{ $p->nama_perangkat }}</td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                                @if($p->jabatan === 'Kepala Desa') bg-amber-100 text-amber-800 dark:bg-amber-900 dark:text-amber-200
                                                @elseif($p->jabatan === 'Sekretaris Desa') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                                @elseif($p->jabatan === 'Kaur Keuangan') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                                @elseif($p->jabatan === 'Kaur Umum') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                                @elseif($p->jabatan === 'Kaur Perencanaan') bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200
                                                @elseif($p->jabatan === 'Kepala Dusun') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                                @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200 @endif">
                                                {{ $p->jabatan }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">{{ $p->nama_jabatan }}</td>
                                        <td class="px-4 py-3">
                                            @if($p->jabatan_tim_inventarisasi)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                    {{ $p->jabatan_tim_inventarisasi }}
                                                </span>
                                            @else
                                                <span class="text-gray-500 dark:text-gray-400">-</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 flex flex-wrap justify-center gap-2">
                                            <button type="button" data-id="{{ $p->id }}"
                                                data-modal-target="sourceModalEdit" data-nama_perangkat="{{ $p->nama_perangkat }}"
                                                data-jabatan="{{ $p->jabatan }}" data-nama_jabatan="{{ $p->nama_jabatan }}"
                                                data-jabatan_tim_inventarisasi="{{ $p->jabatan_tim_inventarisasi }}"
                                                onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white flex items-center">
                                                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </button>
                                            <button onclick="penggunaDelete('{{ $p->id }}','{{ $p->nama_perangkat }}')"
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
                        {{ $pengguna->links() }}
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
                                Tambah Pengguna
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
                        Tambah Pengguna
                    </h3>
                </div>
                <form method="POST" id="formSourceModal" action="{{ route('pengguna.store') }}">
                    @csrf
                    <div class="p-4 sm:p-6 space-y-4">
                        <div>
                            <label for="nama_perangkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nama Perangkat
                            </label>
                            <input type="text" id="nama_perangkat" name="nama_perangkat" placeholder="Masukkan nama lengkap"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Jabatan
                            </label>
                            <select id="jabatan" name="jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="" disabled selected>Pilih Jabatan</option>
                                <option value="Kepala Desa">Kepala Desa</option>
                                <option value="Sekretaris Desa">Sekretaris Desa</option>
                                <option value="Kaur Keuangan">Kaur Keuangan</option>
                                <option value="Kaur Umum">Kaur Umum</option>
                                <option value="Kaur Perencanaan">Kaur Perencanaan</option>
                                <option value="Kepala Dusun">Kepala Dusun</option>
                                <option value="Staf">Staf</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label for="nama_jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nama Jabatan
                            </label>
                            <input type="text" id="nama_jabatan" name="nama_jabatan" placeholder="Contoh: Kepala Desa Sukamaju"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="jabatan_tim_inventarisasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Jabatan Tim Inventarisasi
                            </label>
                            <select id="jabatan_tim_inventarisasi" name="jabatan_tim_inventarisasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Pilih Jabatan (Opsional)</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Anggota 1">Anggota 1</option>
                                <option value="Anggota 2">Anggota 2</option>
                                <option value="Anggota 3">Anggota 3</option>
                            </select>
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
                        Edit Pengguna
                    </h3>
                </div>
                <form method="POST" id="formSourceModalEdit">
                    @csrf
                    @method('PATCH')
                    <div class="p-4 sm:p-6 space-y-4">
                        <div>
                            <label for="nama_perangkat_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nama Perangkat
                            </label>
                            <input type="text" id="nama_perangkat_edit" name="nama_perangkat" placeholder="Masukkan nama lengkap"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required />
                        </div>
                        <div>
                            <label for="jabatan_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Jabatan
                            </label>
                            <select id="jabatan_edit" name="jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required>
                                <option value="" disabled>Pilih Jabatan</option>
                                <option value="Kepala Desa">Kepala Desa</option>
                                <option value="Sekretaris Desa">Sekretaris Desa</option>
                                <option value="Kaur Keuangan">Kaur Keuangan</option>
                                <option value="Kaur Umum">Kaur Umum</option>
                                <option value="Kaur Perencanaan">Kaur Perencanaan</option>
                                <option value="Kepala Dusun">Kepala Dusun</option>
                                <option value="Staf">Staf</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label for="nama_jabatan_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nama Jabatan
                            </label>
                            <input type="text" id="nama_jabatan_edit" name="nama_jabatan" placeholder="Contoh: Kepala Desa Sukamaju"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required />
                        </div>
                        <div>
                            <label for="jabatan_tim_inventarisasi_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Jabatan Tim Inventarisasi
                            </label>
                            <select id="jabatan_tim_inventarisasi_edit" name="jabatan_tim_inventarisasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500">
                                <option value="">Pilih Jabatan (Opsional)</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Anggota 1">Anggota 1</option>
                                <option value="Anggota 2">Anggota 2</option>
                                <option value="Anggota 3">Anggota 3</option>
                            </select>
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
            const rows = document.getElementsByClassName('pengguna-row');
            const emptyState = document.getElementById('emptyState');
            let hasResults = false;

            for (let row of rows) {
                const nama = row.getElementsByClassName('nama-pengguna')[0].textContent.toLowerCase();
                const jabatan = row.querySelector('td:nth-child(3) span').textContent.toLowerCase();
                const namaJabatan = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                const jabatanTim = row.querySelector('td:nth-child(5)').textContent.toLowerCase();

                if (nama.includes(input) || jabatan.includes(input) || namaJabatan.includes(input) || jabatanTim.includes(input)) {
                    row.style.display = '';
                    hasResults = true;
                } else {
                    row.style.display = 'none';
                }
            }

            emptyState.style.display = hasResults || input === '' ? 'none' : 'block';
        }

        function functionAdd() {
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');
            formModal.reset();
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function editSourceModal(button) {
            const formModal = document.getElementById('formSourceModalEdit');
            const modal = document.getElementById('sourceModalEdit');
            const id = button.dataset.id;
            const nama_perangkat = button.dataset.nama_perangkat;
            const jabatan = button.dataset.jabatan;
            const nama_jabatan = button.dataset.nama_jabatan;
            const jabatan_tim_inventarisasi = button.dataset.jabatan_tim_inventarisasi;

            formModal.action = "{{ route('pengguna.update', ':id') }}".replace(':id', id);
            document.getElementById('nama_perangkat_edit').value = nama_perangkat;
            document.getElementById('jabatan_edit').value = jabatan;
            document.getElementById('nama_jabatan_edit').value = nama_jabatan;
            document.getElementById('jabatan_tim_inventarisasi_edit').value = jabatan_tim_inventarisasi || '';

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function sourceModalClose() {
            document.getElementById('sourceModal').classList.add('hidden');
            document.getElementById('sourceModalEdit').classList.add('hidden');
        }

        async function penggunaDelete(id, pengguna) {
            const result = await Swal.fire({
                title: `Hapus ${pengguna}?`,
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
                    await axios.post(`/pengguna/${id}`, {
                        '_method': 'DELETE',
                        '_token': '{{ csrf_token() }}'
                    });
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Data pengguna telah dihapus.',
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
    </script>
</x-app-layout>