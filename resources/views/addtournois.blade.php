<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournoi - Réservation de Terrains de Sport</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="bg-gray-50">
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
                        <a href="{{ route('addterrain') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
                        </a>
                        <a href="{{ route('addtournois') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-trophy mr-3"></i>
                            Gestion des Tournois
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
                        <a href="{{ route('addterrain') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
                        </a>
                        <a href="{{ route('addtournois') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-trophy mr-3"></i>
                            Gestion des Tournois
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
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 bg-gray-100">
                <h1 class="text-2xl font-semibold text-gray-800">Gestion des tournois</h1>

                @if (session('success'))
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

                <!-- Form section for adding new tournament -->
                <div class="mt-8">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Ajouter un nouveau tournoi</h3>
                        </div>
                        <div class="p-4 sm:p-6">
                            <form action="{{ route('tournois.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-6">
                                @csrf
                                <div class="grid grid-cols-1 gap-y-4 sm:gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <!-- Nom du tournoi -->
                                    <div class="col-span-1 sm:col-span-3">
                                        <label for="nom" class="block text-sm font-medium text-gray-700">
                                            Nom du tournoi
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" name="nom" id="nom"
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full text-sm border-gray-300 rounded-md p-4"
                                                placeholder="Nom du tournoi" required>
                                        </div>
                                    </div>

                                    <!-- Date de début -->
                                    <div class="col-span-1 sm:col-span-3">
                                        <label for="date_debut" class="block text-sm font-medium text-gray-700">
                                            Date de début
                                        </label>
                                        <div class="mt-1">
                                            <input type="date" name="date_debut" id="date_debut"
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full text-sm border-gray-300 rounded-md p-4"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Date de fin -->
                                    <div class="col-span-1 sm:col-span-3">
                                        <label for="date_fin" class="block text-sm font-medium text-gray-700">
                                            Date de fin
                                        </label>
                                        <div class="mt-1">
                                            <input type="date" name="date_fin" id="date_fin"
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full text-sm border-gray-300 rounded-md p-4"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Nombre d'équipes -->
                                    <div class="col-span-1 sm:col-span-3">
                                        <label for="nombre_equipes" class="block text-sm font-medium text-gray-700">
                                            Nombre d'équipes
                                        </label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <input type="number" name="nombre_equipes" id="nombre_equipes"
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full text-sm border-gray-300 rounded-md p-4"
                                                placeholder="Minimum 2 équipes" required min="2">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <i class="fas fa-users text-gray-400"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Upload photo -->
                                    <div class="col-span-1 sm:col-span-6">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Photo du terrain
                                        </label>
                                        <div
                                            class="mt-1 flex justify-center px-4 sm:px-6 pt-4 sm:pt-5 pb-4 sm:pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <i class="fas fa-upload text-gray-400 text-2xl sm:text-3xl"></i>
                                                <div
                                                    class="flex flex-col sm:flex-row text-sm text-gray-600 justify-center">
                                                    <label for="file-upload"
                                                        class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                                        <span>Télécharger un fichier</span>
                                                        <input id="file-upload" name="image" type="file"
                                                            class="sr-only" accept="image/*">
                                                    </label>
                                                    <p class="sm:pl-1 mt-1 sm:mt-0">ou glisser-déposer</p>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, JPEG jusqu'à 2MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-5">
                                    <div class="mt-6 flex justify-center space-x-4">
                                        <button type="submit"
                                            class="bg-gradient-to-r from-green-500 to-green-800 text-white px-6 py-2 rounded-md shadow-sm">Créer tournoi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Liste des tournois -->
                <div class="mt-8">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Liste des tournois</h3>
                        </div>
                        <div class="p-4 sm:p-6">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom de Tournoi</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date début</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date fin</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre d'équipes</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse($tournois as $tournoi)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="w-28 h-28 flex-shrink-0">
                                                    @if($tournoi->image)
                                                        <img class="w-28 h-28 rounded-lg object-cover" src="{{ asset('img/' . $tournoi->image) }}" alt="Image du tournoi">
                                                    @else
                                                        <div class="w-28 h-28 rounded-lg bg-gray-200 flex items-center justify-center">
                                                            <i class="fas fa-camera text-gray-400 text-2xl"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $tournoi->nom }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($tournoi->date_debut)->format('d/m/Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($tournoi->date_fin)->format('d/m/Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $tournoi->nombre_equipes }} équipes
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($tournoi->statut === 'en_attente')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        <i class="fas fa-clock mr-1"></i> À venir
                                                    </span>
                                                @elseif($tournoi->statut === 'en_cours')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        <i class="fas fa-play mr-1"></i> En cours
                                                    </span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                        <i class="fas fa-flag-checkered mr-1"></i> Terminé
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                                <button
                                                    onclick="openEditModal('{{ $tournoi->id }}', '{{ $tournoi->nom }}', '{{ $tournoi->date_debut }}', '{{ $tournoi->date_fin }}', '{{ $tournoi->nombre_equipes }}', '{{ $tournoi->statut }}')"
                                                    class="bg-yellow-500 text-white px-3 py-1 rounded-md text-sm">Modifier</button>

                                                <form action="{{ route('tournois.destroy', $tournoi->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce tournoi ?')"
                                                        class="bg-red-500 text-white px-3 py-1 rounded-md text-sm">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                Aucun tournoi n'a été créé pour le moment.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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

        // Fonction pour ouvrir la modal d'édition
        function openEditModal(id, nom, dateDebut, dateFin, nombreEquipes, statut) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editForm');
            
            // Remplir les champs
            document.getElementById('editNom').value = nom;
            document.getElementById('editDateDebut').value = dateDebut;
            document.getElementById('editDateFin').value = dateFin;
            document.getElementById('editNombreEquipes').value = nombreEquipes;
            document.getElementById('editStatut').value = statut;
            
            // Mettre à jour l'action du formulaire
            form.action = `/tournois/${id}`;
            
            // Afficher la modal
            modal.classList.remove('hidden');

            // Fermer la modal en cliquant en dehors
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        }
    </script>

    <!-- Modal d'édition -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Modifier le tournoi</h3>
                <form id="editForm" method="POST" class="mt-4">
                    @csrf
                    @method('PUT')
                    <div class="mt-2 px-7 py-3">
                        <input type="text" id="editNom" name="nom" placeholder="Nom du tournoi"
                            class="mb-3 px-3 py-2 border rounded-md w-full">
                        <input type="date" id="editDateDebut" name="date_debut"
                            class="mb-3 px-3 py-2 border rounded-md w-full">
                        <input type="date" id="editDateFin" name="date_fin"
                            class="mb-3 px-3 py-2 border rounded-md w-full">
                        <input type="number" id="editNombreEquipes" name="nombre_equipes" min="2"
                            class="mb-3 px-3 py-2 border rounded-md w-full" placeholder="Nombre d'équipes">
                        <select id="editStatut" name="statut" class="mb-3 px-3 py-2 border rounded-md w-full">
                            <option value="en_attente">À venir</option>
                            <option value="en_cours">En cours</option>
                            <option value="termine">Terminé</option>
                        </select>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>