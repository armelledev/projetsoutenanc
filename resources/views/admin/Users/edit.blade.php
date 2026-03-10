<x-app-layout>
    <div class="py-12 bg-slate-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 border border-gold/10 rounded-2xl overflow-hidden shadow-2xl backdrop-blur-md">
                
                <div class="p-6 border-b border-gold/10 bg-gold/5">
                    <h2 class="text-xl font-bold text-gold">Correction Manuelle : {{ $presence->user->name }}</h2>
                    <p class="text-gray-400 text-sm">Date : {{ \Carbon\Carbon::parse($presence->date)->format('d/m/Y') }}</p>
                </div>

                <form action="{{ route('admin.presences.update', $presence->id) }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-gold text-xs font-black uppercase mb-2">Modifier le Statut</label>
                            <select name="statut" class="w-full bg-black/40 border border-gold/20 text-white rounded-xl p-3 focus:ring-gold focus:border-gold">
                                <option value="present" {{ $presence->statut == 'present' ? 'selected' : '' }}>PRÉSENT</option>
                                <option value="retard" {{ $presence->statut == 'retard' ? 'selected' : '' }}>RETARD</option>
                                <option value="absent" {{ $presence->statut == 'absent' ? 'selected' : '' }}>ABSENT</option>
                                <option value="justifie" {{ $presence->statut == 'justifie' ? 'selected' : '' }}>JUSTIFIÉ (MALADIE/MISSION)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-gold text-xs font-black uppercase mb-2">Heure d'Arrivée</label>
                            <input type="time" name="heure_arrivee" 
                                value="{{ $presence->heure_arrivee ? \Carbon\Carbon::parse($presence->heure_arrivee)->format('H:i') : '' }}"
                                class="w-full bg-black/40 border border-gold/20 text-white rounded-xl p-3">
                        </div>

                        <div>
                            <label class="block text-gold text-xs font-black uppercase mb-2">Heure de Départ</label>
                            <input type="time" name="heure_depart" 
                                value="{{ $presence->heure_depart ? \Carbon\Carbon::parse($presence->heure_depart)->format('H:i') : '' }}"
                                class="w-full bg-black/40 border border-gold/20 text-white rounded-xl p-3">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gold text-xs font-black uppercase mb-2">Note de l'administrateur (Optionnel)</label>
                        <textarea name="commentaire" rows="3" placeholder="Ex: Oubli de pointage, retard justifié par appel..."
                            class="w-full bg-black/40 border border-gold/20 text-white rounded-xl p-3">{{ $presence->commentaire }}</textarea>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4">
                        <a href="{{ route('admin.presences.index') }}" class="text-gray-400 hover:text-white transition text-sm font-bold uppercase">Annuler</a>
                        <button type="submit" class="bg-gold hover:bg-yellow-600 text-black px-8 py-3 rounded-xl font-black transition transform active:scale-95 shadow-lg shadow-gold/20">
                            METTRE À JOUR LA FICHE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>