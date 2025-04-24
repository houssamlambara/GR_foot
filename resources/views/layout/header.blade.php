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
</head>

<body>
    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <nav class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-4">
            <a href="#">
                <img src="" alt="Logo" width="200" height="53.5">
            </a>

            <!-- Menu de navigation -->
            <div class="hidden md:flex space-x-6">
                <a href="/index" class="font-medium text-gray-700 hover:text-green-400 transition">Accueil</a>
                <a href="/activiter" class="font-medium text-gray-700 hover:text-green-400 transition">Notre
                    Activités</a>
                <a href="/reservation" class="font-medium text-gray-700 hover:text-green-400 transition">Réservation</a>
                <a href="/tournois" class="font-medium text-gray-700 hover:text-green-400 transition">Tournois</a>
                <a href="/about" class="font-medium text-gray-700 hover:text-green-400 transition">About</a>
                <a href="/contact" class="font-medium text-gray-700 hover:text-green-400 transition">Contact</a>
            </div>

            <!-- Boutons Sign In et Sign Up -->
            @auth
                <form action="{{ route('logout') }}" method="POST">
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
            <button id="burger-btn"
                class="md:hidden flex items-center justify-center p-2 rounded-md bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                aria-label="Menu">
                <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </nav>
    </header>

    <!-- Mobile menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden bg-white shadow-md hidden absolute z-50 top-16 left-0 right-0">
        <div class="px-6 py-4 space-y-4">
            <a href="/index" class="block text-gray-700 font-medium hover:text-green-400 transition">Accueil</a>
            <a href="/activiter" class="block text-gray-700 font-medium hover:text-green-400 transition">Notre
                Activités</a>
            <a href="/reservation"
                class="block text-gray-700 font-medium hover:text-green-400 transition">Réservation</a>
            <a href="/tournois" class="block text-gray-700 font-medium hover:text-green-400 transition">Tournois</a>
            <a href="/about" class="block text-gray-700 font-medium hover:text-green-400 transition">About</a>
            <a href="/contact" class="block text-gray-700 font-medium hover:text-green-400 transition">Contact</a>

            @auth
                <a href="/signin"
                    class="block text-gray-700 border border-gray-400 px-4 py-2 rounded-lg font-semibold text-center hover:bg-gray-100 transition">Log
                    Out</a>
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

    <!-- Contenu spécifique à la page -->
    <div class="container mx-auto">
        @yield('content')
    </div>

    <!-- Script pour le menu mobile -->
    <script>
        document.getElementById("burger-btn").addEventListener("click", function() {
            const mobileMenu = document.getElementById("mobile-menu");
            mobileMenu.classList.toggle("hidden");
        });
    </script>
</body>

</html>
