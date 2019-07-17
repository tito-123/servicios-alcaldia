<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenalizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senalizaciones', function (Blueprint $table) {
            $table->Increments('id');
            $table->String('codigo');
            $table->String('imagen');
            $table->String('detalle');
            $table->Integer('id_categoria')->unsigned();
            $table->Integer('id_tipo')->unsigned();

            $table->foreign('id_categoria')
            ->references('id')->on('senal_categorias')
             ->onDelete('cascade');

              $table->foreign('id_tipo')
            ->references('id')->on('senal_tipos')
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
        Schema::dropIfExists('senalizaciones');
    }
}
