@props(['id', 'value' => 0, 'label' => ''])

<div class="flex flex-col mb-2">
    @if($label)
        <label for="{{ $id }}" class="text-sm text-gray-500 mb-1 dark:text-neutral-400">{{ $label }}</label>
    @endif
    <div
        class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
        data-hs-input-number="">
        <div class="flex items-center gap-x-1.5">
            <button type="button"
                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    tabindex="-1" aria-label="Decrease" data-hs-input-number-decrement="">
                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                </svg>
            </button>
            <input
                id="{{ $id }}"
                class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                style="-moz-appearance: textfield;" type="number" aria-roledescription="Number field" value="{{ $value }}"
                {{ $attributes }}>
            <button type="button"
                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    tabindex="-1" aria-label="Increase" data-hs-input-number-increment="">
                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
            </button>
        </div>
    </div>
    @error($attributes['wire:model'])
        <p class="mt-2 text-sm text-red-600" id="{{ $id }}-error">{{ $message }}</p>
    @enderror
</div>

