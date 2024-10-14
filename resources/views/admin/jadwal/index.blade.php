<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <!-- Kontainer untuk Total Jadwal -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <span class="font-semibold">Total Jadwal: {{ $jadwals->count() }}</span>
            </div>
            <!-- Kontainer untuk Tabel -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 w-full ml-4">
                <a href="{{ route('admin.jadwal.create') }}"
                class="bg-[#66A5AD] hover:bg-[#458998] text-black font-bold py-2 px-4 rounded">Tambah Jadwal</a>

                <div class="overflow-x-auto">
                    <x-table>
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black">Tanggal</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($jadwals as $jadwal)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}"
                                            class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
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
