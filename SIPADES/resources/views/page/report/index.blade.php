<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cetak Laporan') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- Title -->
                    <div class="p-4 bg-gradient-to-r from-blue-100 to-blue-200 dark:from-blue-800 dark:to-blue-600 mb-6 rounded-xl font-bold text-gray-800 dark:text-white text-lg">
                        Print Salah Satu Laporan
                    </div>

                    <!-- Form -->
                    <form id="printForm" method="POST" action="{{ route('laporan.store') }}" class="space-y-6">
                        @csrf

                        <!-- Inputs -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Dari -->
                            <div>
                                <label for="dari" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Dari</label>
                                <input type="date" id="dari" name="dari"
                                    class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>

                            <!-- Sampai -->
                            <div>
                                <label for="sampai" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Sampai</label>
                                <input type="date" id="sampai" name="sampai"
                                    class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>

                            <!-- Aset -->
                            <div>
                                <label for="aset" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Pilih Aset</label>
                                <select id="aset" name="aset"
                                    class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                    <option value="">Pilih Aset</option>
                                    <option value="tanah">Tanah</option>
                                    <option value="peralatan_dan_mesin">Peralatan dan Mesin</option>
                                    <option value="gedung_dan_bangunan">Gedung dan Bangunan</option>
                                    <option value="jalan_irigasi_dan_jaringan">Jalan Irigasi dan Jaringan</option>
                                    <option value="aset_tetap_lainnya">Aset Tetap Lainnya</option>
                                    <option value="kontruksi_dalam_pengerjaan">Kontruksi Dalam Pengerjaan</option>
                                </select>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit"
                                class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-green-500 hover:bg-green-600 text-white font-medium text-sm shadow-md transition">
                                Print
                            </button>
                            <button type="reset"
                                class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-red-500 hover:bg-red-600 text-white font-medium text-sm shadow-md transition">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        function openAssetModal() {
            const dari = document.getElementById('dari').value;
            const sampai = document.getElementById('sampai').value;

            document.getElementById('modalDari').value = dari;
            document.getElementById('modalSampai').value = sampai;

            // Populate assets dynamically (example)
            const assetsSelect = document.getElementById('assets');
            assetsSelect.innerHTML = `
                <option value="asset1">Aset 1</option>
                <option value="asset2">Aset 2</option>
                <option value="asset3">Aset 3</option>
            `;

            document.getElementById('assetModal').classList.remove('hidden');
        }

        function closeAssetModal() {
            document.getElementById('assetModal').classList.add('hidden');
        }
    </script> --}}
</x-app-layout>
