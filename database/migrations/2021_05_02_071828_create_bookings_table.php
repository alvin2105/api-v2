<?php

use Brick\Math\BigNumber;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('lahan_terpilih');
            $table->string('tarif');
            $table->string('jenis_pembayaran');
            $table->string('status_pembayaran')->default('PENDING');
            $table->string('waktu_booking');
            $table->string( 'nomor_kendaraan');
            $table->string('kendaraan');
            $table->string('nama_pengguna');
            $table->string('email');
            $table->string('nama_parkir');
            $table->timestamps();
            /*
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('lahan_terpilih');
            $table->string('tarif');
            $table->enum('jenis_pembayaran', ['digital','cash'])->default('cash');
            $table->enum('status_pembayaran', ['active','cancelled','pending'])->default('pending');
            $table->string('waktu_booking');
            $table->string( 'nopol');
            $table->string('jenis_kendaraan');
            $table->string('nama_lengkap');
            $table->timestamps();*/
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}


