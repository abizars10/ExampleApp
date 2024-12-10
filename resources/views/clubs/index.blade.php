<x-layout>
    <x-navbar></x-navbar>
    <x-header>{{ $title }}</x-header>
    <div class="px-4 py-6 pb-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Tombol Buat Club -->
        <a href="{{ route('club.create') }}"
            class="flex justify-center w-40 px-3 py-2 mb-2 text-sm font-semibold text-white bg-teal-700 rounded-md shadow-sm hover:bg-teal-500 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-teal-600">
            Create Club
        </a>

        <!-- Tabel Clubs -->
        <table class="w-full mb-2 overflow-hidden border-2 border-teal-700">
            <thead class="text-white bg-teal-700">
                <tr>
                    <th class="px-4 py-2 border border-teal-800">Nama Club</th>
                    <th class="px-4 py-2 border border-teal-800">City</th>
                    <th class="px-4 py-2 border border-teal-800">Stadium</th>
                    <th class="px-4 py-2 border border-teal-800">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clubs as $club)
                    <tr class="even:bg-gray-100 odd:bg-white">
                        <td class="px-4 py-2 border border-teal-800">{{ $club->name }}</td>
                        <td class="px-4 py-2 border border-teal-800">{{ $club->city }}</td>
                        <td class="px-4 py-2 border border-teal-800">{{ $club->stadium }}</td>
                        <td class="px-2 py-2 text-center border-t border-b border-teal-800">
                            <div class="flex items-center justify-center space-x-2">
                                <!-- Tombol View -->
                                <a href="team" class="text-green-700 hover:text-green-500" title="View Club">
                                    <i class="bx bx-show"></i>
                                </a>
                                <!-- Tombol Edit -->
                                <a href="{{ route('club.edit', $club->slug) }}"
                                    class="text-blue-700 hover:text-blue-500" title="Edit Club">
                                    <i class="bx bxs-pencil"></i>
                                </a>
                                <!-- Tombol Delete -->
                                <form action="{{ route('club.destroy', $club->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this club?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-700 hover:text-red-500" title="Delete Club">
                                        <i class="bx bxs-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500 border border-teal-800">
                            No clubs available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div>
            {{ $clubs->links() }}
        </div>
    </div>
</x-layout>
