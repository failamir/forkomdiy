<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataCabangsTable extends Migration
{
    public function up()
    {
        Schema::table('data_cabangs', function (Blueprint $table) {
            $table->unsignedBigInteger('daerah_id')->nullable();
            $table->foreign('daerah_id', 'daerah_fk_7454953')->references('id')->on('data_daerahs');
        });
    }
}