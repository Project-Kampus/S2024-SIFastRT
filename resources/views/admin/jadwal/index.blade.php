<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Sukses!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <div class="p-6 text-gray-900">
                    <a href="{{ route('admin.jadwal.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Jadwal</a>

                    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
                    <table class="min-w-full bg-white display" id="myTable">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Tanggal</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwals as $jadwal)
                                <tr>
                                    <td class="px-6 py-4">{{ $jadwal->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                        {{ $jadwal->tanggal->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}"
                                            class="text-blue-500">Edit</a>
                                        <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Hapus</button>
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
