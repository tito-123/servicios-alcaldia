<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleSenalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_senals', function (Blueprint $table) {$table->Integer('id_usuario')->unsigned();
            $table->Integer('id_senal')->unsigned();
            $table->primary(['id_usuario', 'id_senal']);

             $table->foreign('id_usuario')
            ->references('id')->on('users');

            $table->foreign('id_senal')
            ->references('id')->on('senalizaciones');
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
        Schema::dropIfExists('detalle_senals');
    }
}
