<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTipeToRazenProjectBrosurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('razen_project_brosurs', function (Blueprint $table) {
            $table->enum('tipe', ['pdf', 'docx'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('razen_project_brosurs', function (Blueprint $table) {
            //
        });
    }
}
