<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('hash' , 255);
            $table->unsignedBigInteger('res_id');
            $table->timestamp('approve_at')->nullable();
            $table->string('signed_name' , 255)->nullable();
            $table->foreign('res_id')
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
        Schema::dropIfExists('contract_restaurants');
    }
}
