<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataWilayahsTable extends Migration
{
    public function up()
    {
        Schema::create('data_wilayahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_wilayah')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
