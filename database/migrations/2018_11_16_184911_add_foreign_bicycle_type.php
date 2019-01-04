<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignBicycleType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('bicycle_shop_main', function (Blueprint $table){
            $table->foreign('type')->references('type_id')->on('types');
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
            $table->dropForeign(['type_id']);
        });
    }
}
