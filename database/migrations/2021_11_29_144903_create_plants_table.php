<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perusahaan_id');
            $table->text('nama_plant');
            $table->text('nomor_registrasi');
            $table->text('alamat_jalan');
            $table->text('alamat_rt');
            $table->text('alamat_rw');
            $table->bigInteger('alamat_kelurahan');
            $table->bigInteger('alamat_kecamatan');
            $table->bigInteger('alamat_kabupaten');
            $table->bigInteger('alamat_propinsi');
            $table->bigInteger('tipesarana_id');
            $table->text('nomor_telepon_1');
            $table->text('nomor_telepon_2');
            $table->text('email');
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
        Schema::dropIfExists('plants');
    }
}
