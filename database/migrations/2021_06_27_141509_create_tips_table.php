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
            $table->id();
            $table->unsignedBigInteger('fk_user');
            $table->unsignedBigInteger('fk_vehicle');
            $table->string('tip');
            $table->string('brand');
            $table->string('model');
            $table->string('version');
            $table->foreign('fk_user')->references('id')->on('users');
            $table->foreign('fk_vehicle')->references('id')->on('vehicles');
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
