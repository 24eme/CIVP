<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObligationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obligations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('start');
          $table->string('end');
          $table->string('profil');
          $table->string('organisme')->nullable();
          $table->string('lien')->nullable();
          $table->string('contact')->nullable();
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
        Schema::dropIfExists('obligations');
    }
}
