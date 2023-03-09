<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilRazenProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_razen_projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('pt')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('profil_razen_projects');
    }
}
