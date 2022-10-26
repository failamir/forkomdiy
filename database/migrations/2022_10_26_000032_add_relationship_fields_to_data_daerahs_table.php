<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataDaerahsTable extends Migration
{
    public function up()
    {
        Schema::table('data_daerahs', function (Blueprint $table) {
            $table->unsignedBigInteger('regency_id')->nullable();
            $table->foreign('regency_id', 'regency_fk_7523632')->references('id')->on('regencies');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_7523640')->references('id')->on('users');
        });
    }
}
