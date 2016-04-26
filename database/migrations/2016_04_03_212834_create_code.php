<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code', function($t) {
            $t->increments('id');
            $t->string('code_id');
            $t->string('format');
            $t->string('post_id');
            $t->string('file_name');
            $t->string('status');
            $t->longText('code');
            $t->longText('description');
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
        //
        Schema::drop('code');
    }
}
