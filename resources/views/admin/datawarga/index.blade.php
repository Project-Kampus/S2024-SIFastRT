<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Warga') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <!-- Kontainer untuk Total Warga -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <span class="font-semibold">Total Warga: {{ $warga->count() }}</span>
            </div>

            <!-- Kontainer untuk Tabel -->

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 w-full ml-4">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Sukses!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <a href="{{ route('admin.datawarga.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Tambah Warga</a>

                <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
                <table class="min-w-full bg-white display" id="myTable">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">NIK</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Tanggal Lahir</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warga as $w)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $w->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $w->nik }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($w->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $w->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.datawarga.edit', $w->id) }}"
                                        class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="{{ route('admin.datawarga.destroy', $w->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
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
</x-app-layout>
