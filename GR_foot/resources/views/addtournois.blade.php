<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournoi - Réservation de Terrains de Sport</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex">
        <!-- Sidebar mobile -->
        <div class="md:hidden hidden fixed top-0 left-0 h-screen w-64 bg-gradient-to-r from-green-500 to-green-800 z-50"
            id="mobile-menu">
            <!-- Bouton de fermeture (X) -->
            <button id="close-button" class="absolute top-4 right-4 text-white text-3xl">
                &times;
            </button>
            <div class="flex flex-col h-full pt-5 overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4">
                    <span class="text-2xl font-semibold text-white">Admin</span>
                </div>
                <div class="mt-6 flex-1 flex flex-col">
                    <nav class="flex-1 px-2 pb-4 space-y-2">
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-800 transition duration-300">
                            <i class="fas fa-home mr-3"></i>
                            Tableau de bord
                        </a>
                        <a href="{{ route('dashboardReservation') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            Réservations
                        </a>
                        <a href="{{ route('terrains.index') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
                        </a>
                        <a href="{{ route('tournois.index') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-trophy mr-3"></i>
                            Tournois
                        </a>
                        <a href="{{ route('utilisateur') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-users mr-3"></i>
                            Utilisateurs
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                Déconnecter
                            </button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Sidebar Desktop -->
        <div class="hidden md:flex md:w-64 md:flex-col bg-gradient-to-r from-green-500 to-green-800">
            <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4">
                    <span class="text-2xl font-semibold text-white">Admin</span>
                </div>
                <div class="mt-6 flex-1 flex flex-col">
                    <nav class="flex-1 px-2 pb-4 space-y-2">
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-800 transition duration-300">
                            <i class="fas fa-home mr-3"></i>
                            Tableau de bord
                        </a>
                        <a href="{{ route('dashboardReservation') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            Réservations
                        </a>
                        <a href="{{ route('terrains.index') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
                        </a>
                        <a href="{{ route('tournois.index') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-trophy mr-3"></i>
                            Tournois
                        </a>
                        <a href="{{ route('utilisateur') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-users mr-3"></i>
                            Utilisateurs
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                Déconnecter
                            </button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top navigation -->
            <header class="bg-white shadow-md">
                <div class="px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                    <button class="md:hidden text-gray-500 focus:outline-none" id="menu-button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="flex items-center">
                        <div class="relative">
                            <button class="flex text-sm rounded-full focus:outline-none">
                                <img class="h-8 w-8 rounded-full" src="./img/houssam.jpg" alt="Profile">
                            </button>
                        </div>
                        <span class="ml-3 text-gray-700">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Main content - Tournament -->
            <main class="flex-1 p-6">
                <h2 class="text-2xl font-semibold mb-4">Gestion des Tournois</h2>

                <!-- Créer un nouveau tournoi -->
                <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-4">Créer un nouveau tournoi</h3>
                    <form action="{{ route('tournois.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom du
                                    tournoi</label>
                                <input type="text" id="nom" name="nom"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                    required>
                            </div>
                            <div class="col-span-1">
                                <label for="date_debut" class="block text-sm font-medium text-gray-700">Date de début</label>
                                <input type="date" id="date_debut" name="date_debut"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                    required>
                            </div>
                            <div class="col-span-1">
                                <label for="date_fin" class="block text-sm font-medium text-gray-700">Date de fin</label>
                                <input type="date" id="date_fin" name="date_fin"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                    required>
                            </div>
                            <div class="col-span-1">
                                <label for="nombre_equipes" class="block text-sm font-medium text-gray-700">Nombre d'équipes</label>
                                <input type="number" id="nombre_equipes" name="nombre_equipes"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                    required>
                            </div>
                            <div class="col-span-1">
                                <label for="prix_inscription" class="block text-sm font-medium text-gray-700">Prix d'inscription</label>
                                <input type="number" id="prix_inscription" name="prix_inscription"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                    required>
                            </div>
                            <div class="col-span-1">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image du tournoi</label>
                                <input type="file" id="image" name="image"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="description" name="description" rows="3"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-center">
                            <button type="submit"
                                class="bg-gradient-to-r from-green-500 to-green-800 text-white px-6 py-2 rounded-md shadow-sm">Créer
                                le tournoi</button>
                        </div>
                    </form>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6 max-w-7xl mx-auto mt-10">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Liste des Tournois</h3>

                    <!-- Tableau des tournois -->
                    <div class="overflow-x-auto max-w-7xl mx-auto mt-10">
                        <table class="min-w-full border-collapse bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gradient-to-r from-green-500 to-green-800 text-white">
                                    <th class="p-4 text-left">Nom</th>
                                    <th class="p-4 text-left">Date</th>
                                    <th class="p-4 text-left">Heure</th> <!-- Nouvelle colonne Heure -->
                                    <th class="p-4 text-left">Catégorie</th>
                                    <th class="p-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Exemple de tournoi -->
                                <tr class="hover:bg-green-50 transition duration-300">
                                    <td class="p-4">Tournoi Football</td>
                                    <td class="p-4">2025-04-15</td>
                                    <td class="p-4">14:00</td> <!-- Heure ajoutée -->
                                    <td class="p-4">Football</td>
                                    <td class="p-4">
                                        <div class="flex space-x-4">
                                            <button
                                                class="text-blue-600 hover:text-blue-800 flex items-center space-x-1">
                                                <i class="fas fa-edit"></i> <span>Modifier</span>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 flex items-center space-x-1">
                                                <i class="fas fa-trash-alt"></i> <span>Supprimer</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-green-50 transition duration-300">
                                    <td class="p-4">Tournoi Padel</td>
                                    <td class="p-4">2025-04-18</td>
                                    <td class="p-4">10:00</td>
                                    <td class="p-4">Padel</td>
                                    <td class="p-4">
                                        <div class="flex space-x-4">
                                            <button
                                                class="text-blue-600 hover:text-blue-800 flex items-center space-x-1">
                                                <i class="fas fa-edit"></i> <span>Modifier</span>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 flex items-center space-x-1">
                                                <i class="fas fa-trash-alt"></i> <span>Supprimer</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Autres tournois ici -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        // Récupérer les éléments du bouton et du menu mobile
        const menuButton = document.getElementById('menu-button');
        const closeButton = document.getElementById('close-button');
        const sidebar = document.getElementById('mobile-menu');

        // Ouvrir le menu
        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        // Fermer le menu
        closeButton.addEventListener('click', () => {
            sidebar.classList.add('hidden');
        });
    </script>
</body>

</html>