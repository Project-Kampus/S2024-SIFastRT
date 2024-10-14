<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($laporans->isEmpty())
                        <p class="text-center text-gray-500">Tidak ada laporan yang dibuat.</p>
                    @else
                    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
                    <table class="min-w-full bg-white display" id="myTable">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Laporan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($laporans as $laporan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $laporan->deskripsi }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $laporan->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $laporan->status }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <button class="text-blue-500" onclick="openModal('{{ addslashes($laporan->catatan) }}')">Lihat Catatan</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                            crossorigin="anonymous"></script>
                        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#myTable').DataTable();
    
                                // Cek jika ada pesan sukses
                                var successMessage = $('#success-message');
                                if (successMessage.length) {
                                    // Setelah 3 detik, sembunyikan pesan
                                    setTimeout(function() {
                                        successMessage.fadeOut('slow');
                                    }, 3000); // 3000ms = 3 detik
                                }
                            });
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Menampilkan Catatan -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg p-4 max-w-md w-full">
            <h3 class="text-lg font-semibold">Catatan</h3>
            <textarea id="catatan" class="border border-gray-300 rounded-md w-full h-24 mt-2" readonly></textarea>
            <div class="flex justify-end mt-4">
                <button id="closeModal" class="bg-gray-300 text-gray-800 rounded-md px-4 py-2">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('modal');
        const catatanTextarea = document.getElementById('catatan');
        const closeModalButton = document.getElementById('closeModal');

        function openModal(catatan) {
            catatanTextarea.value = catatan; // Set catatan ke textarea
            modal.classList.remove('hidden'); // Tampilkan modal
        }

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden'); // Sembunyikan modal
            catatanTextarea.value = ''; // Clear textarea
        });
    </script>
</x-app-layout>
