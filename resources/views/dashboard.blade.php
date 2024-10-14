<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Selamat Datang di RT 17') }}
        </h2>
        <h3 class="font-semibold text-l text-gray-800 leading-tight">
            {{ __('Membangun Komunitas yang Harmonis dan Sejahtera') }}
        </h3>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-row items-center gap-2">
                    <img src="{{ asset('images/D1.png') }}" alt="Deskripsi Gambar" class="w-50 h-auto">
                    <img src="{{ asset('images/D2.png') }}" alt="Deskripsi Gambar" class="w-50 h-auto">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
