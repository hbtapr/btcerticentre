<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativesTable extends Migration
{
    public function up()
    {
        Schema::create('alternatives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alt_1');
            $table->string('alt_2');
            $table->string('alt_3')->nullable();
            $table->string('alt_4')->nullable();
            $table->string('alt_5')->nullable();
            $table->string('right_alternative');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
