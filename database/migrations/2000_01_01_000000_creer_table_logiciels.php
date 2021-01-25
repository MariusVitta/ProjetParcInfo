<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreerTableLogiciels extends Migration {

        /* !!! Table à créer avant "installations" !!! */

        /* Création de la table "logiciels".
         * Structure : 
         * - id : entier auto-incrémentable
         * - nom_logiciel : chaîne de caractères
         * - auteur : chaîne de caractères
         * - type : chaîne de caractères
         * - licence : chaîne de caractères
         * - site : chaîne de caractères
         * - id_installation : entier, référence sur la table "installation"
         */
        public function up() {

            Schema::create("logiciels", function (Blueprint $table) {

                $table->increments("id_logiciel", true);
                $table->string("nom_logiciel");
                $table->string("auteur");
                $table->string("type_logiciel");
                $table->string("licence");
                $table->string("site");
                $table->timestamps();
            });
        }

        /* Suppression de la table "logiciels". */
        public function down() {
            Schema::dropIfExists("logiciels");
        }
    }

?>