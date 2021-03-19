<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('micro_theme')->nullable();
            $table->string('macro_theme')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
