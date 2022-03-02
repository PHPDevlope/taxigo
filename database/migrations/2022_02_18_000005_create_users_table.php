<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->datetime('mobile_verified_at')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->integer('company')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('locale')->nullable();
            $table->string('otp')->nullable();
            $table->string('firebase_token')->nullable();
            $table->string('device_token')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device')->nullable();
            $table->longText('bio')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->longText('address')->nullable();
            $table->string('provider_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
