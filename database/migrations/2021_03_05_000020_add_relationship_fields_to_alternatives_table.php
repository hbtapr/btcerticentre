<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAlternativesTable extends Migration
{
    public function up()
    {
        Schema::table('alternatives', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_3353394')->references('id')->on('questions');
            $table->unsignedBigInteger('difficulty_id');
            $table->foreign('difficulty_id', 'difficulty_fk_3353395')->references('id')->on('questions');
        });
    }
}
