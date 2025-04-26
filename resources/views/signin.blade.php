<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - SportReserve</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('https://images.pexels.com/photos/114296/pexels-photo-114296.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
            background-size: cover;
            background-position: center;
        }

        .backdrop {
            background-color: rgba(0, 0, 0, 0.6);
            /* Assurer la visibilité de l'image de fond */
            backdrop-filter: blur(5px);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .form-container {
            position: relative;
            z-index: 10;
        }

        .form-background {
            background-color: rgba(255, 255, 255, 0.8);
            /* Fond semi-transparent pour que l'image de fond soit visible */
            border-radius: 10px;
            padding: 30px;
        }
    </style>

</head>

<body class=" ">

    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <nav class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-4">
            <!-- Logo -->
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
            <div class="hidden md:flex space-x-4">
                <a href="/signin"
                    class="bg-transparent text-gray-700 px-4 py-2 border border-gray-400 rounded-lg font-semibold hover:bg-gray-100 transition">Sign
                    In</a>
                <a href="/signin"
                    class="bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white px-4 py-2 rounded-lg font-semibold transition">Sign
                    Up</a>
            </div>

            <!-- Menu burger pour mobile -->
            <button id="burger-btn"
                class="md:hidden flex items-center justify-center p-2 rounded-md bg-gray-200 hover:bg-gray-300
focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
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
            <a href="./signin"
                class="block text-white bg-gradient-to-r from-green-400 via-green-600 to-green-800 px-4 py-2 rounded-lg font-semibold text-center transition">Sign
                Up</a>
            <a href="./signin"
                class="block text-gray-700 border border-gray-400 px-4 py-2 rounded-lg font-semibold text-center hover:bg-gray-100 transition">Sign
                In</a>
        </div>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <!-- Toggle buttons avec style moderne -->
        <div class="flex bg-gray-100 p-1 rounded-xl mb-6 shadow-inner">
            <button id="signInBtn"
                class="w-1/2 py-3 px-6 rounded-xl font-bold text-sm transition-all duration-300 bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg transform hover:scale-[1.02]">
                Se Connecter
            </button>
            <button id="signUpBtn"
                class="w-1/2 py-3 px-6 rounded-xl font-bold text-sm transition-all duration-300 text-gray-600 hover:bg-gray-200">
                S'inscrire
            </button>
        </div>

        <body
            class="flex items-center justify-center min-h-screen bg-gradient-to-r from-green-200 to-emerald-400 relative overflow-hidden">
            <!-- Container Principal -->
            <div
                class="relative z-10 bg-white py-8 px-6 shadow-2xl sm:rounded-2xl sm:px-10 border border-gray-100 w-full max-w-md mb-12">

                @if(session('error'))
                <div class="mb-6 p-6 bg-red-100 border-2 border-red-500 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-4">
                            <svg class="h-8 w-8 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-red-800">Compte suspendu</h3>
                            <p class="mt-2 text-base text-red-700">{{ session('error') }}</p>
                            <p class="mt-2 text-sm text-red-600">Pour toute question, veuillez contacter l'administrateur.</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Formulaire de Connexion -->
                <form method="POST" id="signInForm" class="space-y-6" action="{{ route('login') }}">
                    @csrf
                    @if(session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="relative">
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Adresse email</label>
                        <input id="email" name="email" type="email" required
                            class="mt-1 w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 hover:border-gray-300"
                            placeholder="Email">
                    </div>

                    <div class="relative">
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Mot de
                            passe</label>
                        <input id="password" name="password" type="password" required
                            class="mt-1 w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 hover:border-gray-300"
                            placeholder="Mot de passe">
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded transition-all duration-300">
                            <span class="ml-2 text-sm font-medium text-gray-700">Se souvenir de moi</span>
                        </label>
                        <a href="#"
                            class="text-sm font-semibold text-green-600 hover:text-green-500 transition-colors duration-300">
                            Mot de passe oublié?
                        </a>
                    </div>

                    <button type="submit"
                        class="w-full py-3 px-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Se connecter
                    </button>
                </form>

                <!-- Formulaire d'Inscription -->
                <form method="POST" id="signUpForm" class="space-y-6 hidden" action="{{url('/register')}}">
                    @csrf
                    <div class="relative">
                        <label for="signup-name" class="block text-sm font-bold text-gray-700 mb-2">Nom
                            complet</label>
                        <input id="signup-name" name="name" type="text" required
                            class="mt-1 w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 hover:border-gray-300"
                            placeholder="Nom complet">
                    </div>

                    <div class="relative">
                        <label for="signup-email" class="block text-sm font-bold text-gray-700 mb-2">Adresse
                            email</label>
                        <input id="signup-email" name="email" type="email" value="{{old('email')}}" required
                            class="mt-1 w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 hover:border-gray-300"
                            placeholder="Email">
                            @error('email')<span>{{$message}}</span> @enderror
                    </div>

                    <!-- <div class="relative">
                            <label for="signup-phone" class="block text-sm font-bold text-gray-700 mb-2">Numéro de téléphone</label>
                            <input id="signup-phone" name="phone" type="tel" required
                                class="mt-1 w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 hover:border-gray-300"
                                placeholder="Numéro de téléphone">
                        </div>                         -->

                    <div class="relative">
                        <label for="signup-password" class="block text-sm font-bold text-gray-700 mb-2">Mot de
                            passe</label>
                        <input id="signup-password" name="password" type="password" required
                            class="mt-1 w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 hover:border-gray-300"
                            placeholder="Mot de passe">
                            @error('password') <span>{{ $message }}</span> @enderror
                    </div>

                    <button type="submit"
                        class="w-full py-3 px-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        S'inscrire
                    </button>
                </form>
            </div>
        </body>
    </div>

    <!-- Footer -->
    @include('layout.footer')

    <script>
        const signInBtn = document.getElementById('signInBtn');
        const signUpBtn = document.getElementById('signUpBtn');
        const signInForm = document.getElementById('signInForm');
        const signUpForm = document.getElementById('signUpForm');

        signInBtn.addEventListener('click', () => {
            signInBtn.classList.add('bg-gradient-to-r', 'from-green-500', 'to-emerald-600', 'text-white',
                'shadow-lg');
            signInBtn.classList.remove('text-gray-600', 'hover:bg-gray-200');
            signUpBtn.classList.remove('bg-gradient-to-r', 'from-green-500', 'to-emerald-600', 'text-white',
                'shadow-lg');
            signUpBtn.classList.add('text-gray-600', 'hover:bg-gray-200');
            signInForm.classList.remove('hidden');
            signUpForm.classList.add('hidden');
        });

        signUpBtn.addEventListener('click', () => {
            signUpBtn.classList.add('bg-gradient-to-r', 'from-green-500', 'to-emerald-600', 'text-white',
                'shadow-lg');
            signUpBtn.classList.remove('text-gray-600', 'hover:bg-gray-200');
            signInBtn.classList.remove('bg-gradient-to-r', 'from-green-500', 'to-emerald-600', 'text-white',
                'shadow-lg');
            signInBtn.classList.add('text-gray-600', 'hover:bg-gray-200');
            signUpForm.classList.remove('hidden');
            signInForm.classList.add('hidden');
        });
        // Sélectionner le bouton burger et le menu mobile
        const burgerBtn = document.getElementById("burger-btn");
        const mobileMenu = document.getElementById("mobile-menu");

        // Ajouter un événement pour ouvrir/fermer le menu
        burgerBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden"); // Toggle la classe 'hidden' pour afficher/masquer le menu
        });
    </script>

</body>

</html>
