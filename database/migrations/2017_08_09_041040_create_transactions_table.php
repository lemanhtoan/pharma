<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // transactions
        /*
        id
        mind_id
        user_id
        created_date
        address
        owner
        phone
        shipping_method
        note
        status (enum - or interger ) => contstant
        created_at
        updated_at

        ==> will update
        sub_total
        shipping_cost
        shipping_discount
        before_total
        before_pay
        end_toal
        */
        Schema::create('transactions', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('mind_id');
            $table->integer('user_id');
            $table->dateTime('created_date');
            $table->string('owner')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('shipping_method');
            $table->text('note')->nullable();
            $table->integer('status')->nullable();

            $table->decimal('sub_total');
            $table->decimal('shipping_cost');
            $table->decimal('shipping_discount');
            $table->decimal('before_total');
            $table->decimal('before_pay');
            $table->decimal('end_toal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
