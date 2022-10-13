<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisIzinsTable extends Migration
{
    public function up()
    {
        Schema::create('jenis_izins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_jenis')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
