<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Gestion des employés') }}
            </h2>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gold bg-gold/10 px-3 py-1 rounded-full">
                    {{ date('d M Y') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Message de succès -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-xl text-green-400">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Barre d'outils : recherche et ajout -->
            <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6 mb-6">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="w-full sm:w-96">
                        <form method="GET" action="{{ route('admin.users.index') }}">
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un employé..."
                                       class="w-full px-4 py-3 pl-10 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white placeholder-gray-500 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                                <span class="absolute left-3 top-3.5 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('admin.users.create') }}" 
                       class="flex items-center gap-2 px-6 py-3 bg-gold text-black rounded-xl font-medium hover:bg-opacity-90 transition shadow-lg shadow-gold/20">
                        <span class="text-lg">➕</span>
                        <span>Nouvel employé</span>
                    </a>
                </div>
            </div>

            <!-- Tableau des employés -->
            <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gold/20">
                                <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">ID</th>
                                <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Nom</th>
                                <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Email</th>
                                <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Rôle</th>
                                <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Création</th>
                                <th class="text-left py-3 text-xs font-medium text-gold uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gold/10">
                            @forelse($users as $user)
                            <tr class="hover:bg-gold/5 transition">
                                <td class="py-3 text-sm text-white">{{ $user->id }}</td>
                                <td class="py-3 text-sm text-gray-300">{{ $user->name }}</td>
                                <td class="py-3 text-sm text-gray-300">{{ $user->email }}</td>
                                <td class="py-3">
                                    @if($user->role === 'admin')
                                        <span class="px-2 py-1 text-xs rounded-full bg-gold/20 text-gold border border-gold/30">Admin</span>
                                    @else
                                        <span class="px-2 py-1 text-xs rounded-full bg-blue-500/20 text-blue-400 border border-blue-500/30">Employé</span>
                                    @endif
                                </td>
                                <td class="py-3">
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.users.edit', $user) }}" class="text-gold hover:text-gold-light transition" title="Modifier">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </a>
        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-400 hover:text-red-300 transition" title="Supprimer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </form>
    </div>
</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-gray-400">Aucun employé trouvé.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $users->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>