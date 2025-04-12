<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Gestion des Utilisateurs</title>
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
                        class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                        <i class="fas fa-trophy mr-3"></i>
                        Tournois
                    </a>
                    <a href="{{ route('utilisateurs.index') }}"
                        class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
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
                        class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                        <i class="fas fa-trophy mr-3"></i>
                        Tournois
                    </a>
                    <a href="{{ route('utilisateurs.index') }}"
                        class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
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

        <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Liste des utilisateurs</h1>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erreur!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex justify-between mb-6 items-center">
                    <!-- Champ de recherche amélioré -->
                    <div class="relative w-full md:w-1/3">
                        <input type="text" id="searchInput" placeholder="Rechercher un utilisateur..."
                            class="p-3 pl-10 border border-gray-300 rounded-xl shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
                    </div>
                </div>

                <!-- Tableau Utilisateurs -->
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse bg-white rounded-lg shadow-md">
                        <thead>
                            <tr class="bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white">
                                <th class="p-4 text-left">Nom</th>
                                <th class="p-4 text-left">Email</th>
                                <th class="p-4 text-left">Rôle</th>
                                <th class="p-4 text-left">Date d'inscription</th>
                                <th class="p-4 text-center">Nombre de Réservations</th>
                                <th class="p-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr class="hover:bg-green-50 transition duration-300">
                                    <td class="p-4">{{ $user->name }}</td>
                                    <td class="p-4">{{ $user->email }}</td>
                                    <td class="p-4">
                                        @if(strtolower($user->role) == 'admin')
                                            <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-xs">Admin</span>
                                        @else
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Utilisateur</span>
                                        @endif
                                    </td>
                                    <td class="p-4">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="p-4 text-center">{{ $user->reservations_count }}</td>
                                    <td class="p-4">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('utilisateurs.show', $user->id) }}" 
                                                class="text-blue-600 hover:text-blue-800 flex items-center space-x-1">
                                                <i class="fas fa-eye"></i> <span>Voir</span>
                                            </a>
                                            <form action="{{ route('utilisateurs.destroy', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"
                                                    class="text-red-600 hover:text-red-800 flex items-center space-x-1">
                                                    <i class="fas fa-trash"></i> <span>Supprimer</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-gray-500">
                                        Aucun utilisateur trouvé.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    // Script pour le menu mobile
    document.getElementById("menu-button").addEventListener("click", function() {
        const sidebar = document.getElementById("mobile-menu");
        sidebar.classList.toggle("hidden");
    });

    document.getElementById("close-button").addEventListener("click", function() {
        const sidebar = document.getElementById("mobile-menu");
        sidebar.classList.add("hidden");
    });

    // Script pour la recherche d'utilisateurs
    document.getElementById("searchInput").addEventListener("keyup", function() {
        const searchValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll("tbody tr");
        
        tableRows.forEach(row => {
            const name = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
            const email = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
            
            if (name.includes(searchValue) || email.includes(searchValue)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>

</body>
</html>
