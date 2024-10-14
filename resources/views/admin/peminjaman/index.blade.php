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
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
                    <table class="min-w-full bg-white display" id="myTable">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Fasilitas</th>
                                <th class="px-6 py-3">Tanggal Peminjaman</th>
                                <th class="px-6 py-3">Tanggal Pengembalian</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $item)
                                <tr>
                                    <td class="px-6 py-4">{{ $item->nama }}</td>
                                    <td class="px-6 py-4">{{ $item->fasilitas }}</td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">{{ $item->status }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.peminjaman.edit', $item->id) }}"
                                            class="text-blue-500">Edit</a>
                                        <form action="{{ route('admin.peminjaman.destroy', $item->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">Hapus</button>
                                        </form>
                                    </td>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
