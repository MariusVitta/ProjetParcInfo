<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use App\Models\Departement;

	class DepartementSeeder extends Seeder {

        /* Remplissage de la table "departements" */
	    public function run() {

	        Departement::create([
	        	"nom" => "Departement  Lettres "
	        ]);
            Departement::create([
                "nom" => "Departement  Informatique "
            ]);
            Departement::create([
                "nom" => "Departement Economie "
            ]);
            Departement::create([
                "nom" => "Departement droites "
            ]);
        }
    }
?>