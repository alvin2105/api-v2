<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parkirs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkirs', function (Blueprint $table) {
            $table->id();
            //$table->bigIncrements('id');
            $table->string('nama_parkir');
            $table->string('lokasi_parkir');
            $table->integer('jarak');
            $table->string('jam');
            $table->integer('harga');
            $table->integer('rating');
            $table->string('status_lahan');
            $table->integer('total_lahan');
            $table->integer('lahan_tersedia');
            $table->integer('lahan_tidak_tersedia');
            $table->string('link_map');
            $table->integer('tarif_1')->nullable();
            $table->integer('tarif_2')->nullable();
            $table->integer('tarif_3')->nullable();
            $table->string('image_parkir');
            $table->string('link_image');
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
        Schema::dropIfExists('parkirs');
    }
}
