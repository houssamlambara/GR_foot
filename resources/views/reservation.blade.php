@extends('layout.header')

@section('title', 'Réservation de Terrain de Football')

@section('content')

    <!-- Page Content -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2
                class="text-4xl font-bold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-green-700 to-green-500 mb-16">
                Réservez votre terrain maintenant</h2>

            <!-- Formulaire de réservation -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Détails du terrain -->
                <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Détails de la réservation</h3>
                    <p class="text-gray-600 mb-8">Choisissez votre créneau horaire !</p>

                    <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6" id="reservationForm">
                        @csrf
                        <div>
                            <label for="nom" class="block text-sm font-semibold text-gray-700">Nom Complet</label>
                            <input type="text" id="nom" name="nom" value="{{ old('nom', Auth::user()->name) }}"
                                required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200"
                                placeholder="Entrez votre nom Complet">
                            @error('nom')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Numéro de téléphone -->
                        <div>
                            <label for="telephone" class="block text-sm font-semibold text-gray-700">Numéro de
                                téléphone</label>
                            <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}" required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200"
                                placeholder="Entrez votre numéro de téléphone">
                            @error('telephone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sélection de la date -->
                        <div>
                            <label for="date" class="block text-sm font-semibold text-gray-700">Date de
                                réservation</label>
                            <input type="date" id="date" name="date" 
                                value="{{ old('date', date('Y-m-d')) }}"
                                min="{{ date('Y-m-d') }}"
                                max="{{ date('Y-m-d', strtotime('+30 days')) }}"
                                required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                            @error('date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sélection de l'heure de début -->
                        <div>
                            <label for="heure_debut" class="block text-sm font-semibold text-gray-700">Heure de
                                début</label>
                            <select name="heure_debut" id="heure_debut" required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                                <option value="">Sélectionnez une heure de début</option>
                                @for ($heure = 9; $heure <= 22; $heure++)
                                    <option value="{{ sprintf('%02d:00:00', $heure) }}">
                                        {{ sprintf('%02d:00', $heure) }}
                                    </option>
                                @endfor
                            </select>
                            @error('heure_debut')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sélection de l'heure de fin -->
                        <div>
                            <label for="heure_fin" class="block text-sm font-semibold text-gray-700">Heure de fin</label>
                            <select name="heure_fin" id="heure_fin" required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                                <option value="">Sélectionnez une heure de fin</option>
                            </select>
                            @error('heure_fin')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Champs cachés -->
                        <input type="hidden" name="montant" id="montant" value="{{ $selectedTerrain->tarif ?? 0 }}">
                        <input type="hidden" name="activite" id="activite" value="{{ $selectedTerrain->type ?? '' }}">
                        <input type="hidden" name="terrain_id" value="{{ $selectedTerrain->id ?? '' }}">

                        <!-- Indicateur de disponibilité -->
                        <div id="disponibilite_message"
                            class="hidden bg-gray-800 border-l-4 border-red-500 text-white p-4 mb-4 rounded shadow-lg">
                            <p class="font-bold text-red-400">Créneaux Réservés !</p>
                            <p>Les créneaux grisés sont déjà réservés pour cette date et ce terrain.</p>
                        </div>

                        <button id="confirm-btn" type="submit"
                            class="w-full bg-gradient-to-r from-green-400 via-green-600 to-green-800 text-white py-4 rounded-xl mt-8">
                            Confirmer la Réservation
                        </button>
                    </form>
                </div>

                <!-- Détails de la réservation -->
                <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Résumé de la réservation</h3>
                    <p class="text-gray-600 mb-8">Vérifiez les informations avant de confirmer votre réservation.</p>

                    <div class="space-y-6">
                        <!-- Nom complet -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Nom Complet</p>
                            <p id="nom-complet-selection" class="text-lg font-bold text-gray-800">{{ Auth::user()->name }}</p>
                        </div>

                        <!-- Ville -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Ville</p>
                            <p class="text-lg font-bold text-gray-800">
                                {{ $selectedTerrain->region->ville->nom ?? 'Non sélectionnée' }}
                            </p>
                        </div>

                        <!-- Région -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Région</p>
                            <p class="text-lg font-bold text-gray-800">
                                {{ $selectedTerrain->region->nom ?? 'Non sélectionnée' }}
                            </p>
                        </div>

                        <!-- Terrain sélectionné -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Terrain Sélectionné</p>
                            <p id="terrain-selection" class="text-lg font-bold text-gray-800">
                                @if($selectedTerrain)
                                    {{ $selectedTerrain->type }} - {{ $selectedTerrain->localisation }}
                                    ({{ $selectedTerrain->capacite }} joueurs)
                                @else
                                    Non sélectionné
                                @endif
                            </p>
                        </div>

                        <!-- Horaire sélectionné -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Horaire Sélectionné</p>
                            <p id="horaire-selection" class="text-lg font-bold text-gray-800">-</p>
                        </div>

                        <!-- Date de réservation -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Date de Réservation</p>
                            <p id="date-selection" class="text-lg font-bold text-gray-800">-</p>
                        </div>

                        <!-- Numéro de téléphone -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Numéro de téléphone</p>
                            <p id="telephone-selection" class="text-lg font-bold text-gray-800">-</p>
                        </div>

                        <!-- Tarif -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Tarif</p>
                            <p id="tarif-selection" class="text-lg font-bold text-green-600">
                                <span id="tarif-base" data-tarif="{{ $selectedTerrain->tarif ?? 0 }}">
                                    {{ $selectedTerrain->tarif ?? 0 }} DH/heure
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Tarifs -->
    <section class="py-20 bg-gradient-to-br from-green-50 to-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <h2
                class="text-4xl font-bold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-green-700 to-green-500">
                Nos Tarifs</h2>
            <p class="text-center text-gray-600 mb-12 max-w-xl mx-auto">Découvrez nos offres adaptées à tous les sports
                et tous les budgets</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Tarif 1: Football 5 vs 5 -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-green-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Football 5 vs 5</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-green-600">400 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en gazon
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Gilets 2 Equipes
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Douche
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 2: Football 7 vs 7 -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-green-600">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Football 7 vs 7</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-green-600">700 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en gazon
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Gilets 2 Equipes
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Douche
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 3: Football 11 vs 11 -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-green-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Football 11 vs 11</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-green-600">1200 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en gazon
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Gilets 2 Equipes
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Douche
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Deuxième ligne (3 éléments) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                <!-- Tarif 4: Padel -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-blue-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Padel</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-blue-600">250 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès Vestiaire
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Raquettes fournies
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Balles incluses
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 5: Tennis -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-blue-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Tennis</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-blue-600">300 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès Vestiaire
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Raquettes fournies
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Balles incluses
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 6: Basketball -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-orange-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Basketball</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-orange-600">250 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en parquet
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Ballon fourni
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layout.footer')

    <!-- Ajouter cet élément caché pour stocker les données -->
    <div id="reservationsData" data-reservations="{{ json_encode($reservations) }}" style="display: none;"></div>

    <!-- Scripts -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('date');
        const heureDebutSelect = document.getElementById('heure_debut');
        const heureFinSelect = document.getElementById('heure_fin');
        const telephoneInput = document.getElementById('telephone');
        const disponibiliteMessage = document.getElementById('disponibilite_message');
        const reservationsData = JSON.parse(document.getElementById('reservationsData').dataset.reservations);
        const terrainId = document.querySelector('input[name="terrain_id"]').value;
        const tarifBase = parseFloat(document.getElementById('tarif-base').dataset.tarif);
        const montantInput = document.getElementById('montant');
        const tarifElement = document.getElementById('tarif-selection');

        // Fonction pour vérifier si un créneau est réservé
        function isTimeSlotReserved(date, startTime, endTime) {
            const selectedDate = new Date(date);
            const reservationsForDate = reservationsData.filter(reservation => {
                const reservationDate = new Date(reservation.date);
                return reservation.terrain_id == terrainId &&
                       reservationDate.getFullYear() === selectedDate.getFullYear() &&
                       reservationDate.getMonth() === selectedDate.getMonth() &&
                       reservationDate.getDate() === selectedDate.getDate();
            });

            // Convertir les heures en minutes pour faciliter la comparaison
            const start = parseInt(startTime.split(':')[0]) * 60;
            const end = parseInt(endTime.split(':')[0]) * 60;

            return reservationsForDate.some(reservation => {
                const reservationStart = parseInt(reservation.heure_debut.split(':')[0]) * 60;
                const reservationEnd = parseInt(reservation.heure_fin.split(':')[0]) * 60;
                return (start < reservationEnd && end > reservationStart);
            });
        }

        // Fonction pour calculer le montant total
        function calculateMontant() {
            const debut = heureDebutSelect.value;
            const fin = heureFinSelect.value;
            
            if (debut && fin) {
                const startHour = parseInt(debut.split(':')[0]);
                const endHour = parseInt(fin.split(':')[0]);
                const duree = endHour - startHour;
                const montantTotal = tarifBase * duree;
                
                montantInput.value = montantTotal;
                tarifElement.innerHTML = `${montantTotal} DH (${tarifBase} DH/heure)`;
            } else {
                montantInput.value = tarifBase;
                tarifElement.innerHTML = `${tarifBase} DH/heure`;
            }
        }

        // Mise à jour des informations dans le résumé
        dateInput.addEventListener('change', function() {
            document.getElementById('date-selection').textContent = this.value;
            updateAvailableHours();
        });

        heureDebutSelect.addEventListener('change', function() {
            updateHoraire();
            updateAvailableEndHours();
            calculateMontant();
        });

        heureFinSelect.addEventListener('change', function() {
            updateHoraire();
            calculateMontant();
        });

        telephoneInput.addEventListener('input', function() {
            document.getElementById('telephone-selection').textContent = this.value;
        });

        function updateHoraire() {
            const debut = heureDebutSelect.value;
            const fin = heureFinSelect.value;
            if (debut && fin) {
                document.getElementById('horaire-selection').textContent = `${debut.slice(0, 5)} - ${fin.slice(0, 5)}`;
            }
        }

        function updateAvailableHours() {
            const selectedDate = dateInput.value;
            heureDebutSelect.innerHTML = '<option value="">Sélectionnez une heure de début</option>';
            
            for (let hour = 9; hour <= 22; hour++) {
                const timeStr = `${hour.toString().padStart(2, '0')}:00:00`;
                const nextHourStr = `${(hour + 1).toString().padStart(2, '0')}:00:00`;
                
                const option = document.createElement('option');
                option.value = timeStr;
                option.textContent = timeStr.slice(0, 5);
                
                if (isTimeSlotReserved(selectedDate, timeStr, nextHourStr)) {
                    option.disabled = true;
                    option.classList.add('bg-gray-200');
                }
                
                heureDebutSelect.appendChild(option);
            }

            // Réinitialiser l'heure de fin
            heureFinSelect.innerHTML = '<option value="">Sélectionnez une heure de fin</option>';
            
            // Afficher/masquer le message de disponibilité
            const hasReservedSlots = Array.from(heureDebutSelect.options).some(option => option.disabled);
            disponibiliteMessage.style.display = hasReservedSlots ? 'block' : 'none';
        }

        function updateAvailableEndHours() {
            const selectedDate = dateInput.value;
            const startHour = parseInt(heureDebutSelect.value);
            
            heureFinSelect.innerHTML = '<option value="">Sélectionnez une heure de fin</option>';
            
            if (startHour) {
                for (let hour = startHour + 1; hour <= 23; hour++) {
                    const startTimeStr = `${startHour.toString().padStart(2, '0')}:00:00`;
                    const endTimeStr = `${hour.toString().padStart(2, '0')}:00:00`;
                    
                    const option = document.createElement('option');
                    option.value = endTimeStr;
                    option.textContent = endTimeStr.slice(0, 5);
                    
                    if (isTimeSlotReserved(selectedDate, startTimeStr, endTimeStr)) {
                        break; // On arrête d'ajouter des options dès qu'on trouve un créneau réservé
                    }
                    
                    heureFinSelect.appendChild(option);
                }
            }
        }

        // Initialiser les heures disponibles au chargement
        updateAvailableHours();
    });
    </script>

@endsection
