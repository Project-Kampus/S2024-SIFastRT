<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Pesan Sukses --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    {{-- Section Ringkasan --}}
                    <div class="mb-4 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded">
                        <h3 class="font-semibold">Ringkasan</h3>
                        <ul>
                            <li>Total Pelapor: {{ $totalPelapor }}</li>
                            <li>Laporan Baru: {{ $laporanBaru }}</li>
                            <li>Laporan Sedang Diproses: {{ $laporanDiproses }}</li>
                            <li>Laporan Selesai: {{ $laporanSelesai }}</li>
                        </ul>
                    </div>

                    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
                <table class="min-w-full bg-white display" id="myTable">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pelapor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($laporans as $laporan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $laporan->nama_pelapor }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $laporan->created_at->format('d-m-Y H:i') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $laporan->status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('admin.laporan.show', $laporan->id) }}" class="text-blue-500 hover:underline">Detail</a>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
