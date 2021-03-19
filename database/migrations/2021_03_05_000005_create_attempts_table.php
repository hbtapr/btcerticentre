<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttemptsTable extends Migration
{
    public function up()
    {
        Schema::create('attempts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('first_attempt')->nullable();
            $table->datetime('second_attempt')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
