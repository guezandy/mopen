<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('post_posts', function($t) {
            $t->increments('id');
            $t->timestamps();
            $t->string('post_1_id');
            $t->string('post_2_id');
            $t->string('type'); 
            $t->string('description');
            $t->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('post_posts');
    }
}
