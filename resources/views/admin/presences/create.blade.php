{{-- resources/views/admin/presences/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Créer une présence manuelle') }}
            </h2>
            <span class="text-sm text-gold bg-gold/10 px-3 py-1 rounded-full">
                {{ date('d M Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-8">
                <form method="POST" action="{{ route('admin.presences.store') }}">
                    @csrf
                    @method('PUT')

                    <!-- Employé -->
                    <div class="mb-6">
                        <label for="user_id" class="block text-sm font-medium text-gold mb-2">Employé <span class="text-red-400">*</span></label>
                        <select name="user_id" id="user_id" required
                                class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                            <option value="">Sélectionner un employé</option>
                            @foreach($employes as $employe)
                                <option value="{{ $employe->id }}" {{ old('user_id') == $employe->id ? 'selected' : '' }}>
                                    {{ $employe->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date -->
                    <div class="mb-6">
                        <label for="date" class="block text-sm font-medium text-gold mb-2">Date <span class="text-red-400">*</span></label>
                        <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" required
                               class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                        @error('date')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Statut (optionnel) -->
                    <div class="mb-6">
                        <label for="statut" class="block text-sm font-medium text-gold mb-2">Statut (optionnel)</label>
                        <select name="statut" id="statut"
                                class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                            <option value="">Déterminer automatiquement</option>
                            <option value="present" {{ old('statut') == 'present' ? 'selected' : '' }}>Présent</option>
                            <option value="absent" {{ old('statut') == 'absent' ? 'selected' : '' }}>Absent</option>
                            <option value="retard" {{ old('statut') == 'retard' ? 'selected' : '' }}>Retard</option>
                            <option value="justifie" {{ old('statut') == 'justifie' ? 'selected' : '' }}>Absence justifiée</option>
                        </select>
                        <p class="mt-1 text-xs text-gray-400">Si non précisé, le statut sera calculé en fonction de l'heure actuelle (présent/retard).</p>
                        @error('statut')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Commentaire -->
                    <div class="mb-8">
                        <label for="commentaire" class="block text-sm font-medium text-gold mb-2">Commentaire (optionnel)</label>
                        <textarea name="commentaire" id="commentaire" rows="4"
                                  class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white placeholder-gray-500 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">{{ old('commentaire') }}</textarea>
                        @error('commentaire')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Boutons -->
                    <div class="flex items-center justify-end gap-4">
                        <a href="{{ route('admin.presences.index') }}" 
                           class="px-6 py-3 border border-gold/30 text-gold rounded-xl hover:bg-gold/10 transition">
                            Annuler
                        </a>
                        <button type="submit"
                                class="px-6 py-3 bg-gold text-black rounded-xl font-medium hover:bg-opacity-90 transition shadow-lg shadow-gold/20">
                            Enregistrer la présence
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>