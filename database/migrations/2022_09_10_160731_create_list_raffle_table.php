<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')
                -> references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('raffle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut');
            $table->string('name');
            $table->string('cargo');
            $table->timestamps();
        });

        Schema::create('lista_raffle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lista_id')->unsigned();
            $table->integer('raffle_id')->unsigned();
            $table->timestamps();

            $table->foreign('raffle_id')
            -> references('id')
            ->on('raffle')
            ->onDelete('cascade');

            $table->foreign('lista_id')
            -> references('id')
            ->on('lista')
            ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista');
        Schema::dropIfExists('raffle');
        Schema::dropIfExists('lista_raffle');

    }
};
