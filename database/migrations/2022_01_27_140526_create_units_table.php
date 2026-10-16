<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('unittype_id');
            $table->enum('uses',['commercial','residential','families','singels']);
            $table->integer('floors_number');
            $table->integer('city_id');
            $table->integer('postal_code');
            $table->integer('unites_number');
            $table->integer('owner_id');
            $table->integer('user_id');
            $table->integer('extra_number');
            $table->string('building_number');
            $table->string('deed_number');
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
        Schema::dropIfExists('units');
    }
}
