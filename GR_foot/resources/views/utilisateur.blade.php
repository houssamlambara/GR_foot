<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Gestion de Terrains de Sport</title>
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
                        <a href="#"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-800 transition duration-300">
                            <i class="fas fa-home mr-3"></i>
                            Tableau de bord
                        </a>
                        <a href="dashboardReservation.html"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            Réservations
                        </a>
                        <a href="addterrain.html"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
                        </a>
                        <a href="addtournois.html"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-trophy mr-3"></i>
                            Tournois
                        </a>
                        <a href="#"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-users mr-3"></i>
                            Utilisateurs
                        </a>
                        <a href="#"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Déconnecter
                        </a>
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
                        <a href="dashboard.html"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-800 transition duration-300">
                            <i class="fas fa-home mr-3"></i>
                            Tableau de bord
                        </a>
                        <a href="dashboardReservation.html"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            Réservations
                        </a>
                        <a href="addterrain.html"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
                        </a>
                        <a href="addtournois.html"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-trophy mr-3"></i>
                            Tournois
                        </a>
                        <a href="#"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-users mr-3"></i>
                            Utilisateurs
                        </a>
                        <a href="#"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Déconnecter
                        </a>
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

            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                <h1 class="text-2xl font-semibold text-gray-800 mb-6">List des utilisateurs</h1>

                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex justify-between mb-6 items-center">
                        <!-- Champ de recherche amélioré -->
                        <div class="relative w-full md:w-1/3">
                            <input type="text" placeholder="Rechercher un utilisateur..."
                                class="p-3 pl-10 border border-gray-300 rounded-xl shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
                        </div>
                    </div>

                    <!-- Tableau Utilisateurs -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gradient-to-r from-green-400 via-green-600 to-green-800
                                text-white">
                                    <th class="p-4 text-left">Nom</th>
                                    <th class="p-4 text-left">Email</th>
                                    <th class="p-4 text-left">Téléphone</th>
                                    <th class="p-4 text-left">Nombre de Réservations</th> <!-- Nouvelle colonne -->
                                    <th class="p-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Exemple d'utilisateur -->
                                <tr class="hover:bg-green-50 transition duration-300">
                                    <td class="p-4">John Doe</td>
                                    <td class="p-4">john@example.com</td>
                                    <td class="p-4">+212 658450320</td>
                                    <td class="p-4 text-center">3</td> <!-- Nombre de réservations centré -->
                                    <td class="p-4">
                                        <div class="flex space-x-4">
                                            <button
                                                class="text-yellow-600 hover:text-yellow-800 flex items-center space-x-1">
                                                <i class="fas fa-pause"></i> <span>Suspendre</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-green-50 transition duration-300">
                                    <td class="p-4">John Doe</td>
                                    <td class="p-4">john@example.com</td>
                                    <td class="p-4">+212 658456221</td>
                                    <td class="p-4 text-center">7</td> <!-- Nombre de réservations centré -->
                                    <td class="p-4">
                                        <div class="flex space-x-4">
                                            <button
                                                class="text-yellow-600 hover:text-yellow-800 flex items-center space-x-1">
                                                <i class="fas fa-pause"></i> <span>Suspendre</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-green-50 transition duration-300">
                                    <td class="p-4">John Doe</td>
                                    <td class="p-4">john@example.com</td>
                                    <td class="p-4">+212 657796789</td>
                                    <td class="p-4 text-center">0</td> <!-- Nombre de réservations centré -->
                                    <td class="p-4">
                                        <div class="flex space-x-4">
                                            <button
                                                class="text-yellow-600 hover:text-yellow-800 flex items-center space-x-1">
                                                <i class="fas fa-pause"></i> <span>Suspendre</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-green-50 transition duration-300">
                                    <td class="p-4">John Doe</td>
                                    <td class="p-4">john@example.com</td>
                                    <td class="p-4">+212 658566789</td>
                                    <td class="p-4 text-center">2</td> <!-- Nombre de réservations centré -->
                                    <td class="p-4">
                                        <div class="flex space-x-4">
                                            <button
                                                class="text-yellow-600 hover:text-yellow-800 flex items-center space-x-1">
                                                <i class="fas fa-pause"></i> <span>Suspendre</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Autres utilisateurs ici -->
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