<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisputeRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('dispute_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_provider')->nullable();
            $table->string('request_detail')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
