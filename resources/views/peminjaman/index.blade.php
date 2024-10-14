<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#C4DFE6] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('peminjaman.create') }}" class="bg-[#66A5AD] hover:bg-[#458998] text-black font-bold py-2 px-4 rounded">Ajukan Peminjaman</a>
                        <x-table>
                            <thead class="bg-[#66A5AD]">
                                <tr>
                                    <th class="px-6 py-3">Nama</th>
                                    <th class="px-6 py-3">Fasilitas</th>
                                    <th class="px-6 py-3">Tanggal Peminjaman</th>
                                    <th class="px-6 py-3">Tanggal Pengembalian</th>
                                    <th class="px-6 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#C4DFE6]">
                                @foreach ($peminjaman as $peminjamanItem) <!-- Ubah nama variabel di sini -->
                                    <tr>
                                        <td class="px-6 py-4">{{ $peminjamanItem->nama }}</td> <!-- Gunakan $peminjamanItem -->
                                        <td class="px-6 py-4">{{ $peminjamanItem->fasilitas }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($peminjamanItem->tanggal_peminjaman)->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($peminjamanItem->tanggal_pengembalian)->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4">{{ $peminjamanItem->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-table>
                    @if ($peminjaman->isEmpty())
                        <div class="mt-4 text-gray-600">
                            Belum ada peminjaman yang diajukan.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 