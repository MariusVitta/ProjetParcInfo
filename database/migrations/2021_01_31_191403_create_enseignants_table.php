<?php
/*
CREATE TABLE enseignant(
   id_enseignant INT,
   nom_enseignant VARCHAR(50) NOT NULL,
   prenom_enseignant VARCHAR(50),
   statut_enseignant VARCHAR(50),
   id_depart INT NOT NULL,
   PRIMARY KEY(id_enseignant),
   FOREIGN KEY(id_depart) REFERENCES departement(id_depart)
);
*/
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->increments('id', true);    /*true=> $fallback ? ça sert à quoi ?*/
            $table->string('nom');
            $table->string('prenom')->nullable($value = false); 
            $table->enum('statut',['PERMANENT','CDD','ATER','CTER','VACATAIRE','CONFERENCIER']);
            
            $table->integer('departement_id')->unsigned();
            $table->foreign('departement_id')
            ->references('id')
            ->on('departements')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('enseignants');
    }
}