<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataStakeholdersTable extends Migration
{
    public function up()
    {
        Schema::create('data_stakeholders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_stakeholder')->nullable();
            $table->string('jangkauan_kerjasama')->nullable();
            $table->string('lama_kerjasama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
