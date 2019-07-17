<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilegios', function (Blueprint $table) {
            $table->Integer('id_grupo')->unsigned();
            $table->Integer('id_operacion')->unsigned();
            $table->String('estado');
            $table->primary(['id_grupo', 'id_operacion']);

           $table->foreign('id_grupo')
            ->references('id')->on('grupos');

            $table->foreign('id_operacion')
            ->references('id')->on('operaciones');
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
        Schema::dropIfExists('privilegios');
    }
}
