<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouterInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('router_interfaces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('interface_description');
            $table->bigInteger('router_id')->unsigned();
            $table->string('ipv4_address');
            $table->string('ipv4_mask');
            $table->string('ipv6_address');
            $table->string('ipv6_prefix');

            $table->foreign('router_id')
                    ->references('id')
                    ->on('routers')
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
        Schema::dropIfExists('router_interfaces');
    }
}
