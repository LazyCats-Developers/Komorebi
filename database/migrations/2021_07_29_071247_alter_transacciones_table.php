<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transacciones', function (Blueprint $table){
            $table->integer('valor')->default(0)->change();
            $table->integer('cantidad')->default(0)->change();
            $table->date('fecha')->default('CURRENT_DATE')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transacciones', function(Blueprint $table){
            $table->integer('valor')->change();
            $table->integer('cantidad')->change();
            $table->date('fecha')->change();
        });
    }
}
