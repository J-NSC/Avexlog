@props(['label' => null, 'value' => null])

<div {{ $attributes->class(['col-span-full ']) }}>
    @if (filled($slot))
    <span class="w-full font-medium dark:text-neutral-400">
        {{ $slot }}
    </span>
    @elseif(filled($label) && filled($value))
    <span class="block mb-2 text-sm dark:text-white">{{ $label }}</span>
    <span class="w-full font-medium dark:text-neutral-400">
        {{ $value }}
    </span>
    @endif
</div>