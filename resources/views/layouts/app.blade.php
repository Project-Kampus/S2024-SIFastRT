<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'xxxxx') }}</title>
    <link rel="icon" href="{{ asset('images/logo 2.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/gaya.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex flex-col">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-green shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->

        <body class="bg-white text-gray-800">

            <!-- Footer Section -->
            <footer class="bg-[#4A90E2] text-white py-12">
                <div class="container mx-auto px-6">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                        <div class="flex items-center justify-center md:justify-start">
                            <x-application-logo class="w-20 h-20 fill-current text-white" />
                        </div>
                        <div class="flex flex-col items-center md:items-start">
                            <p class="text-lg mb-2 text-white"><b>Alamat:</b> Jl. Contoh No. 123, Kota, Provinsi</p>
                            <p class="text-lg mb-2 text-white"><b>Hubungi Kami:</b> 0852xxxxxx</p>
                            <p class="text-lg text-white"><b>Email:</b> xxxx@gmail.com</p>
                        </div>
                    </div>
                    <div class="my-6 border-t border-[#3A80B5]"></div>
                    <div class="text-center">
                        <p class="text-gray-200">&copy; 2024 xxxx. Semua Hak Dilindungi.</p>
                    </div>
                </div>
            </footer>
        </body>

    </div>
</body>

</html>
