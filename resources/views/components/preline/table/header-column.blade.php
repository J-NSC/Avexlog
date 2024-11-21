@props(['label' => null])
<th scope="col" {{ $attributes->merge(['class' => 'px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start
    dark:text-neutral-500']) }}>
    @if ($label)
    {{ $label }}
    @else
    {{ $slot }}
    @endif
</th>