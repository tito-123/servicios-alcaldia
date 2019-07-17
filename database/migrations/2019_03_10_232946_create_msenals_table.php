<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsenalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msenals', function (Blueprint $table) {
            $table->Increments('id');
            $table->String('detalle');
            $table->String('codigo');
            $table->String('imagen');
            $table->String('categoria');
            $table->String('tipo');
            $table->String('estado');
            $table->Integer('id_insidencia')->unsigned();
            $table->Integer('id_ubicacion')->unsigned();

            $table->foreign('id_insidencia')
            ->references('id')->on('insidencias')
             ->onDelete('cascade');

            $table->foreign('id_ubicacion')
            ->references('id')->on('msenal_ubicaciones')
             ->onDelete('cascade');
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
        Schema::dropIfExists('msenals');
    }
}
