<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('MANAJEMEN GOLONGAN TANAH') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
                    <div class="text-lg font-semibold text-gray-900 dark:text-gray-100"> DAFTAR GOLONGAN TANAH</div>
                    <div class="flex space-x-2">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="searchInput"
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cari tanah..." autocomplete="off">
                        </div>
                        <div>
                            <a href="{{ route('tanah.create', '0') }}"
                                class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Tambah Tanah
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="overflow-auto max-h-[calc(100vh-220px)]">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            ID ASET
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            NO REG
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            KODE REKENING
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            NAMA REKENING
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            TGL PEROLEHAN
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            LUAS
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            NILAI (Rp)
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            ALAMAT
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap text-center">
                                            AKSI
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tanahTableBody">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($tanah as $t)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $no++ }}
                                            </th>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap font-semibold text-blue-600 dark:text-blue-400">
                                                {{ $t->aset->id_barang }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $t->aset->nomor_register }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $t->aset->rekening->kode }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $t->aset->rekening->nama_rekening }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($t->tanggal_perolehan)->format('d/m/Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ number_format($t->luas, 2) }} m²
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                Rp {{ number_format($t->aset->nilai_perolehan, 2) }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ Str::limit($t->alamat, 20) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap flex justify-center gap-2">
                                                <a href="{{ route('tanah.edit', [$t->id, '0']) }}"
                                                    class="flex items-center gap-1 bg-blue-600 hover:bg-blue-800 px-2 py-1 rounded-md text-l text-white transition-colors duration-200">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tanahTableBody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let found = false;

                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(searchValue)) {
                        found = true;
                    }
                });

                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        const tanahDelete = async (id, tanah) => {
            Swal.fire({
                title: `Hapus Data Tanah?`,
                html: `Anda akan menghapus tanah dengan rekening: <strong>${tanah}</strong>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        await axios.post(`/tanah/${id}`, {
                            '_method': 'DELETE',
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        });

                        Swal.fire(
                            'Terhapus!',
                            'Data tanah telah dihapus.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    } catch (error) {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        );
                        console.error(error);
                    }
                }
            });
        }

        // Format numeric values on page load
        document.addEventListener('DOMContentLoaded', function() {
            // You can add any initialization code here if needed
        });
    </script>
</x-app-layout>
