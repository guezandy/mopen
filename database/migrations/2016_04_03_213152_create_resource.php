<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res', function($t) {
            $t->increments('id');
            $t->timestamps();
            $t->string('res_id');
            $t->string('format');
            $t->string('post_id');
            $t->string('file_name');
            $t->string('status');
            $t->string('aws_key');
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
        Schema::drop('res');
    }
}
