<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#C4DFE6] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-table>
                        <thead class="bg-[#66A5AD]">
                            <tr>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#C4DFE6]">
                            @foreach ($jadwals as $jadwal)
                                <tr>
                                    <td class="px-6 py-4">{{ $jadwal->nama }}</td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
