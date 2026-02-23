<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif
    </head>



    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">PresenceApp</h1>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600 font-medium">Connexion</a>
                <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Inscription
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="container mx-auto px-6 py-20 flex flex-col md:flex-row items-center">
        
        <div class="md:w-1/2 space-y-6">
            <h2 class="text-4xl font-extrabold leading-tight">
                Simplifiez la gestion de présence de votre personnel
            </h2>
            <p class="text-lg text-gray-600">
                Une solution moderne pour suivre les présences, absences et retards en temps réel.
            </p>

            <div class="flex space-x-4">
                <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                    Commencer
                </a>
                <a href="{{ route('login') }}" class="border border-indigo-600 text-indigo-600 px-6 py-3 rounded-lg hover:bg-indigo-50 transition">
                    Se connecter
                </a>
            </div>
        </div>

        <div class="md:w-1/2 mt-10 md:mt-0">
            <img src="https://illustrations.popsy.co/gray/work-from-home.svg" alt="Illustration" class="w-full">
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-12">Fonctionnalités principales</h3>

            <div class="grid md:grid-cols-3 gap-10">
                
                <!-- Feature 1 -->
                <div class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex justify-center mb-4">
                        <!-- Heroicon: User Group -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M17 20h5V9H2v11h5m10 0v-5a3 3 0 00-6 0v5m6 0H7"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold mb-2">Gestion des employés</h4>
                    <p class="text-gray-600">
                        Ajoutez, modifiez et gérez facilement les membres de votre équipe.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex justify-center mb-4">
                        <!-- Heroicon: Clock -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6 1a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold mb-2">Suivi des présences</h4>
                    <p class="text-gray-600">
                        Enregistrement rapide des présences et retards en temps réel.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex justify-center mb-4">
                        <!-- Heroicon: Chart Bar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 3v18m4-12v12m4-6v6M3 21h18"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold mb-2">Rapports & Statistiques</h4>
                    <p class="text-gray-600">
                        Visualisez les statistiques de présence et exportez vos rapports.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto px-6 text-center">
            <p>© {{ date('Y') }} PresenceApp. Tous droits réservés.</p>
        </div>
    </footer>

</html>
