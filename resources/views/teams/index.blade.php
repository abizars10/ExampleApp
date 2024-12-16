<x-layout>
    <x-navbar></x-navbar>
    <x-header>{{ $title }}</x-header>
    <div class="px-4 py-6 pb-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="text-xl font-bold tracking-tight text-gray-900">Create Team :</h1>
        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <div class="p-4 mb-4 border-2 border-teal-700 rounded-lg">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:items-center">
                    <!-- Klub Selection -->
                    <div>
                        <label for="club_id" class="block mb-2 font-medium text-gray-700">Choose Klub:</label>
                        <select name="club_id" id="club_id"
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
                            required>
                            <option value="" disabled selected>-- Select Klub --</option>
                            @foreach ($clubs as $club)
                                <option value="{{ $club->id }}">{{ Str::limit($club->name, 15) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Player Selection -->
                    <div>
                        <label for="player_id" class="block mb-2 font-medium text-gray-700">Choose Player:</label>
                        <select name="player_id" id="player_id"
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
                            required>
                            <option value="" disabled selected>-- Select Player --</option>
                            @foreach ($players as $player)
                                <option value="{{ $player->id }}">{{ $player->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Save Button -->
                    <div class="flex justify-start lg:justify-end">
                        <button type="submit"
                            class="w-full px-3 py-2 text-sm font-semibold text-white bg-teal-700 rounded-md shadow-sm lg:w-40 hover:bg-teal-500 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-teal-600">
                            Save Team
                        </button>
                    </div>
                </div>
            </div>

        </form>

        <!-- Tabel Players -->
        <table class="w-full mb-2 overflow-hidden border-2 border-teal-700">
            <thead class="text-white bg-teal-700">
                <tr>
                    <th class="px-4 py-2 border border-teal-800">Player Name</th>
                    <th class="px-4 py-2 border border-teal-800">Position</th>
                    <th class="px-4 py-2 border border-teal-800">National</th>
                    <th class="px-4 py-2 border border-teal-800">Club</th>
                    <th class="px-4 py-2 border border-teal-800">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr class="even:bg-gray-100 odd:bg-white">
                        <td class="px-4 py-2 border border-teal-800">{{ $team->player->name }}</td>
                        <td class="px-4 py-2 border border-teal-800">{{ $team->player->position }}</td>
                        <td class="px-4 py-2 border border-teal-800">{{ $team->player->national }}</td>
                        <td class="px-4 py-2 border border-teal-800">{{ $team->club->name }}</td>
                        {{-- <td class="px-2 py-2 text-center border-t border-b border-teal-800">
                            <div class="flex items-center justify-center space-x-2">
                                <!-- Tombol View -->
                                <a href="{{ route('players.show', $player->id) }}"
                                    class="text-green-700 hover:text-green-500" title="View Player">
                                    <i class="bx bx-show"></i>
                                </a>

                                <!-- Tombol Edit -->
                                <a href="{{ route('players.edit', $player->id) }}"
                                    class="text-blue-700 hover:text-blue-500" title="Edit Player">
                                    <i class="bx bxs-pencil"></i>
                                </a>

                                <!-- Tombol Delete -->
                                <form action="{{ route('players.destroy', $player->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this Player?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-700 hover:text-red-500"
                                        title="Delete Player">
                                        <i class="bx bxs-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
