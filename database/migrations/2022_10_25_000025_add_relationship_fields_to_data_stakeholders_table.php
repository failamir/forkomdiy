<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataStakeholdersTable extends Migration
{
    public function up()
    {
        Schema::table('data_stakeholders', function (Blueprint $table) {
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_7523565')->references('id')->on('users');
        });
    }
}
