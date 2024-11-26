<?php

use function Livewire\Volt\{state};

//

?>

<div id="application-sidebar"
     class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 left-0 bottom-0 z-[50] hs-overlay-open:z-[80] w-64 bg-white border-r border-gray-200 pt-7 pb-10 overflow-y-auto scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0 dark:scrollbar-y dark:bg-gray-800 dark:border-gray-700 shadow-lg rounded-r-xl"
     style="background-image: url('/images/tela-fundo.png'); background-size: cover; background-position: center;">
    <!-- Logo com destaque -->
    <div class="px-6 flex flex-col items-center gap-2">
        <img src="/images/logo.png" alt="Logo AvexLog" class="w-16 h-16 rounded-full shadow-md">
        <a class="text-2xl font-bold text-white dark:text-white" href="#" aria-label="Brand">AvexLog</a>
    </div>

    <div class="mt-6"></div>

    <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
        <ul class="space-y-2">

            <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" wire:navigate
                            class="flex items-center gap-x-2 px-4 py-2 text-base font-semibold rounded-l-lg transition-colors duration-300
            {{ request()->routeIs('dashboard') ? 'text-black bg-white' : 'text-white hover:text-black hover:bg-gray-100' }}">
                <x-icon.home class="w-5 h-5"/>
                {{ __('Home')}}
            </x-sidebar-link>

            @hasrole('admin|super_admin')
            <x-sidebar-link href="{{ route('work.index') }}" :active="request()->routeIs('work.index')" wire:navigate
                            class="flex items-center gap-x-2 px-4 py-2 text-base font-semibold rounded-l-lg transition-colors duration-300
            {{ request()->routeIs('work.index') ? 'text-black bg-white' : 'text-white hover:text-black hover:bg-gray-100' }}">
                <x-icon.delivery class="w-5 h-5"/>
                {{__('Delivery')}}
            </x-sidebar-link>
            @endhasrole
            <x-sidebar-link href="{{ route('advance.index') }}" :active="request()->routeIs('advance.index')"
                            wire:navigate
                            class="flex items-center gap-x-2 px-4 py-2 text-base font-semibold rounded-l-lg transition-colors duration-300
            {{ request()->routeIs('advance.index') ? 'text-black bg-white' : 'text-white hover:text-black hover:bg-gray-100' }}">
                <x-icon.money class="w-5 h-5"/>
                {{__('Advance')}}
            </x-sidebar-link>

            <x-sidebar-link href="{{ route('scheduler.index') }}" :active="request()->routeIs('scheduler.index')"
                            wire:navigate
                            class="flex items-center gap-x-2 px-4 py-2 text-base font-semibold rounded-l-lg transition-colors duration-300
            {{ request()->routeIs('scheduler.index') ? 'text-black bg-white' : 'text-white hover:text-black hover:bg-gray-100' }}">
                <x-icon.scheduler class="w-5 h-5"/>
                {{__('Roster')}}
            </x-sidebar-link>



            <x-sidebar-link href="{{ route('pix.index') }}" :active="request()->routeIs('pix.index')" wire:navigate
                            class="flex items-center gap-x-2 px-4 py-2 text-base font-semibold rounded-l-lg transition-colors duration-300
            {{ request()->routeIs('pix.index') ? 'text-black bg-white' : 'text-white hover:text-black hover:bg-gray-100' }}">
                <x-icon.pix class="w-5 h-5"/>
                {{__('Pix')}}
            </x-sidebar-link>

            {{--            <x-sidebar-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')" wire:navigate--}}
            {{--                            class="flex items-center gap-x-2 px-4 py-2 text-base font-semibold rounded-l-lg transition-colors duration-300--}}
            {{--            {{ request()->routeIs('users.index') ? 'text-black bg-white' : 'text-white hover:text-black hover:bg-gray-100' }}">--}}
            {{--                <x-icon.scheduler class="w-5 h-5" />--}}
            {{--                {{__('User')}}--}}
            {{--            </x-sidebar-link>--}}

        </ul>
    </nav>
</div>

