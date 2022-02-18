<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTypesTable extends Migration
{
    public function up()
    {
        Schema::create('service_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_name')->nullable();
            $table->string('provider_name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('outstation_oneway_price', 15, 2)->nullable();
            $table->decimal('outstation_roundtrip_price', 15, 2)->nullable();
            $table->decimal('driver_bata', 15, 2)->nullable();
            $table->string('rental_per_hour')->nullable();
            $table->string('night_fare')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
