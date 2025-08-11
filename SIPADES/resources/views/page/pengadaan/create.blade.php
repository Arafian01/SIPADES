<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('DETAIL PENGADAAN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <!-- Info Section -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                            <!-- Nomor -->
                            <div class="flex justify-between items-center">
                                <label for="no_pengadaan"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 mr-5">
                                    Nomor
                                </label>
                                <input type="text" id="no_pengadaan" name="no_pengadaan"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 
                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $pengadaan->no_pengadaan ?? '' }}" readonly />
                            </div>
                            <!-- Tanggal -->
                            <div class="flex justify-between items-center">
                                <label for="tanggal_pengadaan"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 mr-5">
                                    Tanggal
                                </label>
                                <input type="text" id="tanggal_pengadaan" name="tanggal_pengadaan"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 
                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $pengadaan->tanggal_pengadaan ? \Carbon\Carbon::parse($pengadaan->tanggal_pengadaan)->format('d-m-Y') : '' }}"
                                    readonly />
                            </div>
                        </div>

                        <!-- Button Section -->
                        <div class="shrink-0 self-start md:self-auto">
                            <button onclick="functionAdd()"
                                class="bg-sky-600 hover:bg-sky-500 text-white font-medium px-4 py-2 rounded-lg transition duration-200">
                                Add
                            </button>
                        </div>
                    </div>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">NO</th>
                                    <th scope="col" class="px-6 py-3">NO REKENING</th>
                                    <th scope="col" class="px-6 py-3">NAMA REKENING</th>
                                    <th scope="col" class="px-6 py-3">SUMBER DANA</th>
                                    <th scope="col" class="px-6 py-3">NILAI PENGADAAN</th>
                                    <th scope="col" class="px-6 py-3">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($pengadaan->detailPengadaan as $detail)
                                    @php $a = $detail->aset; @endphp
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">{{ $a->rekening->kode ?? '-' }}</td>
                                        <td class="px-6 py-4">{{ $a->rekening->nama_rekening ?? '-' }}</td>
                                        <td class="px-6 py-4">{{ $a->sumber_dana ?? '-' }}</td>
                                        <td class="px-6 py-4">{{ $a->nilai_perolehan ?? '-' }}</td>
                                        {{-- <td class="px-6 py-4 flex space-x-2">
                                            <a class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white text-sm transition duration-200"
                                                href="{{ route('pengadaan.create', [$detail->pengadaan->id, $a->rekening->golongan->id, $a->id]) }}">
                                                Detail
                                            </a>
                                        </td> --}}

                                        <td class="px-6 py-4 flex space-x-2">
                                            <a class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white text-sm transition duration-200"
                                                href="{{ route('pengadaan.create', [$detail->pengadaan->id, $a->rekening->golongan->id, $a->id]) }}">
                                                Detail
                                            </a>
                                            <button onclick="ruanganDelete({{ $pengadaan->id }}, {{ $detail->id }}, '{{ $a->rekening->nama_rekening }}')"
                                                class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-white text-sm transition duration-200">
                                                Delete
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
    <div class="fixed inset-0 z-50 hidden items-center justify-center" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow w-full max-w-2xl mx-4">
            <div class="flex items-center justify-between p-6 border-b dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="title_source">
                    Pilih Golongan Aset
                </h3>
                <button type="button" onclick="sourceModalClose()"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('tanah.create', ['id' => $pengadaan->id]) }}"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-lg transition duration-200">
                        Golongan Tanah
                    </a>
                    <a href="{{ route('peralatan_dan_mesin.create', ['id' => $pengadaan->id]) }}"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-lg transition duration-200">
                        Golongan Peralatan dan Mesin
                    </a>
                    <a href="{{ route('gedung_dan_bangunan.create', ['id' => $pengadaan->id]) }}"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-lg transition duration-200">
                        Golongan Gedung dan Bangunan
                    </a>
                    <a href="{{ route('jalan_irigasi_dan_jaringan.create', ['id' => $pengadaan->id]) }}"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-lg transition duration-200">
                        Golongan Jalan, Irigasi, dan Jaringan
                    </a>
                    <a href="{{ route('aset_tetap_lainnya.create', ['id' => $pengadaan->id]) }}"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-lg transition duration-200">
                        Golongan Aset Tetap Lainnya
                    </a>
                    <a href="{{ route('kontruksi_dalam_pengerjaan.create', ['id' => $pengadaan->id]) }}"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-lg transition duration-200">
                        Golongan Konstruksi Dalam Pengerjaan
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-end p-4 border-t dark:border-gray-700 space-x-3">

                <button type="button" onclick="sourceModalClose()"
                    class="bg-red-500 hover:bg-red-600 px-6 py-2 rounded-lg text-white transition duration-200">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script>
        const functionAdd = () => {
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');

            // Set form action URL
            // let url = "{{ route('pengadaan.store') }}";
            // document.getElementById('title_source').innerText = "Add pengadaan";
            // formModal.setAttribute('action', url);

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
            // document.getElementById('sourceModalEdit').classList.add('hidden');
            document.getElementById('sourceModal').classList.add('hidden');
        }

        const ruanganDelete = async (idPengadaan, idDetail, nama) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus pengadaan ${idPengadaan}, ${idDetail}, ${nama} ?`);
            if (tanya) {
                await axios.post(`/pengadaan/${idPengadaan}/${idDetail}`, {
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
