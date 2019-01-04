<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->text('name');
            $table->text('surname');
            $table->text('email');
            $table->text('phone');
            $table->text('post_index');
            $table->text('address');
            $table->enum('delivery', ['by post', 'by courier'])
                ->default('by post');
            $table->enum('status', ['complete', 'incomplete'])
                ->default('incomplete');
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('bicycle_shop_main');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
