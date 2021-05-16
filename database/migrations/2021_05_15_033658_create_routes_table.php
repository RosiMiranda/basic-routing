<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('router_id')->unsigned();
            $table->string('destiny_address');
            $table->string('next_hop_address');
            $table->bigInteger('exit_interface')->unsigned();

            $table->foreign('router_id')
                    ->references('id')
                    ->on('routers')
                    ->onCascade('delete');

            $table->foreign('exit_interface')
                    ->references('id')
                    ->on('interfaces')
                    ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
