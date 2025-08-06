<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('GOLONGAN PERALATAN DAN MESIN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex items-center justify-between">
                    <div>DATA GOLONGAN PERALATAN DAN MESIN</div>
                    <div>
                        <a href="{{ route('peralatan_dan_mesin.create') }}" 
                            class="bg-sky-600 p-2 hover:bg-sky-400 text-white rounded-xl">Add</a>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ID ASET 
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NO REG
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KODE REKENING
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NAMA REKENING
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NILAI PEROLEHAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        STATUS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($peralatan_dan_mesin as $t)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $t->aset->id_barang }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->aset->nomor_register }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->aset->rekening->kode }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->aset->rekening->nama_rekening }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->aset->nilai_perolehan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- @if ($t->status == '1')
                                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                            @endif --}}
                                        </td>

                                        {{-- <td class="px-6 py-4">
                                            <button type="button" data-id="{{ $t->id }}"
                                                data-modal-target="sourceModalEdit" data-nama_perangkat="{{ $t->nama_perangkat }}"
                                                data-jabatan="{{ $t->jabatan }}" data-nama_jabatan="{{ $t->nama_jabatan }}" data-jabatan_tim_inventarisasi="{{ $t->jabatan_tim_inventarisasi }}" onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <button onclick="return penggunaDelete('{{$t->id}}','{{$t->nama_perangkat}}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                            
                                        </td> --}}
                                        <td class="px-6 py-4">
                                            <a href="{{ route('peralatan_dan_mesin.edit', $t->id) }}"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">Edit</a>
                                            <button onclick="return peralatanDelete('{{ $t->id }}','{{ $t->aset->rekening->nama_rekening }}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
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
    <div class="fixed inset-0 items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Pengguna
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="mb-5">
                            <label for="nama_perangkat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perangkat</label>
                            <input type="text" id="nama_perangkat" name="nama_perangkat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="jabatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                            <select id="jabatan" name="jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">Pilih Jabatan</option>
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
                        <div class="mb-5">
                            <label for="nama_jabatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Jabatan</label>
                            <input type="text" id="nama_jabatan" name="nama_jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="jabatan_tim_inventarisasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Tim Inventarisasi</label>
                            <input type="text" id="jabatan_tim_inventarisasi" name="jabatan_tim_inventarisasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                 />
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" onclick="sourceModalClose()"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModalEdit">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Pengguna
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-black bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModalEdit">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="mb-5">
                            <label for="nama_perangkat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perangkat</label>
                            <input type="text" id="nama_perangkat_edit" name="nama_perangkat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="jabatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                            <select id="jabatan_edit" name="jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">Pilih Jabatan</option>
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
                        <div class="mb-5">
                            <label for="nama_jabatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Jabatan</label>
                            <input type="text" id="nama_jabatan_edit" name="nama_jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="jabatan_tim_inventarisasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Tim Inventarisasi</label>
                            <input type="text" id="jabatan_tim_inventarisasi_edit" name="jabatan_tim_inventarisasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                 />
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButtonEdit"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" onclick="sourceModalClose()"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // const functionAdd = () => {
        //     const formModal = document.getElementById('formSourceModal');
        //     const modal = document.getElementById('sourceModal');

        //     // Set form action URL
        //     let url = "{{ route('pengguna.store') }}";
        //     document.getElementById('title_source').innerText = "Add pengguna";
        //     formModal.setAttribute('action', url);

        //     // Display the modal
        //     modal.classList.remove('hidden');
        //     modal.classList.add('flex');

        //     // Ensure CSRF token is added once
        //     if (!formModal.querySelector('input[name="_token"]')) {
        //         let csrfToken = document.createElement('input');
        //         csrfToken.setAttribute('type', 'hidden');
        //         csrfToken.setAttribute('name', '_token');
        //         csrfToken.setAttribute('value', '{{ csrf_token() }}');
        //         formModal.appendChild(csrfToken);
        //     }
        // }

        // const editSourceModal = (button) => {
        //     const formModal = document.getElementById('formSourceModalEdit');
        //     const modalTarget = button.dataset.modalTarget;
        //     const id = button.dataset.id;
        //     const nama_perangkat = button.dataset.nama_perangkat;
        //     const jabatan = button.dataset.jabatan;
        //     const nama_jabatan = button.dataset.nama_jabatan;
        //     const jabatan_tim_inventarisasi = button.dataset.jabatan_tim_inventarisasi

        //     let url = "{{ route('pengguna.update', ':id') }}".replace(':id', id);

        //     console.log(url);
        //     document.getElementById('title_source').innerText = `Update pengguna ${nama_perangkat}`;

        //     document.getElementById('nama_perangkat_edit').value = nama_perangkat;
        //     document.getElementById('jabatan_edit').value = jabatan;
        //     document.getElementById('nama_jabatan_edit').value = nama_jabatan;
        //     document.getElementById('jabatan_tim_inventarisasi_edit').value = jabatan_tim_inventarisasi;

        //     formModal.setAttribute('action', url);

        //     let event = new Event('change');
        //     document.getElementById('jabatan_edit').dispatchEvent(event);

        //     if (!formModal.querySelector('input[name="_token"]')) {
        //         let csrfToken = document.createElement('input');
        //         csrfToken.setAttribute('type', 'hidden');
        //         csrfToken.setAttribute('name', '_token');
        //         csrfToken.setAttribute('value', '{{ csrf_token() }}');
        //         formModal.appendChild(csrfToken);
        //     }

        //     if (!formModal.querySelector('input[name="_method"]')) {
        //         let methodInput = document.createElement('input');
        //         methodInput.setAttribute('type', 'hidden');
        //         methodInput.setAttribute('name', '_method');
        //         methodInput.setAttribute('value', 'PATCH');
        //         formModal.appendChild(methodInput);
        //     }

        //     document.getElementById(modalTarget).classList.remove('hidden');
        // }

        // const sourceModalClose = () => {
        //     document.getElementById('sourceModalEdit').classList.add('hidden');
        //     document.getElementById('sourceModal').classList.add('hidden');
        // }

        const peralatanDelete = async (id, peralatan) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus ${peralatan} ?`);
            if (tanya) {
                await axios.post(`/peralatan_dan_mesin/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        // Handle success
                        location.reload();
                    })
                    .catch(function(error) {
                        // Handle error
                        alert('Error deleting record');
                        console.log(error);
                    });
            }
        }
    </script>
</x-app-layout>