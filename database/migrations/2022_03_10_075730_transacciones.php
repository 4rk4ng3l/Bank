<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transacciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function(Blueprint $table){
            $table->id();
            $table->bigInteger('idCuentaOrigen')->nullable(false)->unsigned();
            $table->bigInteger('idCuentaDestino')->nullable(false)->unsigned();
            $table->bigInteger('valor')->unsigned();
            $table->timestamps();
            $table->index('id');
            $table->foreign('idCuentaOrigen')->references('id')->on('cuentas');
            $table->foreign('idCuentaDestino')->references('id')->on('cuentas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
}
