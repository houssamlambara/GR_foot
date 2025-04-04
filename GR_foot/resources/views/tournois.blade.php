@extends('layout.header')

@section('title', 'Réservation de Terrain de Football')

@section('content')

    <!-- Main Content -->
    <div class="container mx-auto py-16 px-6 flex justify-center">
        <div class="w-full max-w-screen-lg text-center">
            <!-- Titre principal -->
            <h1 class="text-4xl sm:text-4xl md:text-5xl font-bold text-gray-800 mb-12 relative">
                <span class="relative z-10">Gestion des Tournois</span>
                <span
                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-20 h-2 bg-brand-green rounded-full"></span>
            </h1>

            <!-- Tournois en cours -->
            <section>
                <h2
                    class="text-2xl sm:text-2xl md:text-3xl font-semibold text-brand-green mb-8 flex items-center justify-center">
                    <span class="mr-3"><i class="fas fa-trophy"></i></span>
                    Tournois en cours
                </h2>

                <!-- Cards de Tournois -->
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 : Tournoi de Football -->
                    <div
                        class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                        <img src="./img/11vs11.png" alt="Tournoi de Football"
                            class="w-full h-40 object-cover rounded-xl mb-4">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">Tournoi de Football</h3>
                            <span
                                class="inline-block px-4 py-1 bg-gradient-to-r from-green-400 to-green-500 text-white text-xs rounded-full shadow-sm">En
                                cours</span>
                        </div>
                        <div class="space-y-3 mb-6">
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="far fa-calendar-alt mr-2 text-brand-green"></i>
                                <span>20 Mars 2025</span>
                            </p>
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="fas fa-users mr-2 text-brand-green"></i>
                                <span>12 équipes</span>
                            </p>
                        </div>
                        <button
                            class="mt-4 w-full bg-gradient-to-r from-green-400 to-green-500 hover:bg-green-600 text-white py-3 rounded-xl transition duration-300 flex items-center justify-center font-medium">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            S'inscrire Maintenant
                        </button>
                    </div>

                    <!-- Card 2 : Tournoi de Tennis -->
                    <div
                        class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                        <img src="./img/tennis.jpg" alt="Tournoi de Tennis"
                            class="w-full h-40 object-cover rounded-xl mb-4">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">Tournoi de Tennis</h3>
                            <span
                                class="inline-block px-4 py-1 bg-gradient-to-r from-green-400 to-green-500 text-white text-xs rounded-full shadow-sm">En
                                cours</span>
                        </div>
                        <div class="space-y-3 mb-6">
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="far fa-calendar-alt mr-2 text-brand-green"></i>
                                <span>25 Mars 2025</span>
                            </p>
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="fas fa-users mr-2 text-brand-green"></i>
                                <span>16 participants</span>
                            </p>
                        </div>
                        <button
                            class="mt-4 w-full bg-gradient-to-r from-green-400 to-green-500 hover:bg-green-600 text-white py-3 rounded-xl transition duration-300 flex items-center justify-center font-medium">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            S'inscrire Maintenant
                        </button>
                    </div>

                    <!-- Card 3 : Tournoi de Padel -->
                    <div
                        class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                        <img src="./img/padel.png" alt="Tournoi de Padel" class="w-full h-40 object-cover rounded-xl mb-4">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">Tournoi de Padel</h3>
                            <span
                                class="inline-block px-4 py-1 bg-gradient-to-r from-green-400 to-green-500 text-white text-xs rounded-full shadow-sm">En
                                cours</span>
                        </div>
                        <div class="space-y-3 mb-6">
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="far fa-calendar-alt mr-2 text-brand-green"></i>
                                <span>30 Mars 2025</span>
                            </p>
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="fas fa-users mr-2 text-brand-green"></i>
                                <span>8 équipes</span>
                            </p>
                        </div>
                        <button
                            class="mt-4 w-full bg-gradient-to-r from-green-400 to-green-500 hover:bg-green-600 text-white py-3 rounded-xl transition duration-300 flex items-center justify-center font-medium">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            S'inscrire Maintenant
                        </button>
                    </div>
                </div>
            </section>

            <!-- Tournois terminés -->
            <section class="mt-16">
                <h2
                    class="text-2xl sm:text-2xl md:text-3xl font-semibold text-gray-700 mb-8 flex items-center justify-center">
                    <span class="mr-3"><i class="fas fa-history"></i></span>
                    Tournois terminés
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 : Tournoi de Basket -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg transition-all duration-300 border border-gray-100">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">Tournoi de Basket</h3>
                            <span
                                class="inline-block px-4 py-1 bg-gray-500 text-white text-xs rounded-full shadow-sm">Terminé</span>
                        </div>
                        <div class="space-y-3 mb-2">
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="far fa-calendar-alt mr-2 text-gray-500"></i>
                                <span>15 Février 2025</span>
                            </p>
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="fas fa-trophy mr-2 text-yellow-500"></i>
                                <span>Équipe gagnante : Les Dragons</span>
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 : Tournoi de Padel -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg transition-all duration-300 border border-gray-100">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">Tournoi de Padel</h3>
                            <span
                                class="inline-block px-4 py-1 bg-gray-500 text-white text-xs rounded-full shadow-sm">Terminé</span>
                        </div>
                        <div class="space-y-3 mb-2">
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="far fa-calendar-alt mr-2 text-gray-500"></i>
                                <span>10 Février 2025</span>
                            </p>
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="fas fa-trophy mr-2 text-yellow-500"></i>
                                <span>Équipe gagnante : Les Aigles</span>
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 : Tournoi de Badminton -->
                    <!-- <div class="bg-white p-8 rounded-2xl shadow-lg transition-all duration-300 border border-gray-100">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-semibold text-gray-800">Tournoi de Badminton</h3>
                                <span
                                    class="inline-block px-4 py-1 bg-gray-500 text-white text-xs rounded-full shadow-sm">Terminé</span>
                            </div>
                            <div class="space-y-3 mb-2">
                                <p class="flex items-center text-gray-600 justify-center">
                                    <i class="far fa-calendar-alt mr-2 text-gray-500"></i>
                                    <span>5 Février 2025</span>
                                </p>
                                <p class="flex items-center text-gray-600 justify-center">
                                    <i class="fas fa-trophy mr-2 text-yellow-500"></i>
                                    <span>Équipe gagnante : Les Faucons</span>
                                </p>
                            </div>
                        </div> -->
                </div>
            </section>
        </div>
    </div>

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
                <p class="text-gray-300 text-sm leading-relaxed">123 Avenue des Champs-Élysées, 75008 Paris, France.
                </p>
                <h3 class="text-xl font-semibold mb-3 mt-6 text-white">Téléphone</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Contactez-nous : +33 1 23 45 67 89</p>
            </div>

            <!-- Contact Section -->
            <div class="text-center md:text-left"> <!-- Ajout de text-center pour mobile -->
                <h3 class="text-xl font-semibold mb-3 text-white">Contactez-nous</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Des questions ? Nous sommes là pour vous aider.</p>
                <p><a href="mailto:contact@example.com" class="text-yellow-500 hover:underline">contact@example.com</a>
                </p>

                <h3 class="text-xl font-semibold mb-3 mt-6 text-white">Recrutement</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Envie de rejoindre notre équipe dynamique ?</p>
                <p><a href="#" class="text-yellow-500 hover:underline">Voir les offres d'emploi</a></p>
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
        const burgerBtn = document.getElementById("burger-btn");
        const mobileMenu = document.getElementById("mobile-menu");

        burgerBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });

        const menuLinks = mobileMenu.querySelectorAll("a");
        menuLinks.forEach(link => {
            link.addEventListener("click", () => {
                mobileMenu.classList.add("hidden");
            });
        });
    </script>
    </body>

    </html>

@endsection
