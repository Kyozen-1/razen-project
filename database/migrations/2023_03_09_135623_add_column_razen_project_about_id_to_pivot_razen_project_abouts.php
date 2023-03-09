<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRazenProjectAboutIdToPivotRazenProjectAbouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pivot_razen_project_abouts', function (Blueprint $table) {
            $table->foreignId('razen_project_about_id')->nullable();
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
