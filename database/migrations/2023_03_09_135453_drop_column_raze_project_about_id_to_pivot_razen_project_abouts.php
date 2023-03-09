<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnRazeProjectAboutIdToPivotRazenProjectAbouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pivot_razen_project_abouts', function (Blueprint $table) {
            $table->dropColumn('raze_project_about_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pivot_razen_project_abouts', function (Blueprint $table) {
            //
        });
    }
}
