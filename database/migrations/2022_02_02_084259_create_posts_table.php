<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->Increments('id');       // 主キー
            $table->integer('user_id');     // 投稿した人のid
            $table->integer('player_id');   // 選手のid
            $table->string('title',20);     // 投稿のタイトル
            $table->string('sentence',400); // 投稿の本文
            $table->timestamp('created_at')->useCurrent(); // 投稿した日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
