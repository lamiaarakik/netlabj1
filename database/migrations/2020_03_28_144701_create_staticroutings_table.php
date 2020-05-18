<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticroutingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staticroutings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_adress');
            $table->string('name');
            $table->string('password');
            $table->string('loopback_adress');
            $table->string('loopback_mask');
            $table->string('serial0_address');
            $table->string('serial0_mask');
            $table->string('serial1_address');
            $table->string('serial1_mask');
            $table->string('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staticroutings');
    }
}
