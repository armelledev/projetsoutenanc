@extends('layouts.admin.employer')

@section('content')
    <div class="w-full max-w-4xl mx-auto space-y-10">

        <!-- Accueil personnalisé + statut du jour -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 text-center border border-gray-200 dark:border-gray-700">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">
                Bonjour, {{ auth()->user()->name }} !
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
                {{ now()->format('l d F Y') }} — {{ now()->format('H:i') }}
            </p>

            <div class="inline-block px-8 py-4 bg-gray-100 dark:bg-gray-700 rounded-xl">
                @if($todayPointage ?? false)
                    @if($todayPointage->depart)
                        <p class="text-2xl font-semibold text-green-600 dark:text-green-400">
                            Journée terminée
                        </p>
                        <p class="text-sm mt-2">
                            Arrivée : {{ $todayPointage->arrivee->format('H:i') }}  
                            • Départ : {{ $todayPointage->depart->format('H:i') }}
                        </p>
                    @else
                        <p class="text-2xl font-semibold text-blue-600 dark:text-blue-400">
                            Présent aujourd'hui
                        </p>
                        <p class="text-sm mt-2">
                            Arrivée pointée à {{ $todayPointage->arrivee->format('H:i') }}
                        </p>
                    @endif
                @else
                    <p class="text-2xl font-semibold text-gray-500 dark:text-gray-400">
                        Pas de pointage aujourd'hui
                    </p>
                @endif
            </div>
        </div>

        <!-- Statistiques rapides (optionnel mais sympa) -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow text-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">Heures ce mois</p>
                <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">
                    {{ number_format($heuresCeMois ?? 0, 1) }} h
                </p>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow text-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">Présences ce mois</p>
                <p class="text-3xl font-bold text-green-600 dark:text-green-400">
                    {{ $presencesCeMois ?? 0 }}
                </p>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow text-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">Retards</p>
                <p class="text-3xl font-bold text-orange-600 dark:text-orange-400">
                    {{ $retards ?? 0 }}
                </p>
            </div>
        </div>

        <!-- Historique des pointages (tableau simple et clair) -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold">Mon historique récent</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Arrivée</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Départ</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Durée</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($pointages as $pointage)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $pointage->date->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $pointage->arrivee?->format('H:i') ?? '—' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $pointage->depart?->format('H:i') ?? '—' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $pointage->duree ?? '—' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($pointage->depart)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            Terminé
                                        </span>
                                    @elseif($pointage->arrivee)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            En cours
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                            Absent
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                    Aucun pointage enregistré pour le moment
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection