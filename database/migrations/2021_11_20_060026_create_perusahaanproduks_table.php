<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaanproduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaanproduks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perusahaan_id');
            $table->bigInteger('plant_id');
            $table->bigInteger('produk_id');
            $table->text('hs_code');
            $table->bigInteger('epoch_product_last_export');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaanproduks');
    }
}
