@extends('layout.header')

@section('title', 'Réservation de Terrain de Football')

@section('content')

    <!-- Header -->
    <header class="bg-green-600 py-12">
        <div class="max-w-screen-xl mx-auto text-center">
            <h1 class="text-5xl text-white font-bold">Nos Activités Sportives</h1>
            <p class="mt-4 text-xl text-gray-300">Découvrez nos installations sportives de première classe.
                Réservez facilement et profitez d'une expérience sportive exceptionnelle.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-16 bg-gradient-to-br from-gray-100 to-gray-200">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Section de Filtrage -->
            <div class="overflow-x-auto">
                <div class="flex flex-wrap justify-center space-x-4 mb-8 min-w-max px-4">
                    <!-- Filtrage par Activité -->
                    <select id="sportFilter" class="bg-gray-300 text-gray-800 px-4 py-2 rounded cursor-pointer">
                        <option value="">Toutes les Activités</option>
                        <option value="football">Football</option>
                        <option value="padel">Padel</option>
                        <option value="tennis">Tennis</option>
                        <option value="basketball">Basketball</option>
                    </select>

                    <!-- Filtrage par Ville -->
                    <select id="cityFilter" class="bg-gray-300 text-gray-800 px-4 py-2 rounded cursor-pointer">
                        <option value="">Toutes les Villes</option>
                        @foreach($villes as $ville)
                            <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                        @endforeach
                    </select>

                    <!-- Filtrage par Région -->
                    <select id="regionFilter" class="bg-gray-300 text-gray-800 px-4 py-2 rounded cursor-pointer">
                        <option value="">Toutes les Régions</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}" data-ville="{{ $region->ville_id }}">{{ $region->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($terrains as $terrain)
                    <!-- Terrain Card -->
                    <div
                        class="activity-card {{ strtolower($terrain->type) }} group bg-white rounded-3xl shadow-xl overflow-hidden transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300"
                        data-ville="{{ $terrain->region->ville_id ?? '' }}"
                        data-region="{{ $terrain->region_id ?? '' }}">
                        <div class="relative overflow-hidden">
                            @if ($terrain->image)
                                <img src="{{ asset('img/' . $terrain->image) }}" alt="Terrain de {{ $terrain->type }}"
                                    class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500 rounded-t-3xl">
                            @else
                                <img src="{{ asset('img/default-terrain.png') }}" alt="Terrain de {{ $terrain->type }}"
                                    class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500 rounded-t-3xl">
                            @endif
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent h-24">
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-2xl font-bold text-gray-900">{{ $terrain->type }}</h3>
                                {{-- <span class="flex items-center text-green-600">
                                    <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span>
                                    Disponible
                                </span> --}}
                            </div>

                            <p class="text-gray-600 mb-6">
                                {{ $terrain->description ?? 'Terrain de qualité pour vos activités sportives.' }}</p>

                            <div class="space-y-2 text-sm text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Durée: 60 minutes
                                </div>

                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    {{ $terrain->capacite }} joueurs
                                </div>

                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    @if($terrain->region && $terrain->region->ville)
                                        {{ $terrain->region->ville->nom }} - {{ $terrain->region->nom }}
                                    @else
                                        Localisation non disponible
                                    @endif
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-6 pt-6 border-t border-gray-100">
                                <div class="text-xl font-bold text-gray-800">
                                    {{ $terrain->tarif }} DH
                                </div>
                                <a href="{{ route('reservation', [
                                    'terrain_id' => $terrain->id,
                                    'ville_id' => $terrain->region->ville_id ?? '',
                                    'region_id' => $terrain->region_id ?? ''
                                ]) }}"
                                    class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition duration-300">
                                    Réserver
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    @if ($terrains->onFirstPage())
                        <span class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 cursor-not-allowed">
                            <span class="sr-only">Précédent</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $terrains->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Précédent</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    @foreach ($terrains->getUrlRange(max($terrains->currentPage() - 2, 1), min($terrains->currentPage() + 2, $terrains->lastPage())) as $page => $url)
                        @if ($page == $terrains->currentPage())
                            <span class="relative inline-flex items-center px-4 py-2 border border-green-500 bg-green-50 text-sm font-medium text-green-600">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    @if ($terrains->hasMorePages())
                        <a href="{{ $terrains->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Suivant</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 cursor-not-allowed">
                            <span class="sr-only">Suivant</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                </nav>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('layout.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sportFilter = document.getElementById('sportFilter');
            const regionFilter = document.getElementById('regionFilter');
            const cityFilter = document.getElementById('cityFilter');
            const activityCards = document.querySelectorAll('.activity-card');

            // Stocker les options de région originales
            const originalRegionOptions = Array.from(regionFilter.options);

            // Filtrer les régions en fonction de la ville sélectionnée
            cityFilter.addEventListener('change', function() {
                const selectedVilleId = this.value;
                
                // Réinitialiser le select des régions
                regionFilter.innerHTML = '<option value="">Toutes les Régions</option>';
                
                // Ajouter uniquement les régions correspondant à la ville sélectionnée
                originalRegionOptions.forEach(option => {
                    if (option.value === '' || !selectedVilleId || option.dataset.ville === selectedVilleId) {
                        regionFilter.appendChild(option.cloneNode(true));
                    }
                });

                // Réinitialiser la sélection de région
                regionFilter.value = '';
                
                filterCards();
                updateResults();
            });

            function filterCards() {
                const selectedSport = sportFilter.value.toLowerCase();
                const selectedRegion = regionFilter.value;
                const selectedVille = cityFilter.value;
                let visibleCount = 0;

                activityCards.forEach(card => {
                    const sportType = card.classList.contains(selectedSport);
                    const region = !selectedRegion || card.dataset.region === selectedRegion;
                    const ville = !selectedVille || card.dataset.ville === selectedVille;

                    if ((!selectedSport || sportType) && region && ville) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                return visibleCount;
            }

            function updateResults() {
                const visibleCount = filterCards();
                
                // Supprimer l'ancien message s'il existe
                const oldMessage = document.getElementById('results-message');
                if (oldMessage) {
                    oldMessage.remove();
                }

                // Créer et afficher le nouveau message
                const message = document.createElement('div');
                message.id = 'results-message';
                message.className = 'text-center text-gray-600 mb-8';
                message.textContent = `${visibleCount} terrain trouvé`;
                
                const filterSection = document.querySelector('.flex.flex-wrap.justify-center');
                filterSection.parentNode.insertBefore(message, filterSection.nextSibling);
            }

            // Ajouter les écouteurs d'événements
            sportFilter.addEventListener('change', () => {
                filterCards();
                updateResults();
            });
            
            regionFilter.addEventListener('change', () => {
                filterCards();
                updateResults();
            });

            // Initialiser l'affichage des résultats
            updateResults();
        });
    </script>
@endsection
