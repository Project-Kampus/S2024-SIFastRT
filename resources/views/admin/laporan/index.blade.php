<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Laporan') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Ringkasan Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg">Ringkasan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-2">
                        <div class="p-4 bg-gray-100 border border-gray-300 text-gray-800 rounded shadow-sm">
                            <strong>Total Pelapor:</strong> {{ $totalPelapor }}
                        </div>
                        <div class="p-4 bg-gray-100 border border-gray-300 text-gray-800 rounded shadow-sm">
                            <strong>Laporan Baru:</strong> {{ $laporanBaru }}
                        </div>
                        <div class="p-4 bg-gray-100 border border-gray-300 text-gray-800 rounded shadow-sm">
                            <strong>Laporan Sedang Diproses:</strong> {{ $laporanDiproses }}
                        </div>
                        <div class="p-4 bg-gray-100 border border-gray-300 text-gray-800 rounded shadow-sm">
                            <strong>Laporan Selesai:</strong> {{ $laporanSelesai }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg">Daftar Laporan</h3> <!-- Judul untuk kontainer tabel -->
                    <x-table>
                        <thead class="bg-[#66A5AD]">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Nama Pelapor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#C4DFE6]">
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
                    </x-table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
