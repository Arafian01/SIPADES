<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Pengadaan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Data Pengadaan
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                        <!-- Search Input -->
                        <div class="relative w-full sm:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="searchInput" placeholder="Cari pengadaan..."
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
                        <table id="pengadaanTable" class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300 sticky top-0">
                                <tr class="text-center">
                                    <th scope="col" class="px-4 py-3 w-12">No</th>
                                    <th scope="col" class="px-4 py-3 min-w-[120px]">No Pengadaan</th>
                                    <th scope="col" class="px-4 py-3">Tgl Pengadaan</th>
                                    <th scope="col" class="px-4 py-3">No SPP</th>
                                    <th scope="col" class="px-4 py-3">Tgl SPP</th>
                                    <th scope="col" class="px-4 py-3">No BAST</th>
                                    <th scope="col" class="px-4 py-3">Tgl BAST</th>
                                    <th scope="col" class="px-4 py-3 min-w-[180px]">Rekanan</th>
                                    <th scope="col" class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pengadaanTableBody">
                                @php $no = 1; @endphp
                                @foreach ($pengadaan as $r)
                                    <tr class="pengadaan-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $no++ }}</td>
                                        <td class="px-4 py-3 font-mono">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                {{ $r->no_pengadaan }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($r->tanggal_pengadaan)->format('d/m/Y') }}</td>
                                        <td class="px-4 py-3 font-mono">{{ $r->no_kuitansi }}</td>
                                        <td class="px-4 py-3">{{ $r->tanggal_spp ? \Carbon\Carbon::parse($r->tanggal_spp)->format('d/m/Y') : '-' }}</td>
                                        <td class="px-4 py-3 font-mono">{{ $r->no_bast ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $r->tanggal_bast ? \Carbon\Carbon::parse($r->tanggal_bast)->format('d/m/Y') : '-' }}</td>
                                        <td class="px-4 py-3">
                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                {{ ucwords(str_replace('_', ' ', $r->nama_rekanan)) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 flex flex-wrap justify-center gap-2">
                                            <a href="{{ route('pengadaan.show', $r->id) }}"
                                                class="flex items-center bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded-md text-xs text-white transition-colors duration-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                                Detail
                                            </a>
                                            <button type="button" data-id="{{ $r->id }}"
                                                data-no_pengadaan="{{ $r->no_pengadaan }}"
                                                data-tanggal_pengadaan="{{ \Carbon\Carbon::parse($r->tanggal_pengadaan)->format('Y-m-d') }}"
                                                data-no_kuitansi="{{ $r->no_kuitansi }}"
                                                data-tanggal_spp="{{ $r->tanggal_spp ? \Carbon\Carbon::parse($r->tanggal_spp)->format('Y-m-d') : '' }}"
                                                data-no_bast="{{ $r->no_bast ?? '' }}"
                                                data-tanggal_bast="{{ $r->tanggal_bast ? \Carbon\Carbon::parse($r->tanggal_bast)->format('Y-m-d') : '' }}"
                                                data-id_pengguna="{{ $r->id_pengguna ?? '' }}"
                                                data-nama_rekanan="{{ $r->nama_rekanan }}"
                                                data-uraian="{{ $r->uraian }}"
                                                onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white flex items-center">
                                                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </button>
                                            <button onclick="pengadaanDelete('{{ $r->id }}','{{ $r->no_pengadaan }}')"
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
                        {{ $pengadaan->links() }}
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
                                Tambah Pengadaan
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
            <div class="w-full max-w-md sm:max-w-2xl relative bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-blue-500 to-blue-600">
                    <h3 class="text-lg sm:text-xl font-semibold text-white">
                        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Pengadaan
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-white hover:text-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form method="POST" id="formSourceModal" action="{{ route('pengadaan.store') }}" onsubmit="return validateForm()">
                    @csrf
                    <div class="p-4 sm:p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="no_pengadaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    No Pengadaan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="no_pengadaan" name="no_pengadaan" placeholder="Contoh: P001/2023"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="no_pengadaan_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="tanggal_pengadaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal Pengadaan <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_pengadaan" name="tanggal_pengadaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="tanggal_pengadaan_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="no_kuitansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    No SPP Definitif <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="no_kuitansi" name="no_kuitansi" placeholder="Contoh: SPP001/2023"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="no_kuitansi_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="tanggal_spp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal SPP Definitif <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_spp" name="tanggal_spp"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="tanggal_spp_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="no_bast" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    No BAST
                                </label>
                                <input type="text" id="no_bast" name="no_bast" placeholder="Opsional"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="tanggal_bast" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal BAST
                                </label>
                                <input type="date" id="tanggal_bast" name="tanggal_bast"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="id_pengguna" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Supplier
                                </label>
                                <select id="id_pengguna" name="id_pengguna"
                                    class="js-example-placeholder-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Pilih Supplier</option>
                                    @foreach ($pengguna as $p)
                                        <option value="{{ $p->id }}">{{ ucwords(str_replace('_', ' ', $p->nama_perangkat)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label for="nama_rekanan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 1.857a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Nama Rekanan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_rekanan" name="nama_rekanan" placeholder="Nama rekanan/vendor"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="nama_rekanan_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div class="md:col-span-2">
                                <label for="uraian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Uraian <span class="text-red-500">*</span>
                                </label>
                                <textarea id="uraian" name="uraian" rows="3" placeholder="Deskripsi pengadaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required></textarea>
                                <p id="uraian_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
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
            <div class="w-full max-w-md sm:max-w-2xl relative bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-amber-500 to-amber-600">
                    <h3 class="text-lg sm:text-xl font-semibold text-white">
                        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Pengadaan
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-white hover:text-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form method="POST" id="formSourceModalEdit" onsubmit="return validateEditForm()">
                    @csrf
                    @method('PATCH')
                    <div class="p-4 sm:p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="no_pengadaan_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    No Pengadaan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="no_pengadaan_edit" name="no_pengadaan" placeholder="Contoh: P001/2023"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                    required />
                                <p id="no_pengadaan_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="tanggal_pengadaan_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal Pengadaan <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_pengadaan_edit" name="tanggal_pengadaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                    required />
                                <p id="tanggal_pengadaan_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="no_kuitansi_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    No SPP Definitif <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="no_kuitansi_edit" name="no_kuitansi" placeholder="Contoh: SPP001/2023"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                    required />
                                <p id="no_kuitansi_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="tanggal_spp_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal SPP Definitif <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_spp_edit" name="tanggal_spp"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                    required />
                                <p id="tanggal_spp_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="no_bast_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    No BAST
                                </label>
                                <input type="text" id="no_bast_edit" name="no_bast" placeholder="Opsional"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500" />
                            </div>
                            <div>
                                <label for="tanggal_bast_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal BAST
                                </label>
                                <input type="date" id="tanggal_bast_edit" name="tanggal_bast"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500" />
                            </div>
                            <div>
                                <label for="id_pengguna_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Supplier
                                </label>
                                <select id="id_pengguna_edit" name="id_pengguna"
                                    class="js-example-placeholder-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500">
                                    <option value="">Pilih Supplier</option>
                                    @foreach ($pengguna as $p)
                                        <option value="{{ $p->id }}">{{ ucwords(str_replace('_', ' ', $p->nama_perangkat)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label for="nama_rekanan_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 1.857a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Nama Rekanan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_rekanan_edit" name="nama_rekanan" placeholder="Nama rekanan/vendor"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                    required />
                                <p id="nama_rekanan_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div class="md:col-span-2">
                                <label for="uraian_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Uraian <span class="text-red-500">*</span>
                                </label>
                                <textarea id="uraian_edit" name="uraian" rows="3" placeholder="Deskripsi pengadaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                    required></textarea>
                                <p id="uraian_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
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
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if ($errors->any())
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
            const rows = document.getElementsByClassName('pengadaan-row');
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
            $('#id_pengguna').val('').trigger('change');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function editSourceModal(button) {
            const formModal = document.getElementById('formSourceModalEdit');
            const modal = document.getElementById('sourceModalEdit');
            const id = button.dataset.id;
            const no_pengadaan = button.dataset.no_pengadaan;
            const tanggal_pengadaan = button.dataset.tanggal_pengadaan;
            const no_kuitansi = button.dataset.no_kuitansi;
            const tanggal_spp = button.dataset.tanggal_spp;
            const no_bast = button.dataset.no_bast;
            const tanggal_bast = button.dataset.tanggal_bast;
            const id_pengguna = button.dataset.id_pengguna;
            const nama_rekanan = button.dataset.nama_rekanan;
            const uraian = button.dataset.uraian;

            formModal.action = "{{ route('pengadaan.update', ':id') }}".replace(':id', id);
            document.getElementById('no_pengadaan_edit').value = no_pengadaan;
            document.getElementById('tanggal_pengadaan_edit').value = tanggal_pengadaan;
            document.getElementById('no_kuitansi_edit').value = no_kuitansi;
            document.getElementById('tanggal_spp_edit').value = tanggal_spp;
            document.getElementById('no_bast_edit').value = no_bast;
            document.getElementById('tanggal_bast_edit').value = tanggal_bast;
            $('#id_pengguna_edit').val(id_pengguna).trigger('change');
            document.getElementById('nama_rekanan_edit').value = nama_rekanan;
            document.getElementById('uraian_edit').value = uraian;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function sourceModalClose() {
            document.getElementById('sourceModal').classList.add('hidden');
            document.getElementById('sourceModalEdit').classList.add('hidden');
        }

        async function pengadaanDelete(id, noPengadaan) {
            const result = await Swal.fire({
                title: `Hapus Pengadaan ${noPengadaan}?`,
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
                    await axios.post(`/pengadaan/${id}`, {
                        '_method': 'DELETE',
                        '_token': '{{ csrf_token() }}'
                    });
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Data pengadaan telah dihapus.',
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

        function validateForm() {
            let isValid = true;
            const fields = [
                { id: 'no_pengadaan', errorId: 'no_pengadaan_error', message: 'Nomor pengadaan harus diisi', pattern: /^[A-Za-z0-9]+\/[0-9]{4}$/ },
                { id: 'tanggal_pengadaan', errorId: 'tanggal_pengadaan_error', message: 'Tanggal pengadaan harus diisi' },
                { id: 'no_kuitansi', errorId: 'no_kuitansi_error', message: 'Nomor SPP harus diisi' },
                { id: 'tanggal_spp', errorId: 'tanggal_spp_error', message: 'Tanggal SPP harus diisi' },
                { id: 'nama_rekanan', errorId: 'nama_rekanan_error', message: 'Nama rekanan harus diisi' },
                { id: 'uraian', errorId: 'uraian_error', message: 'Uraian harus diisi' }
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const error = document.getElementById(field.errorId);
                if (!input.value || (field.pattern && !field.pattern.test(input.value))) {
                    error.textContent = field.pattern && !input.value ? field.message : (field.pattern ? 'Format tidak valid. Contoh: P001/2023' : field.message);
                    error.classList.remove('hidden');
                    isValid = false;
                } else {
                    error.classList.add('hidden');
                }
            });

            return isValid;
        }

        function validateEditForm() {
            let isValid = true;
            const fields = [
                { id: 'tanggal_pengadaan_edit', errorId: 'tanggal_pengadaan_error_edit', message: 'Tanggal pengadaan harus diisi' },
                { id: 'no_kuitansi_edit', errorId: 'no_kuitansi_error_edit', message: 'Nomor SPP harus diisi' },
                { id: 'tanggal_spp_edit', errorId: 'tanggal_spp_error_edit', message: 'Tanggal SPP harus diisi' },
                { id: 'nama_rekanan_edit', errorId: 'nama_rekanan_error_edit', message: 'Nama rekanan harus diisi' },
                { id: 'uraian_edit', errorId: 'uraian_error_edit', message: 'Uraian harus diisi' }
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const error = document.getElementById(field.errorId);
                if (!input.value || (field.pattern && !field.pattern.test(input.value))) {
                    error.textContent = field.pattern && !input.value ? field.message : (field.pattern ? 'Format tidak valid. Contoh: P001/2023' : field.message);
                    error.classList.remove('hidden');
                    isValid = false;
                } else {
                    error.classList.add('hidden');
                }
            });

            return isValid;
        }

        $(document).ready(function() {
            $('.js-example-placeholder-single').select2({
                placeholder: "Pilih Supplier",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
</x-app-layout>