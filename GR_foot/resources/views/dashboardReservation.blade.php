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

                <!-- Messages d'alerte -->
                @if(session('success'))
                    <div class="mt-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mt-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md shadow-sm" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium">
                                    {{ session('error') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Recent bookings -->
                <div class="mt-8">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                            <!-- <h3 class="text-lg font-medium text-gray-900">Réservations récentes</h3> -->
                            <!-- Barre de recherche -->
                            <div class="relative w-full md:w-1/3">
                                <input type="text" id="searchInput" placeholder="Rechercher une réservation..."
                                    class="p-3 pl-10 border border-gray-300 rounded-xl shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
                            </div>
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
                                                <a href="#" onclick="openEditModal('{{ $reservation->id }}', '{{ $reservation->nom }}', '{{ $reservation->telephone }}', '{{ $reservation->date }}', '{{ $reservation->heure_debut }}', '{{ $reservation->heure_fin }}', '{{ $reservation->terrain_id }}')"
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

    <!-- Modal d'édition -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Modifier la réservation</h3>
                <form id="editForm" method="POST" class="mt-4">
                    @csrf
                    @method('PUT')
                    <div class="mt-2 space-y-4">
                        <!-- Champ caché pour l'ID -->
                        <input type="hidden" name="reservation_id" id="edit_reservation_id">

                        <!-- Téléphone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input type="tel" name="telephone" id="edit_telephone" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <!-- Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" name="date" id="edit_date" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <!-- Heure de début -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Heure de début</label>
                            <select name="heure_debut" id="edit_heure_debut" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                @for($i = 9; $i <= 22; $i++)
                                    <option value="{{ sprintf('%02d:00:00', $i) }}">{{ sprintf('%02dh00', $i) }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Heure de fin -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Heure de fin</label>
                            <select name="heure_fin" id="edit_heure_fin" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                @for($i = 10; $i <= 23; $i++)
                                    <option value="{{ sprintf('%02d:00:00', $i) }}">{{ sprintf('%02dh00', $i) }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Terrain -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Terrain</label>
                            <select name="terrain_id" id="edit_terrain_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                @foreach($terrains as $terrain)
                                    <option value="{{ $terrain->id }}">{{ $terrain->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-5 flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Annuler
                        </button>
                        <button type="submit"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Récupérer les éléments du bouton et du menu mobile
        const menuButton = document.getElementById('menu-button');
        const closeButton = document.getElementById('close-button');
        const sidebar = document.getElementById('mobile-menu');
        const editModal = document.getElementById('editModal');

        // Ouvrir le menu
        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        // Fermer le menu
        closeButton.addEventListener('click', () => {
            sidebar.classList.add('hidden');
        });

        // Fonctions pour le modal d'édition
        function openEditModal(id, nom, telephone, date, heure_debut, heure_fin, terrain_id) {
            const form = document.getElementById('editForm');
            form.action = `/reservations/${id}`;
            
            document.getElementById('edit_reservation_id').value = id;
            document.getElementById('edit_telephone').value = telephone;
            document.getElementById('edit_date').value = date;
            document.getElementById('edit_heure_debut').value = heure_debut;
            document.getElementById('edit_heure_fin').value = heure_fin;
            document.getElementById('edit_terrain_id').value = terrain_id;
            
            editModal.classList.remove('hidden');
        }

        function closeEditModal() {
            editModal.classList.add('hidden');
        }

        // Fermer le modal si on clique en dehors
        editModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });

        // Script pour la recherche de réservations
        document.getElementById("searchInput").addEventListener("keyup", function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll("tbody tr");
            
            tableRows.forEach(row => {
                const client = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
                const telephone = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                const terrain = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
                const date = row.querySelector("td:nth-child(5)").textContent.toLowerCase();
                
                if (client.includes(searchValue) || 
                    telephone.includes(searchValue) || 
                    terrain.includes(searchValue) || 
                    date.includes(searchValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>

</body>

</html>
