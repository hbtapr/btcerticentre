<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionThemePivotTable extends Migration
{
    public function up()
    {
        Schema::create('question_theme', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id', 'question_id_fk_3353349')->references('id')->on('questions')->onDelete('cascade');
            $table->unsignedBigInteger('theme_id');
            $table->foreign('theme_id', 'theme_id_fk_3353349')->references('id')->on('themes')->onDelete('cascade');
        });
    }
}
