<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('items_likes', function (Blueprint $table) {
//            $table->bigIncrements('like_id');
//            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id', 'user_fk_313721713')->references('id')->on('users');
//            $table->unsignedBigInteger('item_id');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_likes');
    }
}
