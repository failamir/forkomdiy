<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataUmumsTable extends Migration
{
    public function up()
    {
        Schema::table('data_umums', function (Blueprint $table) {
            $table->unsignedBigInteger('ketua_id')->nullable();
            $table->foreign('ketua_id', 'ketua_fk_7454167')->references('id')->on('ketuas');
            $table->unsignedBigInteger('perizinan_id')->nullable();
            $table->foreign('perizinan_id', 'perizinan_fk_7454174')->references('id')->on('perizinans');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id', 'province_fk_7523489')->references('id')->on('provinces');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_7522635')->references('id')->on('users');
        });
    }
}
