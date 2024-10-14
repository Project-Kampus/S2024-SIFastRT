<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajukan Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('status'))
                        <div class="bg-green-500 text-white p-4 mb-4 rounded">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" id="nama" value="{{ auth()->user()->name }}" class="border rounded-md w-full" readonly>
                        </div>

                        <div>
                            <label for="fasilitas">Fasilitas:</label>
                            <select name="fasilitas" id="fasilitas" class="border rounded-md w-full" required>
                                <option value="">Pilih Fasilitas</option>
                                <option value="tenda">Tenda</option>
                                <option value="sound system">Sound System</option>
                                <option value="kursi">Kursi</option>
                            </select>
                        </div>

                        <div>
                            <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
                            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="border rounded-md w-full" required>
                        </div>

                        <div>
                            <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="border rounded-md w-full" required>
                        </div>

                        <button type="submit" class="mt-4 bg-blue-500 text-white rounded-md px-4 py-2">Ajukan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
