<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToKetuasTable extends Migration
{
    public function up()
    {
        Schema::table('ketuas', function (Blueprint $table) {
            $table->unsignedBigInteger('ketua_id')->nullable();
            $table->foreign('ketua_id', 'ketua_fk_7510335')->references('id')->on('contact_contacts');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_7527068')->references('id')->on('users');
        });
    }
}
