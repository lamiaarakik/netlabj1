<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoopbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loopbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_adress');
            $table->string('name');
            $table->string('password');
            $table->string('loopback_adress');
            $table->string('loopback_mask');
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
        Schema::dropIfExists('loopbacks');
    }
}
