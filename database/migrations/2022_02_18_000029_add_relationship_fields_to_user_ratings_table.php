<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserRatingsTable extends Migration
{
    public function up()
    {
        Schema::table('user_ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('request_id')->nullable();
            $table->foreign('request_id', 'request_fk_6024829')->references('id')->on('request_histories');
            $table->unsignedBigInteger('user_name_id')->nullable();
            $table->foreign('user_name_id', 'user_name_fk_6024830')->references('id')->on('users');
            $table->unsignedBigInteger('provider_name_id')->nullable();
            $table->foreign('provider_name_id', 'provider_name_fk_6024831')->references('id')->on('users');
        });
    }
}
