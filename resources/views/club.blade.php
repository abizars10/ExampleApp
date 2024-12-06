<x-layout>
    <x-navbar></x-navbar>
    <x-header>{{ $title }}</x-header>
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <table class="border border-separate border-slate-500">
            <thead>
                <tr>
                    <th class="border border-slate-600">Nama Club</th>
                    <th class="border border-slate-600">City</th>
                    <th class="border border-slate-600">Stadium</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clubs as $club)
                    <tr>
                        <td class="px-2 border border-slate-700">{{ $club->name }}</td>
                        <td class="px-2 border border-slate-700">{{ $club->city }}</td>
                        <td class="px-2 border border-slate-700">{{ $club->stadium }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
