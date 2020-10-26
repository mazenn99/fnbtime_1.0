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
            $table->unsignedBigInteger('views')->comment('this is number of visitor of all restaurant')->default('0');
            $table->text('type_food');
            $table->unsignedBigInteger('number')->comment('phone number of restaurant');
            $table->text('description');
            $table->text('menu');
            $table->boolean('approved')->default('0');
            $table->string('manager_number' , 50)->nullable()->comment('manager phone number');
            $table->string('manager_email' , 100)->nullable()->comment('manager email');
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
