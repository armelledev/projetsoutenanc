<nav x-data="{ open: false }" class="bg-[#0a0a0a] border-b border-gold/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo visible sur mobile (remplace la sidebar) -->
            <div class="flex items-center md:hidden">
                <a href="{{ route('dashboard') }}" class="text-white font-bold text-xl flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-gold text-black flex items-center justify-center font-bold">P</span>
                    <span class="text-gold">Présences</span>
                </a>
            </div>

            <!-- Liens de navigation (desktop) -->
            <div class="hidden md:flex items-center space-x-8">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-300 hover:text-gold px-3 py-2 text-sm font-medium border-b-2 border-transparent hover:border-gold transition">
                    {{ __('Dashboard') }}
                </x-nav-link>

                @if(auth()->user() && auth()->user()->role === 'admin')
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-gray-300 hover:text-gold px-3 py-2 text-sm font-medium border-b-2 border-transparent hover:border-gold transition">
                        {{ __('Admin') }}
                    </x-nav-link>
                @endif

                {{-- <x-nav-link :href="route('presences.mes')" :active="request()->routeIs(patterns: 'presences.mes')" class="text-gray-300 hover:text-gold px-3 py-2 text-sm font-medium border-b-2 border-transparent hover:border-gold transition">
                    {{ __('Mes présences') }}
                </x-nav-link> --}}
            </div>

            <!-- Menu déroulant utilisateur -->
            <div class="flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-gold/30 text-sm leading-4 font-medium rounded-md text-gray-300 bg-transparent hover:bg-gold/10 hover:text-gold hover:border-gold/50 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-gold" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-300 hover:bg-gold/10 hover:text-gold">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-gray-300 hover:bg-gold/10 hover:text-gold">
                                {{ __('Déconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

                <!-- Hamburger (mobile) -->
                <div class="flex items-center md:hidden ms-2">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gold hover:bg-gold/10 focus:outline-none focus:bg-gold/10 focus:text-gold transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu mobile -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#0a0a0a] border-t border-gold/10">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-gold hover:bg-gold/10">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(auth()->user() && auth()->user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-gold hover:bg-gold/10">
                    {{ __('Admin') }}
                </x-responsive-nav-link>
            @endif

            {{-- <x-responsive-nav-link :href="route('presences.mes')" :active="request()->routeIs('presences.mes')" class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-gold hover:bg-gold/10">
                {{ __('Mes présences') }}
            </x-responsive-nav-link> --}}
        </div>

        <div class="pt-4 pb-1 border-t border-gold/10">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-gold hover:bg-gold/10">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-gold hover:bg-gold/10">
                        {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>