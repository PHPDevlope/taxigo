<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDisputeRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('dispute_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('dispute_id')->nullable();
            $table->foreign('dispute_id', 'dispute_fk_5993635')->references('id')->on('dispute_types');
        });
    }
}
