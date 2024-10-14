<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Warga') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <!-- Kontainer untuk Total Warga -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <span class="font-semibold">Total Warga: {{ $warga->count() }}</span>
            </div>
            <!-- Kontainer untuk Tabel -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 w-full ml-4">
                <a href="{{ route('admin.datawarga.create') }}"
                class="bg-[#66A5AD] hover:bg-[#458998] text-black font-bold py-2 px-4 rounded">Tambah Warga</a>

                <x-table>
                    <thead class="bg-[#C4DFE6]">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black">NIK</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black">Tanggal Lahir</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warga as $w)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $w->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $w->nik }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($w->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $w->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.datawarga.edit', $w->id) }}"
                                        class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="{{ route('admin.datawarga.destroy', $w->id) }}" method="POST"
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
</x-app-layout>
