<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
          $table->increments('id');
          $table->string('titre')->index();
          $table->date('date_debut');
          $table->date('date_fin');
          $table->integer('profil_id')->unsigned();
          $table->foreign('profil_id')->references('id')->on('profils')->onDelete('cascade');
          $table->integer('organisme_id')->unsigned();
          $table->foreign('organisme_id')->references('id')->on('organismes')->onDelete('cascade');
          $table->longText('description')->index();
          $table->string('rrule')->nullable();
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
        Schema::dropIfExists('evenements');
    }
}
