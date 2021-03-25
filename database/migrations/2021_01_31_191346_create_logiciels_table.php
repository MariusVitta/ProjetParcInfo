<?php
/**CREATE TABLE logiciel(
   id_logiciel INT,
   nom_logiciel CHAR(50) NOT NULL,
   editeur_logiciel VARCHAR(50),
   site_web VARCHAR(50),
   licence_logiciel VARCHAR(50),
   PRIMARY KEY(id_logiciel)
); */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogicielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logiciels', function (Blueprint $table) {
            $table->increments("id", true);    /*true=> $fallback ? ça sert à quoi ?*/
            $table->string("nom_logiciel");
            $table->string("editeur");
            $table->string("type_logiciel");
            $table->string("licence");
            $table->string("siteWeb");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logiciels');
    }
}