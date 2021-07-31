<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarroVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carro_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id');
            $table->foreignId('venta_id');
            $table->integer('cantidad');
            $table->float('precio_unitario');
            $table->float('descuento');
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
        Schema::dropIfExists('carro_venta');
    }
}
