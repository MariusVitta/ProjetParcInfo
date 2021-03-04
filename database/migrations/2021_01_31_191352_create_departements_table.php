<?php
/**CREATE TABLE departement(
   id_depart INT,
   nom_depart VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_depart),
   UNIQUE(nom_depart)
);
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            
            $table->increments('id', true);    /*true=> $fallback ? ça sert à quoi ?*/
            $table->string('nom',25)->unique();
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
        //DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('departements');
         // DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}