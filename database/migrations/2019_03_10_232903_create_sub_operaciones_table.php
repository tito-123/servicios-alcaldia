<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubOperacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_operaciones', function (Blueprint $table) {
            $table->Increments('id');
            $table->String('descripcion');

            $table->Integer('id_usuario')->unsigned();
            $table->Integer('id_operacion')->unsigned();
            
            $table->foreign('id_usuario')
            ->references('id')->on('users')
            ->onDelete('cascade');


            $table->foreign('id_operacion')
            ->references('id')->on('operaciones')
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
        Schema::dropIfExists('sub_operaciones');
    }
}
