@extends('layout.header')

@section('title', 'Réservation de Terrain de Football')

@section('content')

    <!-- Header -->
    <header class="bg-green-600 py-12">
        <div class="max-w-screen-xl mx-auto text-center">
            <h1 class="text-5xl text-white font-bold">Nos Activités Sportives</h1>
            <p class="mt-4 text-xl text-gray-300">Découvrez nos installations sportives de première classe.
                Réservez facilement et profitez d'une expérience sportive exceptionnelle.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-16 bg-gradient-to-br from-gray-100 to-gray-200">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Section de Filtrage -->
            <div class="flex flex-wrap justify-center space-x-4 mb-8">
                <!-- Filtrage par Activité -->
                <select id="sportFilter" class="bg-gray-300 text-gray-800 px-4 py-2 rounded cursor-pointer">
                    <option value="">Toutes les Activités</option>
                    <option value="football">Football</option>
                    <option value="padel">Padel</option>
                    <option value="tennis">Tennis</option>
                    <option value="basketball">Basketball</option>
                </select>

                <!-- Filtrage par Région -->
                <select id="regionFilter" class="bg-gray-300 text-gray-800 px-4 py-2 rounded cursor-pointer">
                    <option value="">Toutes les Régions</option>
                    <option value="region1">Région 1</option>
                    <option value="region2">Région 2</option>
                </select>

                <!-- Filtrage par Ville -->
                <select id="cityFilter" class="bg-gray-300 text-gray-800 px-4 py-2 rounded cursor-pointer">
                    <option value="">Toutes les Villes</option>
                    <option value="ville1">Ville 1</option>
                    <option value="ville2">Ville 2</option>
                </select>

                <!-- Filtrage par Disponibilité -->
                <select id="availabilityFilter" class="bg-gray-300 text-gray-800 px-4 py-2 rounded cursor-pointer">
                    <option value="">Toutes les Disponibilités</option>
                    <option value="disponible">Disponible</option>
                    <option value="complet">Complet</option>
                </select>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">

                <!-- 5 vs 5 Card -->
                <div
                    class="activity-card football group bg-white rounded-3xl shadow-xl overflow-hidden transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300">
                    <div class="relative overflow-hidden">
                        <div
                            class="absolute top-4 right-4 z-10 bg-black bg-opacity-75 text-white px-3 py-1 rounded-full text-sm shadow-md">
                            400 DH/h
                        </div>
                        <img src="./img/5vs5.png" alt="Terrain de Football"
                            class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500 rounded-t-3xl">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent h-24">
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Terrain 5 VS 5</h3>
                            <span class="flex items-center text-green-600">
                                <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span>
                                Disponible
                            </span>
                        </div>

                        <p class="text-gray-600 mb-6">Terrain synthétique nouvelle génération avec éclairage LED.
                            Parfait
                            pour vos matchs entre amis ou en équipe.</p>

                        <div class="space-y-2 text-sm text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Durée: 60 minutes
                            </div>

                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                10 joueurs
                            </div>
                        </div>

                        <div class="flex justify-end items-center mt-6 pt-6 border-t border-gray-100">
                            <button
                                class="inline-flex items-center bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white px-6 py-2 rounded-full transition-colors">
                                Réserver
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 7 vs 7 Card -->
                <div
                    class="group bg-white rounded-3xl shadow-xl overflow-hidden transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300">
                    <div class="relative overflow-hidden">
                        <div
                            class="absolute top-4 right-4 z-10 bg-black bg-opacity-75 text-white px-3 py-1 rounded-full text-sm shadow-md">
                            700 DH/h
                        </div>
                        <img src="./img/7vs7.png" alt="Terrain de Football"
                            class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500 rounded-t-3xl">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent h-24">
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Terrain 7 VS 7</h3>
                            <span class="flex items-center text-green-600">
                                <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span>
                                Disponible
                            </span>
                        </div>

                        <p class="text-gray-600 mb-6">Terrain synthétique nouvelle génération avec éclairage LED.
                            Parfait
                            pour vos matchs entre amis ou en équipe.</p>

                        <div class="space-y-2 text-sm text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Durée: 60 minutes
                            </div>

                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                14 joueurs
                            </div>
                        </div>

                        <div class="flex justify-end items-center mt-6 pt-6 border-t border-gray-100">
                            <button
                                class="inline-flex items-center bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white px-6 py-2 rounded-full transition-colors">
                                Réserver
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 11 vs 11-->

                <div
                    class="group bg-white rounded-3xl shadow-xl overflow-hidden transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300">
                    <div class="relative overflow-hidden">
                        <div
                            class="absolute top-4 right-4 z-10 bg-black bg-opacity-75 text-white px-3 py-1 rounded-full text-sm shadow-md">
                            1200 DH/h
                        </div>
                        <img src="./img/11vs11.png" alt="Terrain de Football"
                            class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500 rounded-t-3xl">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent h-24">
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Terrain 11 VS 11</h3>
                            <span class="flex items-center text-green-600">
                                <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span>
                                Disponible
                            </span>
                        </div>

                        <p class="text-gray-600 mb-6">Terrain synthétique nouvelle génération avec éclairage LED.
                            Parfait
                            pour vos matchs entre amis ou en équipe.</p>

                        <div class="space-y-2 text-sm text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Durée: 60 minutes
                            </div>

                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                22 joueurs
                            </div>
                        </div>

                        <div class="flex justify-end items-center mt-6 pt-6 border-t border-gray-100">
                            <button
                                class="inline-flex items-center bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white px-6 py-2 rounded-full transition-colors">
                                Réserver
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Padel Card -->
                <div
                    class="group bg-white rounded-3xl shadow-xl overflow-hidden transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300">
                    <div class="relative overflow-hidden">
                        <div
                            class="absolute top-4 right-4 z-10 bg-black bg-opacity-75 text-white px-3 py-1 rounded-full text-sm shadow-md">
                            250 DH/h
                        </div>
                        <img src="./img/padel.png" alt="Terrain de Football"
                            class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500 rounded-t-3xl">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent h-24">
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Padel</h3>
                            <span class="flex items-center text-green-600">
                                <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span>
                                Disponible
                            </span>
                        </div>

                        <p class="text-gray-600 mb-6">Terrain synthétique nouvelle génération avec éclairage LED.
                            Parfait
                            pour vos matchs entre amis ou en équipe.</p>

                        <div class="space-y-2 text-sm text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Durée: 60 minutes
                            </div>

                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                2 - 4 joueurs
                            </div>
                        </div>

                        <div class="flex justify-end items-center mt-6 pt-6 border-t border-gray-100">
                            <button
                                class="inline-flex items-center bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white px-6 py-2 rounded-full transition-colors">
                                Réserver
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tennis Card -->
                <div
                    class="group bg-white rounded-3xl shadow-xl overflow-hidden transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300">
                    <div class="relative overflow-hidden">
                        <div
                            class="absolute top-4 right-4 z-10 bg-black bg-opacity-75 text-white px-3 py-1 rounded-full text-sm shadow-md">
                            300 DH/h
                        </div>
                        <img src="./img/tennis.jpg" alt="Terrain de Football"
                            class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500 rounded-t-3xl">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent h-24">
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Tennis</h3>
                            <span class="flex items-center text-green-600">
                                <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span>
                                Disponible
                            </span>
                        </div>

                        <p class="text-gray-600 mb-6">Terrain synthétique nouvelle génération avec éclairage LED.
                            Parfait
                            pour vos matchs entre amis ou en équipe.</p>

                        <div class="space-y-2 text-sm text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Durée: 60 minutes
                            </div>

                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                2 - 4 joueurs
                            </div>
                        </div>

                        <div class="flex justify-end items-center mt-6 pt-6 border-t border-gray-100">
                            <button
                                class="inline-flex items-center bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white px-6 py-2 rounded-full transition-colors">
                                Réserver
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


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

        document.addEventListener("DOMContentLoaded", function() {
            const sportSelect = document.getElementById("sportFilter");
            const regionSelect = document.getElementById("regionFilter");
            const citySelect = document.getElementById("cityFilter");
            const availabilitySelect = document.getElementById("availabilityFilter");

            function applyFilters() {
                const selectedSport = sportSelect.value;
                const selectedRegion = regionSelect.value;
                const selectedCity = citySelect.value;
                const selectedAvailability = availabilitySelect.value;

                document.querySelectorAll(".activity-card").forEach(card => {
                    const sport = card.getAttribute("data-sport");
                    const region = card.getAttribute("data-region");
                    const city = card.getAttribute("data-city");
                    const availability = card.getAttribute("data-availability");

                    const matchesSport = !selectedSport || sport === selectedSport;
                    const matchesRegion = !selectedRegion || region === selectedRegion;
                    const matchesCity = !selectedCity || city === selectedCity;
                    const matchesAvailability = !selectedAvailability || availability ===
                        selectedAvailability;

                    card.style.display = matchesSport && matchesRegion && matchesCity &&
                        matchesAvailability ? "block" : "none";
                });
            }

            sportSelect.addEventListener("change", applyFilters);
            regionSelect.addEventListener("change", applyFilters);
            citySelect.addEventListener("change", applyFilters);
            availabilitySelect.addEventListener("change", applyFilters);
        });
    </script>
    </body>

    </html>
@endsection
