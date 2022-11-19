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
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cargo');
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('users_recipients', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->unsigned();
            $table->integer('recipients_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')
            -> references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('recipients_id')
            -> references('id')
            ->on('recipients')
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
        
        Schema::dropIfExists('users_recipients');
        Schema::dropIfExists('recipients');
    }
};
