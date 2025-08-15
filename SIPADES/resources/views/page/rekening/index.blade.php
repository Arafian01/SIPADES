<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manajemen Kode Rekening Aset Desa') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Daftar Kode Rekening Aset
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                        <!-- Search Input -->
                        <div class="relative w-full sm:w-auto">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="searchInput" placeholder="Cari rekening..."
                                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                onkeyup="searchTable()">
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
                        <table id="rekeningTable" class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-4 py-3 w-12">No</th>
                                    <th scope="col" class="px-4 py-3">Kode</th>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Golongan</th>
                                    <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($rekening as $r)
                                    <tr class="rekening-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $no++ }}</td>
                                        <td class="kode-rekening px-4 py-3 font-mono text-blue-600 dark:text-blue-400">{{ $r->kode }}</td>
                                        <td class="nama-rekening px-4 py-3">{{ $r->nama_rekening }}</td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                {{ ucfirst(str_replace('_', ' ', $r->golongan->nama_golongan)) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 flex flex-wrap justify-center gap-2">
                                            <button type="button" data-id="{{ $r->id }}"
                                                data-modal-target="sourceModalEdit" data-kode="{{ $r->kode }}"
                                                data-nama_rekening="{{ $r->nama_rekening }}"
                                                data-golongan="{{ $r->golongan->id }}" onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white flex items-center">
                                                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </button>
                                            <button onclick="rekeningDelete('{{ $r->id }}','{{ $r->nama_rekening }}')"
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
                        {{ $rekening->links() }}
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
                        Tambah Rekening
                    </h3>
                </div>
                <form method="POST" id="formSourceModal" action="{{ route('rekening.store') }}">
                    @csrf
                    <div class="p-4 sm:p-6 space-y-4">
                        <div>
                            <label for="kode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                Kode Rekening
                            </label>
                            <div class="flex flex-wrap gap-2">
                                <input type="text" name="kode[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    maxlength="2" required />
                                <span class="mt-2.5 text-gray-500">.</span>
                                <input type="text" name="kode[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    maxlength="2" required />
                                <span class="mt-2.5 text-gray-500">.</span>
                                <input type="text" name="kode[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    maxlength="2" required />
                                <span class="mt-2.5 text-gray-500">.</span>
                                <input type="text" name="kode[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    maxlength="2" required />
                            </div>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Contoh: 1.1.01.01</p>
                        </div>
                        <div>
                            <label for="nama_rekening" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nama Rekening
                            </label>
                            <input type="text" id="nama_rekening" name="nama_rekening" placeholder="Masukkan nama rekening"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="golongan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Golongan
                            </label>
                            <select id="golongan_id" name="golongan_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">-- Pilih Golongan --</option>
                                @foreach ($golongan as $g)
                                    <option value="{{ $g->id }}">{{ ucfirst(str_replace('_', ' ', $g->nama_golongan)) }}</option>
                                @endforeach
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
                        Edit Rekening
                    </h3>
                </div>
                <form method="POST" id="formSourceModalEdit">
                    @csrf
                    @method('PATCH')
                    <div class="p-4 sm:p-6 space-y-4">
                        <div>
                            <label for="kode_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                Kode Rekening
                            </label>
                            <div class="flex flex-wrap gap-2">
                                <input type="text" name="kode[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                    maxlength="2" required />
                                <span class="mt-2.5 text-gray-500">.</span>
                                <input type="text" name="kode[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                    maxlength="2" required />
                                <span class="mt-2.5 text-gray-500">.</span>
                                <input type="text" name="kode[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                    maxlength="2" required />
                                <span class="mt-2.5 text-gray-500">.</span>
                                <input type="text" name="kode[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                    maxlength="2" required />
                            </div>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Contoh: 1.1.01.01</p>
                        </div>
                        <div>
                            <label for="nama_rekening_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nama Rekening
                            </label>
                            <input type="text" id="nama_rekening_edit" name="nama_rekening" placeholder="Masukkan nama rekening"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required />
                        </div>
                        <div>
                            <label for="golongan_id_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2 inline text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Golongan
                            </label>
                            <select id="golongan_id_edit" name="golongan_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                                required>
                                <option value="">-- Pilih Golongan --</option>
                                @foreach ($golongan as $g)
                                    <option value="{{ $g->id }}">{{ ucfirst(str_replace('_', ' ', $g->nama_golongan)) }}</option>
                                @endforeach
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
            const input = document.getElementById('searchInput').value.toUpperCase();
            const rows = document.getElementsByClassName('rekening-row');
            for (let row of rows) {
                const kode = row.getElementsByClassName('kode-rekening')[0].textContent.toUpperCase();
                const nama = row.getElementsByClassName('nama-rekening')[0].textContent.toUpperCase();
                row.style.display = (kode.includes(input) || nama.includes(input)) ? '' : 'none';
            }
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
            const kode = button.dataset.kode.split('.');
            const nama_rekening = button.dataset.nama_rekening;
            const golongan = button.dataset.golongan;

            formModal.action = "{{ route('rekening.update', ':id') }}".replace(':id', id);
            const kodeInputs = formModal.querySelectorAll('input[name="kode[]"]');
            kodeInputs.forEach((input, index) => input.value = kode[index] || '');
            document.getElementById('nama_rekening_edit').value = nama_rekening;
            document.getElementById('golongan_id_edit').value = golongan;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function sourceModalClose() {
            document.getElementById('sourceModal').classList.add('hidden');
            document.getElementById('sourceModalEdit').classList.add('hidden');
        }

        async function rekeningDelete(id, rekening) {
            const result = await Swal.fire({
                title: `Hapus Rekening ${rekening}?`,
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
                    await axios.post(`/rekening/${id}`, {
                        '_method': 'DELETE',
                        '_token': '{{ csrf_token() }}'
                    });
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Data rekening telah dihapus.',
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