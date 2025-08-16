<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Golongan Peralatan dan Mesin') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                            Daftar Peralatan dan Mesin
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                            <!-- Search Input -->
                            <div class="relative w-full sm:w-64">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="text" id="searchInput" placeholder="Cari peralatan/mesin..."
                                    class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    oninput="searchTable()" autocomplete="off">
                            </div>
                            <!-- Add Button -->
                            <a href="{{ route('peralatan_dan_mesin.create', '0') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center justify-center w-full sm:w-auto">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Peralatan
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="peralatanTable" class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300 sticky top-0">
                                <tr>
                                    <th scope="col" class="px-4 py-3 w-12">No</th>
                                    <th scope="col" class="px-4 py-3">ID Aset</th>
                                    <th scope="col" class="px-4 py-3">No Reg</th>
                                    <th scope="col" class="px-4 py-3">Kode Rekening</th>
                                    <th scope="col" class="px-4 py-3 min-w-[150px]">Nama Rekening</th>
                                    <th scope="col" class="px-4 py-3">Nilai (Rp)</th>
                                    <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="peralatanTableBody">
                                @php $no = 1; @endphp
                                @foreach ($peralatan_dan_mesin as $t)
                                    <tr class="peralatan-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $no++ }}</td>
                                        <td class="px-4 py-3 font-mono text-blue-600 dark:text-blue-400">{{ $t->aset->id_barang }}</td>
                                        <td class="px-4 py-3">{{ $t->aset->nomor_register }}</td>
                                        <td class="px-4 py-3 font-mono">{{ $t->aset->rekening->kode }}</td>
                                        <td class="px-4 py-3">{{ $t->aset->rekening->nama_rekening }}</td>
                                        <td class="px-4 py-3">Rp {{ number_format($t->aset->nilai_perolehan, 2, ',', '.') }}</td>
                                        <td class="px-4 py-3 flex flex-wrap justify-center gap-2">
                                            <a href="{{ route('peralatan_dan_mesin.edit', [$t->id, '0']) }}"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white flex items-center">
                                                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <button onclick="peralatanDelete('{{ $t->id }}','{{ addslashes($t->aset->rekening->nama_rekening) }}')"
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
                        {{ $peralatan_dan_mesin->links() }}
                    </div>
                    <!-- Empty State -->
                    <div id="emptyState" class="hidden text-center py-10">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak ada data ditemukan</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Coba kata kunci lain atau tambahkan data baru.</p>
                        <div class="mt-6">
                            <a href="{{ route('peralatan_dan_mesin.create', '0') }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Peralatan
                            </a>
                        </div>
                    </div>
                </div>
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

        @if ($errors->any())
            Swal.fire({
                title: 'Gagal!',
                text: "{{ $errors->first() }}",
                icon: 'error',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        function searchTable() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.getElementsByClassName('peralatan-row');
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

        async function peralatanDelete(id, nama) {
            const result = await Swal.fire({
                title: `Hapus Peralatan ${nama}?`,
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            });

            if (result.isConfirmed) {
                try {
                    await axios.post(`/peralatan_dan_mesin/${id}`, {
                        '_method': 'DELETE',
                        '_token': '{{ csrf_token() }}'
                    });
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Data peralatan telah dihapus.',
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

        document.addEventListener('DOMContentLoaded', function () {
            const tbody = document.getElementById('peralatanTableBody');
            const emptyState = document.getElementById('emptyState');
            if (tbody.children.length === 0) {
                emptyState.classList.remove('hidden');
            }
        });
    </script>
</x-app-layout>