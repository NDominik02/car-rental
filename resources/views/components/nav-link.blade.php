@props(['active' => false])

<a class="{{ $active ? ' text-white mb-6 relative inline-block after:absolute after:left-0 after:bottom-0 after:w-full after:border-b-2 after:border-green-800' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
   aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}
>{{ $slot }}</a>
