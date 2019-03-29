<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Repayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('repayments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no');
            $table->date('dates');
            $table->decimal('paymentAmount', 21 ,6);
            $table->decimal('interest',21 ,6);
            $table->decimal('principal',21 ,6);
            $table->decimal('balance',21 ,6);
            $table->integer('loan_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
