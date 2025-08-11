<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('MANAJEMEN RUANGAN') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
                    <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">DAFTAR RUANGAN</div>
                    <div class="flex space-x-2">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="searchInput"
                                class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="Cari ruangan..." autocomplete="off">
                        </div>
                        <button onclick="return functionAdd()"
                            class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Tambah Ruangan
                        </button>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KODE RUANGAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NAMA RUANGAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        PENANGGUNG JAWAB
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        AKSI
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="ruanganTableBody">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($ruangan as $r)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4 font-semibold text-blue-600 dark:text-blue-400">
                                            {{ $r->kode_ruangan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->nama_ruangan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                {{ $r->pengguna->nama_perangkat ?? 'Tidak Tersedia' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 flex justify-center gap-2">
                                            <button type="button" data-id="{{ $r->id }}"
                                                data-modal-target="sourceModalEdit"
                                                data-kode_ruangan="{{ $r->kode_ruangan }}"
                                                data-nama_ruangan="{{ $r->nama_ruangan }}"
                                                data-nama_perangkat="{{ $r->id_pengguna }}"
                                                onclick="editSourceModal(this)"
                                                class="flex items-center gap-1 bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white transition-colors duration-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                                Edit
                                            </button>
                                            <button
                                                onclick="return ruanganDelete('{{ $r->id }}','{{ $r->nama_ruangan }}')"
                                                class="flex items-center gap-1 bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md text-xs text-white transition-colors duration-200">
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
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-md relative bg-white rounded-lg shadow-xl dark:bg-gray-800 transition-all transform">
                <div
                    class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-blue-600 to-indigo-600">
                    <h3 class="text-xl font-semibold text-white" id="title_source">
                        Tambah Ruangan Baru
                    </h3>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="p-6 space-y-4">
                        <div>
                            <label for="kode_ruangan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                Ruangan</label>
                            <input type="text" id="kode_ruangan" name="kode_ruangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Masukkan kode ruangan" required />
                        </div>
                        <div>
                            <label for="nama_ruangan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Ruangan</label>
                            <input type="text" id="nama_ruangan" name="nama_ruangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Masukkan nama ruangan" required />
                        </div>
                        <div>
                            <label for="id_pengguna"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penanggung
                                Jawab</label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                id="id_pengguna" name="id_pengguna" data-placeholder="Pilih Penanggung Jawab">
                                <option value="">Pilih...</option>
                                @foreach ($pengguna as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_perangkat }}</option>
                                @endforeach
                            </select>
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
                class="w-full max-w-md relative bg-white rounded-lg shadow-xl dark:bg-gray-800 transition-all transform">
                <div
                    class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-amber-500 to-orange-500">
                    <h3 class="text-xl font-semibold text-white" id="title_source">
                        Edit Data Ruangan
                    </h3>
                </div>
                <form method="POST" id="formSourceModalEdit">
                    @csrf
                    <div class="p-6 space-y-4">
                        <div>
                            <label for="kode_ruangan_edit"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                Ruangan</label>
                            <input type="text" id="kode_ruangan_edit" name="kode_ruangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required />
                        </div>
                        <div>
                            <label for="nama_ruangan_edit"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Ruangan</label>
                            <input type="text" id="nama_ruangan_edit" name="nama_ruangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required />
                        </div>
                        <div>
                            <label for="id_pengguna_edit"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penanggung
                                Jawab</label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                id="id_pengguna_edit" name="id_pengguna" data-placeholder="Pilih Penanggung Jawab">
                                <option value="">Pilih...</option>
                                @foreach ($pengguna as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_perangkat }}</option>
                                @endforeach
                            </select>
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
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#ruanganTableBody tr');

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

        // Modal functions
        const functionAdd = () => {
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');

            // Set form action URL
            let url = "{{ route('ruangan.store') }}";
            document.getElementById('title_source').innerText = "Tambah Ruangan Baru";
            formModal.setAttribute('action', url);

            // Reset form
            formModal.reset();

            // Display the modal
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Ensure CSRF token is added once
            if (!formModal.querySelector('input[name="_token"]')) {
                let csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                formModal.appendChild(csrfToken);
            }
        }

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModalEdit');
            const modal = document.getElementById('sourceModalEdit');
            const id = button.dataset.id;
            const kode_ruangan = button.dataset.kode_ruangan;
            const nama_ruangan = button.dataset.nama_ruangan;
            const nama_perangkat = button.dataset.nama_perangkat;

            let url = "{{ route('ruangan.update', ':id') }}".replace(':id', id);

            document.getElementById('title_source').innerText = `Edit Ruangan: ${nama_ruangan}`;
            document.getElementById('kode_ruangan_edit').value = kode_ruangan;
            document.getElementById('nama_ruangan_edit').value = nama_ruangan;

            // Set the selected option for penanggung jawab
            const selectElement = document.getElementById('id_pengguna_edit');
            selectElement.value = nama_perangkat;

            // Trigger Select2 update if you're using it
            if (selectElement._select2) {
                $(selectElement).trigger('change');
            }

            formModal.setAttribute('action', url);

            if (!formModal.querySelector('input[name="_token"]')) {
                let csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                formModal.appendChild(csrfToken);
            }

            if (!formModal.querySelector('input[name="_method"]')) {
                let methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'PATCH');
                formModal.appendChild(methodInput);
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        const sourceModalClose = () => {
            document.getElementById('sourceModalEdit').classList.add('hidden');
            document.getElementById('sourceModal').classList.add('hidden');
        }

        const ruanganDelete = async (id, ruangan) => {
            Swal.fire({
                title: `Hapus Ruangan ${ruangan}?`,
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        await axios.post(`/ruangan/${id}`, {
                            '_method': 'DELETE',
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        });

                        Swal.fire(
                            'Terhapus!',
                            'Ruangan telah dihapus.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    } catch (error) {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus ruangan.',
                            'error'
                        );
                        console.error(error);
                    }
                }
            });
        }

        // Initialize Select2 if you're using it
        $(document).ready(function() {
            $('.js-example-placeholder-single').select2({
                placeholder: "Pilih Penanggung Jawab",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
</x-app-layout>
