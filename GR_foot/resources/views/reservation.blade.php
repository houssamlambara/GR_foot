<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Terrain de Football</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <nav class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-4">
            <!-- Logo -->
            <a href="#">
                <img src="" alt="Logo" width="200" height="53.5">
            </a>

            <!-- Menu de navigation -->
            <div class="hidden md:flex space-x-6">
                <a href="/index" class="font-medium text-gray-700 hover:text-green-400 transition">Accueil</a>
                <a href="/activiter" class="font-medium text-gray-700 hover:text-green-400 transition">Notre
                    Activités</a>
                <a href="/reservation"
                    class="font-medium text-gray-700 hover:text-green-400 transition">Réservation</a>
                <a href="/tournois" class="font-medium text-gray-700 hover:text-green-400 transition">Tournois</a>
                <a href="/about" class="font-medium text-gray-700 hover:text-green-400 transition">About</a>
                <a href="/contact" class="font-medium text-gray-700 hover:text-green-400 transition">Contact</a>
            </div>

            <!-- Boutons Sign In et Sign Up -->
            <div class="hidden md:flex space-x-4">
                <a href="/signin"
                    class="bg-transparent text-gray-700 px-4 py-2 border border-gray-400 rounded-lg font-semibold hover:bg-gray-100 transition">Sign
                    In</a>
                <a href="/signin"
                    class="bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white px-4 py-2 rounded-lg font-semibold transition">Sign
                    Up</a>
            </div>

            <!-- Menu burger pour mobile -->
            <button id="burger-btn" class="md:hidden flex items-center justify-center p-2 rounded-md bg-gray-200 hover:bg-gray-300
focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" aria-label="Menu">
                <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </nav>
    </header>

    <!-- Mobile menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden bg-white shadow-md hidden absolute z-50 top-16 left-0 right-0">
        <div class="px-6 py-4 space-y-4">
            <a href="/index" class="block text-gray-700 font-medium hover:text-green-400 transition">Accueil</a>
            <a href="/activiter" class="block text-gray-700 font-medium hover:text-green-400 transition">Notre
                Activités</a>
            <a href="/reservation"
                class="block text-gray-700 font-medium hover:text-green-400 transition">Réservation</a>
            <a href="/tournois"
                class="block text-gray-700 font-medium hover:text-green-400 transition">Tournois</a>
            <a href="/about" class="block text-gray-700 font-medium hover:text-green-400 transition">About</a>
            <a href="/contact" class="block text-gray-700 font-medium hover:text-green-400 transition">Contact</a>
            <a href="./signin"
                class="block text-white bg-gradient-to-r from-green-400 via-green-600 to-green-800 px-4 py-2 rounded-lg font-semibold text-center transition">Sign
                Up</a>
            <a href="./signin"
                class="block text-gray-700 border border-gray-400 px-4 py-2 rounded-lg font-semibold text-center hover:bg-gray-100 transition">Sign
                In</a>
        </div>
    </div>

    <!-- Page Content -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-green-700 to-green-500 mb-16">Réservez votre terrain maintenant</h2>

            <!-- Formulaire de réservation -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Détails du terrain -->
                <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Sélectionnez votre terrain</h3>
                    <p class="text-gray-600 mb-8">Choisissez un terrain disponible pour votre prochaine partie !</p>

                    <div class="space-y-6">
                        <div>
                            <label for="nom" class="block text-sm font-semibold text-gray-700">Nom Complet</label>
                            <input type="text" id="nom"
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200"
                                placeholder="Entrez votre nom Complet">
                        </div>

                        <!-- Nouveau champ : Numéro de téléphone -->
                        <div>
                            <label for="telephone" class="block text-sm font-semibold text-gray-700">Numéro de
                                téléphone</label>
                            <input type="tel" id="telephone"
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200"
                                placeholder="Entrez votre numéro de téléphone">
                        </div>

                        <!-- Nouveau champ : Sélection de la date -->
                        <div>
                            <label for="date" class="block text-sm font-semibold text-gray-700">Date de
                                réservation</label>
                            <input type="date" id="date"
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                        </div>

                        <!-- Sélection de l'heure de début -->
                        <div>
                            <label for="heure-debut" class="block text-sm font-semibold text-gray-700">Heure de
                                début</label>
                            <select id="heure-debut"
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                                <option value="09">09h</option>
                                <option value="10">10h</option>
                                <option value="11">11h</option>
                                <option value="12">12h</option>
                                <option value="13">13h</option>
                                <option value="14">14h</option>
                                <option value="15">15h</option>
                                <option value="16">16h</option>
                                <option value="17">17h</option>
                                <option value="18">18h</option>
                                <option value="19">19h</option>
                                <option value="20">20h</option>
                                <option value="21">21h</option>
                                <option value="22">22h</option>
                            </select>
                        </div>

                        <!-- Sélection de l'heure de fin -->
                        <div>
                            <label for="heure-fin" class="block text-sm font-semibold text-gray-700">Heure de
                                fin</label>
                            <select id="heure-fin"
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                                <option value="09">09h</option>
                                <option value="10">10h</option>
                                <option value="11">11h</option>
                                <option value="12">12h</option>
                                <option value="13">13h</option>
                                <option value="14">14h</option>
                                <option value="15">15h</option>
                                <option value="16">16h</option>
                                <option value="17">17h</option>
                                <option value="18">18h</option>
                                <option value="19">19h</option>
                                <option value="20">20h</option>
                                <option value="21">21h</option>
                                <option value="22">22h</option>
                            </select>
                        </div>


                        <div>
                            <label for="terrain" class="block text-sm font-semibold text-gray-700">Terrain</label>
                            <select id="terrain"
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                                <option value="terrain1">Terrain 1 - 5 VS 5</option>
                                <option value="terrain2">Terrain 2 - 7 VS 7</option>
                                <option value="terrain3">Terrain 3 - 11 VS 11</option>
                                <option value="padel">Padel</option>
                            </select>
                        </div>

                        <!-- Nouveau champ : Choix de l'activité -->
                        <div>
                            <label for="activite" class="block text-sm font-semibold text-gray-700">Choisissez votre
                                activité</label>
                            <select id="activite"
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                                <option value="football">Football</option>
                                <option value="padel">Padel</option>
                                <option value="tennis">Tennis</option>
                                <option value="basketball">Basketball</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Détails de la réservation -->
                <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Résumé de la réservation</h3>
                    <p class="text-gray-600 mb-8">Vérifiez les informations avant de confirmer votre réservation.</p>

                    <div class="space-y-6">
                        <!-- Nom complet -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Nom Complet</p>
                            <p id="nom-complet-selection" class="text-lg font-bold text-gray-800">John Doe</p>
                        </div>

                        <!-- Terrain sélectionné -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Terrain Sélectionné</p>
                            <p id="terrain-selection" class="text-lg font-bold text-gray-800">Terrain 1 - 5x5</p>
                        </div>

                        <!-- Horaire sélectionné -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Horaire Sélectionné</p>
                            <p id="horaire-selection" class="text-lg font-bold text-gray-800">14:00 - 15:00</p>
                        </div>

                        <!-- Date de réservation -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Date de Réservation</p>
                            <p id="date-selection" class="text-lg font-bold text-gray-800">18-03-2025</p>
                        </div>

                        <!-- Numéro de téléphone -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Numéro de téléphone</p>
                            <p id="telephone-selection" class="text-lg font-bold text-gray-800">+212 000 000 000</p>
                        </div>

                        <!-- Activité choisie -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Activité Choisie</p>
                            <p id="activite-selection" class="text-lg font-bold text-gray-800">Football</p>
                        </div>
                    </div>

                    <button
                        class="w-full bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white py-4 rounded-xl mt-8">
                        Confirmer la Réservation
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- Section Tarifs -->
    <section class="py-20 bg-gradient-to-br from-green-50 to-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <h2
                class="text-4xl font-bold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-green-700 to-green-500">
                Nos Tarifs</h2>
            <p class="text-center text-gray-600 mb-12 max-w-xl mx-auto">Découvrez nos offres adaptées à tous les sports
                et tous les budgets</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Tarif 1: Football 5 vs 5 -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-green-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Football 5 vs 5</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-green-600">400 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en gazon
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Gilets 2 Equipes
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Douche
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 2: Football 7 vs 7 -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-green-600">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Football 7 vs 7</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-green-600">700 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en gazon
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Gilets 2 Equipes
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Douche
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 3: Football 11 vs 11 -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-green-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Football 11 vs 11</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-green-600">1200 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en gazon
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Gilets 2 Equipes
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Douche
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Deuxième ligne (3 éléments) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                <!-- Tarif 4: Padel -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-blue-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Padel</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-blue-600">250 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès Vestiaire
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Raquettes fournies
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Balles incluses
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 5: Tennis -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-blue-500">
                    <div class="p-6">

                        <h3 class="text-2xl font-bold text-center text-gray-800">Tennis</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-blue-600">300 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès Vestiaire
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Raquettes fournies
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Balles incluses
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 6: Basketball -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-orange-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Basketball</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-orange-600">250 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en parquet
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Ballon fourni
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black py-10">
        <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">
            <!-- Logo and Social Links -->
            <div class="flex items-center justify-center mb-6 md:mb-0"> <!-- Ajout de justify-center -->
                <img src="" alt="GSP Logo" class="w-48 h-auto">
            </div>

            <!-- Address Section -->
            <div class="text-center md:text-left"> <!-- Ajout de text-center pour mobile -->
                <h3 class="text-xl font-semibold mb-3 text-white">Adresse Paris</h3>
                <p class="text-gray-300 text-sm leading-relaxed">123 Avenue des Champs-Élysées, 75008 Paris, France.</p>
                <h3 class="text-xl font-semibold mb-3 mt-6 text-white">Téléphone</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Contactez-nous : +33 1 23 45 67 89</p>
            </div>

            <!-- Contact Section -->
            <div class="text-center md:text-left"> <!-- Ajout de text-center pour mobile -->
                <h3 class="text-xl font-semibold mb-3 text-white">Contactez-nous</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Des questions ? Nous sommes là pour vous aider.</p>
                <p><a href="mailto:contact@example.com" class="text-yellow-500 hover:underline">contact@example.com</a>
                </p>
            </div>

            <!-- Social Media Section -->
            <div class="text-center md:text-left"> <!-- Ajout de text-center pour mobile -->
                <h3 class="text-xl font-semibold mb-3 text-white">Suivez-nous sur les Réseaux Sociaux</h3>
                <div class="grid grid-cols-4 gap-6 justify-center">
                    <!-- Ajout de justify-center pour centrer les icônes -->
                    <a href="https://www.facebook.com" target="_blank" class="text-gray-300 hover:text-yellow-500">
                        <i class="fab fa-facebook-f text-2xl"></i>
                    </a>
                    <a href="https://www.twitter.com" target="_blank" class="text-gray-300 hover:text-yellow-500">
                        <i class="fab fa-twitter text-2xl"></i>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" class="text-gray-300 hover:text-yellow-500">
                        <i class="fab fa-instagram text-2xl"></i>
                    </a>
                    <a href="https://www.linkedin.com" target="_blank" class="text-gray-300 hover:text-yellow-500">
                        <i class="fab fa-linkedin-in text-2xl"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-10 border-t border-gray-700 pt-6 text-sm text-center text-gray-400">
            <p>© 2025, EXAMPLE COMPANY. Créé avec passion par WebDev Agency.</p>
            <p>© Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        // Sélectionner le bouton burger et le menu mobile
        const burgerBtn = document.getElementById("burger-btn");
        const mobileMenu = document.getElementById("mobile-menu");

        // Ajouter un événement pour ouvrir/fermer le menu
        burgerBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden"); // Toggle la classe 'hidden' pour afficher/masquer le menu
        });

        // Optionnel : ajouter un événement pour fermer le menu lorsqu'un lien est cliqué
        const menuLinks = mobileMenu.querySelectorAll("a");
        menuLinks.forEach(link => {
            link.addEventListener("click", () => {
                mobileMenu.classList.add("hidden"); // Fermer le menu lorsqu'un lien est cliqué
            });
        });
    </script>

</body>

</html>