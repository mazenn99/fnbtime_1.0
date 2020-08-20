<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppDelivey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('res_id');
            $table->text('mrsool')->nullable();
            $table->text('logmaty')->nullable();
            $table->text('hungerStation')->nullable();
            $table->text('jahiz')->nullable();
            $table->text('careemNow')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apps_deliveries');
    }
}
