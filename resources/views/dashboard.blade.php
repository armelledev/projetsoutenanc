<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl overflow-hidden shadow-2xl">
                
                <div class="p-6 border-b border-gold/10 flex justify-between items-center">
                    <h3 class="font-bold text-gold text-lg">Mon Historique de Présences</h3>
                    <div class="text-xs text-gray-400">Total : {{ $mesPresences->total() }} jours</div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gold/5 text-gold text-xs font-bold uppercase border-b border-gold/10">
                                <th class="px-6 py-4">Date</th>
                                <th class="px-6 py-4">Arrivée</th>
                                <th class="px-6 py-4">Départ</th>
                                <th class="px-6 py-4">Statut</th>
                                <th class="px-6 py-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gold/10">
                            @forelse ($mesPresences as $presence)
                                <tr class="hover:bg-gold/5 transition">
                                    <td class="px-6 py-4 text-white font-medium">
                                        {{ \Carbon\Carbon::parse($presence->date)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-300 font-mono">
                                        {{ $presence->heure_arrivee ? \Carbon\Carbon::parse($presence->heure_arrivee)->format('H:i') : '--:--' }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-300 font-mono">
                                        {{ $presence->heure_depart ? \Carbon\Carbon::parse($presence->heure_depart)->format('H:i') : '--:--' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($presence->statut == 'present')
                                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-green-500/20 text-green-400 border border-green-500/30">Présent</span>
                                        @elseif($presence->statut == 'retard')
                                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-orange-500/20 text-orange-400 border border-orange-500/30">Retard</span>
                                        @elseif($presence->statut == 'absent')
                                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-red-500/20 text-red-400 border border-red-500/30">Absent</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($presence->statut !== 'present')
                                            <button onclick="toggleModal('modal-{{ $presence->id }}')" class="text-gold text-xs font-bold border border-gold/30 px-3 py-1 rounded hover:bg-gold hover:text-black transition">
                                                JUSTIFIER
                                            </button>
                                        @else
                                            <span class="text-gray-600 text-xs">---</span>
                                        @endif
                                    </td>
                                </tr>

                                <div id="modal-{{ $presence->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">
                                    <div class="bg-slate-900 border border-gold/20 p-6 rounded-2xl w-full max-w-md">
                                        <h3 class="text-gold font-bold mb-4 uppercase">Justification du {{ $presence->date }}</h3>
                                        
                                        <form action="{{ route('employe.justification.store', $presence->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="space-y-4">
                                                <div>
                                                    <label class="block text-gray-400 text-[10px] uppercase font-bold mb-1">Motif</label>
                                                    <textarea name="motif" rows="3" class="w-full bg-white/5 border border-gold/20 text-white rounded-lg p-3 text-sm focus:border-gold" placeholder="Pourquoi étiez-vous absent ou en retard ?" required></textarea>
                                                </div>
                                                <div>
                                                    <label class="block text-gray-400 text-[10px] uppercase font-bold mb-1">Document (Optionnel)</label>
                                                    <input type="file" name="piece_jointe" class="text-xs text-gray-300">
                                                </div>
                                                <div class="flex gap-2 pt-2">
                                                    <button type="button" onclick="toggleModal('modal-{{ $presence->id }}')" class="flex-1 px-4 py-2 bg-white/10 text-white rounded-lg text-xs font-bold">ANNULER</button>
                                                    <button type="submit" class="flex-1 px-4 py-2 bg-gold text-black rounded-lg text-xs font-bold">ENVOYER</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <td class="px-6 py-4">
    @if($presence->statut == 'absent')
        <div class="flex flex-col">
            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-red-500/20 text-red-400 border border-red-500/30 w-fit">
                Absent
            </span>
            @if(now()->parse($presence->date)->isToday() && now()->hour >= 17)
                <span class="text-[9px] text-red-300/50 mt-1 italic">Clôture automatique à 17h</span>
            @endif
        </div>
    @endif
</td>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">
                                        Aucun enregistrement de présence trouvé.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $mesPresences->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        if(modal) {
            modal.classList.toggle('hidden');
        }
    }
</script>