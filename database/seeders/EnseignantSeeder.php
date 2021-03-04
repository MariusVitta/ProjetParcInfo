<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use App\Models\Enseignant;

	class EnseignantSeeder extends Seeder {

        /* Remplissage de la table "enseignants" */
	    public function run() {

	        Enseignant::create([
	        	"nom" => "COULAND",
	        	"prenom" => "Quentin",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "VESVARD",
	        	"prenom" => "Vincent",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "MARFISI",
	        	"prenom" => "Iza",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "NGOUAGNA",
	        	"prenom" => "Merlin",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "BARRE",
	        	"prenom" => "Vincent",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "CORBIERE",
	        	"prenom" => "Alain",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);
	        
	        Enseignant::create([
	        	"nom" => "KIEFFER BEN MERZOUGA",
	        	"prenom" => "Jean-Jacques",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "MEGHIRBI",
	        	"prenom" => "Cyril",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "HAMON",
	        	"prenom" => "Ludovic",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "BROCHARD",
	        	"prenom" => "Emmanuel",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "GEORGE",
	        	"prenom" => "Sébastien",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "LAFORCADE",
	        	"prenom" => "Pierre",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "LOISEAU",
	        	"prenom" => "Esteban",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "LOUP",
	        	"prenom" => "Guillaume",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "KAROUI",
	        	"prenom" => "Aous",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "OUBAHSSI",
	        	"prenom" => "Lahcen",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "WALKOWIAK",
	        	"prenom" => "Yann",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "LUCAS",
	        	"prenom" => "Cécile",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "DUMONT",
	        	"prenom" => "Jonathan",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "KOUMTANI",
	        	"prenom" => "Mohamed",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "JALLAIS",
	        	"prenom" => "Simon",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "VIEILLARD",
	        	"prenom" => "Nathalie",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "FOUCAULT",
	        	"prenom" => "Adeline",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "LESTEVEN",
	        	"prenom" => "Jerome",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "CADITAZI",
	        	"prenom" => "Tawfiq",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);

	        Enseignant::create([
	        	"nom" => "PIAU-TOFFOLON",
	        	"prenom" => "Claudine",
	        	"statut" => "PERMANENT",
	        	"departement_id" => 1
	        ]);
	    }
    }
?>