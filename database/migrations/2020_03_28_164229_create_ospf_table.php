<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOspfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ospf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_adress');
            $table->string('name');
            $table->string('password');
            $table->string('network1');
            $table->string('network2');
            $table->string('neighborIp');
            $table->string('interface');
            $table->timestamps();
        });
    }
}

