<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengumuman') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ showModal: false, modalData: { judul: '', isi: '', tanggal: '', tanggal_berakhir: '', lokasi: '', gambar: '', kontak: '' } }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Tabel pengumuman -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($pengumumans as $item)
                            <div 
                                class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-lg transition"
                                @click="showModal = true; modalData = { judul: '{{ $item->judul }}', isi: '{{ $item->isi }}', tanggal: '{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') : '-' }}', tanggal_berakhir: '{{ $item->tanggal_berlaku ? \Carbon\Carbon::parse($item->tanggal_berlaku)->format('d-m-Y') : '-' }}', lokasi: '{{ $item->lokasi }}', gambar: '{{ $item->gambar ? asset('storage/' . $item->gambar) : '' }}', kontak: '{{ $item->kontak }}' }"
                            >
                                <!-- Menampilkan gambar pengumuman atau gambar default jika tidak ada -->
                                <div class="w-full h-48">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/'.$item->gambar) }}" alt="Gambar Pengumuman" class="w-full h-full object-cover object-center">
                                    @else
                                        <img src="default-image.jpg" alt="Gambar Pengumuman" class="w-full h-full object-cover object-center">
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="text-xl font-semibold text-gray-800">{{ $item->judul }}</h3>
                                    <p class="text-gray-600 mt-2">{{ Str::limit($item->isi, 100) }}</p>
                                    <p class="text-gray-500 mt-2 text-sm">Tanggal Pengumuman: {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') : '-' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- No Announcements Message -->
                    @if($pengumumans->isEmpty())
                        <p class="text-gray-600 mt-4">Tidak ada pengumuman yang tersedia saat ini.</p>
                    @endif

                    <!-- Pagination Links -->
                    <div class="mt-6">
                        {{ $pengumumans->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal untuk detail pengumuman -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
            <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6 relative">
                <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">X</button>
                <div class="mt-4">
                    <template x-if="modalData.gambar">
                        <img :src="modalData.gambar" alt="Gambar Pengumuman" class="w-full h-48 object-cover mb-4">
                    </template>
                    <h3 class="text-xl font-semibold text-gray-800" x-text="modalData.judul"></h3>
                    <p class="text-gray-600 mt-2" x-text="modalData.isi"></p>
                    <p class="text-gray-500 mt-4 text-sm">Tanggal: <span x-text="modalData.tanggal"></span></p>
                    <p class="text-gray-500 mt-2 text-sm">Tanggal Berlaku Sampai: <span x-text="modalData.tanggal_berakhir"></span></p>
                    <p class="text-gray-500 mt-2 text-sm">Lokasi: <span x-text="modalData.lokasi"></span></p>
                    <p class="text-gray-500 mt-2 text-sm">Kontak: <span x-text="modalData.kontak"></span></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
