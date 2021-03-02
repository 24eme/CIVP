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
          $table->string('adresse');
          $table->string('code_postal');
          $table->string('ville');
          $table->string('telephone');
          $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organismes');
    }
}
