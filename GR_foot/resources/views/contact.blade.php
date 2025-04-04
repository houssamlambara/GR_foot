@extends('layout.header')

@section('title', 'Réservation de Terrain de Football')

@section('content')

    <!-- Section Contact Us -->
    <div class="py-16 bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <div class="bg-white/90 backdrop-blur-sm rounded-lg shadow-2xl p-8 max-w-4xl w-full mx-auto">
            <h1 class="text-4xl font-bold text-center text-green-800 mb-6">Contactez-nous</h1>
            <p class="text-center text-gray-700 mb-8">
                Vous avez des questions ou besoin d'aide pour réserver un terrain ? Nous sommes là pour vous aider !
            </p>

            <!-- Formulaire de contact -->
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            placeholder="Votre nom" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            placeholder="Votre e-mail" required>
                    </div>
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">Sujet</label>
                    <input type="text" id="subject" name="subject"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                        placeholder="Objet de votre message" required>
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea id="message" name="message" rows="4"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                        placeholder="Écrivez votre message ici..." required></textarea>
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white font-semibold rounded-md transition duration-300">
                        Envoyer le message
                    </button>
                </div>
            </form>

            <!-- Informations de contact -->
            <div class="mt-10 text-center">
                <h2 class="text-2xl font-bold text-green-800 mb-4">Nous contacter</h2>
                <div class="space-y-2 text-gray-700">
                    <p><i class="fas fa-map-marker-alt mr-2"></i> 123 Rue du Stade, 75000 Paris, France</p>
                    <p><i class="fas fa-phone-alt mr-2"></i> +33 1 23 45 67 89</p>
                    <p><i class="fas fa-envelope mr-2"></i> contact@terrainsfootball.com</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section FAQ -->
    <div class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-green-800 mb-8">FAQ - Questions fréquentes</h2>
            <div class="space-y-6">
                <!-- Question 1 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold text-green-700">Comment réserver un terrain de football ?</h3>
                    <p class="mt-2 text-gray-600">
                        Pour réserver un terrain de football, rendez-vous sur la page "Réservation", sélectionnez votre
                        créneau horaire, puis suivez les étapes de paiement. Vous recevrez une confirmation par e-mail.
                    </p>
                </div>
                <!-- Question 2 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold text-green-700">Puis-je annuler ou modifier une réservation ?</h3>
                    <p class="mt-2 text-gray-600">
                        Oui, vous pouvez annuler ou modifier votre réservation jusqu'à 24 heures avant le début du
                        créneau. Connectez-vous à votre compte ou contactez-nous pour plus d'aide.
                    </p>
                </div>
                <!-- Question 3 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold text-green-700">Quels sont les tarifs pour un terrain de padel ?
                    </h3>
                    <p class="mt-2 text-gray-600">
                        Les tarifs varient en fonction des créneaux horaires. Consultez la page "Réservation" pour voir
                        les disponibilités et les prix en temps réel.
                    </p>
                </div>
                <!-- Question 4 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold text-green-700">Y a-t-il des réductions pour les groupes ?</h3>
                    <p class="mt-2 text-gray-600">
                        Oui, nous offrons des tarifs réduits pour les groupes de plus de 10 personnes. Contactez-nous
                        pour obtenir un devis personnalisé.
                    </p>
                </div>
                <!-- Question 5 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold text-green-700">Quels équipements sont fournis sur place ?</h3>
                    <p class="mt-2 text-gray-600">
                        Nous fournissons des ballons, des filets et des vestiaires. Pour le padel, des raquettes et des
                        balles sont également disponibles à la location.
                    </p>
                </div>
            </div>
        </div>
    </div>

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
