document.addEventListener('DOMContentLoaded', function() {
    // Récupérer le prix du terrain
    const prixTerrain = parseInt(document.getElementById('prix-terrain').dataset.prix);

    // Récupérer les éléments du formulaire
    const form = document.getElementById('reservationForm');
    const dateInput = document.getElementById('date');
    const heureDebut = document.getElementById('heure_debut');
    const heureFin = document.getElementById('heure_fin');
    const telephone = document.getElementById('telephone');
    const terrainInput = document.getElementById('terrain');

    // Récupérer les éléments d'affichage
    const dateAffichee = document.getElementById('date-selection');
    const horaireAffiche = document.getElementById('horaire-selection');
    const telephoneAffiche = document.getElementById('telephone-selection');
    const tarifAffiche = document.getElementById('tarif-selection');
    const messageDisponibilite = document.getElementById('disponibilite_message');

    // Fonction pour calculer le montant total
    function calculerMontant() {
        if (!heureDebut.value || !heureFin.value) return;

        // Convertir les heures en nombres
        const debut = parseInt(heureDebut.value);
        const fin = parseInt(heureFin.value);
        
        // Calculer le nombre d'heures
        const nombreHeures = fin - debut;
        
        // Calculer le montant total
        const montantTotal = nombreHeures * prixTerrain;
        
        // Mettre à jour les champs
        document.getElementById('montant').value = montantTotal;
        tarifAffiche.textContent = `${montantTotal} DH (${prixTerrain} DH/heure)`;
    }

    // Mettre à jour le résumé quand on change les heures
    function mettreAJourResume() {
        if (heureDebut.value && heureFin.value) {
            const debut = heureDebut.value.substring(0, 5);
            const fin = heureFin.value.substring(0, 5);
            horaireAffiche.textContent = `${debut} - ${fin}`;
            calculerMontant();
        } else {
            horaireAffiche.textContent = '-';
        }
    }

    // Fonction pour vérifier les disponibilités
    function verifierDisponibilites() {
        if (!dateInput.value || !terrainInput.value) return;

        fetch(`/check-availability?date=${dateInput.value}&terrain_id=${terrainInput.value}`)
            .then(response => response.json())
            .then(data => {
                heureDebut.innerHTML = '<option value="">Sélectionnez une heure de début</option>';
                heureFin.innerHTML = '<option value="">Sélectionnez une heure de fin</option>';

                data.creneaux.forEach(creneau => {
                    const option = new Option(creneau.heure, creneau.heure);
                    if (!creneau.disponible) {
                        option.disabled = true;
                        option.classList.add('bg-gray-200');
                    }
                    heureDebut.add(option);
                });

                messageDisponibilite.classList.toggle('hidden', 
                    !data.creneaux.some(creneau => !creneau.disponible));
            })
            .catch(error => alert('Erreur lors de la vérification des disponibilités'));
    }

    // Event Listeners
    heureDebut.addEventListener('change', function() {
        heureFin.innerHTML = '<option value="">Sélectionnez une heure de fin</option>';
        
        if (this.value) {
            const heureDebutChoisie = parseInt(this.value);
            for (let heure = heureDebutChoisie + 1; heure <= 23; heure++) {
                const heureFormatee = heure.toString().padStart(2, '0');
                heureFin.add(new Option(heureFormatee + ':00', heureFormatee + ':00:00'));
            }
        }
        
        mettreAJourResume();
    });

    heureFin.addEventListener('change', mettreAJourResume);
    
    dateInput.addEventListener('change', function() {
        dateAffichee.textContent = this.value;
        verifierDisponibilites();
    });

    telephone.addEventListener('input', function() {
        telephoneAffiche.textContent = this.value || '-';
    });

    // Initialisation
    if (dateInput.value && terrainInput.value) {
        verifierDisponibilites();
    }
}); 