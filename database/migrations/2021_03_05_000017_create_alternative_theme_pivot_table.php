<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativeThemePivotTable extends Migration
{
    public function up()
    {
        Schema::create('alternative_theme', function (Blueprint $table) {
            $table->unsignedBigInteger('alternative_id');
            $table->foreign('alternative_id', 'alternative_id_fk_3353387')->references('id')->on('alternatives')->onDelete('cascade');
            $table->unsignedBigInteger('theme_id');
            $table->foreign('theme_id', 'theme_id_fk_3353387')->references('id')->on('themes')->onDelete('cascade');
        });
    }
}
