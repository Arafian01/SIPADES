<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('GOLONGAN GEDUNG DAN BANGUNAN') }}
        </h2>
    </x-slot>

    <!-- Success/Error Messages -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
        @if(session('success'))
            <div id="successMessage" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="document.getElementById('successMessage').remove()">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
            </div>
        @endif

        @if($errors->any()))
            <div id="errorMessage" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul class="mt-1 list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="document.getElementById('errorMessage').remove()">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
            </div>
        @endif
    </div>

    <div class="py-2">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Header with Search and Add Button -->
                <div class="p-6 flex flex-col md:flex-row items-center justify-between gap-4 dark:from-gray-700 dark:to-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="text-lg font-bold text-gray-800 dark:text-white">
                        DATA GEDUNG DAN BANGUNAN
                    </div>
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <div class="relative flex-grow md:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="searchInput" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Cari gedung/bangunan...">
                        </div>
                        <a href="{{ route('gedung_dan_bangunan.create', '0') }}" 
                           class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-300">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Gedung
                        </a>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-12">NO</th>
                                    <th scope="col" class="px-6 py-3 min-w-[120px]">ID ASET</th>
                                    <th scope="col" class="px-6 py-3">NO REG</th>
                                    <th scope="col" class="px-6 py-3">KODE REKENING</th>
                                    <th scope="col" class="px-6 py-3 min-w-[180px]">NAMA REKENING</th>
                                    <th scope="col" class="px-6 py-3">LUAS (m²)</th>
                                    <th scope="col" class="px-6 py-3">NILAI PEROLEHAN</th>
                                    <th scope="col" class="px-6 py-3 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="gedungTableBody">
                                @php $no = 1; @endphp
                                @foreach ($gedung_dan_bangunan as $t)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4 font-mono">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                {{ $t->aset->id_barang }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 font-mono">
                                            {{ $t->aset->nomor_register }}
                                        </td>
                                        <td class="px-6 py-4 font-mono">
                                            {{ $t->aset->rekening->kode }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->aset->rekening->nama_rekening }}
                                        </td>
                                        <td class="px-6 py-4 font-mono">
                                            {{ $t->luas }} m²
                                        </td>
                                        <td class="px-6 py-4 font-mono">
                                            Rp {{ number_format($t->aset->nilai_perolehan, 2, ',', '.') }}
                                        </td>
                                        
                                        <td class="px-6 py-4 flex items-center justify-center gap-2">
                                            <a href="{{ route('gedung_dan_bangunan.edit', [$t->id, '0']) }}"
                                               class="flex items-center bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white transition-colors duration-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <button onclick="return gedungDelete('{{ $t->id }}','{{ $t->aset->rekening->nama_rekening }}')" 
                                                    class="flex items-center bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md text-xs text-white transition-colors duration-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak ada data yang ditemukan</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Coba dengan kata kunci lain atau tambahkan data baru.</p>
                        <div class="mt-6">
                            <a href="{{ route('gedung_dan_bangunan.create', '0') }}" 
                               class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Gedung/Bangunan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Search functionality with debounce
        let searchTimeout;
        document.getElementById('searchInput').addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const searchValue = this.value.trim().toLowerCase();
                const rows = document.querySelectorAll('#gedungTableBody tr');
                let hasResults = false;
                
                // Show loading indicator
                const tableBody = document.getElementById('gedungTableBody');
                tableBody.classList.add('opacity-50');
                
                rows.forEach(row => {
                    const idAset = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const noReg = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    const kodeRekening = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                    const namaRekening = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
                    
                    if (idAset.includes(searchValue) || noReg.includes(searchValue) || 
                        kodeRekening.includes(searchValue) || namaRekening.includes(searchValue)) {
                        row.classList.remove('hidden');
                        hasResults = true;
                    } else {
                        row.classList.add('hidden');
                    }
                });
                
                // Hide loading indicator
                tableBody.classList.remove('opacity-50');
                
                // Show/hide empty state
                const emptyState = document.getElementById('emptyState');
                if (hasResults || searchValue === '') {
                    emptyState.classList.add('hidden');
                } else {
                    emptyState.classList.remove('hidden');
                }
            }, 300); // 300ms debounce delay
        });

        const gedungDelete = async (id, nama) => {
            try {
                const result = await Swal.fire({
                    title: `Hapus ${nama}?`,
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    preConfirm: async () => {
                        try {
                            const response = await axios.post(`/gedung_dan_bangunan/${id}`, {
                                '_method': 'DELETE',
                                '_token': '{{ csrf_token() }}'
                            });
                            return response;
                        } catch (error) {
                            Swal.showValidationMessage(
                                `Request failed: ${error.response?.data?.message || error.message}`
                            );
                            return false;
                        }
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                });

                if (result.isConfirmed) {
                    if (result.value) {
                        await Swal.fire({
                            title: 'Terhapus!',
                            text: 'Data gedung/bangunan telah dihapus.',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            timer: 2000,
                            timerProgressBar: true
                        });
                        location.reload();
                    } else {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        );
                    }
                }
            } catch (error) {
                console.error('Delete error:', error);
                Swal.fire(
                    'Error!',
                    'Terjadi kesalahan saat memproses permintaan.',
                    'error'
                );
            }
        }

        // Initialize tooltips if using tippy.js
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-hide success/error messages after delay
            const autoHideMessages = () => {
                const messages = [
                    document.getElementById('successMessage'),
                    document.getElementById('errorMessage')
                ];
                
                messages.forEach(message => {
                    if (message) {
                        setTimeout(() => {
                            message.style.transition = 'opacity 0.5s ease';
                            message.style.opacity = '0';
                            setTimeout(() => message.remove(), 500);
                        }, 5000);
                    }
                });
            };
            
            autoHideMessages();
            
            // If using tooltip library like tippy.js
            // tippy('[data-tippy-content]', {
            //     placement: 'top',
            //     animation: 'fade',
            //     duration: 200
            // });
        });
    </script>
</x-app-layout>