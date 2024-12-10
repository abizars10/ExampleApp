<x-layout>
    <x-navbar></x-navbar>
    <x-header>{{ $title }}</x-header>
    <div class="px-4 py-6 pb-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <a href="{{ route('club.create') }}"
            class="flex w-40 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mb-2">Create
            Club</a>
        <table class="w-full mb-1 border border-separate border-slate-500">
            <thead>
                <tr>
                    <th class="border border-slate-600">Nama Club</th>
                    <th class="border border-slate-600">City</th>
                    <th class="border border-slate-600">Stadium</th>
                    <th class="border border-slate-600">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clubs as $club)
                    <tr>
                        <td class="px-2 border border-slate-700">{{ $club->name }}</td>
                        <td class="px-2 border border-slate-700">{{ $club->city }}</td>
                        <td class="px-2 border border-slate-700">{{ $club->stadium }}</td>
                        <td class="flex justify-center gap-2 px-1 border border-slate-700">
                            <a href="team" class="text-green-700"><i class='bx bx-show'></i></a>
                            <a href="{{ route('club.edit', $club->id) }}" class="text-blue-700"><i class='bx bxs-pencil'></i></i></a>
                            <form action="{{ route('club.destroy', $club->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-700"><i class='bx bxs-trash'></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $clubs->links() }}
    </div>
</x-layout>
