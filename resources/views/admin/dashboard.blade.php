<x-app-layout>
    <div class="relative bg-cover bg-center py-60" style="background-image: url('{{ asset('images/home-bg.jpg') }}');">
        <!-- Overlay warna gelap untuk meningkatkan kontras -->
        <div class="absolute inset-0 bg-black opacity-40"></div>

        <!-- Konten hero -->
        <div class="relative container mx-auto px-6 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 drop-shadow-lg leading-tight">
                Selamat Datang di {{ config('app.name') }}
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto mb-10 drop-shadow-md">
                Selamat datang di Sistem Informasi Pengelolaan Data Warga. Kami menyediakan layanan yang memudahkan Anda
                dalam mengelola data warga.
            </p>

            <!-- Tombol input NIK -->
            <x-nav-link :href="route('admin.verifyNikForm')" :active="request()->routeIs('admin.verifyNikForm')"
                class="inline-block bg-blue-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105">
                {{ __('Verifikasi NIK') }}
            </x-nav-link>
        </div>
    </div>

    <!-- Tentang Saya Section -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 flex flex-col md:flex-row items-center gap-8">
                    <section id="about-us" class="flex flex-col md:flex-row w-full">
                        <div class="md:w-1/2 flex justify-center mb-6 md:mb-0">
                            <img src="{{ asset('images/logo 2.png') }}" alt="About Us"
                                class="w-3/4 md:w-2/3 lg:w-2/3 xl:w-1/2 rounded-lg shadow-lg transform transition-all hover:scale-105"
                                style="height: fit-content !important;">
                        </div>

                        <div class="md:w-1/2 text-gray-800">
                            <h2 class="text-3xl font-bold mb-6">Tentang Saya</h2>
                            <h2 class="text-3xl font-bold mb-6">Tentang</h2>
                            <p class="text-lg mb-4">
                                <strong>Sipadu</strong> (Sistem Informasi Pengelolaan Data Warga dan Administrasi RT)
                                adalah aplikasi yang dikembangkan untuk memudahkan pengelolaan data warga di lingkungan
                                RT (Rukun Tetangga). Aplikasi ini membantu ketua RT dalam mencatat, mengelola, dan
                                memperbarui informasi warga, serta mempermudah administrasi yang terkait dengan kegiatan
                                sosial dan layanan di tingkat RT.
                            </p>
                            <p class="text-lg mb-4">
                                <strong>RT:</strong> RT 29 <br>
                                <strong>Nama Pak RT:</strong> Bapak H. Sugiyono<br>
                                <strong>Alamat:</strong> puri masurai ll
                                <br>
                                <strong>Kontak Pak RT:</strong> 0812-0000-2222<br>
                                <strong>Email:</strong> pakrt@gmail.com
                            </p>
                            <p class="text-lg mb-4">
                                Aplikasi Sipadu juga menyediakan fitur untuk pengajuan surat keterangan, laporan
                                kegiatan, dan berbagai keperluan administrasi lainnya yang dapat diakses oleh seluruh
                                warga RT. Dengan adanya sistem ini, diharapkan pelayanan kepada warga menjadi lebih
                                efisien dan terorganisir dengan baik.
                            </p>

                            <p class="text-lg">
                                Fitur utama dari website ini adalah pengelolaan data warga dan verifikasi NIK (Nomor
                                Induk Kependudukan).
                                Fitur verifikasi NIK memungkinkan warga untuk memasukkan NIK mereka, yang kemudian akan
                                diverifikasi oleh admin
                                sebelum diberikan akses untuk melihat data.
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
