<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeakTimeServiceTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('peak_time_service_type', function (Blueprint $table) {
            $table->unsignedBigInteger('service_type_id');
            $table->foreign('service_type_id', 'service_type_id_fk_6002913')->references('id')->on('service_types')->onDelete('cascade');
            $table->unsignedBigInteger('peak_time_id');
            $table->foreign('peak_time_id', 'peak_time_id_fk_6002913')->references('id')->on('peak_times')->onDelete('cascade');
        });
    }
}
