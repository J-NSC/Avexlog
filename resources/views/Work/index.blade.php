<x-app-layout title="{{ __('Delivery') }}" :back="route('dashboard')">
    <x-slot:icon>
        <x-icon.delivery class="w-6 h-6" />
    </x-slot:icon>
    <div class="py-3">
        <div
            class="bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
            <livewire:delivery.table />
        </div>
    </div>
        <livewire:pix.create id="hs-create-pix-modal" />
</x-app-layout>
