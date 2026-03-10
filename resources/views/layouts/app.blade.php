<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    <div class="flex min-h-screen">

        <!-- Sidebar fixe à gauche -->
        {{-- resources/views/layouts/sidebar.blade.php (ou directement dans app-layout) --}}
{{-- resources/views/layouts/sidebar-admin.blade.php --}}
<div class="flex min-h-screen">
    @include('layouts.sidebar-admin')  {{-- ou un nom plus générique --}}
    <div class="flex-1 flex flex-col min-h-screen">
        @include('layouts.navigation')
        <main>...</main>
    </div>
</div>

        <!-- Contenu principal -->
        <div class="flex-1 flex flex-col min-h-screen">

            <!-- Barre du haut (mobile menu, notifications, profil, etc.) -->
            @include('layouts.navigation')

            <!-- Header optionnel -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Contenu de la page -->
            <main class="flex-1">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>

        </div>
    </div>

</body>
</html>