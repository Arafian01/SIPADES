<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cetak Laporan Inventaris Aset Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Tombol Aksi --}}
                    <div class="flex gap-4 mb-6">
                        <a href="{{ route('buku.store') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                            📄 Cetak Semua
                        </a>
                        <button onclick="document.getElementById('modalLaporan').classList.remove('hidden')" 
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                            ✅ Pilih Laporan
                        </button>
                    </div>

                    {{-- Form Filter Buku Inventaris --}}
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">Buku Inventaris Aset Desa</div>
                        </div>
                    </div>

                    <form class="w-full mx-auto my-5" method="POST" action="{{ route('buku.store') }}">
                        @csrf
                        <div class="flex gap-5 my-5">
                            <div class="mb-5 w-full">
                                <label for="dari" class="block mb-2 text-sm font-medium">Dari</label>
                                <input type="date" id="dari" name="dari"
                                    class="border rounded-lg w-full p-2.5" />
                            </div>
                            <div class="mb-5 w-full">
                                <label for="sampai" class="block mb-2 text-sm font-medium">Sampai</label>
                                <input type="date" id="sampai" name="sampai"
                                    class="border rounded-lg w-full p-2.5" />
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <button type="submit" class="bg-emerald-200 hover:bg-emerald-400 rounded-lg px-12 py-2.5">
                                Print
                            </button>
                            <button type="reset" class="bg-red-500 hover:bg-red-600 text-white rounded-lg px-12 py-2.5">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Pilih Laporan --}}
    <div id="modalLaporan" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Pilih Laporan</h2>
            <form action="{{ route('buku.store') }}" method="GET">
                <div class="space-y-2 mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="laporan[]" value="buku_inventaris" class="mr-2">
                        Buku Inventaris
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="laporan[]" value="kartu_golongan_1" class="mr-2">
                        Kartu Golongan 1
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="laporan[]" value="kartu_golongan_2" class="mr-2">
                        Kartu Golongan 2
                    </label>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('modalLaporan').classList.add('hidden')" 
                        class="bg-gray-300 px-4 py-2 rounded-lg">
                        Batal
                    </button>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
