@extends('layout.header')

@section('title', 'Réservation de Terrain de Football')

@section('content')

    <!-- Hero Section -->
    <section class="relative h-screen bg-cover bg-center flex items-center justify-center text-white"
        style="background-image: url('img/11vs11.png');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative text-center">
            <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">Réservez Votre Terrain de Sport</h1>
            <p class="text-xl mb-6 drop-shadow-md">Football, Padel et bien plus... À portée de clic !</p>
            <a href="#reservation"
                class="inline-block px-10 py-4 bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white font-semibold rounded-full shadow-md transition duration-300">Explorer
                Maintenant</a>
        </div>
    </section>

    <!-- Sports Disponibles Section -->
    <section class="py-20 bg-gray-100">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2
                class="text-4xl font-bold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-green-700 to-green-500 mb-16">
                Sports Disponibles</h2>
            <!-- Grid responsive : 1 colonne sur petits écrans, 3 sur écrans moyens -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12">
                <!-- Football -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                    <img class="w-full h-48 object-cover rounded-md mb-6" src="img/11vs11.png" alt="Football">
                    <h3 class="text-2xl font-semibold text-green-700 mb-3">Football</h3>
                    <p class="text-gray-600">Réservez un terrain pour un match entre amis ou une compétition amateur.
                    </p>
                </div>
                <!-- Tennis -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                    <img class="w-full h-48 object-cover rounded-md mb-6" src="img/tennis.jpg" alt="Tennis">
                    <h3 class="text-2xl font-semibold text-green-700 mb-3">Tennis</h3>
                    <p class="text-gray-600">Envie de perfectionner votre coup droit ? Réservez notre terrain de tennis
                        et profitez d’un jeu dynamique dans un cadre idéal !</p>
                </div>
                <!-- Padel -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                    <img class="w-full h-48 object-cover rounded-md mb-6" src="img/padel.png" alt="Padel">
                    <h3 class="text-2xl font-semibold text-green-700 mb-3">Padel</h3>
                    <p class="text-gray-600">Découvrez le padel, un sport fun et dynamique pour tous les âges.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Pourquoi Nous Choisir ? -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2
                class="text-4xl font-bold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-green-700 to-green-500 mb-16">
                Pourquoi Nous Choisir ?</h2>
            <!-- Grid responsive : 1 colonne sur petits écrans, 2 sur écrans moyens, 3 sur grands écrans -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12">
                <!-- Réservation Facile -->
                <div class="p-8 bg-white rounded-lg shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                    <div class="mb-6 text-green-700 text-3xl">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-green-800 mb-4">Réservation Facile</h3>
                    <p class="text-gray-700 leading-relaxed">Réservez en quelques clics, sans complications. Une
                        interface simple et intuitive pour une expérience optimale.</p>
                </div>
                <!-- Terrains de Qualité -->
                <div class="p-8 bg-white rounded-lg shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                    <div class="mb-6 text-green-700 text-3xl">
                        <i class="fas fa-futbol"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-green-800 mb-4">Terrains de Qualité</h3>
                    <p class="text-gray-700 leading-relaxed">Profitez de terrains modernes, parfaitement entretenus pour
                        garantir un jeu agréable à chaque réservation.</p>
                </div>
                <!-- Support Rapide -->
                <div class="p-8 bg-white rounded-lg shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                    <div class="mb-6 text-green-700 text-3xl">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-green-800 mb-4">Support Rapide</h3>
                    <p class="text-gray-700 leading-relaxed">Notre équipe est à votre disposition pour vous aider à tout
                        moment, assurant une assistance rapide et efficace.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Témoignages -->
    <section class="py-20 bg-gradient-to-r from-gray-100 via-gray-200 to-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2
                class="text-4xl font-bold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-green-700 to-green-500 mb-16">
                Témoignages</h2>
            <!-- Grille responsive : 1 colonne sur petits écrans, 2 sur écrans moyens, 3 sur écrans larges, 4 sur très grands écrans -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Premier témoignage -->
                <blockquote
                    class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                    <div class="flex justify-center mb-6">
                        <img class="w-16 h-16 rounded-full object-cover"
                            src="https://randomuser.me/api/portraits/men/11.jpg" alt="Jean Dupont">
                    </div>
                    <p class="text-lg italic text-gray-700">"Excellent service, réservation rapide et efficace !"</p>
                    <footer class="mt-6 text-green-700 font-semibold">- Jean Dupont</footer>
                </blockquote>
                <!-- Deuxième témoignage -->
                <blockquote
                    class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                    <div class="flex justify-center mb-6">
                        <img class="w-16 h-16 rounded-full object-cover"
                            src="https://randomuser.me/api/portraits/women/11.jpg" alt="Marie Leclerc">
                    </div>
                    <p class="text-lg italic text-gray-700">"Des terrains de qualité et un site facile à utiliser."</p>
                    <footer class="mt-6 text-green-700 font-semibold">- Marie Leclerc</footer>
                </blockquote>
                <!-- Troisième témoignage -->
                <blockquote
                    class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                    <div class="flex justify-center mb-6">
                        <img class="w-16 h-16 rounded-full object-cover"
                            src="https://randomuser.me/api/portraits/men/12.jpg" alt="Pierre Martin">
                    </div>
                    <p class="text-lg italic text-gray-700">"Facilité de réservation et une expérience géniale. À
                        recommander!"</p>
                    <footer class="mt-6 text-green-700 font-semibold">- Pierre Martin</footer>
                </blockquote>
                <!-- Quatrième témoignage -->
                <blockquote
                    class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                    <div class="flex justify-center mb-6">
                        <img class="w-16 h-16 rounded-full object-cover"
                            src="https://randomuser.me/api/portraits/women/12.jpg" alt="Sophie Dupuis">
                    </div>
                    <p class="text-lg italic text-gray-700">"Le site est super intuitif et les terrains sont top. Je
                        reviendrai !"</p>
                    <footer class="mt-6 text-green-700 font-semibold">- Sophie Dupuis</footer>
                </blockquote>
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

@endsection
