<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Laporan') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#C4DFE6] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($laporans->isEmpty())
                        <p class="text-center text-black">Tidak ada laporan yang dibuat.</p>
                    @else
                        <x-table>
                            <thead class="bg-[#66A5AD]">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                        Deskripsi</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                        Tanggal Laporan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#C4DFE6]">

                                @foreach ($laporans as $laporan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $laporan->deskripsi }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $laporan->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $laporan->status }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <button class="text-blue-500"
                                                onclick="openModal('{{ addslashes($laporan->catatan) }}')">Lihat
                                                Catatan</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-table>
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
            if (catatan) {
                catatanTextarea.value = catatan; // Set catatan ke textarea
            } else {
                catatanTextarea.value = 'Belum ada catatan'; // Tampilkan pesan jika catatan kosong
            }
            modal.classList.remove('hidden'); // Tampilkan modal
        }

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden'); // Sembunyikan modal
            catatanTextarea.value = ''; // Clear textarea
        });
    </script>
</x-app-layout>
