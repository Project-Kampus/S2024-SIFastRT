<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajukan Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-[#C4DFE6] text-center p-4 mb-4">
                        <h1 class="text-2xl font-bold">Detail Fasilitas</h1>
                    </div>
                    @if (session('status'))
                        <div class="bg-green-500 text-white p-4 mb-4 rounded">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf

                        <div class="mb-4 flex items-center">
                            <label for="nama" class="w-1/3">Nama:</label>
                            <input type="text" name="nama" id="nama" value="{{ auth()->user()->name }}" class="border rounded-md w-2/3 bg-[#C4DFE6]" readonly>
                        </div>

                        <div class="mb-4 flex items-center">
                            <label for="fasilitas" class="w-1/3">Fasilitas:</label>
                            <select name="fasilitas" id="fasilitas" class="border rounded-md w-2/3 bg-[#C4DFE6]" required>
                                <option value="">Pilih Fasilitas</option>
                                <option value="tenda">Tenda</option>
                                <option value="sound system">Sound System</option>
                                <option value="kursi">Kursi</option>
                            </select>
                        </div>

                        <div class="mb-4 flex items-center">
                            <label for="tanggal_peminjaman" class="w-1/3">Tanggal Peminjaman:</label>
                            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="border rounded-md w-2/3 bg-[#C4DFE6]" required>
                        </div>

                        <div class="mb-4 flex items-center">
                            <label for="tanggal_pengembalian" class="w-1/3">Tanggal Pengembalian:</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="border rounded-md w-2/3 bg-[#C4DFE6]" required>
                        </div>

                        <div class="flex justify-center">
                            <x-button type="submit">
                                Kirim
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
