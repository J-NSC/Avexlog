@props(['id', 'label'])
<div>
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium dark:text-white">{{ $label }}</label>
    <textarea id="{{ $id }}" {{ $attributes }}
        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"></textarea>
</div>
@error($attributes['wire:model'])
<p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">{{ $message }}</p>
@enderror