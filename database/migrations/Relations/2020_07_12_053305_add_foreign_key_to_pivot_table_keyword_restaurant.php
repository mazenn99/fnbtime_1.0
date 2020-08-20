<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPivotTableKeywordRestaurant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keyword_restaurant', function (Blueprint $table) {
            $table->foreign('keyword_id')
                ->references('id')
                ->on('keywords')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
                ->onUpdate('cascade')
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
        Schema::table('keyword_restaurant', function (Blueprint $table) {
            //
        });
    }
}
