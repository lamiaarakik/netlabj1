<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDynamicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_adress');
            $table->string('name');
            $table->string('password');
            $table->string('network1_address');
            $table->string('network1_mask');
            $table->string('network2_address');
            $table->string('network2_mask');
            $table->string('network3_address');
            $table->string('network3_mask');
            $table->string('network4_address');
            $table->string('network4_mask');
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
        Schema::dropIfExists('dynamics');
    }
}
