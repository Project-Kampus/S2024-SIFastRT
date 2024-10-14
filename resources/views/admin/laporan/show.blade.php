<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Laporan') }}
        </h2>
    </x-slot>

    <div class="py-7">
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
                        
                        <div class="flex justify-center">
                            <x-button type="submit">
                                Simpan
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
