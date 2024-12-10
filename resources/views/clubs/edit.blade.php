<x-layout>
    <x-navbar></x-navbar>
    <x-header>{{ $title }}</x-header>
    <div class="px-4 py-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col justify-center min-h-full px-6 py-2 lg:px-8">
            <div class="p-4 mt-10 border-4 border-teal-700 rounded-lg sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-4" action="{{ route('club.update', $club->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="block font-medium text-gray-900 text-sm/6">Club Name</label>
                        <div class="mt-2">
                            <input type="name" name="name" id="name" value="{{ $club->name }}" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="city" class="block font-medium text-gray-900 text-sm/6">City</label>
                        <div class="mt-2">
                            <input type="city" name="city" id="city" value="{{ $club->city }}" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="stadium" class="block font-medium text-gray-900 text-sm/6">Stadium</label>
                        <div class="mt-2">
                            <input type="stadium" name="stadium" id="stadium" value="{{ $club->stadium }}" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-teal-700 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Added</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-layout>
