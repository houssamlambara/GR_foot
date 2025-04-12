@extends('layout.header')

@section('title', 'Ajouter un utilisateur')

@section('content')
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
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Ajouter un utilisateur</h1>
                <a href="{{ route('utilisateurs.index') }}" 
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Retour à la liste
                </a>
            </div>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erreur!</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-lg p-6">
                <form action="{{ route('utilisateurs.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                            <input type="password" id="password" name="password" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Rôle</label>
                            <select id="role" name="role" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Utilisateur</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end">
                        <button type="submit" 
                            class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-3 rounded-lg shadow-md hover:from-green-600 hover:to-green-800 transition duration-300">
                            <i class="fas fa-save mr-2"></i> Enregistrer
                        </button>
                    </div>
                </form>
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
</script>
@endsection 