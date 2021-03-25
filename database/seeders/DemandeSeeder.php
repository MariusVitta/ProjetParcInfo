<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use App\Models\Demande;

	class DemandeSeeder extends Seeder {

        /* Remplissage de la table "demandes" */
	    public function run() {

	        Demande::create([
	        	"statut" => "OUVERTE",
	        	"description" => "Demande d'ajout de logiciel dans une salle par monsieur Hamon",
	        	"type" => "INSTALLATION",
	        	"departement_id" => 1,
	        	"admin_id" => 1
	        ]);
	    }
    }
?>