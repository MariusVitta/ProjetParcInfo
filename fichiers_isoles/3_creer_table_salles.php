<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreerTableSalles extends Migration {

        /* Création de la table "salles".
         * Structure : 
         * - id : entier auto-incrémentable
         * - numero_salle : entier
         * - nom_salle : chaîne de caractères
         * - type_salle : chaîne de caractères
         * - nom_OS : chaîne de caractères
         * - type_OS : chaîne de caractères
         * - version_OS : chaîne de caractères
         * - id_installation : entier, référence sur la table "installations"
         */
        public function up() {

            Schema::disableForeignKeyConstraints();

            Schema::create("salles", function (Blueprint $table) {

                $table->bigIncrements("id_salle");
                $table->integer("numero_salle");
                $table->string("nom_salle");
                $table->string("type_salle");
                $table->string("nom_OS");
                $table->string("type_OS");
                $table->string("version_OS");
                $table->integer("id_installation");
                $table->foreign("id_installation")
                    ->references("id_installation")
                    ->on("installations")
                    ->onDelete("restrict")
                    ->onUpdate("restrict");
                $table->timestamps();
            });
        }

        /* Suppression de la table "salles". */
        public function down() {
            Schema::dropIfExists("salles");
        }
    }

?>
