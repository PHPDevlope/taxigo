<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersettlementsTable extends Migration
{
    public function up()
    {
        Schema::create('providersettlements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provider_name')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('type')->nullable();
            $table->string('send')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
