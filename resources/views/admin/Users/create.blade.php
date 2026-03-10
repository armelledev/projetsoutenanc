{{-- resources/views/admin/users/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Créer un nouvel employé') }}
            </h2>
            <span class="text-sm text-gold bg-gold/10 px-3 py-1 rounded-full">
                {{ date('d M Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-sm border border-gold/10 rounded-2xl p-8">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf

                    <!-- Nom -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gold mb-2">Nom complet</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white placeholder-gray-500 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                        @error('name')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gold mb-2">Adresse email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white placeholder-gray-500 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                        @error('email')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gold mb-2">Mot de passe</label>
                        <input type="password" name="password" id="password" required
                               class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white placeholder-gray-500 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                        @error('password')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gold mb-2">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                               class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white placeholder-gray-500 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                    </div>

                    <!-- Rôle -->
                    <div class="mb-8">
                        <label for="role" class="block text-sm font-medium text-gold mb-2">Rôle</label>
                        <select name="role" id="role" required
                                class="w-full px-4 py-3 bg-[#0a0a0a] border border-gold/20 rounded-xl text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
                            <option value="employe" {{ old('role') == 'employe' ? 'selected' : '' }}>Employer</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
                             <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>super_admin</option>
                        </select>
                        @error('role')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Boutons -->
                    <div class="flex items-center justify-end gap-4">
                        <a href="{{ route('admin.users.index') }}" 
                           class="px-6 py-3 border border-gold/30 text-gold rounded-xl hover:bg-gold/10 transition">
                            Annuler
                        </a>
                        <button type="submit"
                                class="px-6 py-3 bg-gold text-black rounded-xl font-medium hover:bg-opacity-90 transition shadow-lg shadow-gold/20">
                            Créer l'employé
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>