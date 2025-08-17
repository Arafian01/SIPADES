<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pengadaan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <!-- Info Section -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full">
                            <!-- Nomor -->
                            <div class="flex flex-col">
                                <label for="no_pengadaan" class="flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    Nomor
                                </label>
                                <input type="text" id="no_pengadaan" name="no_pengadaan"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $pengadaan->no_pengadaan ?? '' }}" readonly />
                            </div>
                            <!-- Tanggal -->
                            <div class="flex flex-col">
                                <label for="tanggal_pengadaan" class="flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal
                                </label>
                                <input type="text" id="tanggal_pengadaan" name="tanggal_pengadaan"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $pengadaan->tanggal_pengadaan ? \Carbon\Carbon::parse($pengadaan->tanggal_pengadaan)->format('d/m/Y') : '' }}"
                                    readonly />
                            </div>
                        </div>
                        <!-- Add Button -->
                        <button onclick="functionAdd()"
                            class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center w-full sm:w-auto">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah
                        </button>
                    </div>
                </div>

                <div class="p-4 sm:p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300 sticky top-0">
                                <tr>
                                    <th scope="col" class="px-4 py-3 w-12">No</th>
                                    <th scope="col" class="px-4 py-3 min-w-[120px]">No Rekening</th>
                                    <th scope="col" class="px-4 py-3 min-w-[150px]">Nama Rekening</th>
                                    <th scope="col" class="px-4 py-3">Sumber Dana</th>
                                    <th scope="col" class="px-4 py-3">Nilai Pengadaan</th>
                                    <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pengadaanTableBody">
                                @php $no = 1; @endphp
                                @foreach ($pengadaan->detailPengadaan as $detail)
                                    @php $a = $detail->aset; @endphp
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $no++ }}</td>
                                        <td class="px-4 py-3 font-mono">{{ $a->rekening->kode ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $a->rekening->nama_rekening ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $a->sumber_dana ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $a->nilai_perolehan ? number_format($a->nilai_perolehan, 2, ',', '.') : '-' }}</td>
                                        <td class="px-4 py-3 flex flex-wrap justify-center gap-2">
                                            <a href="{{ route('pengadaan.create', [$detail->pengadaan->id, $a->rekening->golongan->id, $a->id]) }}"
                                               class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded-md text-xs text-white flex items-center">
                                                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Detail
                                            </a>
                                            <button onclick="ruanganDelete({{ $pengadaan->id }}, {{ $detail->id }}, '{{ addslashes($a->rekening->nama_rekening) }}')"
                                                    class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md text-xs text-white flex items-center">
                                                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Empty State -->
                    <div id="emptyState" class="hidden text-center py-10">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak ada data ditemukan</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tambahkan data baru untuk melihat detail.</p>
                        <div class="mt-6">
                            <button onclick="functionAdd()"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Pengadaan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="fixed inset-0 z-50 hidden flex items-center justify-center" id="sourceModal">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="sourceModalClose()"></div>
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow w-full max-w-md sm:max-w-2xl mx-4">
            <div class="flex items-center justify-between p-5 border-b dark:border-gray-700 bg-gradient-to-r from-blue-500 to-blue-600">
                <h3 class="text-lg sm:text-xl font-semibold text-white">
                    <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Pilih Golongan Aset
                </h3>
                <button type="button" onclick="sourceModalClose()"
                    class="text-white hover:text-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 sm:p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('tanah.create', ['id' => $pengadaan->id]) }}"
                       class="w-full bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center justify-center transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3M7 4h10"></path>
                        </svg>
                        Golongan Tanah
                    </a>
                    <a href="{{ route('peralatan_dan_mesin.create', ['id' => $pengadaan->id]) }}"
                       class="w-full bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center justify-center transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                        Golongan Peralatan dan Mesin
                    </a>
                    <a href="{{ route('gedung_dan_bangunan.create', ['id' => $pengadaan->id]) }}"
                       class="w-full bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center justify-center transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-14"></path>
                        </svg>
                        Golongan Gedung dan Bangunan
                    </a>
                    <a href="{{ route('jalan_irigasi_dan_jaringan.create', ['id' => $pengadaan->id]) }}"
                       class="w-full bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center justify-center transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                        Golongan Jalan, Irigasi, dan Jaringan
                    </a>
                    <a href="{{ route('aset_tetap_lainnya.create', ['id' => $pengadaan->id]) }}"
                       class="w-full bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center justify-center transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Golongan Aset Tetap Lainnya
                    </a>
                    <a href="{{ route('kontruksi_dalam_pengerjaan.create', ['id' => $pengadaan->id]) }}"
                       class="w-full bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center justify-center transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                        </svg>
                        Golongan Konstruksi Dalam Pengerjaan
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-end p-4 sm:p-6 border-t border-gray-200 dark:border-gray-700">
                <button type="button" onclick="sourceModalClose()"
                    class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Swal.fire({
                    title: 'Validasi Gagal!',
                    text: "{{ $error }}",
                    icon: 'error',
                    timer: 3000,
                    showConfirmButton: false
                });
                @break
            @endforeach
        @endif

        function functionAdd() {
            const modal = document.getElementById('sourceModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function sourceModalClose() {
            document.getElementById('sourceModal').classList.add('hidden');
            document.getElementById('sourceModal').classList.remove('flex');
        }

        async function ruanganDelete(idPengadaan, idDetail, nama) {
            const result = await Swal.fire({
                title: `Hapus ${nama}?`,
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            });

            if (result.isConfirmed) {
                try {
                    await axios.post(`/pengadaan/${idPengadaan}/${idDetail}`, {
                        '_method': 'DELETE',
                        '_token': '{{ csrf_token() }}'
                    });
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Data telah dihapus.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => location.reload());
                } catch (error) {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menghapus data.',
                        icon: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            }
        }

        // Show empty state if no data
        document.addEventListener('DOMContentLoaded', function () {
            const tbody = document.getElementById('pengadaanTableBody');
            const emptyState = document.getElementById('emptyState');
            if (tbody.children.length === 0) {
                emptyState.classList.remove('hidden');
            }
        });
    </script>
</x-app-layout>