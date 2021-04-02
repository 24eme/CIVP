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
          $table->integer('type_id')->unsigned()->index();
          $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
          $table->string('title')->index();
          $table->date('start');
          $table->date('end');
          $table->longText('description')->index();
          $table->string('textedeloi')->nullable();
          $table->string('liendeclaration')->nullable();
          $table->boolean('active');
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
