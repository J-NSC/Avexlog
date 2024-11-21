@props(['title'])
<div class="p-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <span class="block mb-4 text-xl font-semibold dark:text-white">{{ $title }}</span>
    {{ $slot }}
</div>
