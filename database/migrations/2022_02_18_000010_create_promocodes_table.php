<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodesTable extends Migration
{
    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('promocode')->nullable();
            $table->string('discount')->nullable();
            $table->string('promocodes_use')->nullable();
            $table->string('use_count')->nullable();
            $table->date('from_date')->nullable();
            $table->date('expiration')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
