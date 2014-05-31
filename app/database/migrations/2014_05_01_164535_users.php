<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	 	Schema::create('users', function($table)
	   	{
	   		$table->engine = 'InnoDB';
	      	$table->increments('id');
	      	$table->string('username', 155);
	      	$table->string('password', 155);
	      	$table->string('email', 155);
	      	$table->string('name', 155);
	      	$table->string('remember_token', 100);
	      	$table->string('role',2);
	      	$table->string('status',1);
            $table->integer('createtime');
            $table->integer('update_time');
            $table->integer('creator');
	   	});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('users');
	}

}
