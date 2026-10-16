<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_checks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('number');
            $table->integer('bank_id');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->text('details')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->integer('contract_id')->nullable();
            $table->enum('status',['not_received','received'])->default('not_received');
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
        Schema::dropIfExists('bank_checks');
    }
}
