<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('res_id');
            $table->integer('booking_number');
            $table->string('name' , 80);
            $table->bigInteger('phone_costumer');
            $table->unsignedTinyInteger('person_number');
            $table->time('time');
            $table->dateTime('date_booking')->comment('time when client make reserve');
            $table->dateTime('occasion_date');
            $table->tinyInteger('status')->default(0)->comment('Number zero = pending , number 1 = Approve , number 2 = Canceled');
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
        Schema::dropIfExists('bookings');
    }
}
