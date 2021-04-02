<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganismesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organismes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom')->unique();
          $table->string('adresse')->nullable();
          $table->string('code_postal')->nullable();
          $table->string('ville')->nullable();
          $table->string('contact')->nullable();
          $table->string('telephone')->nullable();
          $table->string('email')->nullable();
          $table->string('couleur')->nullable();
          $table->string('logo')->nullable();
          $table->string('slug');
        });

        Schema::create('evenement_organisme', function (Blueprint $table) {
          $table->integer('evenement_id')->unsigned()->index();
          $table->foreign('evenement_id')->references('id')->on('evenements')->onDelete('cascade');
          $table->integer('organisme_id')->unsigned()->index();
          $table->foreign('organisme_id')->references('id')->on('organismes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenement_organisme');
        Schema::dropIfExists('organismes');
    }
}
