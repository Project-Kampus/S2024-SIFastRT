<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pengumuman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="judul" class="block text-gray-700">Judul Pengumuman</label>
                                <input type="text" id="judul" name="judul" class="form-input mt-2 block w-full" value="{{ $pengumuman->judul }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="block text-gray-700">Tanggal Pengumuman</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-input mt-2 block w-full" value="{{ $pengumuman->tanggal ? \Carbon\Carbon::parse($pengumuman->tanggal)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_berlaku" class="block text-gray-700">Tanggal Berlaku</label>
                                <input type="date" id="tanggal_berlaku" name="tanggal_berlaku" class="form-input mt-2 block w-full" value="{{ $pengumuman->tanggal_berlaku ? \Carbon\Carbon::parse($pengumuman->tanggal_berlaku)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="lokasi" class="block text-gray-700">Lokasi</label>
                                <input type="text" id="lokasi" name="lokasi" class="form-input mt-2 block w-full" value="{{ $pengumuman->lokasi }}">
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="block text-gray-700">Gambar / Banner</label>
                                <input type="file" id="gambar" name="gambar" class="form-input mt-2 block w-full">
                                @if($pengumuman->gambar)
                                    <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="Banner" class="mt-4 w-32">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="kontak" class="block text-gray-700">Kontak</label>
                                <input type="text" id="kontak" name="kontak" class="form-input mt-2 block w-full" value="{{ $pengumuman->kontak }}">
                            </div>
                            <div class="form-group col-span-2">
                                <label for="isi" class="block text-gray-700">Isi Pengumuman</label>
                                <textarea id="isi" name="isi" rows="4" class="form-input mt-2 block w-full" required>{{ $pengumuman->isi }}</textarea>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Pengumuman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
