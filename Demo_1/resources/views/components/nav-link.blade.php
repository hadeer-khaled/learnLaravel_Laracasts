@props(['active' => false])

<a href="{{ $attributes->get('href') }}" 
   class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
    {{ $slot }}
</a>
