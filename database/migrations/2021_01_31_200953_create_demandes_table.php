<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->increments('id', true);    /*true=> $fallback ? ça sert à quoi */
            $table->enum('statut',['OUVERTE','TRAITEE']);
            $table->text('description');    /*tester */
            $table->enum('type',['INSTALLATION','MAJ']);

            $table->integer('departement_id')->unsigned();
            $table->foreign('departement_id')
            ->references('id')
            ->on('departements')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')
            ->references('id')
            ->on('admins')->constrained()
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
        Schema::dropIfExists('demandes');
    }
}
