<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Réservation de Terrain de Football')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* Ajout d'un fond de page léger et d'animations */
        body {
            background: linear-gradient(to right, #f0f4f8, #e4e7eb);
            font-family: 'Roboto', sans-serif;
        }

        /* Boutons animés */
        .btn:hover {
            transition: all 0.3s ease;
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Animation pour les cartes */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
    
    <!-- Script pour le menu mobile - déplacé dans le head -->
    <script>
        // Fonction pour gérer le menu mobile
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById("mobile-menu");
            if (mobileMenu) {
                mobileMenu.classList.toggle("hidden");
            }
        }
    </script>
</head>

<body>
    <!-- Navbar -->
    <header class="bg-white shadow-md relative">
        <nav class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-4">
            <a href="#">
                <img src="/img/Logo.png" alt="Logo" width="90" height="20">
            </a>

            <!-- Menu de navigation -->
            <div class="hidden md:flex space-x-6">
                <a href="/index" class="font-medium text-gray-700 hover:text-green-400 transition">Accueil</a>
                <a href="/activiter" class="font-medium text-gray-700 hover:text-green-400 transition">Notre
                    Activités</a>
                <a href="/reservation" class="font-medium text-gray-700 hover:text-green-400 transition">Réservation</a>
                @auth
                <a href="{{ route('mesReservations') }}" class="font-medium text-gray-700 hover:text-green-400 transition">Mes Réservations</a>
                @endauth
                <a href="/tournois" class="font-medium text-gray-700 hover:text-green-400 transition">Tournois</a>
                <a href="/about" class="font-medium text-gray-700 hover:text-green-400 transition">About</a>
                <a href="/contact" class="font-medium text-gray-700 hover:text-green-400 transition">Contact</a>
            </div>

            <!-- Boutons Sign In et Sign Up -->
            @auth
            <form action="{{ route('logout') }}" method="POST" class="hidden md:block">
                @csrf
                <button type="submit"
                    class="bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white px-4 py-2 rounded-lg font-semibold transition">LogOut</a>
                </button>
            </form>
            @else
            <div class="hidden md:flex space-x-4">
                <a href="/signin"
                    class="bg-transparent text-gray-700 px-4 py-2 border border-gray-400 rounded-lg font-semibold hover:bg-gray-100 transition">Sign
                    In</a>
                <a href="/signin"
                    class="bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white px-4 py-2 rounded-lg font-semibold transition">Sign
                    Up</a>
            </div>
            @endauth

            <!-- Menu burger pour mobile -->
            <button onclick="toggleMobileMenu()"
                class="md:hidden flex items-center justify-center p-2 rounded-md bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                aria-label="Menu">
                <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </nav>

        <!-- Mobile menu (hidden by default) -->
        <div id="mobile-menu" class="md:hidden hidden absolute z-50 w-full bg-white shadow-lg">
            <div class="px-6 py-4 space-y-4">
                <a href="/index" class="block text-gray-700 font-medium hover:text-green-400 transition">Accueil</a>
                <a href="/activiter" class="block text-gray-700 font-medium hover:text-green-400 transition">Notre
                    Activités</a>
                <a href="/reservation" class="block text-gray-700 font-medium hover:text-green-400 transition">Réservation</a>
                @auth
                <a href="{{ route('mesReservations') }}" class="block text-gray-700 font-medium hover:text-green-400 transition">Mes Réservations</a>
                @endauth
                <a href="/tournois" class="block text-gray-700 font-medium hover:text-green-400 transition">Tournois</a>
                <a href="/about" class="block text-gray-700 font-medium hover:text-green-400 transition">About</a>
                <a href="/contact" class="block text-gray-700 font-medium hover:text-green-400 transition">Contact</a>

                @auth
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white px-4 py-2 rounded-lg font-semibold transition">LogOut</button>
                </form>
                @else
                <a href="/signup"
                    class="block text-white bg-gradient-to-r from-green-400 via-green-600 to-green-800 px-4 py-2 rounded-lg font-semibold text-center transition">Sign
                    Up</a>
                <a href="/signin"
                    class="block text-gray-700 border border-gray-400 px-4 py-2 rounded-lg font-semibold text-center hover:bg-gray-100 transition">Sign
                    In</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Contenu spécifique à la page -->
    <div class="container mx-auto">
        @yield('content')
    </div>
</body>

</html>