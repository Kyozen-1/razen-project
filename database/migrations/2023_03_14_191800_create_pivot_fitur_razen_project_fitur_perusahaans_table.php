<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotFiturRazenProjectFiturPerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_fitur_razen_project_fitur_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('razen_project_fitur_perusahaan_id')->nullable();
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullalbe();
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
        Schema::dropIfExists('pivot_fitur_razen_project_fitur_perusahaans');
    }
}
