<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Laporan') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Container untuk Informasi Laporan -->
                <div class="bg-white overflow-hidden shadow-md rounded-lg p-6">
                    <h3 class="font-semibold text-lg border-b pb-2 mb-4">Informasi Laporan</h3>
                    <p class="mb-2"><strong>Nama Pelapor:</strong> {{ $laporan->nama_pelapor }}</p>
                    <p class="mb-2"><strong>Tanggal Laporan:</strong> {{ $laporan->created_at->format('d-m-Y H:i') }}</p>
                    <p class="mb-2"><strong>Deskripsi:</strong> {{ $laporan->deskripsi }}</p>
                    <p class="font-semibold text-green-600"><strong>Status:</strong> {{ $laporan->status }}</p>
                </div>

                <!-- Container untuk Tindak Lanjut -->
                <div class="bg-white overflow-hidden shadow-md rounded-lg p-6">
                    <h3 class="font-semibold text-lg border-b pb-2 mb-4">Tindak Lanjut</h3>
                    <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST" class="mb-4">
                        @csrf
                        @method('PUT')
                        
                        <label for="status" class="block mb-2 font-medium">Pilih Status</label>
                        <select name="status" id="status" class="border-gray-300 rounded-md shadow-sm bg-white text-gray-900 mb-4 w-full">
                            <option value="baru" {{ $laporan->status === 'baru' ? 'selected' : '' }}>Baru</option>
                            <option value="diproses" {{ $laporan->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ $laporan->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>

                        <label for="catatan" class="block mb-2 font-medium">Catatan</label>
                        <textarea name="catatan" id="catatan" placeholder="Masukkan catatan..." class="border-gray-300 rounded-md shadow-sm bg-white text-gray-900 mb-4 w-full" rows="3">{{ old('catatan', $laporan->catatan) }}</textarea>
                        
                        <div class="flex justify-center">
                            <x-button type="submit" class="w-full">
                                Simpan
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
