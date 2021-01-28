<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreerTableInstallations extends Migration {

        /* !!! Table à créer après "logiciels" et "salles" !!! */

        /* Création de la table "installations".
         * Structure : 
         * - id : entier auto-incrémentable
         * - id_logiciel : entier
         * - id_salle : entier
         * - version_logiciel : chaîne de caractères
         */
        public function up() {

            Schema::create("installations", function (Blueprint $table) {

                $table->increments("id_installation", true);
                $table->integer("id_logiciel")->unsigned(); /* Les clés étrangères doivent être déclarées unsigned() */
                $table->integer("id_salle")->unsigned();
                $table->string("version_logiciel");
                $table->timestamps();
            });

            Schema::table("installations", function($table) {

                $table->foreign("id_logiciel")
                    ->references("id_logiciel")
                    ->on("logiciels")
                    ->onDelete("restrict")
                    ->onUpdate("restrict");

                $table->foreign("id_salle")
                    ->references("id_salle")
                    ->on("salles")
                    ->onDelete("restrict")
                    ->onUpdate("restrict");
            });
        }

        /* Suppression de la table "installations". */
        public function down() {
            Schema::dropIfExists("installations");
        }
    }

?>
