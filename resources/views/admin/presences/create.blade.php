{{-- resources/views/admin/presences/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Créer une présence manuelle') }}
            </h2>
            <span class="text-sm text-gold bg-gold/10 px-3 py-1 rounded-full border border-gold/20">
                {{ date('d M Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-8">
                <form method="POST" action="{{ route('admin.presences.store') }}">
                    @csrf
                    {{-- Note : J'ai retiré @method('PUT') car pour un 'create' on utilise généralement 'POST' --}}

                    <div class="mb-6">
                        <label for="user_id" class="block text-sm font-medium text-gold mb-2">Employé <span class="text-red-400">*</span></label>
                        <select name="user_id" id="user_id" 
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

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gold mb-2">Date <span class="text-red-400">*</span></label>
                            <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" 
                                   max="{{ date('Y-m-d') }}"
                                   class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                            @error('date')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="statut" class="block text-sm font-medium text-gold mb-2">Statut <span class="text-red-400">*</span></label>
                            <select name="statut" id="statut"
                                    class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                                <option value="present" {{ old('statut') == 'present' ? 'selected' : '' }}>Présent</option>
                                <option value="absent" {{ old('statut') == 'absent' ? 'selected' : '' }}>Absent</option>
                                <option value="retard" {{ old('statut') == 'retard' ? 'selected' : '' }}>Retard</option>
                                <option value="justifie" {{ old('statut') == 'justifie' ? 'selected' : '' }}>Absence justifiée</option>
                            </select>
                            @error('statut')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="heure_arrivee" class="block text-sm font-medium text-gold mb-2">Heure d'arrivée <span class="text-red-400">*</span></label>
                            <input type="time" name="heure_arrivee" id="heure_arrivee" value="{{ old('heure_arrivee', '08:00') }}" 
                                   class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                            @error('heure_arrivee')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="heure_depart" class="block text-sm font-medium text-gold mb-2">Heure de départ</label>
                            <input type="time" name="heure_depart" id="heure_depart" value="{{ old('heure_depart') }}" 
                                   class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                            @error('heure_depart')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-8">
                        <label for="commentaire" class="block text-sm font-medium text-gold mb-2">Commentaire (optionnel)</label>
                        <textarea name="commentaire" id="commentaire" rows="3"
                                  class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white placeholder-gray-500 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">{{ old('commentaire') }}</textarea>
                        @error('commentaire')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

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