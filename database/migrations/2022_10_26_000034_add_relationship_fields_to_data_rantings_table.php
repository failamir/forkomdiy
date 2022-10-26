<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataRantingsTable extends Migration
{
    public function up()
    {
        Schema::table('data_rantings', function (Blueprint $table) {
            $table->unsignedBigInteger('village_id')->nullable();
            $table->foreign('village_id', 'village_fk_7523731')->references('id')->on('villages');
        });
    }
}
