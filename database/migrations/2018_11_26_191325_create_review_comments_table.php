<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('review_id')->unsigned()->default('0');;
            $table->text('text');
            $table->integer('author_id')->unsigned();
            $table->integer('rating')->default('0');
            $table->timestamps();
            $table->foreign('review_id')->references('review_id')->on('reviews');
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_comments');
    }
}
