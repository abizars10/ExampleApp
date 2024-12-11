<x-layout>
    <x-navbar></x-navbar>
    <x-header>{{ $title }}</x-header>
    <div class="max-w-4xl px-4 py-6 mx-auto bg-white rounded shadow-md sm:px-6 lg:px-8 lg:mt-10">
        <h2 class="mb-4 text-lg font-semibold text-gray-700">Create New Player</h2>

        <form action="{{ route('players.store') }}" method="POST">
            @csrf

            <!-- Player Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Player Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="block w-full px-3 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500"
                    placeholder="Enter player name" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Position -->
            <div class="mb-4">
                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                <input type="text" name="position" id="position" value="{{ old('position') }}"
                    class="block w-full px-3 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500"
                    placeholder="Enter player position" required>
                @error('position')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- National -->
            <div class="mb-4">
                <label for="national" class="block text-sm font-medium text-gray-700">Nationality</label>
                <input type="text" name="national" id="national" value="{{ old('national') }}"
                    class="block w-full px-3 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500"
                    placeholder="Enter player nationality" required>
                @error('national')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 font-semibold text-white bg-teal-700 rounded-md shadow-sm hover:bg-teal-500">
                    Save Player
                </button>
            </div>
        </form>
    </div>
</x-layout>
