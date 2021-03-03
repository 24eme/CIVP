<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom');
          $table->string('slug');
        });

        Schema::create('evenement_tag', function (Blueprint $table) {
          $table->integer('evenement_id')->unsigned()->index();
          $table->foreign('evenement_id')->references('id')->on('evenements')->onDelete('cascade');
          $table->integer('tag_id')->unsigned()->index();
          $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenement_tag');
        Schema::dropIfExists('tags');
    }
}
