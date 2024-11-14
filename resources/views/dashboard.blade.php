    <x-layout>
        <div class="m-4">
            <h1>Welcome to the Dashboard</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-1 rounded-full bg-slate-500">Logout</button>
            </form>
        </div>
    </x-layout>
