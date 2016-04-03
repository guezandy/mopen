<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function($t) {
            $t->string('post_id');
            $t->string('name');
            $t->mediumText('description');
            $t->string('vc_link');
            $t->integer('comments');
            $t->integer('likes');
            $t->integer('views');
            $t->boolean('blocked');
            $t->boolean('deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post');
    }
}
