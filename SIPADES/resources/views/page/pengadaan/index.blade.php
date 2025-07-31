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
                    <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">DATA PENGADAAN</div>
                    <div>
                        <button onclick="functionAdd()"
                            class="bg-sky-600 px-4 py-2 hover:bg-sky-500 text-white rounded-lg transition duration-200">Add</button>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">NO</th>
                                    <th scope="col" class="px-6 py-3">NO PENGADAAN</th>
                                    <th scope="col" class="px-6 py-3">TGL</th>
                                    <th scope="col" class="px-6 py-3">NO SPP DEFINITIF</th>
                                    <th scope="col" class="px-6 py-3">TGL</th>
                                    <th scope="col" class="px-6 py-3">NO BAST</th>
                                    <th scope="col" class="px-6 py-3">TGL</th>
                                    <th scope="col" class="px-6 py-3">NAMA REKANAN</th>
                                    <th scope="col" class="px-6 py-3">URAIAN</th>
                                    <th scope="col" class="px-6 py-3">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($pengadaan as $r)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">{{ $r->no_pengadaan }}</td>
                                        <td class="px-6 py-4">{{ $r->tanggal_pengadaan }}</td>
                                        <td class="px-6 py-4">{{ $r->no_kuitansi }}</td>
                                        <td class="px-6 py-4">{{ $r->tanggal_spp }}</td>
                                        <td class="px-6 py-4">{{ $r->no_bast }}</td>
                                        <td class="px-6 py-4">{{ $r->tanggal_bast }}</td>
                                        <td class="px-6 py-4">{{ $r->nama_rekanan }}</td>
                                        <td class="px-6 py-4">{{ $r->uraian }}</td>
                                        <td class="px-6 py-4 flex space-x-2">
                                            <a class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white text-sm transition duration-200" href="{{ route('pengadaan.show', $r->id) }}">
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

    <!-- Add Modal -->
    <div class="fixed inset-0 z-50 hidden flex items-center justify-center" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow w-full max-w-2xl mx-4">
            <div class="flex items-center justify-between p-6 border-b dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="title_source">
                    Tambah Pengadaan
                </h3>
                <button type="button" onclick="sourceModalClose()"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <form method="POST" id="formSourceModal" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="no_pengadaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Pengadaan</label>
                        <input type="text" id="no_pengadaan" name="no_pengadaan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="tanggal_pengadaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pengadaan</label>
                        <input type="date" id="tanggal_pengadaan" name="tanggal_pengadaan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="no_spp_definitif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No SPP Definitif</label>
                        <input type="text" id="no_spp_definitif" name="no_kuitansi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="tanggal_spp_definitif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal SPP Definitif</label>
                        <input type="date" id="tanggal_spp_definitif" name="tanggal_spp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="no_bast" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No BAST</label>
                        <input type="text" id="no_bast" name="no_bast"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="tanggal_bast" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal BAST</label>
                        <input type="date" id="tanggal_bast" name="tanggal_bast"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div class="md:col-span-2">
                        <label for="id_pengguna" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Rekanan</label>
                        <select class="js-example-placeholder-single form-control w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            id="id_pengguna" name="id_pengguna" data-placeholder="Pilih Supplier">
                            <option value="">Pilih...</option>
                            @foreach ($pengguna as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_perangkat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="nama_rekanan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Rekanan</label>
                        <input type="text" id="nama_rekanan" name="nama_rekanan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div class="md:col-span-2">
                        <label for="uraian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uraian</label>
                        <textarea id="uraian" name="uraian"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            rows="4" required></textarea>
                    </div>
                </div>
                <div class="flex items-center justify-end p-4 border-t dark:border-gray-700 space-x-3">
                    <button type="submit" id="formSourceButton"
                        class="bg-green-500 hover:bg-green-600 px-6 py-2 rounded-lg text-white transition duration-200">
                        Simpan
                    </button>
                    <button type="button" onclick="sourceModalClose()"
                        class="bg-red-500 hover:bg-red-600 px-6 py-2 rounded-lg text-white transition duration-200">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="fixed inset-0 z-50 hidden flex items-center justify-center" id="sourceModalEdit">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow w-full max-w-2xl mx-4">
            <div class="flex items-center justify-between p-6 border-b dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="title_source_edit">
                    Update Pengadaan
                </h3>
                <button type="button" onclick="sourceModalClose()"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <form method="POST" id="formSourceModalEdit" class="p-6">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="no_pengadaan_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Pengadaan</label>
                        <input type="text" id="no_pengadaan_edit" name="no_pengadaan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="tanggal_pengadaan_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pengadaan</label>
                        <input type="date" id="tanggal_pengadaan_edit" name="tanggal_pengadaan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="no_spp_definitif_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No SPP Definitif</label>
                        <input type="text" id="no_spp_definitif_edit" name="no_spp_definitif"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="tanggal_spp_definitif_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal SPP Definitif</label>
                        <input type="date" id="tanggal_spp_definitif_edit" name="tanggal_spp_definitif"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="no_bast_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No BAST</label>
                        <input type="text" id="no_bast_edit" name="no_bast"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="tanggal_bast_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal BAST</label>
                        <input type="date" id="tanggal_bast_edit" name="tanggal_bast"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div class="md:col-span-2">
                        <label for="id_pengguna_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Rekanan</label>
                        <select class="js-example-placeholder-single form-control w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            id="id_pengguna_edit" name="id_pengguna" data-placeholder="Pilih Supplier">
                            <option value="">Pilih...</option>
                            @foreach ($pengguna as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_perangkat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="uraian_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uraian</label>
                        <textarea id="uraian_edit" name="uraian"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            rows="4" required></textarea>
                    </div>
                </div>
                <div class="flex items-center justify-end p-4 border-t dark:border-gray-700 space-x-3">
                    <button type="submit" id="formSourceButtonEdit"
                        class="bg-green-500 hover:bg-green-600 px-6 py-2 rounded-lg text-white transition duration-200">
                        Simpan
                    </button>
                    <button type="button" onclick="sourceModalClose()"
                        class="bg-red-500 hover:bg-red-600 px-6 py-2 rounded-lg text-white transition duration-200">
                        Batal
                    </button>
                </div>
            </form>
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