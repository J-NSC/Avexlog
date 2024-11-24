<x-app-layout title="{{ __('User') }}" :back="route('dashboard')">
    <x-slot:icon>
        <x-icon.user class="w-6 h-6" />
    </x-slot:icon>
    <x-slot:buttons>
    </x-slot:buttons>
    <div class="py-3">
        <div
            class="bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
            <livewire:user.table />
        </div>
    </div>

    <livewire:scheduler.create id="hs-create-scheduler-modal" />
</x-app-layout>
