@props(['width' => '7x1'])


@php 

$maxWidth = match($width) {
    '4xl' => 'max-w-4xl',
    '5xl' => 'max-w-5xl',
    '6xl' => 'max-w-6xl',
    '7xl' => 'max-w-7xl',   
    default => 'max-w-7xl',
};
@endphp


<div 
{{ $attributes->merge(['class' => $maxWidth . ' mx-auto px-4 sm:px-6 lg:px-8']) }}>    
    {{ $slot }}
</div>