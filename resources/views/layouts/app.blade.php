@props(['page' => 'Dashboard'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-50 dark:bg-slate-900">

<livewire:layout.navigation />

<x-responsive-page-header :page="$page" />
<livewire:layout.sidebar />

<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
    <main class="flex-1 max-h-full p-5 overflow-hidden bg-gray-100 dark:bg-neutral-800">
        <div
            class="flex flex-col items-start justify-between pb-4 space-y-4 border-b dark:border-b-neutral-700 lg:items-center lg:space-y-0 lg:flex-row">
            <div class="flex items-center">
                <div class="hidden md:block">
                    @if ($back)
                        <a href="{{ $back }}"
                           class="flex items-center gap-1 p-2 transition bg-white rounded-md shadow-md me-6 hover:bg-gray-100 dark:bg-gray-600 dark:text-gray-100 dark:hover:bg-gray-700">
                            <x-icon.back class="w-4 h-4" />
                            Voltar
                        </a>
                    @endif
                </div>

                <div class="flex items-center gap-2 dark:text-gray-300">
                    {{ $icon ?? null }}
                    <h1 class="text-xl font-semibold md:text-2xl whitespace-nowrap">{{ $title }}</h1>
                </div>
            </div>
            <div class="flex flex-col w-full gap-2 md:w-fit md:flex-row">
                {{ $buttons ?? null }}
            </div>
        </div>

        <!-- Start Content -->
        <div class="py-4">
            <x-preline.alerts />
            {{ $slot }}
        </div>
    </main>
</div>

<livewire:components.notifications />

<x-toaster-hub />
<script src="../scripts/js/open-modals-on-init.js"></script>
</body>
</html>
