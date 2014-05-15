<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Projects extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function($table)
	   	{
	   		$table->engine = 'InnoDB';
	      	$table->increments('id');
	      	$table->string('name', 155);
	      	$table->string('content', 155);
	      	$table->string('status', 5);
	      	$table->integer('user');
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
		Schema::drop('projects');
	}

}
