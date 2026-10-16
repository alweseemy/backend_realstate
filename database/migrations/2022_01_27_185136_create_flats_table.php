<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id');
            $table->string('name');
            $table->string('unit_number');
            $table->integer('area');
            $table->string('electric');
            $table->string('water');
            $table->integer('room');
            $table->integer('hall');
            $table->integer('bathroom');
            $table->string('services');
            $table->integer('floor');
            $table->integer('speci_unit');
            $table->text('images');
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
        Schema::dropIfExists('flats');
    }
}
