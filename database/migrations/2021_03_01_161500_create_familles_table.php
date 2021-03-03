<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familles', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom');
          $table->string('couleur');
          $table->string('slug');
        });

        Schema::create('evenement_famille', function (Blueprint $table) {
          $table->integer('evenement_id')->unsigned()->index();
          $table->foreign('evenement_id')->references('id')->on('evenements')->onDelete('cascade');
          $table->integer('famille_id')->unsigned()->index();
          $table->foreign('famille_id')->references('id')->on('familles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenement_famille');
        Schema::dropIfExists('familles');
    }
}
