<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Pesan Sukses --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif 
                    
                    {{-- Tombol Ajukan Peminjaman --}}
                    <a href="{{ route('peminjaman.create') }}" class="inline-block mb-4 bg-blue-500 text-white rounded-md px-4 py-2">Ajukan Peminjaman</a>

                    {{-- Tabel Daftar Peminjaman --}}
                    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
                <table class="min-w-full bg-white display" id="myTable">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Fasilitas</th>
                                <th class="px-6 py-3">Tanggal Peminjaman</th>
                                <th class="px-6 py-3">Tanggal Pengembalian</th>
                                <th class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $peminjamanItem) <!-- Ubah nama variabel di sini -->
                                <tr>
                                    <td class="px-6 py-4">{{ $peminjamanItem->nama }}</td> <!-- Gunakan $peminjamanItem -->
                                    <td class="px-6 py-4">{{ $peminjamanItem->fasilitas }}</td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($peminjamanItem->tanggal_peminjaman)->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($peminjamanItem->tanggal_pengembalian)->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">{{ $peminjamanItem->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                        crossorigin="anonymous"></script>
                    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('#myTable').DataTable();

                            // Cek jika ada pesan sukses
                            var successMessage = $('#success-message');
                            if (successMessage.length) {
                                // Setelah 3 detik, sembunyikan pesan
                                setTimeout(function() {
                                    successMessage.fadeOut('slow');
                                }, 3000); // 3000ms = 3 detik
                            }
                        });
                    </script>

                    {{-- Menampilkan pesan jika tidak ada data --}}
                    @if ($peminjaman->isEmpty())
                        <div class="mt-4 text-gray-600">
                            Belum ada peminjaman yang diajukan.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 