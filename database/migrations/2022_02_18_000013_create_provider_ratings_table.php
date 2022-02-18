<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('provider_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rating')->nullable();
            $table->datetime('date_time')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
