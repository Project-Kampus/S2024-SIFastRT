<x-app-layout>
    <div class="relative bg-cover bg-center py-60" style="background-image: url('{{ asset('images/bg .jpg') }}');">
        <!-- Overlay warna gelap untuk meningkatkan kontras -->
        <div class="absolute inset-0 bg-black opacity-40"></div>

        <!-- Konten hero -->
        <div class="relative container mx-auto px-6 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 drop-shadow-lg leading-tight">
                Selamat Datang di {{ config('app.name') }}
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto mb-10 drop-shadow-md">
                Kami senang Anda bergabung dengan kami. Jelajahi informasi terkini dan berbagai fitur yang tersedia di
                website ini.
            </p>

            <!-- Tombol input NIK -->
            <x-nav-link :href="route('pengumuman.index')" :active="request()->routeIs('pengumuman.index')"
                class="inline-block bg-blue-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105">
                {{ __('Pengumuman') }}
            </x-nav-link>
        </div>
    </div>


    <div class="pt-12" x-data="{
        showModal: false,
        modalData: { judul: '', isi: '', tanggal: '', tanggal_berakhir: '', lokasi: '', gambar: '', kontak: '' }
    }" @keydown.escape.window="showModal = false">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Daftar Pengumuman</h2>

                    <!-- Grid Pengumuman -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($pengumumans as $item)
                            <div class="bg-gradient-to-br from-white via-gray-100 to-gray-200 rounded-lg shadow-lg overflow-hidden 
                                    transform hover:scale-105 hover:shadow-2xl transition duration-300 cursor-pointer"
                                @click="showModal = true; modalData = { 
                                 judul: '{{ $item->judul }}', 
                                 isi: '{{ $item->isi }}', 
                                 tanggal: '{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') : '-' }}', 
                                 tanggal_berakhir: '{{ $item->tanggal_berlaku ? \Carbon\Carbon::parse($item->tanggal_berlaku)->format('d-m-Y') : '-' }}', 
                                 lokasi: '{{ $item->lokasi }}', 
                                 gambar: '{{ $item->gambar ? asset('storage/' . $item->gambar) : '' }}', 
                                 kontak: '{{ $item->kontak }}' 
                             }">
                                <div class="w-full h-48 bg-gray-100 overflow-hidden">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Pengumuman"
                                            class="w-full h-full object-cover object-center transition-transform duration-300 hover:scale-110">
                                    @else
                                        <div class="flex items-center justify-center w-full h-full text-gray-400">
                                            <i class="fas fa-bullhorn text-5xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-bold text-gray-800 truncate">{{ $item->judul }}</h3>
                                    <p class="text-gray-600 mt-2">{{ Str::limit($item->isi, 80) }}</p>
                                    <div class="flex items-center text-gray-500 mt-2 text-sm gap-1">
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') : '-' }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Placeholder Data Kosong -->
                    @if ($pengumumans->isEmpty())
                        <div class="flex flex-col items-center mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-gray-300 mb-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16l-4-4m0 0l4-4m-4 4h16M16 8v8" />
                            </svg>
                            <p class="text-gray-600 text-lg">Belum ada pengumuman yang tersedia saat ini.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal untuk Detail Pengumuman -->
        <div x-show="showModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 transition-opacity"
            @click.self="showModal = false" x-cloak>
            <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6 relative transform transition-all scale-95"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                <div class="bg-gradient-to-r from-indigo-500 to-blue-600 rounded-t-lg -mx-6 -mt-6 px-6 py-4">
                    <h3 class="text-xl font-bold text-white" x-text="modalData.judul"></h3>
                </div>
                <!-- Tombol Close (X) -->
                <button @click="showModal = false"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 p-1 rounded-full focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="mt-4">
                    <template x-if="modalData.gambar">
                        <img :src="modalData.gambar" alt="Gambar Pengumuman"
                            class="w-full h-48 object-cover mb-4 rounded-lg shadow-md">
                    </template>
                    <p class="text-gray-600 mb-4" x-text="modalData.isi"></p>
                    <div class="text-sm text-gray-500 space-y-2">
                        <p><i class="fas fa-calendar-alt"></i> Tanggal: <span x-text="modalData.tanggal"></span></p>
                        <p><i class="fas fa-hourglass-end"></i> Berlaku Sampai: <span
                                x-text="modalData.tanggal_berakhir"></span></p>
                        <p><i class="fas fa-map-marker-alt"></i> Lokasi: <span x-text="modalData.lokasi"></span></p>
                        <p><i class="fas fa-phone-alt"></i> Kontak: <span x-text="modalData.kontak"></span></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Tentang Saya Section -->
    <div class="py-12 bg-[#FFE1FF]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 flex flex-col md:flex-row items-center gap-8">
                    <section id="about-us" class="flex flex-col md:flex-row w-full">
                        <div class="md:w-1/2 flex justify-center mb-6 md:mb-0">
                            <img src="{{ asset('images/logo 1.png') }}" alt="About Us"
                                class="w-3/4 md:w-2/3 lg:w-2/3 xl:w-1/2 rounded-lg shadow-lg transform transition-all hover:scale-105"
                                style="height: fit-content">
                        </div>
                        <div class="md:w-1/2 text-gray-800">
                            <h2 class="text-3xl font-bold mb-6">Tentang Inforpem</h2>
                            <p class="text-lg mb-4">
                                <strong>Inforpem</strong> (Informasi Pengumuman) adalah aplikasi yang dirancang untuk
                                memudahkan pengelolaan dan distribusi pengumuman kepada warga di tingkat RT (Rukun
                                Tetangga). Aplikasi ini memungkinkan ketua RT untuk menyampaikan berbagai pengumuman
                                penting, baik terkait kegiatan lingkungan, sosial, maupun informasi lainnya yang perlu
                                diketahui oleh warga setempat.
                            </p>
                            <p class="text-lg mb-4">
                                Pengumuman-pengumuman yang disampaikan melalui <strong>Inforpem</strong> dapat diakses
                                oleh dua jenis pengguna:
                                <strong>Pak RT</strong> sebagai admin yang memiliki akses penuh untuk membuat dan
                                mengelola pengumuman, serta
                                <strong>Guest</strong> yang hanya dapat melihat pengumuman yang telah dipublikasikan
                                tanpa dapat mengedit atau menambahkan pengumuman.
                            </p>
                            <p class="text-lg mb-4">
                                <strong>RT:</strong> RT 04 / RW 04<br>
                                <strong>Nama Pak RT:</strong> Tabri <br>
                                <strong>Alamat:</strong> Jl. nes 11 sei buluh nes 5 desa petajen<br>
                                <strong>Kontak Pak RT:</strong> 082399106486<br>
                                <strong>Email:</strong>pakrt@gmail.com
                            </p>
                            <p class="text-lg mb-4">
                                Aplikasi <strong>Inforpem</strong> berfungsi sebagai sarana efektif bagi Pak RT untuk
                                menginformasikan warga terkait kegiatan penting di lingkungan RT, termasuk pengumuman
                                acara, kebijakan, atau perubahan penting lainnya. Pengguna dengan akses Guest hanya
                                dapat melihat pengumuman yang tersedia tanpa kemampuan untuk mengedit data.
                            </p>
                        </div>


                    </section>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
