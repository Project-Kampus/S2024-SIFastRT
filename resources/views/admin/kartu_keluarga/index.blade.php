<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kartu Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('admin.kartu_keluarga.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Tambah Kartu Keluarga</a>
                <table class="table-auto w-full mt-4 border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Nomor KK</th>
                            <th class="border border-gray-300 px-4 py-2">Alamat</th>
                            <th class="border border-gray-300 px-4 py-2">Kepala Keluarga</th>
                            <th class="border border-gray-300 px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kartuKeluarga as $kk)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $kk->nomor_kk }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $kk->alamat }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $kk->kepalaKeluarga->nama }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('admin.kartu_keluarga.show', $kk->id) }}" class="text-blue-500">Detail</a>
                                    <a href="{{ route('admin.kartu_keluarga.edit', $kk->id) }}" class="text-yellow-500 mx-2">Edit</a>
                                    <form action="{{ route('admin.kartu_keluarga.destroy', $kk->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
