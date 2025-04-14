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
            <div class="flex flex-wrap justify-center space-x-4 mb-8">
                <!-- Filtrage par Activité -->
                <select id="sportFilter" class="bg-gray-300 text-gray-800 px-4 py-2 rounded cursor-pointer">
                    <option value="">Toutes les Activités</option>
                    <option value="football">Football</option>
                    <option value="padel">Padel</option>
                    <option value="tennis">Tennis</option>
                    <option value="basketball">Basketball</option>
                </select>

                <!-- Filtrage par Région -->
                <select id="regionFilter" class="bg-gray-300 text-gray-800 px-4 py-2 rounded cursor-pointer">
                    <option value="">Toutes les Régions</option>
                    <option value="region1">Région 1</option>
                    <option value="region2">Région 2</option>
                </select>

                <!-- Filtrage par Ville -->
                <select id="cityFilter" class="bg-gray-300 text-gray-800 px-4 py-2 rounded cursor-pointer">
                    <option value="">Toutes les Villes</option>
                    <option value="ville1">Ville 1</option>
                    <option value="ville2">Ville 2</option>
                </select>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($terrains as $terrain)
                    <!-- Terrain Card -->
                    <div
                        class="activity-card {{ strtolower($terrain->type) }} group bg-white rounded-3xl shadow-xl overflow-hidden transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300">
                        <div class="relative overflow-hidden">
                            <div
                                class="absolute top-4 right-4 z-10 bg-black bg-opacity-75 text-white px-3 py-1 rounded-full text-sm shadow-md">
                                {{ $terrain->tarif }} DH/h
                            </div>
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
                                    {{ $terrain->localisation }}
                                </div>
                            </div>

                            <div class="flex justify-end items-center mt-6 pt-6 border-t border-gray-100">
                                <a href="{{ route('reservation') }}"
                                    class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition duration-300">
                                    Réserver
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('layout.footer')

    <script>
        // Filtrage des cartes d'activités
        document.addEventListener('DOMContentLoaded', function() {
            const sportFilter = document.getElementById('sportFilter');
            const regionFilter = document.getElementById('regionFilter');
            const cityFilter = document.getElementById('cityFilter');
            const availabilityFilter = document.getElementById('availabilityFilter');
            const activityCards = document.querySelectorAll('.activity-card');

            function filterCards() {
                const selectedSport = sportFilter.value.toLowerCase();
                const selectedRegion = regionFilter.value.toLowerCase();
                const selectedCity = cityFilter.value.toLowerCase();
                const selectedAvailability = availabilityFilter.value.toLowerCase();

                activityCards.forEach(card => {
                    const sportType = card.classList.contains(selectedSport);
                    const region = card.dataset.region === selectedRegion;
                    const city = card.dataset.city === selectedCity;
                    const availability = card.dataset.availability === selectedAvailability;

                    if ((!selectedSport || sportType) &&
                        (!selectedRegion || region) &&
                        (!selectedCity || city) &&
                        (!selectedAvailability || availability)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            sportFilter.addEventListener('change', filterCards);
            regionFilter.addEventListener('change', filterCards);
            cityFilter.addEventListener('change', filterCards);
            availabilityFilter.addEventListener('change', filterCards);
        });
    </script>
@endsection
