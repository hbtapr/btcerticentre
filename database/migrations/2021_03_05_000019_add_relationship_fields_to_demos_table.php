<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDemosTable extends Migration
{
    public function up()
    {
        Schema::table('demos', function (Blueprint $table) {
            $table->unsignedBigInteger('partner_demo_id');
            $table->foreign('partner_demo_id', 'partner_demo_fk_3353366')->references('id')->on('partners');
        });
    }
}
