<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 100);
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->text('type_food');
            $table->unsignedBigInteger('number')->comment('phone number of restaurant');
            $table->text('description');
            $table->text('menu');
            $table->text('map_url');
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
        Schema::dropIfExists('restaurants');
    }
}
