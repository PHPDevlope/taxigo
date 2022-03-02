<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRequestHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('request_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('user_name_id')->nullable();
            $table->foreign('user_name_id', '
            user_name_fk_6024795')->references('id')->on('users');
            $table->unsignedBigInteger('provider_name_id')->nullable();
            $table->foreign('provider_name_id', 'provider_name_fk_6024796')->references('id')->on('users');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id', 'coupon_fk_6025087')->references('id')->on('promocodes');
        });
    }
}
