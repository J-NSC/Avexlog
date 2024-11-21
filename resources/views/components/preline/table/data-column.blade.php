@props(['data' => null])
<td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
    @if ($data)
    {{ $data }}
    @else
    {{ $slot }}
    @endif
</td>