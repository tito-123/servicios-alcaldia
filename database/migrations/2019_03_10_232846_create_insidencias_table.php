<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insidencias', function (Blueprint $table) {
            $table->Increments('id');
            $table->String('observacion');
            $table->String('fecha');
            $table->String('imagen');
            
            $table->Integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')
            ->references('id')->on('users')
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
        Schema::dropIfExists('insidencias');
    }
}
