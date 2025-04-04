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

    <!-- Notre Histoire Section -->
    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-green-800 mb-8">Notre Histoire</h2>
            <div class="bg-gradient-to-r from-green-100 to-green-50 p-8 rounded-lg shadow-lg">
                <p class="text-lg text-gray-700 leading-relaxed">
                    FootReserve est né de notre passion pour le sport, avec l'ambition de rendre l'accès aux terrains de
                    football et de padel plus simple et rapide. Depuis 2020, nous avons travaillé sans relâche pour
                    offrir
                    une plateforme intuitive et fiable, accessible à tous les passionnés de sport.
                </p>
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

    <!-- Notre Mission Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-green-800 mb-8">Notre Mission</h2>
            <div class="bg-gradient-to-r from-green-50 to-white p-8 rounded-lg shadow-lg">
                <p class="text-lg text-gray-700 leading-relaxed">
                    Chez FootReserve, nous rendons la pratique du football et du padel accessible à tous. Nous éliminons
                    les
                    barrières de réservation avec une expérience fluide, des terrains de qualité, et un service client
                    irréprochable.
                </p>
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
