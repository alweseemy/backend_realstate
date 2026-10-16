<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->integer('manger_id');
            $table->integer('user_id');
            $table->integer('unit_id');
            $table->integer('flat_id');
            $table->integer('month');
            $table->float('price');
            $table->float('insurance');
            $table->enum('period',['monthly','quarterly','biannual','yearly']);
            $table->integer('period_months');
            $table->text('details')->nullable();
            $table->date('start_date');
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
        Schema::dropIfExists('contracts');
    }
}
