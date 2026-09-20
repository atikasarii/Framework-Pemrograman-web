@props(['status'])

@php
    $colors = [
        'Aman' => 'bg-green-100 text-green-700',
        'Menipis' => 'bg-yellow-100 text-yellow-700',
        'Habis' => 'bg-red-100 text-red-700',
    ];
    $class = $colors[$status] ?? 'bg-gray-100 text-gray-700';
@endphp

<span {{ $attributes->merge(['class' => "inline-block px-2 py-1 text-xs font-semibold rounded-full $class"]) }}>
    {{ $status }}
</span>