<x-app-layout>
    <!-- Sidebar fixe à gauche -->
    <div class="fixed inset-y-0 left-0 z-30 w-64 bg-gray-950/90 backdrop-blur-md border-r border-gold/20 shadow-2xl transform transition-transform lg:translate-x-0">
        <div class="flex flex-col h-full">
            <!-- Logo / Titre -->
            <div class="p-6 border-b border-gold/10">
                <h1 class="text-2xl font-bold text-gold tracking-wide">
                    Présences
                </h1>
                <p class="text-sm text-gray-400 mt-1">Espace Enseignant</p>
            </div>

            <!-- Navigation principale -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-4 py-3 text-gray-300 hover:bg-gold/10 hover:text-gold rounded-xl transition {{ request()->routeIs('dashboard') ? 'bg-gold/10 text-gold' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Tableau de bord
                </a>

                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gold/10 hover:text-gold rounded-xl transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Mon historique
                </a>

                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gold/10 hover:text-gold rounded-xl transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Justificatifs
                </a>
            </nav>

            <!-- Déconnexion en bas -->
            <div class="p-4 border-t border-gold/10 mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center justify-center px-4 py-3 bg-red-900/40 hover:bg-red-800/60 text-red-300 hover:text-red-200 rounded-xl transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Contenu principal (décalé pour la sidebar) -->
    <div class="lg:pl-64">
        <div class="py-12 bg-[#0a0a0a] min-h-screen">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Titre -->
                <div class="text-center mb-12">
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        Mes Présences
                    </h1>
                    <p class="text-lg text-gray-400">
                        {{ auth()->user()->name }} • Suivi personnel
                    </p>
                </div>

                <!-- Résumé rapide (seulement sur soi) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6 text-center">
                        <div class="text-4xl font-bold text-green-400 mb-2">08:02</div>
                        <div class="text-sm text-gray-400 uppercase tracking-wider">Dernière entrée</div>
                    </div>

                    <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6 text-center">
                        <div class="text-4xl font-bold text-yellow-400 mb-2">16:45</div>
                        <div class="text-sm text-gray-400 uppercase tracking-wider">Dernière sortie</div>
                    </div>

                    <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6 text-center">
                        <div class="text-4xl font-bold text-gold mb-2">98%</div>
                        <div class="text-sm text-gray-400 uppercase tracking-wider">Présence ce mois</div>
                    </div>
                </div>

                <!-- Tableau historique personnel -->
                <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6 overflow-hidden">
                    <h3 class="text-lg font-medium text-white mb-4 flex items-center">
                        <span class="w-1 h-5 bg-gold rounded-full mr-3"></span>
                        Historique de mes présences
                    </h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-gold/20">
                                    <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Date</th>
                                    <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Entrée</th>
                                    <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Sortie</th>
                                    <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Durée</th>
                                    <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Statut</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gold/10">
                                <!-- Exemples statiques – à remplacer par boucle -->
                                <tr class="hover:bg-gold/5 transition">
                                    <td class="py-4 text-sm text-white">Lundi 23 fév. 2026</td>
                                    <td class="py-4 text-sm text-gray-300">08:02</td>
                                    <td class="py-4 text-sm text-gray-300">16:45</td>
                                    <td class="py-4 text-sm text-gold">8h 43min</td>
                                    <td class="py-4">
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400 border border-green-500/30">Complet</span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-gold/5 transition">
                                    <td class="py-4 text-sm text-white">Vendredi 20 fév. 2026</td>
                                    <td class="py-4 text-sm text-gray-300">07:58</td>
                                    <td class="py-4 text-sm text-gray-300">17:10</td>
                                    <td class="py-4 text-sm text-gold">9h 12min</td>
                                    <td class="py-4">
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400 border border-green-500/30">Complet</span>
                                    </td>
                                </tr>

                                <!-- Ligne vide exemple -->
                                <!-- <tr><td colspan="5" class="py-8 text-center text-gray-500">Aucune présence enregistrée récemment</td></tr> -->
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <a href="#" class="text-sm text-gold hover:underline flex items-center gap-1">
                            Voir tout l'historique
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>