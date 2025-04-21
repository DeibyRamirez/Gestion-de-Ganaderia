@props([
    'href',
    'icon',
    'label',
])

@php
    $active = request()->is(trim($href, '/')) || request()->is(trim($href, '/') . '/*');
@endphp

<a href="{{ $href }}"
   class="flex items-center gap-2 px-4 py-2 rounded-md transition-all
          {{ $active ? 'bg-emerald-100 text-emerald-700 font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
    <x-dynamic-component :component="'lucide-' . $icon" class="w-4 h-4" />
    <span>{{ $label }}</span>
</a>
