<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('m_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->string('data')->nullable();
            $table->string('sub_data')->nullable();
            $table->string('field_1')->nullable();
            $table->string('field_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
