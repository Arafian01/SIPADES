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
                    
                    <form method="POST" action="{{ route('laporan.store') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">

                            {{-- Buku Inventaris --}}
                            <div>
                                <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                                    Buku Inventaris Aset Desa
                                </div>
                                <div class="flex gap-5 my-5">
                                    <div class="mb-5 w-full">
                                        <label for="buku_dari" class="block mb-2 text-sm font-medium">Dari</label>
                                        <input type="date" id="buku_dari" name="buku_dari" class="border rounded-lg w-full p-2.5" />
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="buku_sampai" class="block mb-2 text-sm font-medium">Sampai</label>
                                        <input type="date" id="buku_sampai" name="buku_sampai" class="border rounded-lg w-full p-2.5" />
                                    </div>
                                </div>
                            </div>

                            {{-- Kartu Inventaris --}}
                            <div>
                                <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                                    Kartu Inventaris Aset Desa
                                </div>
                                <div class="space-y-2">
                                    @foreach ([
                                        'tanah' => 'Tanah',
                                        'mesin' => 'Peralatan dan Mesin',
                                        'kontruksi' => 'Kontruksi dalam Pengerjaan',
                                        'jalan' => 'Jalan, Irigasi dan Jaringan',
                                        'gedung' => 'Gedung dan Bangunan',
                                        'aset_lain' => 'Aset Tetap Lainnya'
                                    ] as $value => $label)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="laporan[]" value="{{ $value }}" class="mr-2">
                                            {{ $label }}
                                        </label>
                                    @endforeach
                                </div>

                                <div class="flex gap-5 my-5">
                                    <div class="mb-5 w-full">
                                        <label for="kib_dari" class="block mb-2 text-sm font-medium">Dari</label>
                                        <input type="date" id="kib_dari" name="kib_dari" class="border rounded-lg w-full p-2.5" />
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="kib_sampai" class="block mb-2 text-sm font-medium">Sampai</label>
                                        <input type="date" id="kib_sampai" name="kib_sampai" class="border rounded-lg w-full p-2.5" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex gap-3 mt-6">
                            <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg px-12 py-2.5">
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
</x-app-layout>
