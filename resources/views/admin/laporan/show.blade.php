<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg">Informasi Laporan</h3>
                    <p><strong>Nama Pelapor:</strong> {{ $laporan->nama_pelapor }}</p>
                    <p><strong>Tanggal Laporan:</strong> {{ $laporan->created_at->format('d-m-Y H:i') }}</p>
                    <p><strong>Deskripsi:</strong> {{ $laporan->deskripsi }}</p>
                    <p><strong>Status:</strong> {{ $laporan->status }}</p>

                    <h3 class="font-semibold text-lg mt-4">Tindak Lanjut</h3>
                    <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST" class="mb-4">
                        @csrf
                        @method('PUT')
                        
                        <select name="status" id="status" class="border-gray-300 rounded-md shadow-sm bg-white text-gray-900">
                            <option value="baru" {{ $laporan->status === 'baru' ? 'selected' : '' }}>Baru</option>
                            <option value="diproses" {{ $laporan->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ $laporan->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>

                        <textarea name="catatan" placeholder="Masukkan catatan..." class="border-gray-300 rounded-md shadow-sm bg-white text-gray-900 mt-2 w-full" rows="3">{{ old('catatan', $laporan->catatan) }}</textarea>
                        
                        <button type="submit" id="submitButton" class="mt-2 bg-blue-500 text-white rounded-md px-4 py-2 hidden">Simpan</button>
                    </form>

                    <script>
                        // Ambil elemen status dan tombol submit
                        const statusSelect = document.getElementById('status');
                        const submitButton = document.getElementById('submitButton');

                        // Tambahkan event listener untuk status select
                        statusSelect.addEventListener('change', function() {
                            if (this.value === 'selesai') {
                                submitButton.classList.remove('hidden'); // Tampilkan tombol hanya jika 'selesai' dipilih
                            } else {
                                submitButton.classList.add('hidden'); // Sembunyikan tombol jika bukan 'selesai'
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
