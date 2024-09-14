<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css',
        'resources/js/app.js',
        'resources/js/flatpickr.js'
        ])

        <!-- Styles -->
        @livewireStyles
    </head>

    <body class="font-sans antialiased bg-center bg-cover" style="background-image: url(/images/sky.jpg);">

        <x-jet-banner />

        <div class="min-h-screen bg-opacity-50">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-opacity-50 shadow bg-sky-200">
                    <div class="px-4 pt-5 pb-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            <div class="pb-1 text-xs text-right sm:px-6 lg:px-8">
                Copyright © 2024 Kodomo club.
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
