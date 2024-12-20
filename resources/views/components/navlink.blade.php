@props(['active' => false])
<a {{ $attributes }} href="/dashboard"
    class="{{ $active ? 'bg-teal-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block px-3 py-2 text-sm font-medium rounded-md"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}
</a>
