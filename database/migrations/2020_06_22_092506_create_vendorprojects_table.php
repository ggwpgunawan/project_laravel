<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendorprojects', function (Blueprint $table) {
            $table->bigincrements ('id');
            $table->unsignedBigInteger ('kategorilayanan_id')->unsigned();
            $table->unsignedBigInteger ('layanan_id')->unsigned();
            $table->unsignedBigInteger ('unit_id')->unsigned();
            $table->unsignedBigInteger ('vendor_id')->unsigned();
            $table->unsignedBigInteger ('tahun_id')->unsigned();
            $table->unsignedBigInteger ('semester_id')->unsigned();
            $table->date    ('tgl_bast');
            $table->string  ('deskripsi');
            $table->integer ('pengiriman_material');
            $table->integer ('waktu_pengerjaan');
            $table->integer ('kualitas_pengerjaan');
            $table->integer ('kemudahan_koordinasi');
            $table->integer ('responsive');
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
        Schema::dropIfExists('vendorprojects');
    }
}
