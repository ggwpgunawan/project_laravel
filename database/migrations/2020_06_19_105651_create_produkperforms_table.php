<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukperformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produkperforms', function (Blueprint $table) {
            $table->bigincrements ('id');
            $table->unsignedBigInteger ('kategoriproduk_id')->unsigned();
            $table->unsignedBigInteger ('produk_id')->unsigned();
            $table->unsignedBigInteger ('unit_id')->unsigned();
            $table->unsignedBigInteger ('vendor_id')->unsigned();
            $table->date ('pembelian');
            $table->unsignedBigInteger ('tahun_id')->unsigned();
            $table->unsignedBigInteger ('semester_id')->unsigned();
            $table->string ('deskripsi');
            $table->integer ('kualitas');
            $table->integer ('support');
            $table->integer ('pengadaan');
            $table->integer ('sukucadang');
            $table->integer ('performance');
            $table->integer ('fitur');
            $table->integer ('penggunaan');
            $table->integer ('garansi');
            $table->string ('image');
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
        Schema::dropIfExists('produkperforms');
    }
}
