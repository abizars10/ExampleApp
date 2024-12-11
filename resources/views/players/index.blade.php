<x-layout>
    <x-navbar></x-navbar>
    <x-header>{{ $title }}</x-header>
    <div class="px-4 py-6 pb-20 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <!-- Tombol Buat Player -->
        <a href="{{ route('players.create') }}"
            class="flex justify-center w-40 px-3 py-2 mb-2 text-sm font-semibold text-white bg-teal-700 rounded-md shadow-sm hover:bg-teal-500">
            Create Player
        </a>

        <!-- Tabel Players -->
        <table class="w-full mb-2 overflow-hidden border-2 border-teal-700">
            <thead class="text-white bg-teal-700">
                <tr>
                    <th class="px-4 py-2 border border-teal-800">Player Name</th>
                    <th class="px-4 py-2 border border-teal-800">Position</th>
                    <th class="px-4 py-2 border border-teal-800">National</th>
                    <th class="px-4 py-2 border border-teal-800">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($players as $player)
                    <tr class="even:bg-gray-100 odd:bg-white">
                        <td class="px-4 py-2 border border-teal-800">{{ $player->name }}</td>
                        <td class="px-4 py-2 border border-teal-800">{{ $player->position }}</td>
                        <td class="px-4 py-2 border border-teal-800">{{ $player->national }}</td>
                        <td class="px-2 py-2 text-center border-t border-b border-teal-800">
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
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500 border border-teal-800">
                            No players available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div>
            {{ $players->links() }}
        </div>

    </div>
</x-layout>
