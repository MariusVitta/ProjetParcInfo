<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use App\Models\Salle;

	class SalleSeeder extends Seeder {

        /* Remplissage de la table "salles" */
	    public function run() {
            Salle::create([
            "nom_salle" => "Vulcain",
                "quantitePC" => 20,
                "systemeExploitationPC" => "Windows 10",
                "type_salle" => "TDm",
                "numero" => 1,
                "departement_id" => 1
            ]);

	        Salle::create([
	        	"nom_salle" => "LV426",
	        	"quantitePC" => 20,
	        	"systemeExploitationPC" => "Windows 10 / Ubuntu 16.04.2 LTS",
	        	"type_salle" => "TDm",
	        	"numero" => 2,
	        	"departement_id" => 1
	        ]);

	        Salle::create([
	        	"nom_salle" => "Tatooine",
	        	"quantitePC" => 20,
	        	"systemeExploitationPC" => "Windows 10",
	        	"type_salle" => "TDm",
	        	"numero" => 3,
	        	"departement_id" => 1
	        ]);

	        Salle::create([
	        	"nom_salle" => "Westeros",
	        	"quantitePC" => 20,
	        	"systemeExploitationPC" => "Windows 10",
	        	"type_salle" => "TDm",
	        	"numero" => 4,
	        	"departement_id" => 1
	        ]);

	        Salle::create([
	        	"nom_salle" => "Tamriel",
	        	"quantitePC" => 20,
	        	"systemeExploitationPC" => "Windows 10",
	        	"type_salle" => "TP",
	        	"numero" => 1,
	        	"departement_id" => 1
	        ]);

	        Salle::create([
	        	"nom_salle" => "Hyrule",
	        	"quantitePC" => 20,
	        	"systemeExploitationPC" => "Windows 10",
	        	"type_salle" => "TP",
	        	"numero" => 2,
	        	"departement_id" => 1
	        ]);

	        Salle::create([
	        	"nom_salle" => "Gotham",
	        	"quantitePC" => 20,
	        	"systemeExploitationPC" => "Windows 10",
	        	"type_salle" => "TP",
	        	"numero" => 3,
	        	"departement_id" => 1
	        ]);

	        Salle::create([
	        	"nom_salle" => "Azeroth",
	        	"quantitePC" => 20,
	        	"systemeExploitationPC" => "Windows 10",
	        	"type_salle" => "TP",
	        	"numero" => 4,
	        	"departement_id" => 1
	        ]);
	    }
    }
?>