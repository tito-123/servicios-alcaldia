<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->Integer('id_persona')->unsigned();
            $table->Integer('id_tipo_usu')->unsigned();
            $table->Integer('id_estado_usu')->unsigned();

            $table->foreign('id_persona')
            ->references('id')->on('personas')
            ->onDelete('cascade');

             $table->foreign('id_tipo_usu')
            ->references('id')->on('tipo_usus')
            ->onDelete('cascade');

             $table->foreign('id_estado_usu')
            ->references('id')->on('estado_usus')
            ->onDelete('cascade');


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
