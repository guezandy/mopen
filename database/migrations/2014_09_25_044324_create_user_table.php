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
          $t->string('first_name');
          $t->string('last_name');
          $t->string('username')->unique();
          $t->string('phone');
          $t->string('email');
          $t->string('image');
          $t->string('password');
          $t->mediumText('bio');
          $t->string('website');
          $t->string('verified_email');
          $t->string('activation_code');
          $t->string('token');
          $t->integer('token_expiry');
          $t->boolean('blocked');
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
