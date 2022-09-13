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
        Schema::create('list_raffle', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('raffle', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('raffle_id');
            $table->string('rut');
            $table->string('name');
            $table->string('cargo');
            $table->timestamps();
            $table->foreign('raffle_id') 
                -> references('id')
                ->on('list_raffle')
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
        Schema::dropIfExists('list_raffle');
    }
};
