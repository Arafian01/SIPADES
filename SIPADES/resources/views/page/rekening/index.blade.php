<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('MANAJEMEN KODE REKENING ASET DESA') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                     <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        DAFTAR KODE REKENING ASET
                    </div>
                    <div class="flex space-x-2">
                        <!-- Search Input -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="searchInput" placeholder="Cari rekening..."
                                class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                onkeyup="searchTable()">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                        <!-- Add Button -->
                        <button onclick="return functionAdd()"
                            class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width=""
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <i class="fas fa-plus mr-2"></i> Tambah Rekening
                        </button>
                    </div>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto rounded-lg">
                        <table id="rekeningTable" class="w-full text-sm text-left rtl:text-right">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-12">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Kode Rekening
                                            <button><i class="fas fa-sort ml-1 text-gray-400"></i></button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Nama Rekening
                                            <button><i class="fas fa-sort ml-1 text-gray-400"></i></button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Golongan
                                            <button><i class="fas fa-sort ml-1 text-gray-400"></i></button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-40 text-center">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($rekening as $r)
                                    <tr
                                        class="rekening-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                            {{ $no++ }}
                                        </td>
                                        <td class="kode-rekening px-6 py-4 font-mono text-blue-600 dark:text-blue-400">
                                            {{ $r->kode }}
                                        </td>
                                        <td class="nama-rekening px-6 py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="p-2 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-200 mr-3">
                                                    <i class="fas fa-wallet text-sm"></i>
                                                </div>
                                                {{ $r->nama_rekening }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                {{ $r->golongan->nama_golongan }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 flex justify-center space-x-2">
                                            <button type="button" data-id="{{ $r->id }}"
                                                data-modal-target="sourceModalEdit" data-kode="{{ $r->kode }}"
                                                data-nama_rekening="{{ $r->nama_rekening }}" data-golongan="{{ $r->golongan->id }}"
                                                onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white flex items-center">
                                                <i class="fas fa-edit mr-1"></i>
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
                                                onclick="return rekeningDelete('{{ $r->id }}','{{ $r->nama_rekening }}')"
                                                class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md text-xs text-white flex items-center">
                                                <i class="fas fa-trash-alt mr-1"></i>
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
                    <div class="mt-4">
                        {{ $rekening->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md relative bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div
                    class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-blue-500 to-blue-600">
                    <h3 class="text-xl font-semibold text-white" id="title_source">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah Rekening Baru
                    </h3>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="p-6 space-y-4">
                        <div>
                            <label for="kode"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <i class="fas fa-hashtag mr-2 text-blue-500"></i>Kode Rekening
                            </label>
                            <input type="text" id="kode" name="kode" placeholder="Masukkan kode rekening"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Contoh: 1.1.01.01</p>
                        </div>
                        <div>
                            <label for="nama_rekening"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <i class="fas fa-signature mr-2 text-blue-500"></i>Nama Rekening
                            </label>
                            <input type="text" id="nama_rekening" name="nama_rekening"
                                placeholder="Masukkan nama rekening"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="golongan_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <i class="fas fa-list mr-2 text-blue-500"></i>Pilih Golongan
                            </label>
                            <select id="golongan_id" name="golongan_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">-- Pilih Golongan --</option>
                                @foreach ($golongan as $g)
                                    <option value="{{ $g->id }}">{{ $g->nama_golongan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-end p-6 space-x-3 border-t border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" onclick="sourceModalClose()"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Batal
                        </button>
                        <button type="submit" id="formSourceButton"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center">
                            <i class="fas fa-save mr-2"></i>
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
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md relative bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div
                    class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-amber-500 to-amber-600">
                    <h3 class="text-xl font-semibold text-white" id="title_source">
                        <i class="fas fa-edit mr-2"></i> Edit Rekening
                    </h3>
                </div>
                <form method="POST" id="formSourceModalEdit">
                    @csrf
                    <div class="p-6 space-y-4">
                        <div>
                            <label for="kode_edit"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <i class="fas fa-hashtag mr-2 text-amber-500"></i>Kode Rekening
                            </label>
                            <input type="text" id="kode_edit" name="kode" placeholder="Masukkan kode rekening"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required />
                        </div>
                        <div>
                            <label for="nama_rekening_edit"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <i class="fas fa-signature mr-2 text-amber-500"></i>Nama Rekening
                            </label>
                            <input type="text" id="nama_rekening_edit" name="nama_rekening"
                                placeholder="Masukkan nama rekening"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required />
                        </div>
                        <div>
                            <label for="golongan_id_edit"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <i class="fas fa-list mr-2 text-amber-500"></i>Pilih Golongan
                            </label>
                            <select id="golongan_id_edit" name="golongan_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required>
                                <option value="">-- Pilih Golongan --</option>
                                @foreach ($golongan as $g)
                                    <option value="{{ $g->id }}">{{ $g->nama_golongan }}</option>
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
        @if (session('success_message'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success_message') }}",
                icon: 'success'
            });
        @endif

        @if (session('validation_error'))
            @foreach ($errors->all() as $error)
                Swal.fire({
                    title: 'Validasi Gagal!',
                    text: "{{ $error }}",
                    icon: 'error'
                });
                @break
            @endforeach
        @endif

        // Search Functionality
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toUpperCase();
            const table = document.getElementById('rekeningTable');
            const rows = table.getElementsByClassName('rekening-row');

            for (let i = 0; i < rows.length; i++) {
                const kodeCell = rows[i].getElementsByClassName('kode-rekening')[0];
                const namaCell = rows[i].getElementsByClassName('nama-rekening')[0];

                if (kodeCell && namaCell) {
                    const kodeText = kodeCell.textContent || kodeCell.innerText;
                    const namaText = namaCell.textContent || namaCell.innerText;

                    if (kodeText.toUpperCase().indexOf(filter) > -1 || namaText.toUpperCase().indexOf(filter) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }

        const functionAdd = () => {
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');

            // Set form action URL
            let url = "{{ route('rekening.store') }}";
            document.getElementById('title_source').innerHTML =
                '<i class="fas fa-plus-circle mr-2"></i> Tambah Rekening Baru';
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
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const kode = button.dataset.kode;
            const nama_rekening = button.dataset.nama_rekening;
            const golongan = button.dataset.golongan;

            let url = "{{ route('rekening.update', ':id') }}".replace(':id', id);

            document.getElementById('title_source').innerHTML =
                `<i class="fas fa-edit mr-2"></i> Edit Rekening ${nama_rekening}`;

            document.getElementById('kode_edit').value = kode;
            document.getElementById('golongan_id_edit').value = golongan;
            document.getElementById('nama_rekening_edit').value = nama_rekening;

            formModal.setAttribute('action', url);

            let event = new Event('change');
            document.getElementById('golongan_id_edit').dispatchEvent(event);

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

            document.getElementById(modalTarget).classList.remove('hidden');
            document.getElementById(modalTarget).classList.add('flex');
        }

        const sourceModalClose = () => {
            document.getElementById('sourceModalEdit').classList.add('hidden');
            document.getElementById('sourceModal').classList.add('hidden');
            document.getElementById('sourceModalEdit').classList.remove('flex');
            document.getElementById('sourceModal').classList.remove('flex');
        }

        const rekeningDelete = async (id, rekening) => {
            Swal.fire({
                title: `Hapus Rekening ${rekening}?`,
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        await axios.post(`/rekening/${id}`, {
                            '_method': 'DELETE',
                            '_token': '{{ csrf_token() }}'
                        });

                        Swal.fire(
                            'Terhapus!',
                            'Data rekening telah dihapus.',
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

        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

    <!-- Include SweetAlert2 -->
</x-app-layout>
