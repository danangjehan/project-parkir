<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket_keluar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tiket_id')->nullable();
            $table->foreign(['tiket_id'], 'tiket_keluar_tiket_id_foreign')->references(['id'])->on('tiket_masuk');
            $table->double('durasi',8,2);
            $table->unsignedBigInteger('kendaraan_id')->nullable();
            $table->foreign(['kendaraan_id'], 'tiket_keluar_kendaraan_id_foreign')->references(['id'])->on('kendaraan');
            $table->double('bayar',8,2);            
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
        Schema::dropIfExists('tiket_keluar');
    }
};
