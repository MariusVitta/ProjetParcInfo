<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;

	class DatabaseSeeder extends Seeder {

        /* Seeder principal : exécution de tous les autres seeders dans le bon ordre */
	    public function run() {

	        $this->call([

	        	DepartementSeeder::class,
            	SalleSeeder::class,
            	LogicielSeeder::class,
            	AdminSeeder::class,
            	EnseignantSeeder::class,
            	UtilisateurSeeder::class,
            	DemandeSeeder::class,
            	InstallationSeeder::class
        	]);
	    }
    }
?>