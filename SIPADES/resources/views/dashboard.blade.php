<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard SIPADES') }}
            </h2>
            <div class="text-sm bg-amber-500 text-white px-4 py-2 rounded-full shadow-sm">
                @php
                    \Carbon\Carbon::setLocale('id');
                    echo now()->translatedFormat('l, j F Y');
                @endphp
            </div>
        </div>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-8">
            <!-- Asset Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card Golongan Tanah -->
                <div
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Golongan Tanah</h3>
                            <p class="text-3xl font-bold mt-2 text-gray-800">{{ $totalTanah ?? 0 }}</p>
                        </div>
                        <div
                            class="bg-green-100 p-3 rounded-full shadow-inner transition-all duration-300 hover:rotate-12">
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
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Peralatan dan Mesin
                            </h3>
                            <p class="text-3xl font-bold mt-2 text-gray-800">{{ $totalPeralatan ?? 0 }}</p>
                        </div>
                        <div
                            class="bg-blue-100 p-3 rounded-full shadow-inner transition-all duration-300 hover:rotate-12">
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
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Gedung dan Bangunan
                            </h3>
                            <p class="text-3xl font-bold mt-2 text-gray-800">{{ $totalGedung ?? 0 }}</p>
                        </div>
                        <div
                            class="bg-purple-100 p-3 rounded-full shadow-inner transition-all duration-300 hover:rotate-12">
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
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-yellow-500 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Jalan, Irigasi &
                                Jaringan</h3>
                            <p class="text-3xl font-bold mt-2 text-gray-800">{{ $totalJalan ?? 0 }}</p>
                        </div>
                        <div
                            class="bg-yellow-100 p-3 rounded-full shadow-inner transition-all duration-300 hover:rotate-12">
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
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-red-500 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Aset Tetap Lainnya
                            </h3>
                            <p class="text-3xl font-bold mt-2 text-gray-800">{{ $totalAsetL ?? 0 }}</p>
                        </div>
                        <div
                            class="bg-red-100 p-3 rounded-full shadow-inner transition-all duration-300 hover:rotate-12">
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
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-indigo-500 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Konstruksi Dalam
                                Pengerjaan</h3>
                            <p class="text-3xl font-bold mt-2 text-gray-800">{{ $totalKontruksi ?? 0 }}</p>
                        </div>
                        <div
                            class="bg-indigo-100 p-3 rounded-full shadow-inner transition-all duration-300 hover:rotate-12">
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

            <!-- Procurement Charts Section -->
            <div class="space-y-8">
                <h3 class="text-xl font-bold text-gray-800 border-b pb-2">Statistik Pengadaan Aset</h3>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Monthly Procurement Chart -->
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-lg font-semibold text-gray-800">Pengadaan Bulanan</h4>
                            <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">12 Bulan Terakhir</span>
                        </div>
                        <div class="h-72">
                            <canvas id="pengadaanChart"></canvas>
                        </div>
                    </div>

                    <!-- Procurement by Category Chart -->
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-lg font-semibold text-gray-800">Distribusi Pengadaan</h4>
                            <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">Tahun Ini</span>
                        </div>
                        <div class="h-72">
                            <canvas id="pengadaanKategoriChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Data from Laravel controller
                const labels = @json($labels);
                const totalAnggaran = @json($totalAnggaran);
                const totalJumlah = @json($totalJumlah);

                // Monthly Procurement Chart (Bar + Line)
                const pengadaanCtx = document.getElementById('pengadaanChart').getContext('2d');
                new Chart(pengadaanCtx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                                label: 'Jumlah Pengadaan',
                                data: totalJumlah,
                                backgroundColor: 'rgba(79, 70, 229, 0.8)',
                                borderColor: 'rgba(79, 70, 229, 1)',
                                borderWidth: 1,
                                borderRadius: 4,
                                yAxisID: 'y'
                            },
                            {
                                label: 'Anggaran (juta Rp)',
                                data: totalAnggaran.map(val => val / 1000000), // Convert to millions
                                backgroundColor: 'rgba(236, 72, 153, 0.1)',
                                borderColor: 'rgba(236, 72, 153, 1)',
                                borderWidth: 2,
                                type: 'line',
                                tension: 0.3,
                                yAxisID: 'y1'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    boxWidth: 12,
                                    padding: 20,
                                    usePointStyle: true
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        if (context.datasetIndex === 0) {
                                            return ` ${context.dataset.label}: ${context.parsed.y} aset`;
                                        } else {
                                            return ` ${context.dataset.label}: Rp ${context.parsed.y.toFixed(2)} juta`;
                                        }
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                type: 'linear',
                                display: true,
                                position: 'left',
                                title: {
                                    display: true,
                                    text: 'Jumlah Pengadaan',
                                    color: '#4f46e5'
                                },
                                grid: {
                                    drawOnChartArea: true,
                                    color: 'rgba(0, 0, 0, 0.05)'
                                },
                                ticks: {
                                    color: '#4f46e5',
                                    precision: 0
                                }
                            },
                            y1: {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                title: {
                                    display: true,
                                    text: 'Anggaran (juta Rp)',
                                    color: '#ec4899'
                                },
                                grid: {
                                    drawOnChartArea: false
                                },
                                ticks: {
                                    color: '#ec4899'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });

                // Procurement by Category Chart (Doughnut)
                const pengadaanKategoriCtx = document.getElementById('pengadaanKategoriChart').getContext('2d');
                new Chart(pengadaanKategoriCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Tanah', 'Peralatan', 'Gedung', 'Jalan/Irigasi', 'Lainnya', 'Konstruksi'],
                        datasets: [{
                            data: [
                                {{ $totalTanah ?? 0 }},
                                {{ $totalPeralatan ?? 0 }},
                                {{ $totalGedung ?? 0 }},
                                {{ $totalJalan ?? 0 }},
                                {{ $totalAsetL ?? 0 }},
                                {{ $totalKontruksi ?? 0 }}
                            ],
                            backgroundColor: [
                                'rgba(16, 185, 129, 0.8)',
                                'rgba(59, 130, 246, 0.8)',
                                'rgba(168, 85, 247, 0.8)',
                                'rgba(234, 179, 8, 0.8)',
                                'rgba(239, 68, 68, 0.8)',
                                'rgba(99, 102, 241, 0.8)'
                            ],
                            borderColor: 'rgba(255, 255, 255, 0.8)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',
                        plugins: {
                            legend: {
                                position: 'right',
                                labels: {
                                    boxWidth: 12,
                                    padding: 20,
                                    font: {
                                        size: 12
                                    },
                                    usePointStyle: true
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = Math.round((context.raw / total) * 100);
                                        return ` ${context.label}: ${context.raw} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
