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
            $table->string('jenis_kerjasama')->nullable();
            $table->string('frekuensi_kerjasama')->nullable();
            $table->date('mulai_kerjasama')->nullable();
            $table->string('nama_lembaga_kerjasama')->nullable();
            $table->string('nama_stakeholder')->nullable();
            $table->string('no_hp_wa_stakeholder')->nullable();
            $table->string('kontak_di_lembaga')->nullable();
            $table->string('no_hp_wa_lembaga')->nullable();
            $table->string('jangkauan_kerjasama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
