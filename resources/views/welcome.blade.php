<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaetiTime · Établissement scolaire</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Applique le thème immédiatement pour éviter le flash blanc
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes subtle-raise {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .animate-fade-up { animation: fadeInUp 0.7s ease-out forwards; }
        .animate-raise { animation: subtle-raise 6s ease-in-out infinite; }
        .delay-1 { animation-delay: 0.1s; opacity: 0; }
        .delay-2 { animation-delay: 0.2s; opacity: 0; }
        .delay-3 { animation-delay: 0.3s; opacity: 0; }
        .delay-4 { animation-delay: 0.4s; opacity: 0; }
        
        /* Couleurs Or (Variables pour réutilisation) */
        :root { --color-gold: #c9a959; }
        .text-gold { color: var(--color-gold); }
        .border-gold { border-color: rgba(201, 169, 89, 0.3); }
        .bg-gold { background-color: var(--color-gold); }
        .bg-gold-light { background-color: rgba(201, 169, 89, 0.08); }
        
        /* Cards élégantes */
        .card-premium {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(201, 169, 89, 0.15);
            transition: all 0.3s ease;
        }
        .dark .card-premium { background: rgba(18, 18, 20, 0.7); }
        
        .card-premium:hover {
            border-color: rgba(201, 169, 89, 0.4);
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -15px rgba(0, 0, 0, 0.3);
        }
        
        /* Diviseur doré subtil */
        .divider-gold {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(201, 169, 89, 0.4), rgba(201, 169, 89, 0.6), rgba(201, 169, 89, 0.4), transparent);
        }
        
        /* Fond avec motif discret */
        .dot-pattern {
            background-image: radial-gradient(rgba(201, 169, 89, 0.05) 1px, transparent 1px);
            background-size: 32px 32px;
        }
        
        /* Image hero */
        .hero-image {
            background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="font-[inter] antialiased bg-gray-100 dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 transition-colors duration-500">

<header class="fixed w-full bg-gray-50/80 dark:bg-[#0a0a0a]/80 backdrop-blur-xl border-b border-gray-100 dark:border-gold/10 z-50">
    <div class="max-w-7xl mx-auto px-6 md:px-12 flex items-center justify-between h-20">
        <a href="/" class="text-2xl font-medium tracking-tight text-gray-900 dark:text-white hover:text-gold transition-colors group">
            LaetiTime<span class="text-gold ml-0.5 group-hover:opacity-80">.</span>
        </a>
        
        <nav class="hidden md:flex space-x-10 text-sm font-medium text-gray-600 dark:text-gray-300">
            <a href="#" class="hover:text-gold transition-colors border-b border-transparent hover:border-gold/50 pb-1">Accueil</a>
            <a href="#" class="hover:text-gold transition-colors border-b border-transparent hover:border-gold/50 pb-1">Approche</a>
            <a href="#" class="hover:text-gold transition-colors border-b border-transparent hover:border-gold/50 pb-1">Établissements</a>
            <a href="#" class="hover:text-gold transition-colors border-b border-transparent hover:border-gold/50 pb-1">Contact</a>
        </nav>

        <div class="flex items-center space-x-4 md:space-x-6">
            <button id="theme-toggle" class="p-2 rounded-full border border-gray-100 dark:border-gold/20 hover:bg-gray-50 dark:hover:bg-gold/10 transition-all text-gray-500 dark:text-gold">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
            </button>

            <div class="flex items-center space-x-4 text-sm">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 dark:text-gray-400 hover:text-gold transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-400 hover:text-gold transition hidden sm:inline">Se connecter</a>
                    <a href="{{ route('register') }}" class="border border-gold/30 hover:border-gold text-gold hover:text-white px-5 py-2 rounded-full transition duration-300 bg-transparent hover:bg-gold/10 uppercase text-[10px] tracking-widest font-bold">s'enregistrer</a>
                @endauth
            </div>
        </div>
    </div>
</header>

<main class="relative pt-20">
    <div class="hero-image absolute inset-0 w-full h-full"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-gray-100 via-gray-100/90 to-transparent dark:from-[#0a0a0a] dark:via-[#0a0a0a]/70 dark:to-transparent"></div>
    
    <div class="relative max-w-7xl mx-auto px-6 md:px-12 py-24 md:py-32 z-10">
        <div class="max-w-3xl">
            <div class="inline-block px-3 py-1 bg-gold-light text-gold text-xs font-semibold rounded-full mb-6 animate-fade-up">
                ÉTABLISSEMENT SCOLAIRE
            </div>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white leading-tight mb-6 animate-fade-up delay-1">
                Gestion des présences <br><span class="text-gold">simple & élégante</span>
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 max-w-xl animate-fade-up delay-2">
                La solution de référence pour le suivi des présences en temps réel, la communication fluide avec les employés et l'allègement de votre charge administrative.
            </p>
            
            <div class="flex flex-wrap gap-8 mb-10 animate-fade-up delay-3">
                <div>
                    <div class="text-3xl font-bold text-gold">450+</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">établissements</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gold">12k+</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">enseignants</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gold">98%</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">recommandent</div>
                </div>
            </div>
            
            <div class="flex flex-wrap gap-4 animate-fade-up delay-4">
                <a href="#" class="bg-gold text-gray-50 dark:text-black px-6 py-3 rounded-lg font-medium hover:bg-opacity-90 transition shadow-lg shadow-gold/20 inline-flex items-center gap-2">
                    Demander une démo
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
                <a href="#" class="border border-gold/30 text-gray-700 dark:text-gray-200 px-6 py-3 rounded-lg font-medium hover:border-gold hover:text-gold transition">
                    Documentation
                </a>
            </div>
        </div>
    </div>
</main>

<section class="py-24 bg-gray-50 dark:bg-[#0a0a0a] dot-pattern transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
        <div class="text-center mb-16">
            <span class="text-xs font-semibold tracking-[0.25em] text-gold uppercase bg-gold-light py-2 px-4 rounded-full border border-gold/10">Fonctions clés</span>
            <h2 class="text-3xl md:text-4xl font-light text-gray-900 dark:text-white mt-8 max-w-2xl mx-auto leading-tight">
                Conçu pour les <span class="text-gold">établissements scolaires</span>
            </h2>
            <div class="divider-gold w-40 mx-auto mt-6"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-center mb-20">
            <div>
                <h3 class="text-2xl font-medium text-gray-900 dark:text-white mb-4">Un tableau de bord clair et intuitif</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6 leading-relaxed">
                    Visualisez en un coup d'œil les présences du jour, les absences à signaler et les statistiques par classe. 
                    Accès différencié pour la direction, les enseignants et la vie scolaire.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <span class="text-gold">✓</span> Pointage en temps réel (ENT / Mobile)
                    </li>
                    <li class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <span class="text-gold">✓</span> Alertes automatiques aux parents
                    </li>
                    <li class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <span class="text-gold">✓</span> Exports rapports académiques
                    </li>
                </ul>
            </div>
            <div class="rounded-2xl overflow-hidden border border-gray-900 dark:border-gold/20 shadow-2xl">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Dashboard" class="w-full h-auto">
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card-premium rounded-2xl p-8 bg-gray-50/50">
                <div class="w-14 h-14 bg-gold-light rounded-xl flex items-center justify-center mb-5 text-gold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <h4 class="text-xl font-medium text-gray-900 dark:text-white mb-2">Gestion du personnel</h4>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Profils enseignants, administratifs et accès par rôles.</p>
            </div>
            <div class="card-premium rounded-2xl p-8 bg-gray-50/50">
                <div class="w-14 h-14 bg-gold-light rounded-xl flex items-center justify-center mb-5 text-gold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                </div>
                <h4 class="text-xl font-medium text-gray-900 dark:text-white mb-2">Emplois du temps</h4>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Planification des cours, salles et remplacements.</p>
            </div>
            <div class="card-premium rounded-2xl p-8 bg-gray-50/50">
                <div class="w-14 h-14 bg-gold-light rounded-xl flex items-center justify-center mb-5 text-gold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h4 class="text-xl font-medium text-gray-900 dark:text-white mb-2">Présences live</h4>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Pointage par cours, alertes absences et suivi des retards.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-50 dark:bg-[#0f0f0f] border-y border-gray-100 dark:border-gold/10 transition-colors duration-500">
    <div class="max-w-5xl mx-auto px-6 md:px-12 grid md:grid-cols-2 gap-12 items-center">
        <div class="relative">
            <div class="absolute -top-4 -left-4 w-24 h-24 bg-gold/10 rounded-full blur-2xl"></div>
            <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Proviseur" class="rounded-2xl border border-gold/20 shadow-xl relative z-10">
        </div>
        <div>
            <span class="text-7xl text-gold font-serif opacity-30">“</span>
            <p class="text-2xl text-gray-700 dark:text-gray-200 font-light leading-relaxed -mt-6 italic">
                LaetiTime a transformé notre gestion des présences. Fini les feuilles volantes, place à un outil clair et fiable. Nos enseignants adorent sa simplicité.
            </p>
            <div class="mt-8">
                <p class="font-semibold text-gray-900 dark:text-white">Philippe Martin</p>
                <p class="text-sm text-gold">Proviseur, Lycée International</p>
            </div>
        </div>
    </div>
</section>

<footer class="bg-gray-50 dark:bg-[#0a0a0a] pt-20 pb-12 border-t border-gray-100 dark:border-gold/10 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
            <div>
                <h5 class="text-xs font-bold text-gray-900 dark:text-white tracking-widest uppercase mb-6">LaetiTime</h5>
                <ul class="space-y-3 text-sm text-gray-500 dark:text-gray-400">
                    <li><a href="#" class="hover:text-gold transition">À propos</a></li>
                    <li><a href="#" class="hover:text-gold transition">Tarifs</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-xs font-bold text-gray-900 dark:text-white tracking-widest uppercase mb-6">Support</h5>
                <ul class="space-y-3 text-sm text-gray-500 dark:text-gray-400">
                    <li><a href="#" class="hover:text-gold transition">Documentation</a></li>
                    <li><a href="#" class="hover:text-gold transition">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-xs font-bold text-gray-900 dark:text-white tracking-widest uppercase mb-6">Légal</h5>
                <ul class="space-y-3 text-sm text-gray-500 dark:text-gray-400">
                    <li><a href="#" class="hover:text-gold transition">Confidentialité</a></li>
                    <li><a href="#" class="hover:text-gold transition">Mentions</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-xs font-bold text-gray-900 dark:text-white tracking-widest uppercase mb-6">Contact</h5>
                <p class="text-sm text-gray-500 dark:text-gray-400">contact@laetitime.fr<br>Paris · Lyon · Bordeaux</p>
            </div>
        </div>
        <div class="divider-gold my-12"></div>
        <div class="flex flex-col sm:flex-row justify-between items-center text-[10px] uppercase tracking-widest text-gray-400">
            <p>© 2026 LaetiTime. Tous droits réservés.</p>
            <p class="mt-2 sm:mt-0">Design · <span class="text-gold">éducation & élégance</span></p>
        </div>
    </div>
</footer>

<button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="fixed bottom-6 right-6 w-12 h-12 bg-gray-50 dark:bg-[#1a1a1a] border border-gold/20 rounded-full flex items-center justify-center text-gold hover:scale-110 shadow-lg transition-all z-50">
    ↑
</button>

<script>
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Afficher l'icône appropriée au chargement
    if (document.documentElement.classList.contains('dark')) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    themeToggleBtn.addEventListener('click', function() {
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
</script>

</body>
</html>