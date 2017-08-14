<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMindDrugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //mind_drug(id, mind_id, drug_id, drug_price, drug_special_price, max_discount_qty, max_qty, note, created_at, updated_at)
        Schema::create('mind_drug', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('mind_id');
            $table->integer('drug_id');
            $table->decimal('drug_price');
            $table->decimal('drug_special_price')->nullable();
            $table->integer('max_discount_qty')->nullable();
            $table->integer('max_qty')->nullable();
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
        Schema::drop('mind_drug');
    }
}
