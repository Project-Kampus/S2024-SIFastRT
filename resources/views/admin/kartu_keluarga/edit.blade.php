<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kartu Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.kartu_keluarga.update', $kartuKeluarga->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nomor KK -->
                        <div class="mb-4">
                            <label for="nomor_kk" class="block text-sm font-medium text-gray-700">Nomor KK</label>
                            <input type="text" id="nomor_kk" name="nomor_kk"
                                value="{{ old('nomor_kk', $kartuKeluarga->nomor_kk) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('nomor_kk')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-4">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <input type="text" id="alamat" name="alamat"
                                value="{{ old('alamat', $kartuKeluarga->alamat) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('alamat')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kepala Keluarga -->
                        <div class="mb-4">
                            <label for="kepala_keluarga" class="block text-sm font-medium text-gray-700">Kepala
                                Keluarga</label>
                            <select id="kepala_keluarga" name="kepala_keluarga" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih Kepala Keluarga</option>
                                @foreach ($datawargas as $warga)
                                    <option value="{{ $warga->id }}"
                                        {{ old('kepala_keluarga', $kartuKeluarga->kepala_keluarga) == $warga->id ? 'selected' : '' }}>
                                        {{ $warga->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kepala_keluarga')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- RT/RW, Desa, Kecamatan, Kabupaten, Kode Pos, Provinsi -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="rt_rw" class="block text-sm font-medium text-gray-700">RT/RW</label>
                                <input type="text" id="rt_rw" name="rt_rw"
                                    value="{{ old('rt_rw', $kartuKeluarga->rt_rw) }}" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('rt_rw')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="desa_kelurahan"
                                    class="block text-sm font-medium text-gray-700">Desa/Kelurahan</label>
                                <input type="text" id="desa_kelurahan" name="desa_kelurahan"
                                    value="{{ old('desa_kelurahan', $kartuKeluarga->desa_kelurahan) }}" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('desa_kelurahan')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                                <input type="text" id="kecamatan" name="kecamatan"
                                    value="{{ old('kecamatan', $kartuKeluarga->kecamatan) }}" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('kecamatan')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="kabupaten_kota"
                                    class="block text-sm font-medium text-gray-700">Kabupaten/Kota</label>
                                <input type="text" id="kabupaten_kota" name="kabupaten_kota"
                                    value="{{ old('kabupaten_kota', $kartuKeluarga->kabupaten_kota) }}" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('kabupaten_kota')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos"
                                    value="{{ old('kode_pos', $kartuKeluarga->kode_pos) }}" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('kode_pos')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi"
                                    value="{{ old('provinsi', $kartuKeluarga->provinsi) }}" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('provinsi')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        @foreach ($datawargas as $warga)
                            <div class="flex items-center">
                                <input type="checkbox" id="anggota-{{ $warga->id }}" name="anggota[]"
                                    value="{{ $warga->id }}"
                                    {{ in_array($warga->id, old('anggota', $kartuKeluarga->anggotaKeluarga->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}
                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                <label for="anggota-{{ $warga->id }}" class="ml-2 text-sm text-gray-700">
                                    {{ $warga->nama }}
                                </label>
                            </div>
                        @endforeach


                        <!-- Tombol Simpan -->
                        <div class="mt-6">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
