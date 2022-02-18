<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeoFencingServiceTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('geo_fencing_service_type', function (Blueprint $table) {
            $table->unsignedBigInteger('service_type_id');
            $table->foreign('service_type_id', 'service_type_id_fk_6002977')->references('id')->on('service_types')->onDelete('cascade');
            $table->unsignedBigInteger('geo_fencing_id');
            $table->foreign('geo_fencing_id', 'geo_fencing_id_fk_6002977')->references('id')->on('geo_fencings')->onDelete('cascade');
        });
    }
}
