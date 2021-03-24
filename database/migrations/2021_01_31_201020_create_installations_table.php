<?php
/*CREATE TABLE INSTALLER(
   id_logiciel INT,
   id_salle INT,
   version_logiciel VARCHAR(50),
   PRIMARY KEY(id_logiciel, id_salle),
   FOREIGN KEY(id_logiciel) REFERENCES logiciel(id_logiciel),
   FOREIGN KEY(id_salle) REFERENCES salle(id_salle)
);
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installations', function (Blueprint $table) {
            //seul attribut
            $table->string('version_logiciel',50);
            
            //foreign keys
           
            $table->integer('logiciel_id')->unsigned();
            $table->foreign('logiciel_id')
            ->references('id')
            ->on('logiciels')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('salle_id')->unsigned();
            $table->foreign('salle_id')
            ->references('id')
            ->on('salles')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            //primary keys
            $table->primary(['logiciel_id', 'salle_id']);
            
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
        Schema::dropIfExists('installations');
    }
}
