<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixTypoOrganismeVisibleFiltre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organismes', function (Blueprint $table) {
            if (Schema::hasColumn('organismes', 'visible_filter')) {
                $table->renameColumn('visible_filter', 'visible_filtre');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organismes', function (Blueprint $table) {
            if (Schema::hasColumn('organismes', 'visible_filtre')) {
                $table->renameColumn('visible_filtre', 'visible_filter');
            }
        });
    }
}
