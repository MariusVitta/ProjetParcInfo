<?php
/**CREATE TABLE admin(
   id_admin INT,
   nom_admin VARCHAR(50) NOT NULL,
   mail_admin CHAR(50) NOT NULL,
   mdp_admin VARCHAR(50),
   PRIMARY KEY(id_admin)
); */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments("id", true);    /*true=> $fallback ? ça sert à quoi ?*/
            $table->string("nom");
            $table->string('eMail',200)->unique();
            $table->char('motDePasse', 30); /*taille max : 30 */
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
        Schema::dropIfExists('admins');
    }
}