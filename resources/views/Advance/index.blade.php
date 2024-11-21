<x-app-layout title="{{ __('Request Advance') }}" :back="route('dashboard')">
    <x-slot:icon>
        <x-icon.money class="w-6 h-6" />
    </x-slot:icon>
    <x-slot:buttons>
            <button type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-create-advance-modal">
                Solicitar Adiantamento
            </button>
    </x-slot:buttons>

    <div class="py-3">
        <div class="bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                <livewire:advance.table />
        </div>

{{--        <div class="bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">--}}
{{--            <livewire:advance.serivce-term />--}}
{{--        </div>--}}
    </div>
        <livewire:advance.create id="hs-create-advance-modal" />
</x-app-layout>
