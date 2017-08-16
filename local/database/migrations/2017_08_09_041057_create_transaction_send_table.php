<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionSendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // transaction_send
        /*
        transaction_send
        id,
        transaction_id,
        shipping_method
        code_send
        qty_box
        date_send
        note
        created_at
        updated_at
        */
        Schema::create('transaction_send', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('transaction_id');
            $table->string('shipping_method');
            $table->string('code_send');
            $table->integer('qty_box');
            $table->dateTime('date_send');
            $table->text('note')->nullable();
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_send');
    }
}
