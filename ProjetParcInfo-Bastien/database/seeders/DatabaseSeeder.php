<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use App\Models\Logiciels;
	use App\Models\Salles;
	use App\Models\Installations;

	class DatabaseSeeder extends Seeder {

        /* Remplissage de la table "logiciels" */
	    public function run() {

	        Logiciels::create([
	        	"nom_logiciel" => "7Zip",
	        	"auteur" => "Igor Pavlov",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "LGPL",
	        	"site" => "http://7-zip.org/"
	        ]);

	        Logiciels::create([
	        	"nom_logiciel" => "Acrobat Reader",
	        	"auteur" => "Adobe",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"site" => "https://acrobat.adobe.com/"
	        ]);

	        Logiciels::create([
	        	"nom_logiciel" => "Adobe flashplayer",
	        	"auteur" => "Adobe",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"site" => "https://www.adobe.com/products/flashplayer.html"
	        ]);

	        Salles::create([
	        	"numero_salle" => 1,
	        	"nom_salle" => "Vulcain",
	        	"type_salle" => "TDm",
	        	"nom_OS" => "Windows 10",
	        	"type_OS" => "Windows",
	        	"version_OS" => "10 professionnel"
	        ]);

	        Salles::create([
	        	"numero_salle" => 2,
	        	"nom_salle" => "LV426",
	        	"type_salle" => "TDm",
	        	"nom_OS" => "Windows 10",
	        	"type_OS" => "Windows",
	        	"version_OS" => "10 professionnel"
	        ]);

	        Salles::create([
	        	"numero_salle" => 1,
	        	"nom_salle" => "Tamriel",
	        	"type_salle" => "TP",
	        	"nom_OS" => "Windows 10",
	        	"type_OS" => "Windows",
	        	"version_OS" => "10 professionnel"
	        ]);

	        Salles::create([
	        	"numero_salle" => 2,
	        	"nom_salle" => "Hyrule",
	        	"type_salle" => "TP",
	        	"nom_OS" => "Windows 10",
	        	"type_OS" => "Windows",
	        	"version_OS" => "10 professionnel"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 1,
	        	"id_salle" => 1,
	        	"version_logiciel" => "16.02"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 1,
	        	"id_salle" => 2,
	        	"version_logiciel" => "18.05"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 1,
	        	"id_salle" => 3,
	        	"version_logiciel" => "16.02"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 1,
	        	"id_salle" => 4,
	        	"version_logiciel" => "16.02"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 2,
	        	"id_salle" => 1,
	        	"version_logiciel" => "15"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 2,
	        	"id_salle" => 2,
	        	"version_logiciel" => "15"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 2,
	        	"id_salle" => 3,
	        	"version_logiciel" => "15"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 2,
	        	"id_salle" => 4,
	        	"version_logiciel" => "15"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 3,
	        	"id_salle" => 1,
	        	"version_logiciel" => "21"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 3,
	        	"id_salle" => 2,
	        	"version_logiciel" => "21"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 3,
	        	"id_salle" => 3,
	        	"version_logiciel" => "21"
	        ]);

	        Installations::create([
	        	"id_logiciel" => 3,
	        	"id_salle" => 4,
	        	"version_logiciel" => "21"
	        ]);
	    }
    }
?>