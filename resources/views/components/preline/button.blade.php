@props(['id' => null,'label','color' => 'blue'])

@if ($attributes['href'])
<a x-data="{color: @entangle($color)}" href="{{route('protocol.create')}}" :class="{'bg-'+color+'-600'}"
    class="inline-flex items-center px-2 py-2 text-xs font-medium text-white border border-transparent rounded-lg md:py-3 md:px-4 gap-x-2 md:text-sm hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
    @if ($slot)
    {{ $slot }}
    @endif
    {{ $label }}
</a>
@else
<button type="{{ $attributes['type'] }}" {{ $attributes->merge(['class' => 'py-3 px-4 inline-flex items-center gap-x-2
    text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none
    focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none']) }}>
    @if ($slot)
    {{ $slot }}
    @endif {{ $label }}
</button>
@endif