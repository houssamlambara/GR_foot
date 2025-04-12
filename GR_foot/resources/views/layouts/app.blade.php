<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GR Foot - Gestion de Terrains de Sport</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="hidden md:flex md:w-64 md:flex-col bg-gradient-to-r from-green-500 to-green-800">
            <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4">
                    <span class="text-2xl font-semibold text-white">GR Foot</span>
                </div>
                <div class="mt-6 flex-1 flex flex-col">
                    <nav class="flex-1 px-2 pb-4 space-y-2">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-800 transition duration-300">
                            <i class="fas fa-home mr-3"></i>
                            Tableau de bord
                        </a>
                        <a href="{{ route('dashboardreservation') }}" class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-800 transition duration-300">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            Réservations
                        </a>
                        <a href="{{ route('addterrain') }}" class="flex items-center px-2 py-3 text-sm font-medium rounded-md text-white hover:bg-green-800 transition duration-300">
                            <i class="fas fa-futbol mr-3"></i>
                            Terrains
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
                        <span class="text-gray-700">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Main content area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 bg-gray-100">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const menuButton = document.getElementById('menu-button');
        const sidebar = document.querySelector('.md\\:flex');

        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>
</html> 