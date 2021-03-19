<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAttemptsTable extends Migration
{
    public function up()
    {
        Schema::table('attempts', function (Blueprint $table) {
            $table->unsignedBigInteger('certificates_id')->nullable();
            $table->foreign('certificates_id', 'certificates_fk_3353353')->references('id')->on('certificates');
        });
    }
}
