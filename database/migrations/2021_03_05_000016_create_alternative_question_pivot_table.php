<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativeQuestionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('alternative_question', function (Blueprint $table) {
            $table->unsignedBigInteger('alternative_id');
            $table->foreign('alternative_id', 'alternative_id_fk_3353386')->references('id')->on('alternatives')->onDelete('cascade');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id', 'question_id_fk_3353386')->references('id')->on('questions')->onDelete('cascade');
        });
    }
}
