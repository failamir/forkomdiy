<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisKerjasamasTable extends Migration
{
    public function up()
    {
        Schema::create('jenis_kerjasamas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_jenis')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
