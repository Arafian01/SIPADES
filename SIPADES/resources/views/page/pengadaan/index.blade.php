<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MANAJEMEN PENGADAAN') }}
        </h2>
    </x-slot>

    <!-- Success/Error Messages -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
        @if (session('success'))
            <div id="successMessage"
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3"
                    onclick="document.getElementById('successMessage').remove()">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif

        @if ($errors->any())
            <div id="errorMessage" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold">Error!</strong>
                <ul class="mt-1 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3"
                    onclick="document.getElementById('errorMessage').remove()">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif
    </div>

    <div class="py-2">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Header with Search and Add Button -->
                <div
                    class="p-6 flex flex-col md:flex-row items-center justify-between gap-4 bg-gradient- dark:from-gray-700 dark:to-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="text-lg font-bold text-gray-800 dark:text-white">
                        DATA PENGADAAN
                    </div>
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <div class="relative flex-grow md:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="searchInput"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari pengadaan...">
                        </div>
                        <button onclick="return functionAdd()"
                            class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-300">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Pengadaan
                        </button>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-12">NO</th>
                                    <th scope="col" class="px-6 py-3 min-w-[120px]">NO PENGADAAN</th>
                                    <th scope="col" class="px-6 py-3">TGL</th>
                                    <th scope="col" class="px-6 py-3">NO SPP</th>
                                    <th scope="col" class="px-6 py-3">TGL</th>
                                    <th scope="col" class="px-6 py-3">NO BAST</th>
                                    <th scope="col" class="px-6 py-3">TGL</th>
                                    <th scope="col" class="px-6 py-3 min-w-[180px]">REKANAN</th>
                                    <th scope="col" class="text-center py-3">AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="pengadaanTableBody">
                                @php $no = 1; @endphp
                                @foreach ($pengadaan as $r)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4 font-mono">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                {{ $r->no_pengadaan }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($r->tanggal_pengadaan)->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 font-mono">
                                            {{ $r->no_kuitansi }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->tanggal_spp ? \Carbon\Carbon::parse($r->tanggal_spp)->format('d/m/Y') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 font-mono">
                                            {{ $r->no_bast ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->tanggal_bast ? \Carbon\Carbon::parse($r->tanggal_bast)->format('d/m/Y') : '-' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                {{ ucwords(str_replace('_', ' ', $r->nama_rekanan)) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 flex items-center justify-center gap-2">
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

                                            <button
                                                onclick="return pengadaanDelete('{{ $r->id }}','{{ $r->no_pengadaan }}')"
                                                class="flex items-center bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md text-xs text-white transition-colors duration-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                                Hapus
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Empty State -->
                    <div id="emptyState" class="hidden text-center py-10">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak ada data yang
                            ditemukan</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Coba dengan kata kunci lain atau
                            tambahkan data baru.</p>
                        <div class="mt-6">
                            <button onclick="return functionAdd()"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
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
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-4xl relative bg-white rounded-lg shadow-xl dark:bg-gray-800 transition-all transform">
                <div
                    class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-blue-600 to-indigo-600">
                    <h3 class="text-xl font-semibold text-white" id="title_source">
                        Tambah Pengadaan
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-white hover:text-gray-200 transition-colors duration-200">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal" onsubmit="return validateForm()">
                    @csrf
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label for="no_pengadaan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    No Pengadaan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="no_pengadaan" name="no_pengadaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Contoh: P001/2023" />
                                <p id="no_pengadaan_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="tanggal_pengadaan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal Pengadaan <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_pengadaan" name="tanggal_pengadaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="tanggal_pengadaan_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="no_kuitansi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    No SPP Definitif <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="no_kuitansi" name="no_kuitansi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Contoh: SPP001/2023" />
                                <p id="no_kuitansi_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="tanggal_spp"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal SPP Definitif <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_spp" name="tanggal_spp"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="tanggal_spp_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="no_bast"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    No BAST
                                </label>
                                <input type="text" id="no_bast" name="no_bast"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Opsional" />
                            </div>
                            <div>
                                <label for="tanggal_bast"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal BAST
                                </label>
                                <input type="date" id="tanggal_bast" name="tanggal_bast"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Opsional" />
                            </div>
                            <div class="mb-5">
                                <label for="id_pengguna"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Rekanan</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    id="id_pengguna" name="id_pengguna" data-placeholder="Pilih Supplier">
                                    <option value="">Pilih...</option>
                                    @foreach ($pengguna as $p)
                                        <option value="{{ $p->id }}">{{ ucwords(str_replace('_', ' ', $p->nama_perangkat)) }}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label for="nama_rekanan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nama Rekanan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_rekanan" name="nama_rekanan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Nama rekanan/vendor" />
                                <p id="nama_rekanan_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div class="md:col-span-2">
                                <label for="uraian"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Uraian <span class="text-red-500">*</span>
                                </label>
                                <textarea id="uraian" name="uraian" rows="3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Deskripsi pengadaan"></textarea>
                                <p id="uraian_error" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-end p-6 space-x-3 border-t border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" onclick="sourceModalClose()"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 transition-colors duration-200">
                            Batal
                        </button>
                        <button type="submit" id="formSourceButton"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-colors duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                </path>
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
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-4xl relative bg-white rounded-lg shadow-xl dark:bg-gray-800 transition-all transform">
                <div
                    class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-amber-500 to-orange-500">
                    <h3 class="text-xl font-semibold text-white" id="title_source_edit">
                        Update Pengadaan
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-white hover:text-gray-200 transition-colors duration-200">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModalEdit" onsubmit="return validateEditForm()">
                    @csrf
                    @method('PATCH')
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="no_pengadaan_edit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    No Pengadaan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="no_pengadaan_edit" name="no_pengadaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="no_pengadaan_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="tanggal_pengadaan_edit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal Pengadaan <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_pengadaan_edit" name="tanggal_pengadaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="tanggal_pengadaan_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="no_kuitansi_edit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    No SPP Definitif <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="no_kuitansi_edit" name="no_kuitansi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="no_kuitansi_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="tanggal_spp_edit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal SPP Definitif <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_spp_edit" name="tanggal_spp"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="tanggal_spp_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                                <label for="no_bast_edit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    No BAST
                                </label>
                                <input type="text" id="no_bast_edit" name="no_bast"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="tanggal_bast_edit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal BAST
                                </label>
                                <input type="date" id="tanggal_bast_edit" name="tanggal_bast"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div class="mb-5">
                                <label for="id_pengguna"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Rekanan</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    id="id_pengguna_edit" name="id_pengguna" data-placeholder="Pilih Supplier">
                                    <option value="">Pilih...</option>
                                    @foreach ($pengguna as $p)
                                        <option value="{{ $p->id }}">{{ ucwords(str_replace('_', ' ', $p->nama_perangkat)) }}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label for="nama_rekanan_edit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nama Rekanan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_rekanan_edit" name="nama_rekanan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                <p id="nama_rekanan_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div class="md:col-span-2">
                                <label for="uraian_edit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Uraian <span class="text-red-500">*</span>
                                </label>
                                <textarea id="uraian_edit" name="uraian" rows="3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required></textarea>
                                <p id="uraian_error_edit" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-end p-6 space-x-3 border-t border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" onclick="sourceModalClose()"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 transition-colors duration-200">
                            Batal
                        </button>
                        <button type="submit" id="formSourceButtonEdit"
                            class="text-white bg-amber-600 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-amber-500 dark:hover:bg-amber-600 dark:focus:ring-amber-800 transition-colors duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Search functionality with debounce
        let searchTimeout;
        document.getElementById('searchInput').addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const searchValue = this.value.trim().toLowerCase();
                const rows = document.querySelectorAll('#pengadaanTableBody tr');
                let hasResults = false;

                // Show loading indicator
                const tableBody = document.getElementById('pengadaanTableBody');
                tableBody.classList.add('opacity-50');

                rows.forEach(row => {
                    const noPengadaan = row.querySelector('td:nth-child(2)').textContent
                        .toLowerCase();
                    const rekanan = row.querySelector('td:nth-child(8)').textContent.toLowerCase();
                    const noSPP = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                    const noBAST = row.querySelector('td:nth-child(6)').textContent.toLowerCase();

                    if (noPengadaan.includes(searchValue) || rekanan.includes(searchValue) ||
                        noSPP.includes(searchValue) || noBAST.includes(searchValue)) {
                        row.classList.remove('hidden');
                        hasResults = true;
                    } else {
                        row.classList.add('hidden');
                    }
                });
                // Hide/show empty state
                const emptyState = document.getElementById('emptyState');
                if (!hasResults && searchValue !== '') {
                    emptyState.classList.remove('hidden');
                    tableBody.classList.add('hidden');
                } else {
                    emptyState.classList.add('hidden');
                    tableBody.classList.remove('hidden');
                }

                // Remove loading indicator
                tableBody.classList.remove('opacity-50');
            }, 300);
        });

        // Modal functions
        function functionAdd() {
            const modal = document.getElementById('sourceModal');
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            return false;
        }

        function sourceModalClose() {
            const modals = document.querySelectorAll('[id^="sourceModal"]');
            modals.forEach(modal => {
                modal.classList.add('hidden');
            });
            document.body.classList.remove('overflow-hidden');
            return false;
        }

        // Edit modal function
        function editSourceModal(element) {
            const modal = document.getElementById('sourceModalEdit');
            const id = element.getAttribute('data-id');

            // Set form action URL
            const form = document.getElementById('formSourceModalEdit');
            form.action = `/pengadaan/${id}`;

            // Fill form with data
            document.getElementById('no_pengadaan_edit').value = element.getAttribute('data-no_pengadaan');
            document.getElementById('tanggal_pengadaan_edit').value = element.getAttribute('data-tanggal_pengadaan');
            document.getElementById('no_kuitansi_edit').value = element.getAttribute('data-no_kuitansi');
            document.getElementById('tanggal_spp_edit').value = element.getAttribute('data-tanggal_spp');
            document.getElementById('no_bast_edit').value = element.getAttribute('data-no_bast');
            document.getElementById('tanggal_bast_edit').value = element.getAttribute('data-tanggal_bast');
            document.getElementById('nama_rekanan_edit').value = element.getAttribute('data-nama_rekanan');
            document.getElementById('uraian_edit').value = element.getAttribute('data-uraian');

            // Show modal
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');

            return false;
        }

        // Form validation for add
        function validateForm() {
            let isValid = true;

            // Validate dates
            const tanggalPengadaan = document.getElementById('tanggal_pengadaan');
            const tanggalPengadaanError = document.getElementById('tanggal_pengadaan_error');
            if (!tanggalPengadaan.value) {
                tanggalPengadaanError.textContent = 'Tanggal pengadaan harus diisi';
                tanggalPengadaanError.classList.remove('hidden');
                isValid = false;
            } else {
                tanggalPengadaanError.classList.add('hidden');
            }

            // Validate no_kuitansi format
            const noKuitansi = document.getElementById('no_kuitansi');
            const noKuitansiError = document.getElementById('no_kuitansi_error');
            if (!noKuitansi.value) {
                noKuitansiError.textContent = 'Nomor SPP harus diisi';
                noKuitansiError.classList.remove('hidden');
                isValid = false;
            } else {
                noKuitansiError.classList.add('hidden');
            }

            // Validate tanggal_spp
            const tanggalSPP = document.getElementById('tanggal_spp');
            const tanggalSPPError = document.getElementById('tanggal_spp_error');
            if (!tanggalSPP.value) {
                tanggalSPPError.textContent = 'Tanggal SPP harus diisi';
                tanggalSPPError.classList.remove('hidden');
                isValid = false;
            } else {
                tanggalSPPError.classList.add('hidden');
            }

            // Validate nama_rekanan
            const namaRekanan = document.getElementById('nama_rekanan');
            const namaRekananError = document.getElementById('nama_rekanan_error');
            if (!namaRekanan.value) {
                namaRekananError.textContent = 'Nama rekanan harus diisi';
                namaRekananError.classList.remove('hidden');
                isValid = false;
            } else {
                namaRekananError.classList.add('hidden');
            }

            // Validate uraian
            const uraian = document.getElementById('uraian');
            const uraianError = document.getElementById('uraian_error');
            if (!uraian.value) {
                uraianError.textContent = 'Uraian harus diisi';
                uraianError.classList.remove('hidden');
                isValid = false;
            } else {
                uraianError.classList.add('hidden');
            }

            return isValid;
        }

        // Form validation for edit
        function validateEditForm() {
            let isValid = true;

            // Similar validation as add form
            const noPengadaan = document.getElementById('no_pengadaan_edit');
            const noPengadaanError = document.getElementById('no_pengadaan_error_edit');
            if (!/^[A-Za-z0-9]+\/[0-9]{4}$/.test(noPengadaan.value)) {
                noPengadaanError.textContent = 'Format nomor pengadaan tidak valid. Contoh: P001/2023';
                noPengadaanError.classList.remove('hidden');
                isValid = false;
            } else {
                noPengadaanError.classList.add('hidden');
            }

            const tanggalPengadaan = document.getElementById('tanggal_pengadaan_edit');
            const tanggalPengadaanError = document.getElementById('tanggal_pengadaan_error_edit');
            if (!tanggalPengadaan.value) {
                tanggalPengadaanError.textContent = 'Tanggal pengadaan harus diisi';
                tanggalPengadaanError.classList.remove('hidden');
                isValid = false;
            } else {
                tanggalPengadaanError.classList.add('hidden');
            }

            const noKuitansi = document.getElementById('no_kuitansi_edit');
            const noKuitansiError = document.getElementById('no_kuitansi_error_edit');
            if (!noKuitansi.value) {
                noKuitansiError.textContent = 'Nomor SPP harus diisi';
                noKuitansiError.classList.remove('hidden');
                isValid = false;
            } else {
                noKuitansiError.classList.add('hidden');
            }

            const tanggalSPP = document.getElementById('tanggal_spp_edit');
            const tanggalSPPError = document.getElementById('tanggal_spp_error_edit');
            if (!tanggalSPP.value) {
                tanggalSPPError.textContent = 'Tanggal SPP harus diisi';
                tanggalSPPError.classList.remove('hidden');
                isValid = false;
            } else {
                tanggalSPPError.classList.add('hidden');
            }

            const namaRekanan = document.getElementById('nama_rekanan_edit');
            const namaRekananError = document.getElementById('nama_rekanan_error_edit');
            if (!namaRekanan.value) {
                namaRekananError.textContent = 'Nama rekanan harus diisi';
                namaRekananError.classList.remove('hidden');
                isValid = false;
            } else {
                namaRekananError.classList.add('hidden');
            }

            const uraian = document.getElementById('uraian_edit');
            const uraianError = document.getElementById('uraian_error_edit');
            if (!uraian.value) {
                uraianError.textContent = 'Uraian harus diisi';
                uraianError.classList.remove('hidden');
                isValid = false;
            } else {
                uraianError.classList.add('hidden');
            }

            return isValid;
        }

        // Delete confirmation function
        function pengadaanDelete(id, noPengadaan) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                html: `Anda akan menghapus pengadaan <b>${noPengadaan}</b>. Data yang dihapus tidak dapat dikembalikan!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create form and submit
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/pengadaan/${id}`;

                    const csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = document.querySelector('meta[name="csrf-token"]').content;

                    const method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';

                    form.appendChild(csrf);
                    form.appendChild(method);
                    document.body.appendChild(form);
                    form.submit();
                }
            });

            return false;
        }

        // Auto focus search input when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.focus();
            }

            // Hide success/error messages after 5 seconds
            setTimeout(() => {
                const successMessage = document.getElementById('successMessage');
                if (successMessage) successMessage.remove();

                const errorMessage = document.getElementById('errorMessage');
                if (errorMessage) errorMessage.remove();
            }, 5000);
        });
    </script>
</x-app-layout>
