<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // group_drugs(id, code, short_name, full_name, note, status, created_at, updated_at)
        Schema::create('group_drugs', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('code', 255)->unique();
            $table->string('short_name', 255);
            $table->string('full_name', 255);
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
        Schema::drop('group_drugs');
    }
}
