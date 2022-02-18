<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeakTimesTable extends Migration
{
    public function up()
    {
        Schema::create('peak_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('from')->nullable();
            $table->time('to')->nullable();
            $table->decimal('peak_price', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
