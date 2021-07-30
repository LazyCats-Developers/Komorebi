<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function(Blueprint $table){
            $table->string('codigo');
            $table->unsignedBigInteger('unidad_id')->nullable();
            $table->dropColumn('unidad');
            $table->foreign('unidad_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function(Blueprint $table){
            $table->dropColumn('codigo');
            $table->dropForeign(['unidad_id']);
            $table->string('unidad');
            $table->dropColumn('unidad_id');
        });
    }
}
