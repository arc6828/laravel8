<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderlines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('line')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('movie_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->date('order_date')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orderlines');
    }
}
