<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaetiTime · Établissement scolaire</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes subtle-raise {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .animate-fade-up {
            animation: fadeInUp 0.7s ease-out forwards;
        }
        .animate-raise {
            animation: subtle-raise 6s ease-in-out infinite;
        }
        .delay-1 { animation-delay: 0.1s; opacity: 0; }
        .delay-2 { animation-delay: 0.2s; opacity: 0; }
        .delay-3 { animation-delay: 0.3s; opacity: 0; }
        .delay-4 { animation-delay: 0.4s; opacity: 0; }
        
        /* Or discret et raffiné */
        .text-gold {
            color: #c9a959;
        }
        .border-gold {
            border-color: rgba(201, 169, 89, 0.3);
        }
        .bg-gold {
            background-color: #c9a959;
        }
        .bg-gold-light {
            background-color: rgba(201, 169, 89, 0.08);
        }
        .hover-gold:hover {
            color: #c9a959;
        }
        
        /* Cards élégantes */
        .card-premium {
            background: rgba(18, 18, 20, 0.7);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(201, 169, 89, 0.15);
            transition: all 0.3s ease;
        }
        .card-premium:hover {
            border-color: rgba(201, 169, 89, 0.4);
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -15px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(201, 169, 89, 0.2);
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
        
        /* Overlay pour images */
        .img-overlay {
            position: relative;
        }
        .img-overlay::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(10, 10, 10, 0.8) 0%, rgba(10, 10, 10, 0.4) 50%, transparent 100%);
            pointer-events: none;
        }
        
        /* Image hero */
        .hero-image {
            background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="font-[inter] antialiased bg-[#0a0a0a] text-gray-100">

<!-- Navigation premium dark -->
<header class="fixed w-full bg-[#0a0a0a]/80 backdrop-blur-xl border-b border-gold/10 z-50">
    <div class="max-w-7xl mx-auto px-6 md:px-12 flex items-center justify-between h-20">
        <!-- Marque avec touche dorée -->
        <a href="/" class="text-2xl font-medium tracking-tight text-white hover:text-gold transition-colors group">
            LaetiTime<span class="text-gold ml-0.5 group-hover:opacity-80">.</span>
        </a>
        
        <!-- Navigation discrète -->
        <nav class="hidden md:flex space-x-10 text-sm font-medium text-gray-300">
            <a href="#" class="hover:text-gold transition-colors border-b border-transparent hover:border-gold/50 pb-1">Accueil</a>
            <a href="#" class="hover:text-gold transition-colors border-b border-transparent hover:border-gold/50 pb-1">Approche</a>
            <a href="#" class="hover:text-gold transition-colors border-b border-transparent hover:border-gold/50 pb-1">Établissements</a>
            <a href="#" class="hover:text-gold transition-colors border-b border-transparent hover:border-gold/50 pb-1">Contact</a>
        </nav>

        <div class="flex items-center space-x-6 text-sm">
            <a href="{{ route('login') }}" class="text-gray-400 hover:text-gold transition hidden sm:inline">Se connecter</a>
            <a href="{{ route('register') }}" class="border border-gold/30 hover:border-gold text-gold hover:text-white px-5 py-2 rounded-full transition duration-300 ease-in-out bg-transparent hover:bg-gold/10">s'enregistrer</a>
        </div>
    </div>
</header>

<!-- Hero section avec image de fond (classe moderne) -->
<main class="relative pt-20">
    <div class="hero-image absolute inset-0 w-full h-full"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#0a0a0a] via-[#0a0a0a]/70 to-transparent"></div>
    
    <div class="relative max-w-7xl mx-auto px-6 md:px-12 py-24 md:py-32 z-10">
        <div class="max-w-3xl">
            <div class="inline-block px-3 py-1 bg-gold-light text-gold text-xs font-semibold rounded-full mb-6 animate-fade-up">
                ÉTABLISSEMENT SCOLAIRE
            </div>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6 animate-fade-up delay-1">
                Gestion des présences <br><span class="text-gold">simple & élégante</span>
            </h1>
            <p class="text-lg text-gray-300 mb-8 max-w-xl animate-fade-up delay-2">
                La solution de réference pour la Suivez des présences en temps réel de la canadienne, communiquez avec les employers et allégez la charge administrative.
            </p>
            
            <!-- Statistiques dorées -->
            <div class="flex flex-wrap gap-8 mb-10 animate-fade-up delay-3">
                <div>
                    <div class="text-3xl font-bold text-gold">450+</div>
                    <div class="text-sm text-gray-400">établissements</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gold">12k+</div>
                    <div class="text-sm text-gray-400">enseignants</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gold">98%</div>
                    <div class="text-sm text-gray-400">recommandent</div>
                </div>
            </div>
            
            <div class="flex flex-wrap gap-4 animate-fade-up delay-4">
                <a href="#" class="bg-gold text-black px-6 py-3 rounded-lg font-medium hover:bg-opacity-90 transition shadow-lg shadow-gold/20 inline-flex items-center gap-2">
                    Demander une démo
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
                <a href="#" class="border border-gold/30 text-gray-200 px-6 py-3 rounded-lg font-medium hover:border-gold hover:text-gold transition">
                    Documentation
                </a>
            </div>
        </div>
    </div>
</main>

<!-- Section fonctionnalités avec image intégrée -->
<section class="py-24 bg-[#0a0a0a] dot-pattern">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
        <div class="text-center mb-16">
            <span class="text-xs font-semibold tracking-[0.25em] text-gold uppercase bg-gold-light py-2 px-4 rounded-full border border-gold/10">Fonctions clés</span>
            <h2 class="text-3xl md:text-4xl font-light text-white mt-8 max-w-2xl mx-auto leading-tight">
                Conçu pour les <span class="text-gold">établissements scolaires</span>
            </h2>
            <div class="divider-gold w-40 mx-auto mt-6"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-center mb-20">
            <!-- Texte -->
            <div>
                <h3 class="text-2xl font-medium text-white mb-4">Un tableau de bord clair et intuitif</h3>
                <p class="text-gray-400 mb-6">
                    Visualisez en un coup d'œil les présences du jour, les absences à signaler et les statistiques par classe. 
                    Accès différencié pour la direction, les enseignants et la vie scolaire.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <span class="text-gold text-lg">✓</span>
                        <span class="text-gray-300">Pointage en temps réel depuis l'ENT ou l'application mobile</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-gold text-lg">✓</span>
                        <span class="text-gray-300">Alertes automatiques aux parents en cas d'absence</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-gold text-lg">✓</span>
                        <span class="text-gray-300">Export des rapports pour l'inspection académique</span>
                    </li>
                </ul>
            </div>
            <!-- Image -->
            <div class="rounded-2xl overflow-hidden border border-gold/20 shadow-2xl">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Tableau de bord scolaire" class="w-full h-auto object-cover">
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Carte premium avec petite icône image (remplacée par icône svg pour rester sobre) -->
            <div class="card-premium rounded-2xl p-8">
                <div class="w-14 h-14 bg-gold-light rounded-xl flex items-center justify-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h4 class="text-xl font-medium text-white mb-2">Gestion du personnel</h4>
                <p class="text-gray-400 text-sm">Profils enseignants, administratifs, vie scolaire. Accès différenciés par rôle.</p>
            </div>
            <div class="card-premium rounded-2xl p-8">
                <div class="w-14 h-14 bg-gold-light rounded-xl flex items-center justify-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h4 class="text-xl font-medium text-white mb-2">Emplois du temps</h4>
                <p class="text-gray-400 text-sm">Planification des cours, salles, remplacements. Vue hebdomadaire claire.</p>
            </div>
            <div class="card-premium rounded-2xl p-8">
                <div class="w-14 h-14 bg-gold-light rounded-xl flex items-center justify-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="text-xl font-medium text-white mb-2">Présences en temps réel</h4>
                <p class="text-gray-400 text-sm">Pointage par cours, alertes absences, suivi des retards.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section témoignage avec image (proviseur) -->
<section class="py-24 bg-[#0f0f0f] border-y border-gold/10">
    <div class="max-w-5xl mx-auto px-6 md:px-12">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-gold/10 rounded-full blur-2xl"></div>
                    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Proviseur" class="rounded-2xl border border-gold/20 shadow-xl relative z-10">
                </div>
            </div>
            <div>
                <span class="text-7xl text-gold font-serif opacity-30">“</span>
                <p class="text-2xl text-gray-200 font-light leading-relaxed -mt-6">
                    LaetiTime a transformé notre gestion des présences. Fini les feuilles volantes, place à un outil clair et fiable. Nos enseignants adorent sa simplicité.
                </p>
                <div class="mt-8">
                    <p class="font-semibold text-white">Philippe Martin</p>
                    <p class="text-sm text-gold">Proviseur, Lycée International</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA avec image de fond subtile -->
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Bibliothèque" class="w-full h-full object-cover opacity-10">
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] to-transparent"></div>
    <div class="relative max-w-3xl mx-auto text-center px-6">
        <h3 class="text-3xl md:text-4xl font-light text-white mb-4">Prêt à simplifier votre quotidien ?</h3>
        <div class="divider-gold w-32 mx-auto my-6"></div>
        <p class="text-gray-300 text-lg mb-10">Rejoignez les 450+ établissements qui nous font confiance.</p>
        <a href="#" class="inline-block bg-gold text-black px-10 py-4 rounded-full text-sm font-medium tracking-wide hover:bg-opacity-90 transition-all duration-300 shadow-lg shadow-gold/30 hover:shadow-gold/40">Demander une démonstration</a>
    </div>
</section>

<!-- Footer premium dark -->
<footer class="bg-[#0a0a0a] pt-20 pb-12 border-t border-gold/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
            <div>
                <h5 class="text-sm font-semibold text-white tracking-wider uppercase mb-5">LaetiTime</h5>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">À propos</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">Établissements</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">Tarifs</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">Blog</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-sm font-semibold text-white tracking-wider uppercase mb-5">Ressources</h5>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">Documentation</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">Support</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">Tutoriels</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-sm font-semibold text-white tracking-wider uppercase mb-5">Légal</h5>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">Confidentialité</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">CGU</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-gold transition">Mentions légales</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-sm font-semibold text-white tracking-wider uppercase mb-5">Contact</h5>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-center gap-2">
                        <span class="text-gold text-xs">✉</span> contact@laetitime.fr
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-gold text-xs">📞</span> +33 1 42 68 00 11
                    </li>
                    <li class="flex items-center gap-2 mt-2 text-xs text-gray-500">Paris · Lyon · Bordeaux</li>
                </ul>
            </div>
        </div>

        <div class="divider-gold my-12"></div>

        <div class="flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500">
            <p>© 2026 LaetiTime. Tous droits réservés.</p>
            <p class="mt-2 sm:mt-0">Design · <span class="text-gold">éducation & élégance</span></p>
        </div>
    </div>
</footer>

<!-- Bouton retour haut discret -->
<button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="fixed bottom-6 right-6 w-12 h-12 bg-[#1a1a1a] border border-gold/20 rounded-full flex items-center justify-center text-gold hover:border-gold hover:bg-gold/10 shadow-lg transition-all duration-300 z-50">
    <span class="text-xl leading-none">↑</span>
</button>

</body>
</html>