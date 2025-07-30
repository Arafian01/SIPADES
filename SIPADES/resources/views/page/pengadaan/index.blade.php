<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PENGADAAN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex items-center justify-between">
                    <div>DATA PENGADAAN</div>
                    <div>
                        <a href="#" onclick="return functionAdd()"
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
                                        NO PENGADAAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TGL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NO SPP DEFINITIF
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TGL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NO BAST
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TGL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NAMA REKANAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        URAIAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pengadaan as $r)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $r->no_pengadaan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->tanggal_pengadaan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->no_spp_definitif }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->tanggal_spp_definitif }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->no_bast }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->tanggal_bast }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->nama_rekanan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->uraian }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" data-id="{{ $r->id }}"
                                                data-modal-target="sourceModalEdit" data-no_pengadaan="{{ $r->no_pengadaan }}"
                                                data-tanggal_pengadaan="{{ $r->tanggal_pengadaan }}" data-no_spp_definitif="{{ $r->no_spp_definitif }}"
                                                data-tanggal_spp_definitif="{{ $r->tanggal_spp_definitif }}" data-no_bast="{{ $r->no_bast }}"
                                                data-tanggal_bast="{{ $r->tanggal_bast }}" data-nama_rekanan="{{ $r->nama_rekanan }}"
                                                data-uraian="{{ $r->uraian }}" onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <button onclick="return pengadaanDelete('{{$r->id}}','{{$r->no_pengadaan}}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
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
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Pengadaan
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
                            <label for="no_pengadaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Pengadaan</label>
                            <input type="text" id="no_pengadaan" name="no_pengadaan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_pengadaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pengadaan</label>
                            <input type="date" id="tanggal_pengadaan" name="tanggal_pengadaan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="no_spp_definitif"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No SPP Definitif</label>
                            <input type="text" id="no_spp_definitif" name="no_spp_definitif"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_spp_definitif"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal SPP Definitif</label>
                            <input type="date" id="tanggal_spp_definitif" name="tanggal_spp_definitif"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="no_bast"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No BAST</label>
                            <input type="text" id="no_bast" name="no_bast"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_bast"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal BAST</label>
                            <input type="date" id="tanggal_bast" name="tanggal_bast"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="id_pengguna"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Rekanan</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="id_pengguna" name="id_pengguna" data-placeholder="Pilih Supplier">
                                <option value="">Pilih...</option>
                                @foreach ($pengguna as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_perangkat }}</option>                                        
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="uraian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uraian</label>
                            <textarea id="uraian" name="uraian"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required></textarea>
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
                        Update Pengadaan
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
                            <label for="no_pengadaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Pengadaan</label>
                            <input type="text" id="no_pengadaan_edit" name="no_pengadaan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_pengadaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pengadaan</label>
                            <input type="date" id="tanggal_pengadaan_edit" name="tanggal_pengadaan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="no_spp_definitif"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No SPP Definitif</label>
                            <input type="text" id="no_spp_definitif_edit" name="no_spp_definitif"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_spp_definitif"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal SPP Definitif</label>
                            <input type="date" id="tanggal_spp_definitif_edit" name="tanggal_spp_definitif"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="no_bast"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No BAST</label>
                            <input type="text" id="no_bast_edit" name="no_bast"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_bast"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal BAST</label>
                            <input type="date" id="tanggal_bast_edit" name="tanggal_bast"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="id_pengguna"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Rekanan</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="id_pengguna_edit" name="id_pengguna" data-placeholder="Pilih Supplier">
                                <option value="">Pilih...</option>
                                @foreach ($pengguna as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_perangkat }}</option>                                        
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="uraian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uraian</label>
                            <textarea id="uraian_edit" name="uraian"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required></textarea>
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
        const functionAdd = () => {
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');

            // Set form action URL
            let url = "{{ route('pengadaan.store') }}";
            document.getElementById('title_source').innerText = "Add pengadaan";
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
            const nama_pengadaan = button.dataset.no_pengadaan;
            const tanggal_pengadaan = button.dataset.tanggal_pengadaan;
            const no_spp_definitif = button.dataset.no_spp_definitif;
            const tanggal_spp_definitif = button.dataset.tanggal_spp_definitif;
            const no_bast = button.dataset.no_bast;
            const tanggal_bast = button.dataset.tanggal_bast;
            const nama_rekanan = button.dataset.nama_rekanan;
            const uraian = button.dataset.uraian;

            let url = "{{ route('pengadaan.update', ':id') }}".replace(':id', id);

            console.log(url);
            document.getElementById('title_source').innerText = `Update pengadaan ${nama_pengadaan}`;

            document.getElementById('no_pengadaan_edit').value = nama_pengadaan;
            document.getElementById('tanggal_pengadaan_edit').value = tanggal_pengadaan;
            document.getElementById('no_spp_definitif_edit').value = no_spp_definitif;
            document.getElementById('tanggal_spp_definitif_edit').value = tanggal_spp_definitif;
            document.getElementById('no_bast_edit').value = no_bast;
            document.getElementById('tanggal_bast_edit').value = tanggal_bast;
            document.getElementById('id_pengguna_edit').value = nama_rekanan;
            document.getElementById('uraian_edit').value = uraian;

            formModal.setAttribute('action', url);

            let event = new Event('change');
            document.getElementById('id_pengguna_edit').dispatchEvent(event);

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

        const ruanganDelete = async (id, ruangan) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus pengadaan ${ruangan} ?`);
            if (tanya) {
                await axios.post(`/pengadaan/${id}`, {
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