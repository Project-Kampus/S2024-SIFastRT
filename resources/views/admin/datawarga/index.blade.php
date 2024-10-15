<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Warga') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between items-center">
            <!-- Kontainer untuk Total Warga -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-center w-48 h-32 border border-gray-300">
                <div class="flex flex-col items-center justify-center">
                    <span class="font-semibold text-center">Total Warga</span>
                    <svg class="w-12 h-12 text-[#66A5AD] mt-2" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.336">
                        <path d="M15.8 21C15.8 21.3866 16.1134 21.7 16.5 21.7C16.8866 21.7 17.2 21.3866 17.2 21H15.8ZM4.8 21C4.8 21.3866 5.1134 21.7 5.5 21.7C5.8866 21.7 6.2 21.3866 6.2 21H4.8ZM6.2 18C6.2 17.6134 5.8866 17.3 5.5 17.3C5.1134 17.3 4.8 17.6134 4.8 18H6.2ZM12.3 21C12.3 21.3866 12.6134 21.7 13 21.7C13.3866 21.7 13.7 21.3866 13.7 21H12.3ZM13.7 18C13.7 17.6134 13.3866 17.3 13 17.3C12.6134 17.3 12.3 17.6134 12.3 18H13.7ZM11.7429 11.3125L11.3499 10.7333L11.3499 10.7333L11.7429 11.3125ZM16.2429 11.3125L15.8499 10.7333L15.8499 10.7333L16.2429 11.3125ZM3.2 21V19.5H1.8V21H3.2ZM8 14.7H11V13.3H8V14.7ZM15.8 19.5V21H17.2V19.5H15.8ZM11 14.7C13.651 14.7 15.8 16.849 15.8 19.5H17.2C17.2 16.0758 14.4242 13.3 11 13.3V14.7ZM3.2 19.5C3.2 16.849 5.34903 14.7 8 14.7V13.3C4.57583 13.3 1.8 16.0758 1.8 19.5H3.2ZM11 14.7H15.5V13.3H11V14.7ZM20.3 19.5V21H21.7V19.5H20.3ZM15.5 14.7C18.151 14.7 20.3 16.849 20.3 19.5H21.7C21.7 16.0758 18.9242 13.3 15.5 13.3V14.7ZM6.2 21V18H4.8V21H6.2ZM13.7 21V18H12.3V21H13.7ZM9.5 11.3C7.67746 11.3 6.2 9.82255 6.2 8.00001H4.8C4.8 10.5958 6.90426 12.7 9.5 12.7V11.3ZM6.2 8.00001C6.2 6.17746 7.67746 4.7 9.5 4.7V3.3C6.90426 3.3 4.8 5.40427 4.8 8.00001H6.2ZM9.5 4.7C11.3225 4.7 12.8 6.17746 12.8 8.00001H14.2C14.2 5.40427 12.0957 3.3 9.5 3.3V4.7ZM12.8 8.00001C12.8 9.13616 12.2264 10.1386 11.3499 10.7333L12.1358 11.8918C13.3801 11.0477 14.2 9.61973 14.2 8.00001H12.8ZM11.3499 10.7333C10.8225 11.091 10.1867 11.3 9.5 11.3V12.7C10.4757 12.7 11.3839 12.4019 12.1358 11.8918L11.3499 10.7333ZM14 4.7C15.8225 4.7 17.3 6.17746 17.3 8.00001H18.7C18.7 5.40427 16.5957 3.3 14 3.3V4.7ZM17.3 8.00001C17.3 9.13616 16.7264 10.1386 15.8499 10.7333L16.6358 11.8918C17.8801 11.0477 18.7 9.61973 18.7 8.00001H17.3ZM15.8499 10.7333C15.3225 11.091 14.6867 11.3 14 11.3V12.7C14.9757 12.7 15.8839 12.4019 16.6358 11.8918L15.8499 10.7333ZM11.9378 5.42349C12.5029 4.97049 13.2189 4.7 14 4.7V3.3C12.8892 3.3 11.8667 3.68622 11.0622 4.33114L11.9378 5.42349ZM14 11.3C13.3133 11.3 12.6775 11.091 12.1501 10.7333L11.3642 11.8918C12.1161 12.4019 13.0243 12.7 14 12.7V11.3Z" fill="#000000"></path>
                    </svg>
                    <span class="text-lg font-bold">{{ $warga->count() }} Orang</span>
                </div>
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
