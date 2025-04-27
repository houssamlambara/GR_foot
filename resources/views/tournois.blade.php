@extends('layout.header')

@section('title', 'Réservation de Terrain de Football')

@section('content')

    <!-- Main Content -->
    <div class="container mx-auto py-16 px-6 flex justify-center">
        <div class="w-full max-w-screen-lg text-center">
            <!-- Titre principal -->
            <h1 class="text-4xl sm:text-4xl md:text-5xl font-bold text-gray-800 mb-12 relative">
                <span class="relative z-10">Nos Tournois</span>
                <span
                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-20 h-2 bg-brand-green rounded-full"></span>
            </h1>

            <!-- Tournois -->
            <section>
                <h2
                    class="text-2xl sm:text-2xl md:text-3xl font-semibold text-brand-green mb-8 flex items-center justify-center">
                    <span class="mr-3"><i class="fas fa-trophy"></i></span>
                    Tournois disponibles
                </h2>

                <!-- Cards de Tournois -->
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($tournoisActifs as $tournoi)
                    <!-- Card Tournoi -->
                    <div
                        class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                        @if($tournoi->image)
                            <img src="{{ asset('img/' . $tournoi->image) }}" alt="{{ $tournoi->nom }}"
                                class="w-full h-40 object-cover rounded-xl mb-4">
                        @else
                            <div class="w-full h-40 bg-gray-200 rounded-xl mb-4 flex items-center justify-center">
                                <i class="fas fa-trophy text-gray-400 text-4xl"></i>
                            </div>
                        @endif
                        
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $tournoi->nom }}</h3>
                            @if($tournoi->statut === 'en_attente')
                                <span class="inline-block px-4 py-1 bg-yellow-500 text-white text-xs rounded-full shadow-sm">
                                    <i class="fas fa-clock mr-1"></i> À venir
                                </span>
                            @elseif($tournoi->statut === 'en_cours')
                                <span class="inline-block px-4 py-1 bg-gradient-to-r from-green-400 to-green-500 text-white text-xs rounded-full shadow-sm">
                                    <i class="fas fa-play mr-1"></i> En cours
                                </span>
                            @else
                                <span class="inline-block px-4 py-1 bg-gray-500 text-white text-xs rounded-full shadow-sm">
                                    <i class="fas fa-check mr-1"></i> Terminé
                                </span>
                            @endif
                        </div>
                        
                        <div class="space-y-3 mb-6">
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="far fa-calendar-alt mr-2 text-brand-green"></i>
                                <span>Du {{ \Carbon\Carbon::parse($tournoi->date_debut)->format('d/m/Y') }}</span>
                            </p>
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="fas fa-calendar-check mr-2 text-brand-green"></i>
                                <span>Au {{ \Carbon\Carbon::parse($tournoi->date_fin)->format('d/m/Y') }}</span>
                            </p>
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="fas fa-users mr-2 text-brand-green"></i>
                                <span>{{ $tournoi->nombre_equipes }} équipes</span>
                            </p>
                        </div>

                        @if($tournoi->statut === 'en_cours')
                            <button
                                class="mt-4 w-full bg-gradient-to-r from-green-400 to-green-500 hover:bg-green-600 text-white py-3 rounded-xl transition duration-300 flex items-center justify-center font-medium">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                S'inscrire Maintenant
                            </button>
                        @else
                            <button disabled class="mt-4 w-full bg-gray-400 text-white py-3 rounded-xl flex items-center justify-center font-medium cursor-not-allowed">
                                <i class="fas fa-lock mr-2"></i>
                                Inscriptions terminées
                            </button>
                        @endif
                    </div>
                    @empty
                    <div class="col-span-full text-center text-gray-500">
                        <i class="fas fa-info-circle text-4xl mb-3"></i>
                        <p>Aucun tournoi actif n'est disponible pour le moment.</p>
                    </div>
                    @endforelse
                </div>
            </section>

            <!-- Tournois terminés -->
            <section class="mt-16">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-semibold text-gray-700 mb-8 flex items-center justify-center">
                    <span class="mr-3"><i class="fas fa-history"></i></span>
                    Tournois terminés
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($tournoisTermines as $tournoi)
                    <div class="bg-white p-8 rounded-2xl shadow-lg transition-all duration-300 border border-gray-100">
                        @if($tournoi->image)
                            <img src="{{ asset('img/' . $tournoi->image) }}" alt="{{ $tournoi->nom }}"
                                class="w-full h-40 object-cover rounded-xl mb-4">
                        @else
                            <div class="w-full h-40 bg-gray-200 rounded-xl mb-4 flex items-center justify-center">
                                <i class="fas fa-trophy text-gray-400 text-4xl"></i>
                            </div>
                        @endif
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $tournoi->nom }}</h3>
                            <span class="inline-block px-4 py-1 bg-gray-500 text-white text-xs rounded-full shadow-sm">
                                <i class="fas fa-flag-checkered mr-1"></i> Terminé
                            </span>
                        </div>
                        <div class="space-y-3 mb-2">
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="far fa-calendar-alt mr-2 text-gray-500"></i>
                                <span>Du {{ \Carbon\Carbon::parse($tournoi->date_debut)->format('d/m/Y') }}</span>
                            </p>
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="fas fa-calendar-check mr-2 text-gray-500"></i>
                                <span>Au {{ \Carbon\Carbon::parse($tournoi->date_fin)->format('d/m/Y') }}</span>
                            </p>
                            <p class="flex items-center text-gray-600 justify-center">
                                <i class="fas fa-users mr-2 text-gray-500"></i>
                                <span>{{ $tournoi->nombre_equipes }} équipes</span>
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center text-gray-500">
                        <i class="fas fa-info-circle text-4xl mb-3"></i>
                        <p>Aucun tournoi terminé pour le moment.</p>
                    </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    @include('layout.footer')

    <script>
        const burgerBtn = document.getElementById("burger-btn");
        const mobileMenu = document.getElementById("mobile-menu");

        burgerBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });

        const menuLinks = mobileMenu.querySelectorAll("a");
        menuLinks.forEach(link => {
            link.addEventListener("click", () => {
                mobileMenu.classList.add("hidden");
            });
        });
    </script>
    </body>

    </html>

@endsection
