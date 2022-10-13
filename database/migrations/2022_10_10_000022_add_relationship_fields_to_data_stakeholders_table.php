<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataStakeholdersTable extends Migration
{
    public function up()
    {
        Schema::table('data_stakeholders', function (Blueprint $table) {
            $table->unsignedBigInteger('daerah_id')->nullable();
            $table->foreign('daerah_id', 'daerah_fk_7454768')->references('id')->on('data_daerahs');
            $table->unsignedBigInteger('kontak_di_lembaga_id')->nullable();
            $table->foreign('kontak_di_lembaga_id', 'kontak_di_lembaga_fk_7455021')->references('id')->on('users');
            $table->unsignedBigInteger('kontak_di_stakeholder_id')->nullable();
            $table->foreign('kontak_di_stakeholder_id', 'kontak_di_stakeholder_fk_7455022')->references('id')->on('users');
            $table->unsignedBigInteger('jenis_kerjasama_id')->nullable();
            $table->foreign('jenis_kerjasama_id', 'jenis_kerjasama_fk_7455030')->references('id')->on('jenis_kerjasamas');
        });
    }
}
