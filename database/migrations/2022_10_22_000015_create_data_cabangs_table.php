<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCabangsTable extends Migration
{
    public function up()
    {
        Schema::create('data_cabangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_cabang')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
