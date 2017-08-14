<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDrugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // transaction_drug
        /*
        transaction_drug
        id
        transaction_id
        drug_id
        qty
        qty_discount
        price
        price_discount
        created_at
        updated_at
        */
        Schema::create('transaction_drug', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('transaction_id');
            $table->integer('drug_id');
            $table->integer('qty');
            $table->integer('qty_discount');
            $table->decimal('price');
            $table->decimal('price_discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_drug');
    }
}
