<!-- resources/views/auth/request-nik.blade.php -->
<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded">
        <h2 class="text-2xl font-semibold mb-4">Masukkan NIK Anda</h2>
        <form method="POST" action="{{ route('nik.verify') }}">
            @csrf
            <div class="mb-4">
                <label for="nik" class="block text-gray-700">NIK</label>
                <input type="text" name="nik" id="nik" class="border border-gray-300 rounded w-full py-2 px-3 mt-1" required>
                @error('nik')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
</x-guest-layout>
