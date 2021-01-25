<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreerTableInstallations extends Migration {

        /* Création de la table "installations".
         * Structure : 
         * - id : entier auto-incrémentable
         * - id_logiciel : entier
         * - id_salle : entier
         * - version_logiciel : chaîne de caractères
         */
        public function up() {

            Schema::disableForeignKeyConstraints();

            Schema::create("installations", function (Blueprint $table) {

                $table->bigIncrements("id_installation");
                $table->integer("id_logiciel");
                $table->integer("id_salle");
                $table->string("version_logiciel");
                $table->timestamps();
            });
        }

        /* Suppression de la table "installations". */
        public function down() {
            Schema::dropIfExists("installations");
        }
    }

?>
