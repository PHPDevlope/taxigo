<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction')->nullable();
            $table->decimal('total_amount', 15, 2)->nullable();
            $table->decimal('provider_amount', 15, 2)->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('paument_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
