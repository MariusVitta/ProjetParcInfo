<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use App\Models\User;

	class AdminSeeder extends Seeder {

        /* Remplissage de la table "admins" */
	    public function run() {

	        User::create([
	        	"name" => "Admin",
	        	"email" => "admin@mail.fr",
	        	"password" => "tagada72"
	        ]);
	    }
    }
?>