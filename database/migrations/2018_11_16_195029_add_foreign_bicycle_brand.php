<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignBicycleBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bicycle_shop_main', function (Blueprint $table){
            $table->foreign('brand_id')->references('brand_id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bicycle_shop_main', function (Blueprint $table){
            $table->dropForeign(['brand_id']);
        });
    }
}