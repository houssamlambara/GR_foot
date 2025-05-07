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
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Choisissez votre créneau horaire !</h3>
                @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <p>{{ session('error') }}</p>
                </div>
                @endif

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
                    <div>
                        <p class="text-sm font-semibold text-gray-700">Nom Complet</p>
                        <p id="nom-complet-selection" class="text-lg font-bold text-gray-800">{{ Auth::user()->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-700">Ville</p>
                        <p class="text-lg font-bold text-gray-800">
                            {{ $selectedTerrain->region->ville->nom ?? 'Non sélectionnée' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-700">Région</p>
                        <p class="text-lg font-bold text-gray-800">
                            {{ $selectedTerrain->region->nom ?? 'Non sélectionnée' }}
                        </p>
                    </div>

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

                    <div>
                        <p class="text-sm font-semibold text-gray-700">Horaire Sélectionné</p>
                        <p id="horaire-selection" class="text-lg font-bold text-gray-800">-</p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-700">Date de Réservation</p>
                        <p id="date-selection" class="text-lg font-bold text-gray-800">-</p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-700">Numéro de téléphone</p>
                        <p id="telephone-selection" class="text-lg font-bold text-gray-800">-</p>
                    </div>

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


@include('layout.footer')

<!-- Ajouter cet élément caché pour stocker les données -->
<div id="reservationsData" data-reservations="{{ json_encode($reservations) }}" style="display: none;"></div>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Éléments du DOM
        const elements = {
            date: document.getElementById('date'),
            heureDebut: document.getElementById('heure_debut'),
            heureFin: document.getElementById('heure_fin'),
            telephone: document.getElementById('telephone'),
            disponibilite: document.getElementById('disponibilite_message'),
            terrainId: document.querySelector('input[name="terrain_id"]').value,
            tarifBase: parseFloat(document.getElementById('tarif-base').dataset.tarif),
            montant: document.getElementById('montant'),
            tarif: document.getElementById('tarif-selection')
        };

        async function getReservations(date) {
            try {
                const response = await fetch(`/check-availability?date=${date}&terrain_id=${elements.terrainId}`);
                return await response.json();
            } catch (error) {
                console.error('Erreur:', error);
                return { creneaux: [] };
            }
        }

        async function updateHours() {
            const date = elements.date.value;
            elements.heureDebut.innerHTML = '<option value="">Sélectionnez une heure de début</option>';

            const { creneaux } = await getReservations(date);

            // Générer les options d'heures
            for (let hour = 9; hour <= 22; hour++) {
                const time = `${hour.toString().padStart(2, '0')}:00:00`;
                const option = document.createElement('option');
                option.value = time;
                option.textContent = time.slice(0, 5);

                // Vérifier si le créneau est réservé
                if (creneaux.some(c => c.heure === time.slice(0, 5) && !c.disponible)) {
                    option.disabled = true;
                    option.classList.add('bg-gray-200', 'text-gray-400');
                }

                elements.heureDebut.appendChild(option);
            }

            // Réinitialiser l'heure de fin
            elements.heureFin.innerHTML = '<option value="">Sélectionnez une heure de fin</option>';

            // Afficher/masquer le message de disponibilité
            elements.disponibilite.style.display = 
                Array.from(elements.heureDebut.options).some(opt => opt.disabled) ? 'block' : 'none';
        }

        // Mettre à jour les heures de fin disponibles
        function updateEndHours() {
            const startHour = parseInt(elements.heureDebut.value);
            elements.heureFin.innerHTML = '<option value="">Sélectionnez une heure de fin</option>';

            if (startHour) {
                for (let hour = startHour + 1; hour <= 23; hour++) {
                    const time = `${hour.toString().padStart(2, '0')}:00:00`;
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = time.slice(0, 5);
                    elements.heureFin.appendChild(option);
                }
            }
        }

        // Mettre à jour le résumé
        function updateSummary() {
            const debut = elements.heureDebut.value;
            const fin = elements.heureFin.value;

            if (debut && fin) {
                document.getElementById('horaire-selection').textContent = 
                    `${debut.slice(0, 5)} - ${fin.slice(0, 5)}`;

                // Calcul du montant
                const duree = parseInt(fin) - parseInt(debut);
                const montantTotal = elements.tarifBase * duree;
                elements.montant.value = montantTotal;
                elements.tarif.innerHTML = `${montantTotal} DH (${elements.tarifBase} DH/heure)`;
            }
        }

        elements.date.addEventListener('change', function() {
            document.getElementById('date-selection').textContent = this.value;
            updateHours();
        });

        elements.heureDebut.addEventListener('change', function() {
            updateSummary();
            updateEndHours();
        });

        elements.heureFin.addEventListener('change', updateSummary);

        elements.telephone.addEventListener('input', function() {
            document.getElementById('telephone-selection').textContent = this.value;
        });

        updateHours();
    });
</script>

@endsection