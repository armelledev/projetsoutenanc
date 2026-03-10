{{-- resources/views/layouts/sidebar-admin.blade.php --}}
<div class="fixed top-0 left-0 h-screen w-64 bg-[#0a0a0a] border-r border-gold/10 shadow-2xl flex flex-col z-50">
    <div class="flex items-center justify-center h-20 bg-[#0a0a0a] border-b border-gold/10">
        <span class="text-white font-bold text-xl tracking-widest uppercase">
            Laeti<span class="text-gold">Time</span>
        </span>
    </div>

    <nav class="flex-1 overflow-y-auto py-4">
        <div class="px-6 py-2 text-xs font-semibold text-gold uppercase tracking-wider">Menu Principal</div>
             
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-6 py-3 text-gray-300 hover:bg-gold/10 hover:text-gold transition-colors group {{ request()->routeIs('dashboard') ? 'bg-gold/10 text-gold border-l-4 border-gold' : '' }}">
            <span class="mr-3 text-lg">🏠</span>
            <span class="text-sm font-medium">Dashboard</span>
        </a>

        {{-- 🔒 ZONE RÉSERVÉE UNIQUEMENT AUX ADMINS --}}
        <p class="text-white">Mon rôle est : {{ auth()->user()->role }}</p>
      @if(auth()->check() && auth()->user()->role->value === 'admin')
            
            <div class="mt-6 px-6 py-2 text-xs font-semibold text-gold uppercase tracking-wider">RH & Employés</div>

            <a href="{{ route('admin.users.create') }}"
                class="flex items-center px-6 py-3 text-gray-300 hover:bg-gold/10 hover:text-gold transition-colors group {{ request()->routeIs('admin.users.create') ? 'bg-gold/10 text-gold border-l-4 border-gold' : '' }}">
                <span class="mr-3 text-lg">➕</span>
                <span class="text-sm font-medium">Créer un employé</span>
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="flex items-center px-6 py-3 text-gray-300 hover:bg-gold/10 hover:text-gold transition-colors group {{ request()->routeIs('admin.users.index') ? 'bg-gold/10 text-gold border-l-4 border-gold' : '' }}">
                <span class="mr-3 text-lg">👥</span>
                <span class="text-sm font-medium">Liste des employés</span>
            </a>

            <div class="mt-6 px-6 py-2 text-xs font-semibold text-gold uppercase tracking-wider">Gestion des présences</div>

            <a href="{{ route('admin.presences.index') }}"
                class="flex items-center px-6 py-3 text-gray-300 hover:bg-gold/10 hover:text-gold transition-colors group {{ request()->routeIs('admin.presences.index') ? 'bg-gold/10 text-gold border-l-4 border-gold' : '' }}">
                <span class="mr-3 text-lg">📋</span>
                <span class="text-sm font-medium">Liste des présences</span>
            </a>

            <a href="{{ route('admin.presences.create') }}"
                class="flex items-center px-6 py-3 text-gray-300 hover:bg-gold/10 hover:text-gold transition-colors group {{ request()->routeIs('admin.presences.create') ? 'bg-gold/10 text-gold border-l-4 border-gold' : '' }}">
                <span class="mr-3 text-lg">➕</span>
                <span class="text-sm font-medium">Créer une présence</span>
            </a>

        @endif
        {{-- 🔒 FIN DE LA ZONE ADMIN --}}

    </nav>

    <div class="p-4 border-t border-gold/10">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-2 text-sm font-medium text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-lg transition">
                <span class="mr-3 text-lg text-red-500">🚪</span>
                Déconnexion
            </button>
        </form>
    </div>
</div>