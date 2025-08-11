<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Aset Desa') }}
            </h2>
            <div class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full">
                {{ now()->format('l, d F Y') }}
            </div>
        </div>
    </x-slot>

    <!-- Tambahkan padding pada container utama -->
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <!-- Container untuk grid cards dengan margin x-auto untuk posisi tengah -->
        <div class="max-w-7xl mx-auto">
            <!-- Grid cards dengan margin tambahan di kiri dan kanan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-4">
                <!-- Card Golongan Tanah -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500 transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium">Golongan Tanah</h3>
                            <p class="text-2xl font-bold mt-2">{{ $tanahCount ?? 0 }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full transition-all duration-300 hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Total aset tanah yang dimiliki</p>
                </div>

                <!-- Card Peralatan dan Mesin -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500 transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium">Peralatan dan Mesin</h3>
                            <p class="text-2xl font-bold mt-2">{{ $peralatanDanMesinCount ?? 0 }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full transition-all duration-300 hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Total peralatan dan mesin</p>
                </div>

                <!-- Card Gedung dan Bangunan -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-500 transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium">Gedung dan Bangunan</h3>
                            <p class="text-2xl font-bold mt-2">{{ $gedungDanBangunanCount ?? 0 }}</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full transition-all duration-300 hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Total gedung dan bangunan</p>
                </div>

                <!-- Card Jalan, Irigasi dan Jaringan -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500 transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium">Jalan, Irigasi & Jaringan</h3>
                            <p class="text-2xl font-bold mt-2">{{ $jalanIrigasiDanJaringanCount ?? 0 }}</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full transition-all duration-300 hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Total infrastruktur jalan dan irigasi</p>
                </div>

                <!-- Card Aset Tetap Lainnya -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md border-l-4 border-red-500 transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium">Aset Tetap Lainnya</h3>
                            <p class="text-2xl font-bold mt-2">{{ $asetTetapLainnyaCount ?? 0 }}</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full transition-all duration-300 hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Total aset tetap lainnya</p>
                </div>

                <!-- Card Konstruksi Dalam Pengerjaan -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500 transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium">Konstruksi Dalam Pengerjaan</h3>
                            <p class="text-2xl font-bold mt-2">{{ $kontruksiDalamPengerjaanCount ?? 0 }}</p>
                        </div>
                        <div class="bg-indigo-100 p-3 rounded-full transition-all duration-300 hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Proyek konstruksi yang sedang berjalan</p>
                </div>

            </div>
</x-app-layout>
