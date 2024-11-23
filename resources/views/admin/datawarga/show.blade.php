<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Data Warga') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="space-y-4">

                        <!-- NIK -->
                        <div class="flex justify-between">
                            <label class="block text-sm font-medium text-gray-700 w-1/3">NIK</label>
                            <p class="text-lg font-semibold w-2/3">{{ $datawarga->nik }}</p>
                        </div>

                        <!-- Nama -->
                        <div class="flex justify-between">
                            <label class="block text-sm font-medium text-gray-700 w-1/3">Nama</label>
                            <p class="text-lg w-2/3">{{ $datawarga->nama }}</p>
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="flex justify-between">
                            <label class="block text-sm font-medium text-gray-700 w-1/3">Tempat Lahir</label>
                            <p class="text-lg w-2/3">{{ $datawarga->tempat_lahir }}</p>
                        </div>


                        <!-- Tanggal Lahir -->
                        <div class="flex justify-between">
                            <label class="block text-sm font-medium text-gray-700 w-1/3">Tanggal Lahir</label>
                            <p class="text-lg w-2/3">{{ $datawarga->tanggal_lahir }}</p>
                        </div>


                        <!-- Jenis Kelamin -->
                        <div class="flex justify-between">
                            <label class="block text-sm font-medium text-gray-700 w-1/3">Jenis Kelamin</label>
                            <p class="text-lg w-2/3">{{ $datawarga->jenis_kelamin }}</p>
                        </div>

                        <!-- Alamat -->
                        <div class="flex justify-between">
                            <label class="block text-sm font-medium text-gray-700 w-1/3">Alamat</label>
                            <p class="text-lg w-2/3">{{ $datawarga->alamat }}</p>
                        </div>

                        <!-- Agama -->
                        <div class="flex justify-between">
                            <label class="block text-sm font-medium text-gray-700 w-1/3">Agama</label>
                            <p class="text-lg w-2/3">{{ $datawarga->agama }}</p>
                        </div>

                        <!-- Status Perkawinan -->
                        <div class="flex justify-between">
                            <label class="block text-sm font-medium text-gray-700 w-1/3">Status Perkawinan</label>
                            <p class="text-lg w-2/3">{{ $datawarga->status_perkawinan }}</p>
                        </div>

                        <!-- Pekerjaan -->
                        <div class="flex justify-between">
                            <label class="block text-sm font-medium text-gray-700 w-1/3">Pekerjaan</label>
                            <p class="text-lg w-2/3">{{ $datawarga->pekerjaan }}</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-between mt-4 space-x-4">
                            <a href="{{ route('admin.datawarga.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm">Kembali</a>
                            <div>
                                <a href="{{ route('admin.datawarga.edit', $datawarga->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded-md text-sm">Edit</a>
                                <form action="{{ route('admin.datawarga.destroy', $datawarga->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-md text-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
