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
	      	$table->string('role');
	      	$table->timestamps();
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
