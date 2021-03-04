<?php
/**CREATE TABLE salle(
   id_salle INT,
   nom_salle VARCHAR(50) NOT NULL,
   nb_pc INT,
   os_pc VARCHAR(50) NOT NULL,
   type_salle VARCHAR(50),
   num_salle INT,
   id_depart INT NOT NULL,
   PRIMARY KEY(id_salle),
   FOREIGN KEY(id_depart) REFERENCES departement(id_depart)
); */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salles', function (Blueprint $table) {
            $table->increments("id", true);    /*true=> $fallback ? ça sert à quoi ?*/
            $table->string("nom_salle"); 
            $table->string("type_salle"); 
            $table->integer("quantitePC");
            $table->string("systemeExploitationPC")->nullable($value = false);
           
            $table->integer("numero");

            $table->integer('departement_id')->unsigned();
            $table->foreign('departement_id')->references('id')->on('departements')->constrained()->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('salles');
    }
}