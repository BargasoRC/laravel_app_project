<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->string('from');
            $table->string('to');
            $table->integer('bus_id');
            $table->integer('seat_number');
            $table->string('departure');
            $table->string('arrival');
            $table->integer('bill');
            $table->string('ticket_number')->unique();
            $table->string('passenger_id');
            $table->timestamps();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
