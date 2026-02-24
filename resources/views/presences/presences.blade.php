{{-- resources/views/presences/mes-presences.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mes présences') }}
            </h2>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                    {{ date('d M Y') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Historique détaillé des présences (seule section) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-800 flex items-center">
                        <span class="w-1 h-5 bg-blue-600 rounded-full mr-3"></span>
                        Historique de mes présences
                    </h3>
                    
                    <!-- Filtres rapides -->
                    <div class="flex items-center space-x-2">
                        <select class="text-sm border border-gray-300 rounded-lg px-3 py-2 bg-white text-gray-700">
                            <option>Ce mois</option>
                            <option>Ce trimestre</option>
                            <option>Cette année</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Matière</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Cours</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Heure d'arrivée</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Justificatif</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-3 text-sm text-gray-800">15/02/2026</td>
                                <td class="py-3 text-sm text-gray-600">Mathématiques</td>
                                <td class="py-3 text-sm text-gray-600">Terminale S</td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Présent</span></td>
                                <td class="py-3 text-sm text-gray-500">08:25</td>
                                <td class="py-3 text-sm text-gray-400">-</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-3 text-sm text-gray-800">14/02/2026</td>
                                <td class="py-3 text-sm text-gray-600">Physique-Chimie</td>
                                <td class="py-3 text-sm text-gray-600">Terminale S</td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Présent</span></td>
                                <td class="py-3 text-sm text-gray-500">08:30</td>
                                <td class="py-3 text-sm text-gray-400">-</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-3 text-sm text-gray-800">13/02/2026</td>
                                <td class="py-3 text-sm text-gray-600">Histoire-Géo</td>
                                <td class="py-3 text-sm text-gray-600">Terminale L</td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">Retard (8 min)</span></td>
                                <td class="py-3 text-sm text-gray-500">08:38</td>
                                <td class="py-3 text-sm text-gray-400">-</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-3 text-sm text-gray-800">12/02/2026</td>
                                <td class="py-3 text-sm text-gray-600">Français</td>
                                <td class="py-3 text-sm text-gray-600">Terminale L</td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">Absent</span></td>
                                <td class="py-3 text-sm text-gray-500">-</td>
                                <td class="py-3"><span class="text-xs text-blue-600 hover:underline cursor-pointer">PDF</span></td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-3 text-sm text-gray-800">11/02/2026</td>
                                <td class="py-3 text-sm text-gray-600">SVT</td>
                                <td class="py-3 text-sm text-gray-600">Terminale S</td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Présent</span></td>
                                <td class="py-3 text-sm text-gray-500">08:20</td>
                                <td class="py-3 text-sm text-gray-400">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination simple -->
                <div class="mt-6 flex items-center justify-between">
                    <p class="text-sm text-gray-500">Affichage de 1 à 5 sur 18 présences</p>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-gray-50">Précédent</button>
                        <button class="px-3 py-1 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">Suivant</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>