@props(['id'])

<div id="{{ $id }}" wire:ignore.self
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div
        class="h-full max-w-full max-h-full mt-10 transition-all opacity-0 hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500">
        <div class="flex flex-col h-full max-w-full max-h-full bg-white pointer-events-auto dark:bg-neutral-800">
            <div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
                <h3 class="font-bold text-gray-800 dark:text-white">
                    {{ $title }}
                </h3>
                <button type="button"
                    class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-transparent rounded-full size-7 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
                    data-hs-overlay="#{{ $id }}">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="h-full p-4 overflow-y-auto">
                {{ $content }}
            </div>
            @isset($footer)
            <div class="flex items-center justify-end px-4 py-3 mt-auto border-t gap-x-2 dark:border-neutral-700">
                {{ $footer }}
            </div>
            @endisset
        </div>
    </div>
</div>