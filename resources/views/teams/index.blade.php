<x-layout>
    <x-navbar></x-navbar>
    <x-header>{{ $title }}</x-header>
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <h1>Create Team</h1>
        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            {{-- <div>
                    <label for="team_name">Team Name:</label>
                    <input type="text" name="team_name" id="team_name" required>
                </div> --}}

            <div>
                <label for="club_id">Choose Klub:</label>
                <select name="club_id" id="club_id" required>
                    <option value="" disabled selected>-- Select Klub --</option>
                    @foreach ($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="player_id">Choose Player:</label>
                <select name="player_id" id="player_id" required>
                    <option value="" disabled selected>-- Select Player --</option>
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Save Team</button>
        </form>
</x-layout>
