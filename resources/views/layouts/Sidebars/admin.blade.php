<aside>
<div class="flex h-full flex-col"></div>
    <!-- Logo -->
    <div class="h-16 flex items-center px-6 border-b border-gray-200">
        <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800 flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-green-600 text-white flex items-center justify-center font-bold">P</div>
            Gestion Présences
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-3 py-5 overflow-y-auto">
        <ul class="space-y-1.5">
            <li>
                <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <x-heroicon-o-home class="h-5 w-5" />
                    Tableau de bord
                </a>
            </li>

            <li>
                <a href="{{ route('presence.checkin') ?? '#' }}" class="sidebar-link {{ request()->routeIs('presence.checkin', 'presence.checkout') ? 'active' : '' }}">
                    <x-heroicon-o-clock class="h-5 w-5" />
                    Pointer entrée / sortie
                </a>
            </li>

            <li x-data="{ open: {{ request()->routeIs('presence.*') ? 'true' : 'false' }} }">
                <button @click="open = !open" class="sidebar-link w-full flex justify-between {{ request()->routeIs('presence.*') ? 'active' : '' }}">
                    <div class="flex items-center gap-3">
                        <x-heroicon-o-calendar-days class="h-5 w-5" />
                        Présences
                    </div>
                    <x-heroicon-o-chevron-down class="h-4 w-4 transition-transform" :class="{ 'rotate-180': open }" />
                </button>

                <ul x-show="open" class="mt-1 space-y-1 pl-11">
                    <li><a href="{{ route('presence.history') ?? '#' }}" class="sidebar-sub {{ request()->routeIs('presence.history') ? 'active' : '' }}">Historique personnel</a></li>
                    <li><a href="{{ route('presence.all') ?? '#' }}" class="sidebar-sub {{ request()->routeIs('presence.all') ? 'active' : '' }}">Toutes les présences</a></li>
                    <li><a href="{{ route('presence.monthly') ?? '#' }}" class="sidebar-sub {{ request()->routeIs('presence.monthly') ? 'active' : '' }}">Rapport mensuel global</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('reports.index') ?? '#' }}" class="sidebar-link {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                    <x-heroicon-o-chart-bar class="h-5 w-5" />
                    Rapports & Statistiques
                </a>
            </li>

            <li>
                <a href="{{ route('users.index') ?? '#' }}" class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <x-heroicon-o-users class="h-5 w-5" />
                    Gestion Utilisateurs
                </a>
            </li>

            <li>
                <a href="{{ route('settings.general') ?? '#' }}" class="sidebar-link {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                    <x-heroicon-o-cog-6-tooth class="h-5 w-5" />
                    Paramètres
                </a>
            </li>

            <!-- Profil & Déconnexion -->
            <li class="mt-8 pt-4 border-t border-gray-200">
                <a href="{{ route('profile.edit') }}" class="sidebar-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <x-heroicon-o-user-circle class="h-5 w-5" />
                    Mon profil
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link text-red-700 hover:bg-red-50 w-full text-left">
                        <x-heroicon-o-arrow-right-on-rectangle class="h-5 w-5" />
                        Déconnexion
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="p-4 text-xs text-gray-500 border-t border-gray-200">
        v{{ config('app.version', '1.0') }} • Admin
    </div>
</div>
</aside>