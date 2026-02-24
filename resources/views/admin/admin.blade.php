{{-- resources/views/admin/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tableau de bord administrateur') }}
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
            <!-- Statistiques globales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total employés -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-indigo-600 uppercase">Total</span>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-1">24</div>
                    <div class="text-sm text-gray-500">employés actifs</div>
                </div>

                <!-- Présents aujourd'hui -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-green-600 uppercase">Aujourd'hui</span>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-1">18</div>
                    <div class="text-sm text-gray-500">présents</div>
                </div>

                <!-- Absents / retards -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-orange-500 uppercase">Absences</span>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-1">4</div>
                    <div class="text-sm text-gray-500">dont 2 non justifiées</div>
                </div>

                <!-- Demandes en attente -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-blue-600 uppercase">Demandes</span>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-1">3</div>
                    <div class="text-sm text-gray-500">justificatifs en attente</div>
                </div>
            </div>

            <!-- Gestion des utilisateurs (création / attribution des rôles) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-800 flex items-center">
                        <span class="w-1 h-5 bg-indigo-600 rounded-full mr-3"></span>
                        Gestion du personnel
                    </h3>
                    <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                        + Nouvel employé
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase">Nom</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase">Rôle</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase">Statut</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="py-3 text-sm text-gray-800">Jean Dupont</td>
                                <td class="py-3 text-sm text-gray-600">jean.dupont@exemple.fr</td>
                                <td class="py-3">
                                    <select class="text-sm border border-gray-300 rounded-lg px-2 py-1 bg-white text-gray-700">
                                        <option selected>Employé</option>
                                        <option>Administrateur</option>
                                    </select>
                                </td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Actif</span></td>
                                <td class="py-3 text-sm">
                                    <a href="#" class="text-indigo-600 hover:underline">Modifier</a>
                                    <span class="mx-2 text-gray-300">|</span>
                                    <a href="#" class="text-red-600 hover:underline">Désactiver</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3 text-sm text-gray-800">Marie Martin</td>
                                <td class="py-3 text-sm text-gray-600">marie.martin@exemple.fr</td>
                                <td class="py-3">
                                    <select class="text-sm border border-gray-300 rounded-lg px-2 py-1 bg-white text-gray-700">
                                        <option>Employé</option>
                                        <option selected>Administrateur</option>
                                    </select>
                                </td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Actif</span></td>
                                <td class="py-3 text-sm">
                                    <a href="#" class="text-indigo-600 hover:underline">Modifier</a>
                                    <span class="mx-2 text-gray-300">|</span>
                                    <a href="#" class="text-red-600 hover:underline">Désactiver</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3 text-sm text-gray-800">Pierre Durand</td>
                                <td class="py-3 text-sm text-gray-600">pierre.durand@exemple.fr</td>
                                <td class="py-3">
                                    <select class="text-sm border border-gray-300 rounded-lg px-2 py-1 bg-white text-gray-700">
                                        <option selected>Employé</option>
                                        <option>Administrateur</option>
                                    </select>
                                </td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">Inactif</span></td>
                                <td class="py-3 text-sm">
                                    <a href="#" class="text-indigo-600 hover:underline">Modifier</a>
                                    <span class="mx-2 text-gray-300">|</span>
                                    <a href="#" class="text-green-600 hover:underline">Activer</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Présences en temps réel (tous les employés) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-800 flex items-center">
                        <span class="w-1 h-5 bg-green-600 rounded-full mr-3"></span>
                        Présences en direct
                    </h3>
                    <div class="flex items-center space-x-2">
                        <input type="text" placeholder="Rechercher..." class="text-sm border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase">Employé</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase">Matière</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase">Cours</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase">Statut</th>
                                <th class="text-left py-3 text-xs font-medium text-gray-500 uppercase">Heure</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="py-3 text-sm text-gray-800">Jean Dupont</td>
                                <td class="py-3 text-sm text-gray-600">Mathématiques</td>
                                <td class="py-3 text-sm text-gray-600">Terminale S</td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Présent</span></td>
                                <td class="py-3 text-sm text-gray-500">08:30</td>
                            </tr>
                            <tr>
                                <td class="py-3 text-sm text-gray-800">Marie Martin</td>
                                <td class="py-3 text-sm text-gray-600">Physique</td>
                                <td class="py-3 text-sm text-gray-600">Première S</td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Présent</span></td>
                                <td class="py-3 text-sm text-gray-500">08:45</td>
                            </tr>
                            <tr>
                                <td class="py-3 text-sm text-gray-800">Pierre Durand</td>
                                <td class="py-3 text-sm text-gray-600">Histoire</td>
                                <td class="py-3 text-sm text-gray-600">Seconde A</td>
                                <td class="py-3"><span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">Retard</span></td>
                                <td class="py-3 text-sm text-gray-500">09:10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>