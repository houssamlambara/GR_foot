<!-- Footer -->
<footer class="bg-gray-900 py-10">
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">
        <!-- Logo and Social Links -->
        <div class="flex items-center justify-center mb-6 md:mb-0"> <!-- Ajout de justify-center -->
            <img src="/img/Logo.png" alt="Logo" width="200" height="20">
        </div>

        <!-- Address Section -->
        <div class="text-center md:text-left"> <!-- Ajout de text-center pour mobile -->
            <h3 class="text-xl font-semibold mb-3 text-white">Adresse Paris</h3>
            <p class="text-gray-300 text-sm leading-relaxed">123 Avenue des Champs-Élysées, 75008 Paris, France.</p>
            <h3 class="text-xl font-semibold mb-3 mt-6 text-white">Téléphone</h3>
            <p class="text-gray-300 text-sm leading-relaxed">Contactez-nous : +33 1 23 45 67 89</p>
        </div>

        <!-- Contact Section -->
        <div class="text-center md:text-left"> <!-- Ajout de text-center pour mobile -->
            <h3 class="text-xl font-semibold mb-3 text-white">Contactez-nous</h3>
            <p class="text-gray-300 text-sm leading-relaxed">Des questions ? Nous sommes là pour vous aider.</p>
            <p><a href="mailto:contact@example.com" class="text-green-500 hover:underline">contact@example.com</a>
            </p>

           
        </div>

        <!-- Social Media Section -->
        <div class="text-center md:text-left"> <!-- Ajout de text-center pour mobile -->
            <h3 class="text-xl font-semibold mb-3 text-white">Suivez-nous sur les Réseaux Sociaux</h3>
            <div class="grid grid-cols-4 gap-6 justify-center">
                <!-- Ajout de justify-center pour centrer les icônes -->
                <a href="https://www.facebook.com" target="_blank" class="text-gray-300 hover:text-green-500">
                    <i class="fab fa-facebook-f text-2xl"></i>
                </a>
                <a href="https://www.twitter.com" target="_blank" class="text-gray-300 hover:text-green-500">
                    <i class="fab fa-twitter text-2xl"></i>
                </a>
                <a href="https://www.instagram.com" target="_blank" class="text-gray-300 hover:text-green-500">
                    <i class="fab fa-instagram text-2xl"></i>
                </a>
                <a href="https://www.linkedin.com" target="_blank" class="text-gray-300 hover:text-green-500">
                    <i class="fab fa-linkedin-in text-2xl"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="mt-10 border-t border-gray-700 pt-6 text-sm text-center text-gray-400">
        <p>© 2025. SportZone Créé avec passion. Tous droits réservés.
    </div>
</footer>

<script>
        // Mise à jour du résumé de réservation
        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionner les éléments du formulaire
            const nomInput = document.getElementById('nom');
            const telephoneInput = document.getElementById('telephone');
            const dateInput = document.getElementById('date');
            const heureDebutSelect = document.getElementById('heure_debut');
            const heureFinSelect = document.getElementById('heure_fin');
            const terrainSelect = document.getElementById('terrain_id');
            const activiteSelect = document.getElementById('activite');
            
            // Sélectionner les éléments du résumé
            const nomCompletSelection = document.getElementById('nom-complet-selection');
            const telephoneSelection = document.getElementById('telephone-selection');
            const dateSelection = document.getElementById('date-selection');
            const horaireSelection = document.getElementById('horaire-selection');
            const terrainSelection = document.getElementById('terrain-selection');
            const activiteSelection = document.getElementById('activite-selection');
            
            // Fonction pour mettre à jour le résumé
            function updateResume() {
                nomCompletSelection.textContent = nomInput.value || 'John Doe';
                telephoneSelection.textContent = telephoneInput.value || '+212 000 000 000';
                dateSelection.textContent = dateInput.value || '18-03-2025';
                horaireSelection.textContent = `${heureDebutSelect.value} - ${heureFinSelect.value}`;
                
                // Mettre à jour le terrain sélectionné
                const selectedTerrainOption = terrainSelect.options[terrainSelect.selectedIndex];
                terrainSelection.textContent = selectedTerrainOption ? selectedTerrainOption.text : 'Terrain 1 - 5x5';
                
                // Mettre à jour l'activité sélectionnée
                const selectedActiviteOption = activiteSelect.options[activiteSelect.selectedIndex];
                activiteSelection.textContent = selectedActiviteOption ? selectedActiviteOption.text : 'Football';
                
                // Mettre à jour le montant en fonction du terrain sélectionné
                let montant = 0;
                const terrainId = terrainSelect.value;
                
                // Définir le montant en fonction du type de terrain
                switch(terrainId) {
                    case '1': // Football 5 vs 5
                        montant = 400;
                        break;
                    case '2': // Football 7 vs 7
                        montant = 700;
                        break;
                    case '3': // Football 11 vs 11
                        montant = 1100;
                        break;
                    case '4': // Padel
                        montant = 250;
                        break;
                    case '5': // Tennis
                        montant = 300;
                        break;
                    case '6': // Basketball
                        montant = 250;
                        break;
                    default:
                        montant = 0;
                }
                
                document.getElementById('montant').value = montant;
            }
            
            // Ajouter des écouteurs d'événements pour mettre à jour le résumé
            nomInput.addEventListener('input', updateResume);
            telephoneInput.addEventListener('input', updateResume);
            dateInput.addEventListener('change', updateResume);
            heureDebutSelect.addEventListener('change', updateResume);
            heureFinSelect.addEventListener('change', updateResume);
            terrainSelect.addEventListener('change', updateResume);
            activiteSelect.addEventListener('change', updateResume);
            
            // Mettre à jour le résumé au chargement de la page
            updateResume();
        });
    </script>

