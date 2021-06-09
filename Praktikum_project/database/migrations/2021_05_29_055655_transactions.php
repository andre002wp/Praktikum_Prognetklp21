<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('timeout');
            $table->string('address');
            $table->string('regency');
            $table->string('province');
            $table->double('total');
            $table->double('shipping_cost');
            $table->double('sub_total');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('courier_id');
            $table->foreign('courier_id')->references('id')->on('couriers');
            $table->string('proof_of_payment')->nullable();
            $table->timestamps();
            $table->enum('status',['unverified', 'verified', 'delivered','success','expired','canceled'])->default('unverified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
