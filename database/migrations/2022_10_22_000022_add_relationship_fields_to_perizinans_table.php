<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPerizinansTable extends Migration
{
    public function up()
    {
        Schema::table('perizinans', function (Blueprint $table) {
            $table->unsignedBigInteger('jenis_izin_id')->nullable();
            $table->foreign('jenis_izin_id', 'jenis_izin_fk_7455058')->references('id')->on('jenis_izins');
        });
    }
}
