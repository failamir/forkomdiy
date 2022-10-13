<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKhususTable extends Migration
{
    public function up()
    {
        Schema::create('data_khusus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_daerah')->nullable();
            $table->integer('jumlah_anggota_daerah')->nullable();
            $table->string('nama_cabang')->nullable();
            $table->integer('jumlah_anggota_cabang')->nullable();
            $table->string('nama_sub_wilayah')->nullable();
            $table->integer('jumlah_anggota_sub_wilayah')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
