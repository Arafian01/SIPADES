<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('GOLONGAN ASET TETAP LAINNYA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex items-center justify-between">
                    <div>DATA GOLONGAN ASET TETAP LAINNYA</div>
                    <div>
                        <a href="{{ route('aset_tetap_lainnya.create', '0') }}" 
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
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($aset_tetap_lainnya as $a)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $a->aset->id_barang }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $a->aset->nomor_register }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $a->aset->rekening->kode }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $a->aset->rekening->nama_rekening }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $a->aset->nilai_perolehan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('aset_tetap_lainnya.edit', [$a->id, '0']) }}"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">Edit</a>
                                            <button onclick="return peralatanDelete('{{ $a->id }}','{{ $a->aset->rekening->nama_rekening }}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
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
    <script>

        const peralatanDelete = async (id, peralatan) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus ${peralatan} ?`);
            if (tanya) {
                await axios.post(`/aset_tetap_lainnya/${id}`, {
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