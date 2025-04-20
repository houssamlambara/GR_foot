@extends('layout.header')

@section('title', 'Réservation de Terrain de Football')

@section('content')

    <!-- Page Content -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-green-700 to-green-500 mb-16">
                Réservez votre terrain maintenant</h2>

            <!-- Formulaire de réservation -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Détails du terrain -->
                <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Sélectionnez votre terrain</h3>
                    <p class="text-gray-600 mb-8">Choisissez un terrain disponible pour votre prochaine partie !</p>

                    <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6" id="reservationForm">
                        @csrf
                        <div>
                            <label for="nom" class="block text-sm font-semibold text-gray-700">Nom Complet</label>
                            <input type="text" id="nom" name="nom" value="{{ old('nom', Auth::user()->name) }}" required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200"
                                placeholder="Entrez votre nom Complet">
                            @error('nom')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Numéro de téléphone -->
                        <div>
                            <label for="telephone" class="block text-sm font-semibold text-gray-700">Numéro de téléphone</label>
                            <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}" required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200"
                                placeholder="Entrez votre numéro de téléphone">
                            @error('telephone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sélection de la date -->
                        <div>
                            <label for="date" class="block text-sm font-semibold text-gray-700">Date de réservation</label>
                            <input type="date" id="date" name="date" value="{{ old('date') }}" required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                            @error('date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sélection de l'heure de début -->
                        <div>
                            <label for="heure_debut" class="block text-sm font-semibold text-gray-700">Heure de début</label>
                            <select name="heure_debut" id="heure_debut" required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                                <option value="">Sélectionnez une heure de début</option>
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

                        <!-- Champs cachés qui seront mis à jour automatiquement -->
                        <input type="hidden" name="montant" id="montant" value="{{ old('montant') }}">
                        <input type="hidden" name="activite" id="activite" value="{{ old('activite') }}">
                        <input type="hidden" name="terrain_id" id="terrain" value="{{ request()->get('terrain_id') }}">

                        <!-- Indicateur de disponibilité -->
                        <div id="disponibilite_message" class="hidden bg-gray-800 border-l-4 border-red-500 text-white p-4 mb-4 rounded shadow-lg">
                            <p class="font-bold text-red-400">Créneaux Réservés !</p>
                            <p>Les créneaux grisés sont déjà réservés pour cette date et ce terrain.</p>
                        </div>

                        <button type="submit"
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

                        <!-- Terrain sélectionné -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Terrain Sélectionné</p>
                            <p id="terrain-selection" class="text-lg font-bold text-gray-800">
                                @if($selectedTerrain)
                                    {{ $selectedTerrain->type }} - {{ $selectedTerrain->localisation }} ({{ $selectedTerrain->capacite }} joueurs)
                                @else
                                    @foreach($terrains as $terrain)
                                        @if($terrain->id == request()->get('terrain_id'))
                                            {{ $terrain->type }} - {{ $terrain->localisation }} ({{ $terrain->capacite }} joueurs)
                                            @break
                                        @endif
                                    @endforeach
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
                                @foreach($terrains as $terrain)
                                    @if($terrain->id == request()->get('terrain_id'))
                                        {{ $terrain->tarif }} DH/heure
                                    @endif
                                @endforeach
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
            <h2 class="text-4xl font-bold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-green-700 to-green-500">
                Nos Tarifs</h2>
            <p class="text-center text-gray-600 mb-12 max-w-xl mx-auto">Découvrez nos offres adaptées à tous les sports
                et tous les budgets</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Tarif 1: Football 5 vs 5 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-green-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Football 5 vs 5</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-green-600">400 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en gazon
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Gilets 2 Equipes
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Douche
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 2: Football 7 vs 7 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-green-600">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Football 7 vs 7</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-green-600">700 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en gazon
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Gilets 2 Equipes
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Douche
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 3: Football 11 vs 11 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-green-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Football 11 vs 11</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-green-600">1200 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en gazon
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Gilets 2 Equipes
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Accès vestiaires
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
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
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-blue-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Padel</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-blue-600">250 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Accès Vestiaire
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Raquettes fournies
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Balles incluses
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 5: Tennis -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-blue-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Tennis</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-blue-600">300 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Accès Vestiaire
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Raquettes fournies
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Balles incluses
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tarif 6: Basketball -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-orange-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-center text-gray-800">Basketball</h3>
                        <div class="mt-4 text-center">
                            <span class="text-3xl font-bold text-orange-600">250 DH</span>
                            <span class="text-gray-500">/heure</span>
                        </div>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Terrain en parquet
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Ballon fourni
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
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

    <!-- Ajouter ceci juste avant la balise script -->
    <div id="debug-info" style="display: none;">
        Terrain ID from URL: {{ request()->get('terrain_id') }}
        Selected Terrain: {{ $selectedTerrain ? $selectedTerrain->type : 'None' }}
    <script>
    // Définition des tarifs par activité
    const tarifs = {
        'football': 400,
        'padel': 250,
        'tennis': 300,
        'basketball': 250
    };

    // Fonction pour déterminer l'activité en fonction du type de terrain
    function determinerActivite(terrainType) {
        terrainType = terrainType.toLowerCase();
        if (terrainType.includes('football')) return 'football';
        if (terrainType.includes('padel')) return 'padel';
        if (terrainType.includes('tennis')) return 'tennis';
        if (terrainType.includes('basketball')) return 'basketball';
        return 'football'; // Par défaut
    }

    // Fonction pour calculer le montant
    function calculerMontant(heureDebut, heureFin, tarifHoraire) {
        if (!heureDebut || !heureFin) return 0;
        const debut = parseInt(heureDebut.split(':')[0]);
        const fin = parseInt(heureFin.split(':')[0]);
        const nombreHeures = fin - debut;
        return nombreHeures * tarifHoraire;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const heureDebut = document.getElementById('heure_debut');
        const heureFin = document.getElementById('heure_fin');
        const dateInput = document.getElementById('date');
        const terrainInput = document.getElementById('terrain');
        const horaireSelection = document.getElementById('horaire-selection');
        const disponibiliteMessage = document.getElementById('disponibilite_message');
        const nomInput = document.getElementById('nom');
        const telephoneInput = document.getElementById('telephone');
        const dateSelection = document.getElementById('date-selection');
        const telephoneSelection = document.getElementById('telephone-selection');
        const nomSelection = document.getElementById('nom-complet-selection');

        // Fonction pour mettre à jour les heures disponibles
        function updateAvailableHours() {
            const date = dateInput.value;
            const terrainId = terrainInput.value;

            if (!date || !terrainId) return;

            fetch(`/check-availability?date=${date}&terrain_id=${terrainId}`)
                .then(response => response.json())
                .then(data => {
                    heureDebut.innerHTML = '<option value="">Sélectionnez une heure de début</option>';
                    
                    for(let i = 9; i <= 22; i++) {
                        const timeValue = `${String(i).padStart(2, '0')}:00:00`;
                        const timeDisplay = `${String(i).padStart(2, '0')}:00`;
                        const slot = data.availableSlots.find(s => s.time === timeDisplay);
                        
                        const option = new Option(timeDisplay, timeValue);
                        if (slot && slot.reserved) {
                            option.disabled = true;
                            option.classList.add('bg-gray-200', 'text-gray-400');
                        }
                        heureDebut.add(option);
                    }

                    heureFin.innerHTML = '<option value="">Sélectionnez une heure de fin</option>';
                    
                    const hasReservedSlots = data.availableSlots.some(slot => slot.reserved);
                    disponibiliteMessage.classList.toggle('hidden', !hasReservedSlots);
                })
                .catch(error => {
                    console.error('Erreur lors de la vérification des disponibilités:', error);
                });
        }

        // Mettre à jour les heures de fin disponibles
        heureDebut.addEventListener('change', function() {
            if (!this.value) {
                heureFin.innerHTML = '<option value="">Sélectionnez une heure de fin</option>';
                return;
            }

            const startHour = parseInt(this.value.split(':')[0]);
            const date = dateInput.value;
            const terrainId = terrainInput.value;

            fetch(`/check-availability?date=${date}&terrain_id=${terrainId}`)
                .then(response => response.json())
                .then(data => {
                    heureFin.innerHTML = '<option value="">Sélectionnez une heure de fin</option>';
                    
                    for(let i = startHour + 1; i <= 23; i++) {
                        const timeValue = `${String(i).padStart(2, '0')}:00:00`;
                        const timeDisplay = `${String(i).padStart(2, '0')}:00`;
                        const slot = data.availableSlots.find(s => s.time === timeDisplay);
                        
                        const option = new Option(timeDisplay, timeValue);
                        if (slot && slot.reserved) {
                            option.disabled = true;
                            option.classList.add('bg-gray-200', 'text-gray-400');
                        }
                        heureFin.add(option);
                    }
                });
            
            updateSummary();
        });

        // Mise à jour du résumé
        function updateSummary() {
            const startTime = heureDebut.value;
            const endTime = heureFin.value;
            
            if (startTime && endTime) {
                horaireSelection.textContent = `${startTime.substring(0, 5)} - ${endTime.substring(0, 5)}`;
                updateMontantEtActivite();
            } else {
                horaireSelection.textContent = '-';
            }
        }

        // Mise à jour du montant et de l'activité
        function updateMontantEtActivite() {
            const terrainElement = document.getElementById('terrain-selection');
            const terrainType = terrainElement.textContent.split('-')[0].trim();
            const activite = determinerActivite(terrainType);
            const heureDebut = document.getElementById('heure_debut').value;
            const heureFin = document.getElementById('heure_fin').value;
            
            document.getElementById('activite').value = activite;
            const montant = calculerMontant(heureDebut, heureFin, tarifs[activite]);
            document.getElementById('montant').value = montant;
            
            const tarifElement = document.getElementById('tarif-selection');
            if (montant > 0) {
                tarifElement.textContent = `${montant} DH (${tarifs[activite]} DH/heure)`;
            }
        }

        // Event Listeners
        dateInput.addEventListener('change', function() {
            dateSelection.textContent = this.value;
            updateAvailableHours();
            updateSummary();
        });

        heureFin.addEventListener('change', updateSummary);
        
        nomInput.addEventListener('input', function() {
            nomSelection.textContent = this.value;
        });

        telephoneInput.addEventListener('input', function() {
            telephoneSelection.textContent = this.value;
        });

        // Définir la date minimale à aujourd'hui
        const today = new Date();
        dateInput.min = today.toISOString().split('T')[0];

        // Chargement initial
        if (dateInput.value && terrainInput.value) {
            updateAvailableHours();
        }

        // Validation du formulaire
        document.getElementById('reservationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!telephoneInput.value || !dateInput.value || !heureDebut.value || !heureFin.value || !terrainInput.value) {
                alert('Veuillez remplir tous les champs obligatoires');
                return;
            }
            
            this.submit();
        });
    });
    </script>
@endsection


