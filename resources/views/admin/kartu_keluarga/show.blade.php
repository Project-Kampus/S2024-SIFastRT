<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kartu Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <!-- Kartu Keluarga Header -->
                <div class="text-center border-b pb-4 mb-6">
                    <h3 class="text-2xl font-bold">KARTU KELUARGA</h3>
                    <p class="text-lg">Nomor Kartu Keluarga: <strong>{{ $kartuKeluarga->nomor_kk }}</strong></p>
                </div>

                <!-- Kepala Keluarga and Address Section -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <strong>Nama Kepala Keluarga:</strong>
                        <p>{{ $kartuKeluarga->kepalaKeluarga->nama }}</p>
                    </div>
                    <div>
                        <strong>Alamat:</strong>
                        <p>{{ $kartuKeluarga->alamat }}</p>
                    </div>
                    <div>
                        <strong>RT/RW:</strong>
                        <p>{{ $kartuKeluarga->rt_rw }}</p>
                    </div>
                    <div>
                        <strong>Desa/Kelurahan:</strong>
                        <p>{{ $kartuKeluarga->desa_kelurahan }}</p>
                    </div>
                    <div>
                        <strong>Kecamatan:</strong>
                        <p>{{ $kartuKeluarga->kecamatan }}</p>
                    </div>
                    <div>
                        <strong>Kabupaten/Kota:</strong>
                        <p>{{ $kartuKeluarga->kabupaten_kota }}</p>
                    </div>
                    <div>
                        <strong>Kode Pos:</strong>
                        <p>{{ $kartuKeluarga->kode_pos }}</p>
                    </div>
                    <div>
                        <strong>Provinsi:</strong>
                        <p>{{ $kartuKeluarga->provinsi }}</p>
                    </div>
                </div>

                <!-- Anggota Keluarga Section -->
                <div class="mt-8">
                    <h4 class="text-lg font-semibold">Anggota Keluarga</h4>
                    <ul class="list-disc pl-5 mt-2">
                        @foreach($kartuKeluarga->anggotaKeluarga as $anggota)
                            <li>{{ $anggota->nama }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
