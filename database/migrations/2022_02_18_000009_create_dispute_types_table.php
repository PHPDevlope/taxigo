<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisputeTypesTable extends Migration
{
    public function up()
    {
        Schema::create('dispute_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dispute_type')->nullable();
            $table->string('dispute_issue')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
