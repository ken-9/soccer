<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->Increments('id');        // 主キー
            $table->integer('user_id');      // 投稿した人のid
            $table->integer('post_id');     // 返信対象の投稿id
            $table->string('sentence',400);  // 返信本文
            $table->timestamp('created_at'); // 返信した日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
