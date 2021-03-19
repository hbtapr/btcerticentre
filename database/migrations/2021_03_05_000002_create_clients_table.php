<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->integer('phone');
            $table->integer('social_number')->unique();
            $table->string('client_name');
            $table->integer('products')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
