<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function($t) {
          // auto increment id (primary key)
          $t->increments('id');
          $t->string('full_name');
          $t->string('username')->unique();
          $t->string('phone');
          $t->string('email');
          $t->string('image');
          $t->string('password');
          $t->mediumText('bio');
          $t->string('website');
          $t->tinyInteger('verified_email')->default(0);
          $t->string('activation_code');
          $t->string('token');
          $t->integer('token_expiry');
          $t->boolean('blocked');
          $t->integer('posts');
          $t->integer('stars');
          $t->integer('followers');
          $t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()

	{	

		Schema::drop('user');
	}

}
