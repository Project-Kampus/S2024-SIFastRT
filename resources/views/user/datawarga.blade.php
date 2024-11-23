<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Informasi Data {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <!-- Menampilkan Error jika ada -->
                    @if(session('error'))
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Menampilkan Data Warga jika ada -->
                    @if($dataWarga)
                        <div class="space-y-2">
                            <p><strong>Nik:</strong> {{ $dataWarga->nik }}</p>
                            <p><strong>Nama:</strong> {{ $dataWarga->nama }}</p>
                            <p><strong>Tempat Lahir:</strong> {{ $dataWarga->tempat_lahir }}</p>
                            <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->format('d F Y') }}</p>
                            <p><strong>Jenis Kelamin:</strong> {{ $dataWarga->jenis_kelamin }}</p>
                            <p><strong>Alamat:</strong> {{ $dataWarga->alamat }}</p>
                            <p><strong>Agama:</strong> {{ $dataWarga->agama }}</p>
                            <p><strong>Status Perkawinan:</strong> {{ $dataWarga->status_perkawinan }}</p>
                            <p><strong>Pekerjaan:</strong> {{ $dataWarga->pekerjaan }}</p>
                        </div>
                    @else
                        <p class="text-red-500">Data warga tidak ditemukan.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
