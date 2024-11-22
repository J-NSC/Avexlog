<?php

use function Livewire\Volt\{state};

//

?>

<div id="application-sidebar"
     class="hs-overlay  hs-overlay-open:translate-x-0  -translate-x-full transition-all duration-300 transform hidden fixed top-0 left-0 bottom-0 z-[50] hs-overlay-open:z-[80] w-64 bg-white border-r border-gray-200 pt-7 pb-10 overflow-y-auto scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0 dark:scrollbar-y dark:bg-gray-800 dark:border-gray-700">
    <div class="px-6">
        <a class="flex-none text-xl font-semibold dark:text-white" href="#" aria-label="Brand">AvexLog</a>
    </div>

    <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
        <ul class="space-y-1.5">

            <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" wire:navigate>
                <x-icon.home class="w-4 h-4" />
                {{ __('Home')}}
            </x-sidebar-link>

            <x-sidebar-link href="{{ route('advance.index') }}" :active="request()->routeIs('advance.index')" wire:navigate>
                <x-icon.money class="w-4 h-4" />
                {{__('Request Advance')}}
            </x-sidebar-link>

            <x-sidebar-link href="{{ route('scheduler.index') }}" :active="request()->routeIs('advance.index')" wire:navigate>
                <x-icon.scheduler class="w-4 h-4" />
                {{__('Schedule roster')}}
            </x-sidebar-link>

        </ul>
    </nav>
</div>

