<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->text('badan_hukum');
            $table->text('nama');
            $table->text('npwp');
            $table->text('alamat_jalan');
            $table->text('alamat_rt');
            $table->text('alamat_rw');
            $table->bigInteger('alamat_kelurahan');
            $table->bigInteger('alamat_kecamatan');
            $table->bigInteger('alamat_kabupaten');
            $table->bigInteger('alamat_provinsi');
            $table->text('nomor_telepon_1')->nullable();
            $table->text('nomor_telepon_2')->nullable();
            $table->text('email')->nullable();
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
        Schema::dropIfExists('perusahaans');
    }
}
