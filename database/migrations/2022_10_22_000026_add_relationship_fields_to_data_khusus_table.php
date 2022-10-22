<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataKhususTable extends Migration
{
    public function up()
    {
        Schema::table('data_khusus', function (Blueprint $table) {
            $table->unsignedBigInteger('data_daerah_id')->nullable();
            $table->foreign('data_daerah_id', 'data_daerah_fk_7454873')->references('id')->on('data_daerahs');
            $table->unsignedBigInteger('data_cabang_id')->nullable();
            $table->foreign('data_cabang_id', 'data_cabang_fk_7454898')->references('id')->on('data_cabangs');
            $table->unsignedBigInteger('data_sub_wilayah_lain_id')->nullable();
            $table->foreign('data_sub_wilayah_lain_id', 'data_sub_wilayah_lain_fk_7454880')->references('id')->on('data_wilayahs');
        });
    }
}
