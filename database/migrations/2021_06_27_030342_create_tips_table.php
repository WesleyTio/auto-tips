<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tips', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_user_tip');
            $table->unsignedBigInteger('fk_vehicle_tip');
            $table->string('tip');
            $table->string('brand');
            $table->string('model');
            $table->string('version');
            $table->foreign('fk_user_tip')->references('id')->on('users');
            $table->foreign('fk_vehicle_tip')->references('id')->on('vehicles');
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
        Schema::dropIfExists('tips');
    }
}
