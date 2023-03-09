<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemVirtualToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_virtual_tours', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('thumb')->nullable();
            $table->text('link')->nullable();
            $table->text('deskripsi')->nullable();
            $table->foreignId('master_kategori_project_id')->nullable();
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
        Schema::dropIfExists('item_virtual_tours');
    }
}
