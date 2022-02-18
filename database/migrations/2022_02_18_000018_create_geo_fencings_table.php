<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeoFencingsTable extends Migration
{
    public function up()
    {
        Schema::create('geo_fencings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city_name')->nullable();
            $table->string('distance')->nullable();
            $table->string('distance_price')->nullable();
            $table->string('city_limits')->nullable();
            $table->string('minute_price')->nullable();
            $table->string('pricing_logic')->nullable();
            $table->string('hour_price')->nullable();
            $table->string('base_price')->nullable();
            $table->string('base_distance')->nullable();
            $table->string('unit_time_pricing')->nullable();
            $table->string('unit_distance_price')->nullable();
            $table->string('seat_capacity')->nullable();
            $table->string('waive_off_minutes')->nullable();
            $table->string('per_minute_fare')->nullable();
            $table->string('night_fare')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
