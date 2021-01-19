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
        Schema::table('obligations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('start');
          $table->string('end');
          $table->string('profil');
          $table->string('organisme');
          $table->string('lien');
          $table->string('contact'); 
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
        Schema::drop('obligations');
    }
}
