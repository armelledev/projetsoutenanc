<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Dashboard Administration
        </h2>
    </x-slot>

    <div class="py-12 bg-[#0a0a0a] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-sm border border-gold/20 rounded-2xl p-10 text-center">
                <h1 class="text-4xl font-bold text-white mb-6">
                    Bienvenue dans l'espace Administration
                </h1>
                
                <p class="text-xl text-gray-300 mb-8">
                    @if (auth()->user()->isSuperAdmin())
                        Super Administrateur – Contrôle total
                    @else
                        Administrateur – Gestion des présences
                    @endif
                </p>

                <div class="flex flex-wrap justify-center gap-6">
                    <a href="#" class="px-8 py-5 bg-gold hover:bg-gold-light text-black font-semibold rounded-xl text-lg transition">
                        Gérer les présences
                    </a>
                    <a href="#" class="px-8 py-5 bg-blue-600/80 hover:bg-blue-700 text-white font-semibold rounded-xl text-lg transition">
                        Voir les rapports
                    </a>
                    @if (auth()->user()->isSuperAdmin())
                        <a href="#" class="px-8 py-5 bg-red-700 hover:bg-red-800 text-white font-semibold rounded-xl text-lg transition">
                            Gérer les utilisateurs & rôles
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>