@props(['nyala' => false])
<a {{ $attributes }}
    class="{{ $nyala ? 'bg-blue-500 text-white' : 'text-gray-300 hover:bg-blue-800 hover:text-white' }} rounded-md  px-3 py-2 text-sm font-medium "
    aria-current="{{ $nyala ? 'page' : false }}">{{ $slot }}</a>
