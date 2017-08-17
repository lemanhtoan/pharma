<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // discount(id, name, from, to, level, percent)\
        Schema::create('config_discount', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('level');
            $table->string('name');
            $table->decimal('from');
            $table->decimal('to');
            $table->decimal('percent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('config_discount');
    }
}
