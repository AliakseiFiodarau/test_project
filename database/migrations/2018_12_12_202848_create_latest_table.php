<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLatestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latest', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('latest_id');
            $table->enum('status', ['PUBLISHED', 'DRAFT', 'PENDING'])
                ->default('PUBLISHED');
            $table->text('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('latest');
    }
}
