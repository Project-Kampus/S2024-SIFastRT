<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- Pesan Sukses/Error --}}
                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <a href="{{ route('admin.datawarga.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Tambah Data Warga</a>

                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 text-left">NIK</th>
                                    <th class="px-4 py-2 text-left">Nama</th>
                                    <th class="px-4 py-2 text-left">Jenis Kelamin</th>
                                    <th class="px-4 py-2 text-left">Alamat</th>
                                    <th class="px-4 py-2 text-left">Status Verifikasi</th> <!-- Kolom status verifikasi -->
                                    <th class="px-4 py-2 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datawargas as $data)
                                    <tr>
                                        <td class="px-4 py-2">{{ $data->nik }}</td>
                                        <td class="px-4 py-2">{{ $data->nama }}</td>
                                        <td class="px-4 py-2">{{ $data->jenis_kelamin }}</td>
                                        <td class="px-4 py-2">{{ $data->alamat }}</td>
                                        <td class="px-4 py-2">
                                            @if($data->nik_verified)
                                                <span class="text-green-500">Terverifikasi</span>
                                            @else
                                                <span class="text-red-500">Belum Terverifikasi</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('admin.datawarga.show', $data->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md">Show</a>
                                            <a href="{{ route('admin.datawarga.edit', $data->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded-md">Edit</a>
                                            <form action="{{ route('admin.datawarga.destroy', $data->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-md delete-btn">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination Links --}}
                    <div class="mt-6">
                        {{ $datawargas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 