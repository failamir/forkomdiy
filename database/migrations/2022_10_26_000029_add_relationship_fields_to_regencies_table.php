<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRegenciesTable extends Migration
{
    public function up()
    {
        Schema::table('regencies', function (Blueprint $table) {
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_7527956')->references('id')->on('users');
        });
    }
}
