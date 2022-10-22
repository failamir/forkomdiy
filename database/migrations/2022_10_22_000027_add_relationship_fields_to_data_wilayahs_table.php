<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataWilayahsTable extends Migration
{
    public function up()
    {
        Schema::table('data_wilayahs', function (Blueprint $table) {
            $table->unsignedBigInteger('daerah_id')->nullable();
            $table->foreign('daerah_id', 'daerah_fk_7454969')->references('id')->on('data_daerahs');
        });
    }
}
