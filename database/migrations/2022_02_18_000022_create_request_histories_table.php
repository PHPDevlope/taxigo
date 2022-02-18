<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('request_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('total_distance')->nullable();
            $table->datetime('ride_start_time')->nullable();
            $table->datetime('ride_end_time')->nullable();
            $table->string('otp')->nullable();
            $table->longText('pickup_address')->nullable();
            $table->longText('drop_address')->nullable();
            $table->string('base_price')->nullable();
            $table->string('distance_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('eta_discount_price')->nullable();
            $table->string('tax_price')->nullable();
            $table->string('surge_price')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('coupon_deduction')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('provider_earnings')->nullable();
            $table->string('provider_admin_commission')->nullable();
            $table->string('ride_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
