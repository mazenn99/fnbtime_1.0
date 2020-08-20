<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenClosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_closes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('res_id');
            $table->integer('day');
            $table->string('open' , 10);
            $table->string('close' , 10);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('open_closes');
    }
}
