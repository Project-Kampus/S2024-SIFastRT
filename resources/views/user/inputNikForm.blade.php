<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Masukkan NIK Anda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Form Input NIK</h3>

                    {{-- Success or Error Messages --}}
                    @if(session('status'))
                        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Form Input NIK --}}
                    <form action="{{ route('user.storeNik') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="nik" class="block text-gray-700 font-medium">NIK</label>
                            <input type="text" id="nik" name="nik" class="form-input mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                            @error('nik')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-1/8 bg-blue-500 hover:bg-blue-600 text-white py-3 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
