<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->increments ('id');
            $table->Integer ('kategorilayanan_id')->unsigned();
            $table->string ('nama_layanan');
            $table->string ('deskripsi');
            $table->timestamps();
            $table->foreign('kategorilayanan_id')->references('id')->on('kategorilayanan')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan');
    }
}
