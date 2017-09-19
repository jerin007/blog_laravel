<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id')->unsigned();
            $table->integer('userid');
            $table->text('reply');
            $table->timestamps();
        });
        Schema::table('replies', function ($table){
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropForeign(['comment_id']);
      Schema::drop('replies');
    }
}
