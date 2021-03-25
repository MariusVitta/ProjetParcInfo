<?php
/*id_enseignant INT,
   id_logiciel INT,
   PRIMARY KEY(id_enseignant, id_logiciel),
   FOREIGN KEY(id_enseignant) REFERENCES enseignant(id_enseignant),
   FOREIGN KEY(id_logiciel) REFERENCES logiciel(id_logiciel) */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            //foreign keys
           
            $table->integer('logiciel_id')->unsigned();
            $table->foreign('logiciel_id')
            ->references('id')
            ->on('logiciels')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('enseignant_id')->unsigned();
            $table->foreign('enseignant_id')
            ->references('id')
            ->on('enseignants')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            //primary keys
            $table->primary(['logiciel_id', 'enseignant_id']);
            
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
        Schema::dropIfExists('utilisateurs');
    }
}
