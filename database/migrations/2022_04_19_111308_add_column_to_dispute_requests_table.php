<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDisputeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dispute_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('dispute_name_id')->nullable();
            $table->foreign('dispute_name_id', 'dispute_name_fk_6458195')->references('id')->on('dispute_types');
            $table->string('comment')->nullable();
            $table->string('status')->nullable();
            $table->string('refund_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dispute_requests', function (Blueprint $table) {
            //
        });
    }
}
