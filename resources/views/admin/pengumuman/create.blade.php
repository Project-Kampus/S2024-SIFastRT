<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pengumuman Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 space-y-6">
                    <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Judul Pengumuman -->
                            <div class="form-group">
                                <label for="judul" class="block text-gray-700 font-medium">Judul Pengumuman</label>
                                <input type="text" id="judul" name="judul" class="form-input mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                            </div>

                            <!-- Tanggal Pengumuman -->
                            <div class="form-group">
                                <label for="tanggal" class="block text-gray-700 font-medium">Tanggal Pengumuman</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-input mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            </div>

                            <!-- Tanggal Berlaku -->
                            <div class="form-group">
                                <label for="tanggal_berlaku" class="block text-gray-700 font-medium">Tanggal Berlaku</label>
                                <input type="date" id="tanggal_berlaku" name="tanggal_berlaku" class="form-input mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            </div>

                            <!-- Lokasi -->
                            <div class="form-group">
                                <label for="lokasi" class="block text-gray-700 font-medium">Lokasi</label>
                                <input type="text" id="lokasi" name="lokasi" class="form-input mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            </div>

                            <!-- Gambar / Banner -->
                            <div class="form-group">
                                <label for="gambar" class="block text-gray-700 font-medium">Gambar / Banner</label>
                                <input type="file" id="gambar" name="gambar" class="form-input mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            </div>

                            <!-- Kontak -->
                            <div class="form-group">
                                <label for="kontak" class="block text-gray-700 font-medium">Kontak</label>
                                <input type="text" id="kontak" name="kontak" class="form-input mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            </div>

                            <!-- Isi Pengumuman -->
                            <div class="form-group col-span-2">
                                <label for="isi" class="block text-gray-700 font-medium">Isi Pengumuman</label>
                                <textarea id="isi" name="isi" rows="4" class="form-input mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6 text-right">
                            <button type="submit" class="bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 py-2 px-4 rounded-md transition duration-200 ease-in-out">
                                Simpan Pengumuman
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
