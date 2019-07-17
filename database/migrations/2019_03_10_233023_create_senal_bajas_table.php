<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenalBajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senal_bajas', function (Blueprint $table) {
            $table->Increments('id');
            $table->String('detalle');
            $table->Integer('id_senal')->unsigned();
            $table->foreign('id_senal')
            ->references('id')->on('msenals')
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
        Schema::dropIfExists('senal_bajas');
    }
}
