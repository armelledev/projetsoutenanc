<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Tableau de bord') }}
            </h2>
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gold dark:text-gold-light bg-gold/10 px-3 py-1 rounded-full">
                    {{ date('d M Y') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#0a0a0a] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistiques rapides -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Carte 1 : Présents aujourd'hui -->
                <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6 hover:border-gold/30 transition-all duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-gold/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gold uppercase tracking-wider">Aujourd'hui</span>
                    </div>
                    <div class="text-3xl font-bold text-white mb-1">24</div>
                    <div class="text-sm text-gray-400">enseignants présents</div>
                    <div class="mt-4 h-1 w-full bg-gray-700 rounded-full overflow-hidden">
                        <div class="h-full bg-gold rounded-full" style="width: 80%"></div>
                    </div>
                    <div class="flex justify-between mt-2 text-xs text-gray-500">
                        <span>80% de présence</span>
                        <span>30 inscrits</span>
                    </div>
                </div>

                <!-- Carte 2 : Absents -->
                <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6 hover:border-gold/30 transition-all duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-gold/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gold uppercase tracking-wider">Absences</span>
                    </div>
                    <div class="text-3xl font-bold text-white mb-1">6</div>
                    <div class="text-sm text-gray-400">non justifiées</div>
                    <div class="mt-4 flex items-center gap-2">
                        <span class="text-xs text-gray-400">+2 vs hier</span>
                        <span class="text-xs text-red-400">▲</span>
                    </div>
                </div>

                <!-- Carte 3 : Retards -->
                <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6 hover:border-gold/30 transition-all duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-gold/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gold uppercase tracking-wider">Retards</span>
                    </div>
                    <div class="text-3xl font-bold text-white mb-1">4</div>
                    <div class="text-sm text-gray-400">ce matin</div>
                    <div class="mt-4 flex items-center gap-2">
                        <span class="text-xs text-gray-400">dont 2 signalés</span>
                    </div>
                </div>

                <!-- Carte 4 : Cours aujourd'hui -->
                <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6 hover:border-gold/30 transition-all duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-gold/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gold uppercase tracking-wider">Cours</span>
                    </div>
                    <div class="text-3xl font-bold text-white mb-1">12</div>
                    <div class="text-sm text-gray-400">programmés</div>
                    <div class="mt-4 flex items-center justify-between text-xs text-gray-500">
                        <span>8 en cours</span>
                        <span>4 à venir</span>
                    </div>
                </div>
            </div>

            <!-- Section principale : tableau des présences et graphique -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Liste des présences (2/3) -->
                <div class="lg:col-span-2 bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6">
                    <h3 class="text-lg font-medium text-white mb-4 flex items-center">
                        <span class="w-1 h-5 bg-gold rounded-full mr-3"></span>
                        Présences en temps réel
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-gold/20">
                                    <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Enseignant</th>
                                    <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Matière</th>
                                    <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Cours</th>
                                    <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Statut</th>
                                    <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Heure</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gold/10">
                                <tr class="hover:bg-gold/5 transition">
                                    <td class="py-3 text-sm text-white">Marie Dubois</td>
                                    <td class="py-3 text-sm text-gray-300">Mathématiques</td>
                                    <td class="py-3 text-sm text-gray-300">Terminale S</td>
                                    <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400 border border-green-500/30">Présent</span></td>
                                    <td class="py-3 text-sm text-gray-400">08:30</td>
                                </tr>
                                <tr class="hover:bg-gold/5 transition">
                                    <td class="py-3 text-sm text-white">Thomas Martin</td>
                                    <td class="py-3 text-sm text-gray-300">Physique-Chimie</td>
                                    <td class="py-3 text-sm text-gray-300">Première S</td>
                                    <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-yellow-500/20 text-yellow-400 border border-yellow-500/30">Retard</span></td>
                                    <td class="py-3 text-sm text-gray-400">09:15</td>
                                </tr>
                                <tr class="hover:bg-gold/5 transition">
                                    <td class="py-3 text-sm text-white">Sophie Bernard</td>
                                    <td class="py-3 text-sm text-gray-300">Français</td>
                                    <td class="py-3 text-sm text-gray-300">Seconde A</td>
                                    <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400 border border-green-500/30">Présent</span></td>
                                    <td class="py-3 text-sm text-gray-400">08:00</td>
                                </tr>
                                <tr class="hover:bg-gold/5 transition">
                                    <td class="py-3 text-sm text-white">Jean Petit</td>
                                    <td class="py-3 text-sm text-gray-300">Histoire-Géo</td>
                                    <td class="py-3 text-sm text-gray-300">Terminale L</td>
                                    <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-red-500/20 text-red-400 border border-red-500/30">Absent</span></td>
                                    <td class="py-3 text-sm text-gray-400">-</td>
                                </tr>
                                <tr class="hover:bg-gold/5 transition">
                                    <td class="py-3 text-sm text-white">Claire Moreau</td>
                                    <td class="py-3 text-sm text-gray-300">SVT</td>
                                    <td class="py-3 text-sm text-gray-300">Première S</td>
                                    <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400 border border-green-500/30">Présent</span></td>
                                    <td class="py-3 text-sm text-gray-400">10:00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <a href="#" class="text-sm text-gold hover:underline flex items-center gap-1">
                            Voir tous les enseignants
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Graphique / indicateurs (1/3) -->
                <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6">
                    <h3 class="text-lg font-medium text-white mb-4 flex items-center">
                        <span class="w-1 h-5 bg-gold rounded-full mr-3"></span>
                        Répartition
                    </h3>
                    <div class="space-y-6">
                        <!-- Présence par classe (diagramme circulaire simplifié) -->
                        <div>
                            <h4 class="text-xs font-medium text-gray-400 uppercase tracking-wider mb-3">Taux de présence par niveau</h4>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-gray-300">Seconde</span>
                                        <span class="text-gold">92%</span>
                                    </div>
                                    <div class="h-2 bg-gray-700 rounded-full overflow-hidden">
                                        <div class="h-full bg-gold rounded-full" style="width: 92%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-gray-300">Première</span>
                                        <span class="text-gold">78%</span>
                                    </div>
                                    <div class="h-2 bg-gray-700 rounded-full overflow-hidden">
                                        <div class="h-full bg-gold rounded-full" style="width: 78%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-gray-300">Terminale</span>
                                        <span class="text-gold">85%</span>
                                    </div>
                                    <div class="h-2 bg-gray-700 rounded-full overflow-hidden">
                                        <div class="h-full bg-gold rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-t border-gold/10 pt-6">
                            <h4 class="text-xs font-medium text-gray-400 uppercase tracking-wider mb-3">Prochains cours</h4>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-white">Mathématiques - T S</p>
                                        <p class="text-xs text-gray-400">Salle 101 · 14h00</p>
                                    </div>
                                    <span class="text-xs text-gold">M. Dubois</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-white">Physique - 1ère S</p>
                                        <p class="text-xs text-gray-400">Labo 3 · 15h30</p>
                                    </div>
                                    <span class="text-xs text-gold">Mme Martin</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-white">Français - 2nde A</p>
                                        <p class="text-xs text-gray-400">Salle 5 · 16h00</p>
                                    </div>
                                    <span class="text-xs text-gold">M. Bernard</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section notifications / alertes -->
            <div class="mt-8 bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6">
                <h3 class="text-lg font-medium text-white mb-4 flex items-center">
                    <span class="w-1 h-5 bg-gold rounded-full mr-3"></span>
                    Alertes récentes
                </h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="flex items-start gap-3 p-3 bg-gold/5 rounded-xl border border-gold/10">
                        <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center text-orange-400 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-white">Absence non justifiée</p>
                            <p class="text-xs text-gray-400">Jean Petit (Histoire) - 10h30</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 bg-gold/5 rounded-xl border border-gold/10">
                        <div class="w-8 h-8 bg-yellow-500/20 rounded-lg flex items-center justify-center text-yellow-400 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-white">Retard signalé</p>
                            <p class="text-xs text-gray-400">Thomas Martin (Physique) - 9h15</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Définitions des couleurs dorées pour le dark mode */
        :root {
            --gold: #c9a959;
            --gold-light: #e5d19b;
        }
        .text-gold {
            color: var(--gold);
        }
        .text-gold-light {
            color: var(--gold-light);
        }
        .bg-gold {
            background-color: var(--gold);
        }
        .bg-gold\/10 {
            background-color: rgba(201, 169, 89, 0.1);
        }
        .bg-gold\/5 {
            background-color: rgba(201, 169, 89, 0.05);
        }
        .border-gold {
            border-color: var(--gold);
        }
        .border-gold\/10 {
            border-color: rgba(201, 169, 89, 0.1);
        }
        .border-gold\/20 {
            border-color: rgba(201, 169, 89, 0.2);
        }
        .border-gold\/30 {
            border-color: rgba(201, 169, 89, 0.3);
        }
        .hover\:border-gold\/30:hover {
            border-color: rgba(201, 169, 89, 0.3);
        }
    </style>
</x-app-layout>