<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('organisme_id')->unsigned();
          $table->foreign('organisme_id')->references('id')->on('organismes')->onDelete('cascade');
          $table->string('nom');
          $table->string('prenom');
          $table->string('service')->nullable();
          $table->string('telephone')->nullable();
          $table->string('mobile')->nullable();
          $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
