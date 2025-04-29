@extends('layout.header')

@section('title', 'Réservation de Terrain de Football')

@section('content')

    <!-- Hero Section -->
    <section class="relative h-[500px] bg-cover bg-center flex items-center justify-center text-white"
        style="background-image: url('https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent"></div>
        <div class="relative text-center">
            <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">À propos de FootReserve</h1>
            <p class="text-xl drop-shadow-md">Découvrez notre passion pour le sport et réservez facilement vos terrains
                !</p>
        </div>
    </section>

    <!-- Notre Histoire et Notre Mission Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Bloc Notre Histoire -->
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-green-800 mb-8">Notre Histoire</h2>
                    <div class="bg-gradient-to-r from-green-100 to-green-50 p-8 rounded-lg shadow-lg">
                        <p class="text-lg text-gray-700 leading-relaxed">
                            FootReserve est né de notre passion pour le sport, avec l'ambition de rendre l'accès aux
                            terrains de
                            football et de padel plus simple et rapide. Depuis 2020, nous avons travaillé sans relâche pour
                            offrir
                            une plateforme intuitive et fiable, accessible à tous les passionnés de sport.
                        </p>
                    </div>
                </div>

                <!-- Bloc Notre Mission -->
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-green-800 mb-8">Notre Mission</h2>
                    <div class="bg-gradient-to-r from-green-50 to-white p-8 rounded-lg shadow-lg">
                        <p class="text-lg text-gray-700 leading-relaxed">
                            Chez FootReserve, nous rendons la pratique du football et du padel accessible à tous. Nous
                            éliminons
                            les
                            barrières de réservation avec une expérience fluide, des terrains de qualité, et un service
                            client
                            irréprochable.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notre Passion Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-green-800 mb-8">Notre Passion</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Football -->
                <div
                    class="bg-white p-8 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <img class="w-full h-64 object-cover rounded-md mb-4" src="./img/11vs11.png" alt="Terrain de football">
                    <h3 class="text-2xl font-semibold text-green-700 mb-2">Le Football</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Le football unit les gens, crée des souvenirs et des amitiés durables. Nous croyons en son
                        pouvoir de
                        connecter les communautés et inspirer la prochaine génération de joueurs.
                    </p>
                </div>
                <!-- Padel -->
                <div
                    class="bg-white p-8 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <img class="w-full h-64 object-cover rounded-md mb-4" src="./img/padel.png" alt="Terrain de padel">
                    <h3 class="text-2xl font-semibold text-green-700 mb-2">Le Padel</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Le padel allie stratégie, technique et convivialité. Nous soutenons son développement en offrant
                        des
                        terrains de qualité et en encourageant les joueurs à découvrir ce sport unique.
                    </p>
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                            <span class="text-3xl font-bold text-green-600">1100 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en gazon
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Gilets 2 Equipes
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en parquet
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Ballon fourni
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
    @include('layout.footer')

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
@endsection
