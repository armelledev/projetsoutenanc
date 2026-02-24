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
<aside class="hidden md:block w-64 flex-shrink-0 border-r border-gold/10 bg-[#0a0a0a]">
    <div class="flex h-full flex-col">
        <!-- Logo / Titre -->
        <div class="h-16 flex items-center px-6 border-b border-gold/10">
            <span class="text-xl font-bold text-white flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-gold text-black flex items-center justify-center font-bold">P</div>
                <span class="text-gold">Présences</span>
            </span>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-6 overflow-y-auto">
            <ul class="space-y-1.5">
                <li>
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-gold/10 text-gold' : 'text-gray-300 hover:text-gold hover:bg-gold/5' }}">
                        <x-heroicon-o-home class="h-5 w-5" />
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href=""
                       class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('presences.mes') ? 'bg-gold/10 text-gold' : 'text-gray-300 hover:text-gold hover:bg-gold/5' }}">
                        <x-heroicon-o-calendar-days class="h-5 w-5" />
                        Mes présences
                    </a>
                </li>

                <li class="mt-10 pt-5 border-t border-gold/10">
                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('profile.edit') ? 'bg-gold/10 text-gold' : 'text-gray-300 hover:text-gold hover:bg-gold/5' }}">
                        <x-heroicon-o-user class="h-5 w-5" />
                        Mon profil
                    </a>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors w-full text-left text-red-400 hover:bg-red-500/10 hover:text-red-300">
                            <x-heroicon-o-arrow-right-on-rectangle class="h-5 w-5" />
                            Déconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <div class="p-4 text-xs text-gray-500 border-t border-gold/10">
            v{{ config('app.version', '1.0') }} • Employé
        </div>
    </div>
</aside>

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