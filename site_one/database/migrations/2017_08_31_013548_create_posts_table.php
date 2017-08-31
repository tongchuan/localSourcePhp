<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::drop('posts');
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            // $table->engine = 'InnoDB';  
            // $table->increments('id');  
            $table->integer('uid'); // 是否含有附件  
            $table->string('slug',50)->unique();  
            $table->string('title')->null();  
            $table->string('subject')->default('');  
            $table->string('keywords')->default('');  
            $table->integer('catalogue')->default(0);  
            $table->integer('attach')->default(0); // 是否含有附件  
            $table->timestamps();  
            // $table->timestamp('published_at')->index(); //正式发布时间  
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

// DROP TABLE admin_user;
// DROP TABLE migrations;
// DROP TABLE password_resets;
// DROP TABLE users;
// DROP TABLE posts;