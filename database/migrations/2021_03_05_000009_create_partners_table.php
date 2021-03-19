<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('partner_name');
            $table->string('partner_address');
            $table->string('partner_email')->nullable();
            $table->integer('business_number')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
