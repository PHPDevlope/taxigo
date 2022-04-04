<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToMStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_statements', function (Blueprint $table) {
            $table->string('booking')->nullable();
            $table->longText('picked_up')->nullable();
            $table->longText('dropped')->nullable();
            $table->string('commission')->nullable();
            $table->unsignedBigInteger('request_id')->nullable();
            $table->string('status')->nullable();
            $table->string('earned')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_statements', function (Blueprint $table) {
            //
        });
    }
}
