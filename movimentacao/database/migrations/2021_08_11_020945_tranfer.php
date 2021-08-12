<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tranfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranfers', function (Blueprint $table) {
            $table->id();
            $table->decimal('value');
            $table->integer('notification')->default(0);
            $table->unsignedBigInteger('source_user');
            $table->foreign('source_user')->references('id')->on('users');
            $table->unsignedBigInteger('destination_user');
            $table->foreign('destination_user')->references('id')->on('users');
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
        Schema::drop('tranfers');
    }
}
