<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use App\Models\Admin;

	class AdminSeeder extends Seeder {

        /* Remplissage de la table "admins" */
	    public function run() {

	        Admin::create([
	        	"nom" => "nomAdmin",
	        	"eMail" => "mail@fournisseur.fr",
	        	"motDePasse" => "unmotdepasse"
	        ]);
	    }
    }
?>