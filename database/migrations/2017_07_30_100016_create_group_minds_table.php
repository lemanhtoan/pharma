<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupMindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // minds(id, code, name, discount_cg1, discount_cg2, start_time, end_time, note, status, created_at, updated_at)
        Schema::create('minds', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('code', 255)->unique();
            $table->string('name', 255);
            $table->decimal('discount_cg1');
            $table->decimal('discount_cg2');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
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
        Schema::drop('minds');
    }
}
