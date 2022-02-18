<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMStatementsTable extends Migration
{
    public function up()
    {
        Schema::table('m_statements', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6019137')->references('id')->on('users');
            $table->unsignedBigInteger('document_id')->nullable();
            $table->foreign('document_id', 'document_fk_6019138')->references('id')->on('documents');
        });
    }
}
