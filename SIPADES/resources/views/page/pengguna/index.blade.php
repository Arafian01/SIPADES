<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PERANGKAT DESA DAN PENGGUNA') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Header with Search and Add Button -->
                <div class="p-6 flex flex-col md:flex-row items-center justify-between gap-4 bg-gradient-to-r dark:from-gray-700 dark:to-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="text-lg font-semibold text-gray-800 dark:text-white">
                        DATA PERANGKAT DESA DAN PENGGUNA
                    </div>
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <div class="relative flex-grow md:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="searchInput" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Cari pengguna...">
                        </div>
                        <button onclick="return functionAdd()" class="flex items-center bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-200 shadow hover:shadow-md">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Pengguna
                        </button>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-12">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3 min-w-[180px]">
                                        NAMA
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        JABATAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NAMA JABATAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        JABATAN TIM INVENTARISASI
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        AKSI
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="penggunaTableBody">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pengguna as $p)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                            {{ $p->nama_perangkat }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                                @if($p->jabatan === 'Kepala Desa') bg-amber-100 text-amber-800 
                                                @elseif($p->jabatan === 'Sekretaris Desa') bg-blue-100 text-blue-800 
                                                @elseif($p->jabatan === 'Kaur Keuangan') bg-green-100 text-green-800 
                                                @elseif($p->jabatan === 'Kaur Umum') bg-yellow-100 text-yellow-800 
                                                @elseif($p->jabatan === 'Kaur Perencanaan') bg-indigo-100 text-indigo-800 
                                                @elseif($p->jabatan === 'Kepala Dusun') bg-red-100 text-red-800 
                                                @else bg-gray-100 text-gray-800 @endif">
                                                {{ $p->jabatan }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->nama_jabatan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($p->jabatan_tim_inventarisasi)
                                                <span class="bg-teal-100 text-teal-800 text-xs font-medium px-2. py-0.5 rounded dark:bg-teal-900 dark:text-teal-300">
                                                    {{ $p->jabatan_tim_inventarisasi }}
                                                </span>
                                            @else
                                                <span class="text-gray-500 dark:text-gray-400">-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex items-center justify-center gap-2">
                                            <button type="button" data-id="{{ $p->id }}"
                                                data-modal-target="sourceModalEdit" 
                                                data-nama_perangkat="{{ $p->nama_perangkat }}"
                                                data-jabatan="{{ $p->jabatan }}" 
                                                data-nama_jabatan="{{ $p->nama_jabatan }}" 
                                                data-jabatan_tim_inventarisasi="{{ $p->jabatan_tim_inventarisasi }}" 
                                                onclick="editSourceModal(this)"
                                                class="flex items-center bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white transition-colors duration-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </button>
                                            <button onclick="return penggunaDelete('{{$p->id}}','{{$p->nama_perangkat}}')" 
                                                class="flex items-center bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md text-xs text-white transition-colors duration-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    
                    <!-- Empty State -->
                    <div id="emptyState" class="hidden text-center py-10">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak ada data yang ditemukan</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Coba dengan kata kunci lain atau tambahkan data baru.</p>
                        <div class="mt-6">
                            <button onclick="return functionAdd()" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md relative bg-white rounded-lg shadow-xl dark:bg-gray-800 transition-all transform">
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-blue-600 to-indigo-600">
                    <h3 class="text-xl font-semibold text-white" id="title_source">
                        Tambah Pengguna
                    </h3>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="p-6 space-y-4">
                        <div>
                            <label for="nama_perangkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Perangkat <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama_perangkat" name="nama_perangkat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required placeholder="Masukkan nama lengkap" />
                        </div>
                        <div>
                            <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jabatan <span class="text-red-500">*</span>
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
                                Nama Jabatan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama_jabatan" name="nama_jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required placeholder="Contoh: Kepala Desa Sukamaju" />
                        </div>
                        <div>
                            <label for="jabatan_tim_inventarisasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jabatan Tim Inventarisasi
                            </label>
                            <input type="text" id="jabatan_tim_inventarisasi" name="jabatan_tim_inventarisasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Opsional (jika ada)" />
                        </div>
                    </div>
                    <div class="flex items-center justify-end p-6 space-x-3 border-t border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" onclick="sourceModalClose()"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 transition-colors duration-200">
                            Batal
                        </button>
                        <button type="submit" id="formSourceButton"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-colors duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md relative bg-white rounded-lg shadow-xl dark:bg-gray-800 transition-all transform">
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700 bg-gradient-to-r from-amber-500 to-orange-500">
                    <h3 class="text-xl font-semibold text-white" id="title_source">
                        Update Pengguna
                    </h3>
                </div>
                <form method="POST" id="formSourceModalEdit">
                    @csrf
                    <div class="p-6 space-y-4">
                        <div>
                            <label for="nama_perangkat_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Perangkat <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama_perangkat_edit" name="nama_perangkat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="jabatan_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jabatan <span class="text-red-500">*</span>
                            </label>
                            <select id="jabatan_edit" name="jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
                                Nama Jabatan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama_jabatan_edit" name="nama_jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="jabatan_tim_inventarisasi_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jabatan Tim Inventarisasi
                            </label>
                            <input type="text" id="jabatan_tim_inventarisasi_edit" name="jabatan_tim_inventarisasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                    </div>
                    <div class="flex items-center justify-end p-6 space-x-3 border-t border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" onclick="sourceModalClose()"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 transition-colors duration-200">
                            Batal
                        </button>
                        <button type="submit" id="formSourceButtonEdit"
                            class="text-white bg-amber-600 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-amber-500 dark:hover:bg-amber-600 dark:focus:ring-amber-800 transition-colors duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
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
            const rows = document.querySelectorAll('#penggunaTableBody tr');
            let hasResults = false;
            
            rows.forEach(row => {
                const nama = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const jabatan = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                const namaJabatan = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                
                if (nama.includes(searchValue) || jabatan.includes(searchValue) || namaJabatan.includes(searchValue)) {
                    row.classList.remove('hidden');
                    hasResults = true;
                } else {
                    row.classList.add('hidden');
                }
            });
            
            // Show/hide empty state
            const emptyState = document.getElementById('emptyState');
            if (hasResults || searchValue === '') {
                emptyState.classList.add('hidden');
            } else {
                emptyState.classList.remove('hidden');
            }
        });

        const functionAdd = () => {
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');

            // Reset form
            formModal.reset();
            
            // Set form action URL
            let url = "{{ route('pengguna.store') }}";
            document.getElementById('title_source').innerText = "Tambah Pengguna";
            formModal.setAttribute('action', url);

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
            const nama_perangkat = button.dataset.nama_perangkat;
            const jabatan = button.dataset.jabatan;
            const nama_jabatan = button.dataset.nama_jabatan;
            const jabatan_tim_inventarisasi = button.dataset.jabatan_tim_inventarisasi;

            let url = "{{ route('pengguna.update', ':id') }}".replace(':id', id);

            document.getElementById('title_source').innerText = `Update ${nama_perangkat}`;

            document.getElementById('nama_perangkat_edit').value = nama_perangkat;
            document.getElementById('jabatan_edit').value = jabatan;
            document.getElementById('nama_jabatan_edit').value = nama_jabatan;
            document.getElementById('jabatan_tim_inventarisasi_edit').value = jabatan_tim_inventarisasi || '';

            formModal.setAttribute('action', url);

            let event = new Event('change');
            document.getElementById('jabatan_edit').dispatchEvent(event);

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
        }

        const sourceModalClose = () => {
            document.getElementById('sourceModalEdit').classList.add('hidden');
            document.getElementById('sourceModal').classList.add('hidden');
        }

        const penggunaDelete = async (id, pengguna) => {
            Swal.fire({
                title: `Hapus ${pengguna}?`,
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        await axios.post(`/pengguna/${id}`, {
                            '_method': 'DELETE',
                            '_token': '{{ csrf_token() }}'
                        });
                        
                        Swal.fire(
                            'Terhapus!',
                            'Data pengguna telah dihapus.',
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
            // If you're using tooltip library like tippy.js, initialize here
            // tippy('[data-tippy-content]');
        });
    </script>
</x-app-layout>