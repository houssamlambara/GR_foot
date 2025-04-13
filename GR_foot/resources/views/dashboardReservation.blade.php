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
                        <a href="{{Route ('dashboard')}}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-800 transition duration-300">
                            <i class="fas fa-home mr-3"></i>
                            Tableau de bord
                        </a>
                        <a href="#"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            Réservations
                        </a>
                        <a href="{{Route ('addterrain')}}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
                        </a>
                        <a href="{{Route ('addtournois')}}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-trophy mr-3"></i>
                            Tournois
                        </a>
                        <a href="{{Route ('utilisateur')}}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
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
                        <a href="{{Route ('dashboard')}}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-800 transition duration-300">
                            <i class="fas fa-home mr-3"></i>
                            Tableau de bord
                        </a>
                        <a href=""
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            Réservations
                        </a>
                        <a href="{{Route ('addterrain')}}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
                        </a>
                        <a href="{{Route ('addtournois')}}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-trophy mr-3"></i>
                            Tournois
                        </a>
                        <a href="{{Route ('utilisateur')}}"
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

            <!-- Main content area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 bg-gray-100">
                <h1 class="text-2xl font-semibold text-gray-800">Reservation List</h1>

                <!-- Recent bookings -->
                <div class="mt-8">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Réservations récentes</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Client</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Téléphone</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Terrain</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Localisation</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Heure</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($reservations as $reservation)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $reservation->user->name ?? 'N/A' }}</div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $reservation->user->email ?? 'N/A' }}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $reservation->telephone ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $reservation->terrain->nom }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{ $reservation->terrain->type }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $reservation->terrain->localisation }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($reservation->date)->format('d M Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($reservation->heure_debut)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($reservation->heure_fin)->format('H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('reservations.edit', $reservation->id) }}"
                                                    class="text-yellow-600 hover:text-yellow-900 mr-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('reservations.destroy', $reservation->id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                                Aucune réservation trouvée
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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
