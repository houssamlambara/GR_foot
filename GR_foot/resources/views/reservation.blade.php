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

                    <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6">
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
                            <select id="heure_debut" name="heure_debut" required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                                <option value="">Sélectionnez une heure</option>
                                <option value="09:00" {{ old('heure_debut') == '09:00' ? 'selected' : '' }}>09h</option>
                                <option value="10:00" {{ old('heure_debut') == '10:00' ? 'selected' : '' }}>10h</option>
                                <option value="11:00" {{ old('heure_debut') == '11:00' ? 'selected' : '' }}>11h</option>
                                <option value="12:00" {{ old('heure_debut') == '12:00' ? 'selected' : '' }}>12h</option>
                                <option value="13:00" {{ old('heure_debut') == '13:00' ? 'selected' : '' }}>13h</option>
                                <option value="14:00" {{ old('heure_debut') == '14:00' ? 'selected' : '' }}>14h</option>
                                <option value="15:00" {{ old('heure_debut') == '15:00' ? 'selected' : '' }}>15h</option>
                                <option value="16:00" {{ old('heure_debut') == '16:00' ? 'selected' : '' }}>16h</option>
                                <option value="17:00" {{ old('heure_debut') == '17:00' ? 'selected' : '' }}>17h</option>
                                <option value="18:00" {{ old('heure_debut') == '18:00' ? 'selected' : '' }}>18h</option>
                                <option value="19:00" {{ old('heure_debut') == '19:00' ? 'selected' : '' }}>19h</option>
                                <option value="20:00" {{ old('heure_debut') == '20:00' ? 'selected' : '' }}>20h</option>
                                <option value="21:00" {{ old('heure_debut') == '21:00' ? 'selected' : '' }}>21h</option>
                                <option value="22:00" {{ old('heure_debut') == '22:00' ? 'selected' : '' }}>22h</option>
                            </select>
                            @error('heure_debut')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sélection de l'heure de fin -->
                        <div>
                            <label for="heure_fin" class="block text-sm font-semibold text-gray-700">Heure de fin</label>
                            <select id="heure_fin" name="heure_fin" required
                                class="w-full mt-2 p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition duration-200">
                                <option value="">Sélectionnez une heure</option>
                                <option value="10:00" {{ old('heure_fin') == '10:00' ? 'selected' : '' }}>10h</option>
                                <option value="11:00" {{ old('heure_fin') == '11:00' ? 'selected' : '' }}>11h</option>
                                <option value="12:00" {{ old('heure_fin') == '12:00' ? 'selected' : '' }}>12h</option>
                                <option value="13:00" {{ old('heure_fin') == '13:00' ? 'selected' : '' }}>13h</option>
                                <option value="14:00" {{ old('heure_fin') == '14:00' ? 'selected' : '' }}>14h</option>
                                <option value="15:00" {{ old('heure_fin') == '15:00' ? 'selected' : '' }}>15h</option>
                                <option value="16:00" {{ old('heure_fin') == '16:00' ? 'selected' : '' }}>16h</option>
                                <option value="17:00" {{ old('heure_fin') == '17:00' ? 'selected' : '' }}>17h</option>
                                <option value="18:00" {{ old('heure_fin') == '18:00' ? 'selected' : '' }}>18h</option>
                                <option value="19:00" {{ old('heure_fin') == '19:00' ? 'selected' : '' }}>19h</option>
                                <option value="20:00" {{ old('heure_fin') == '20:00' ? 'selected' : '' }}>20h</option>
                                <option value="21:00" {{ old('heure_fin') == '21:00' ? 'selected' : '' }}>21h</option>
                                <option value="22:00" {{ old('heure_fin') == '22:00' ? 'selected' : '' }}>22h</option>
                                <option value="23:00" {{ old('heure_fin') == '23:00' ? 'selected' : '' }}>23h</option>
                            </select>
                            @error('heure_fin')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="terrain" class="block text-gray-700 text-sm font-bold mb-2">Terrain</label>
                            <select name="terrain_id" id="terrain" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">Sélectionnez un terrain</option>
                                @foreach($terrains as $terrain)
                                    <option value="{{ $terrain->id }}" {{ old('terrain_id') == $terrain->id ? 'selected' : '' }}>
                                        {{ $terrain->type }} 
                                    </option>
                                @endforeach
                            </select>
                            @error('terrain_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Champs cachés qui seront mis à jour automatiquement -->
                        <input type="hidden" name="montant" id="montant" value="{{ old('montant') }}">
                        <input type="hidden" name="activite" id="activite" value="{{ old('activite') }}">

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
                            <p id="nom-complet-selection" class="text-lg font-bold text-gray-800">John Doe</p>
                        </div>

                        <!-- Terrain sélectionné -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Terrain Sélectionné</p>
                            <p id="terrain-selection" class="text-lg font-bold text-gray-800">Terrain 1 - 5x5</p>
                        </div>

                        <!-- Horaire sélectionné -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Horaire Sélectionné</p>
                            <p id="horaire-selection" class="text-lg font-bold text-gray-800">14:00 - 15:00</p>
                        </div>

                        <!-- Date de réservation -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Date de Réservation</p>
                            <p id="date-selection" class="text-lg font-bold text-gray-800">18-03-2025</p>
                        </div>

                        <!-- Numéro de téléphone -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Numéro de téléphone</p>
                            <p id="telephone-selection" class="text-lg font-bold text-gray-800">+212 000 000 000</p>
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

<script>
    // Définition des tarifs par activité
    const tarifs = {
        'football': 400,
        'padel': 250,
        'tennis': 300,
        'basketball': 250
    };

    // Fonction pour mettre à jour le montant et l'activité
    function updateMontantEtActivite() {
        const terrainSelect = document.getElementById('terrain');
        const selectedOption = terrainSelect.options[terrainSelect.selectedIndex];
        const terrainType = selectedOption.text.split(' - ')[0].toLowerCase();
        
        // Déterminer l'activité en fonction du type de terrain
        let activite = '';
        if (terrainType.includes('football')) {
            activite = 'football';
        } else if (terrainType.includes('padel')) {
            activite = 'padel';
        } else if (terrainType.includes('tennis')) {
            activite = 'tennis';
        } else if (terrainType.includes('basketball')) {
            activite = 'basketball';
        }
        
        // Mettre à jour les champs cachés
        document.getElementById('activite').value = activite;
        if (activite && tarifs[activite]) {
            document.getElementById('montant').value = tarifs[activite];
        }
    }

    // Écouter les changements sur le select de terrain
    document.getElementById('terrain').addEventListener('change', updateMontantEtActivite);

    // Mettre à jour au chargement de la page si un terrain est déjà sélectionné
    document.addEventListener('DOMContentLoaded', updateMontantEtActivite);
</script>
@endsection


