<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToRequestHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_histories', function (Blueprint $table) {
            $table->string('source_latitude')->nullable();
            $table->string('source_longitude')->nullable();
            $table->string('dist_latitude')->nullable();
            $table->string('dist_longitude')->nullable();
            $table->string('source_address')->nullable();
            $table->string('dist_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_histories', function (Blueprint $table) {
            //
        });
    }
}
