
<aside>
<div class="flex h-full flex-col">
    <!-- Logo -->
    <div class="h-16 flex items-center px-6 border-b border-gray-200">
        <span class="text-xl font-bold text-gray-800 flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-green-600 text-white flex items-center justify-center font-bold">P</div>
            Présences
        </span>
    </div>

    <!-- Navigation très limitée -->
    <nav class="flex-1 px-3 py-6">
        <ul class="space-y-1.5">
            <li>
                <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <x-heroicon-o-home class="h-5 w-5" />
                    Accueil
                </a>
            </li>


            <li>
                <a href="" class="sidebar-link {{ request()->routeIs('presence.history') ? 'active' : '' }}">
                    <x-heroicon-o-calendar-days class="h-5 w-5" />
                    Mon historique
                </a>
            </li>

            <li class="mt-10 pt-5 border-t border-gray-200">
                <a href="{{ route('profile.edit') }}" class="sidebar-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <x-heroicon-o-user class="h-5 w-5" />
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
        v{{ config('app.version', '1.0') }} • Employé
    </div>
</div>
</aside>