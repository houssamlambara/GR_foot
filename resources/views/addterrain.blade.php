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
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
                        </a>
                        <a href="{{ route('addtournois') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
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
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-700 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
                        </a>
                        <a href="{{ route('addtournois') }}"
                            class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-700 transition duration-300">
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

            <!-- Main content area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 bg-gray-100">
                <h1 class="text-2xl font-semibold text-gray-800">Gestion des terrains</h1>

                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif

                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Erreur!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Form section for adding new field -->
                <div class="mt-8">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Ajouter un nouveau terrain</h3>
                        </div>
                        <div class="p-4 sm:p-6">
                            <form action="{{ route('terrains.store') }}" method="POST" enctype="multipart/form-data"
                                class="space-y-4 sm:space-y-6" id="terrainForm">
                                @csrf
                                <input type="hidden" name="_method" id="formMethod" value="POST">
                                <div class="grid grid-cols-1 gap-y-4 sm:gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <!-- Type de terrain -->
                                    <div class="col-span-1 sm:col-span-3">
                                        <label for="type" class="block text-sm font-medium text-gray-700">
                                            Type de terrain
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" name="type" id="type"
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full text-sm border-gray-300 rounded-md p-4"
                                                placeholder="Ex: Football, Basketball, etc." required>
                                        </div>
                                    </div>

                                    <!-- Capacité -->
                                    <div class="col-span-1 sm:col-span-3">
                                        <label for="capacite" class="block text-sm font-medium text-gray-700">
                                            Capacité (personnes)
                                        </label>
                                        <div class="mt-1">
                                            <input type="number" name="capacite" id="capacite"
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full text-sm border-gray-300 rounded-md p-4"
                                                placeholder="Nombre de joueurs" required>
                                        </div>
                                    </div>

                                    <!-- Tarif -->
                                    <div class="col-span-1 sm:col-span-3">
                                        <label for="tarif" class="block text-sm font-medium text-gray-700">
                                            Tarif par heure (DH)
                                        </label>
                                        <div class="mt-1">
                                            <input type="number" name="tarif" id="tarif"
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full text-sm border-gray-300 rounded-md p-4"
                                                placeholder="Tarif en dirhams" required>
                                        </div>
                                    </div>

                                    <!-- Région -->
                                    <div class="col-span-1 sm:col-span-3">
                                        <label for="region" class="block text-sm font-medium text-gray-700">
                                            Région
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" name="region" id="region"
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full text-sm border-gray-300 rounded-md p-4"
                                                placeholder="Entrez la région" required>
                                        </div>
                                    </div>

                                    <!-- Ville -->
                                    <div class="col-span-1 sm:col-span-3">
                                        <label for="ville" class="block text-sm font-medium text-gray-700">
                                            Ville
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" name="ville" id="ville"
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full text-sm border-gray-300 rounded-md p-4"
                                                placeholder="Entrez la ville" required>
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

                                <!-- Buttons -->
                                <div class="mt-6 flex justify-center space-x-4">
                                    <button type="submit"
                                        class="bg-gradient-to-r from-green-500 to-green-800 text-white px-6 py-2 rounded-md shadow-sm">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Section pour lister les terrains existants -->
                <div class="mt-8 bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 sm:px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Terrains existants</h3>
                    </div>

                    <!-- Version mobile (carte) -->
                    <div class="block sm:hidden">
                        <div class="divide-y divide-gray-200">
                            @forelse($terrains as $terrain)
                            <!-- Carte pour chaque terrain (mobile) -->
                            <div class="p-4">
                                <div class="flex items-center mb-2">
                                    <!-- Image à gauche -->
                                    <div class="w-24 h-24 flex-shrink-0">
                                        @if ($terrain->image)
                                        <img src="{{ asset('img/' . $terrain->image) }}"
                                            alt="Photo du terrain" class="w-24 h-24 rounded object-cover">
                                        @else
                                        <img src="{{ asset('img/default-terrain.png') }}"
                                            alt="Photo par défaut" class="w-24 h-24 rounded object-cover">
                                        @endif
                                    </div>
                                    <!-- Texte à droite -->
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $terrain->type }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Région: {{ $terrain->region ? $terrain->region->nom : 'Non assigné' }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Ville: {{ $terrain->region && $terrain->region->ville ? $terrain->region->ville->nom : 'Non assigné' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="p-4 text-center text-gray-500">
                                Aucun terrain n'a été ajouté pour le moment.
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Version tablette/desktop (tableau) -->
                    <div class="hidden sm:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th
                                        class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Photo</th>
                                    <th
                                        class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type de terrain</th>
                                    <th
                                        class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Capacité</th>
                                    <th
                                        class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tarif par heure(DH)</th>
                                    <th
                                        class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Région</th>
                                    <th
                                        class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Ville</th>
                                    <th
                                        class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($terrains as $terrain)
                                <tr>
                                    <td class="py-2 px-4">
                                        <div class="flex items-center">
                                            <div class="w-28 h-28 flex-shrink-0">
                                                @if ($terrain->image)
                                                <img src="{{ asset('img/' . $terrain->image) }}"
                                                    alt="Photo du terrain"
                                                    class="w-28 h-28 rounded object-cover">
                                                @else
                                                <img src="{{ asset('img/default-terrain.png') }}"
                                                    alt="Photo par défaut"
                                                    class="w-28 h-28 rounded object-cover">
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4">{{ $terrain->type }}</td>
                                    <td class="py-2 px-4">{{ $terrain->capacite }}</td>
                                    <td class="py-2 px-4">{{ $terrain->tarif }} DH</td>
                                    <td class="py-2 px-4">{{ $terrain->region ? $terrain->region->nom : 'Non assigné' }}</td>
                                    <td class="py-2 px-4">{{ $terrain->region && $terrain->region->ville ? $terrain->region->ville->nom : 'Non assigné' }}</td>
                                    <td class="py-2 px-4">
                                        <div class="flex flex-col sm:flex-row gap-2 justify-start">
                                            <button
                                                onclick="openEditModal('{{ $terrain->id }}', '{{ $terrain->type }}', '{{ $terrain->capacite }}', '{{ $terrain->tarif }}', '{{ $terrain->region ? $terrain->region->nom : '' }}', '{{ $terrain->region && $terrain->region->ville ? $terrain->region->ville->nom : '' }}')"
                                                class="bg-yellow-500 text-white px-3 py-1 rounded-md text-sm">Modifier</button>
                                            <form action="{{ route('terrains.destroy', $terrain->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce terrain ?')"
                                                    class="bg-red-500 text-white px-3 py-1 rounded-md text-sm">Supprimer</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="py-4 text-center text-gray-500">
                                        Aucun terrain n'a été ajouté pour le moment.
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

        function openEditModal(id, type, capacite, tarif, region, ville) {
            // Récupérer le formulaire d'ajout
            const form = document.getElementById('terrainForm');

            // Modifier l'action du formulaire vers "update"
            form.action = `/terrains/${id}`;

            // Changer la méthode en PUT
            document.getElementById('formMethod').value = 'PUT';

            // Préremplir les champs
            document.getElementById('type').value = type;
            document.getElementById('capacite').value = capacite;
            document.getElementById('tarif').value = tarif;
            document.getElementById('region').value = region;
            document.getElementById('ville').value = ville;

            // Optionnel : faire défiler jusqu'au formulaire
            form.scrollIntoView({
                behavior: 'smooth'
            });
        }

        function resetForm() {
            const form = document.getElementById('terrainForm');
            form.reset();
            form.action = "{{ route('terrains.store') }}";
            document.getElementById('formMethod').value = 'POST';
        }
    </script>
</body>

</html>