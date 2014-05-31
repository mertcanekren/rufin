<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Components extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('components', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('content');
            $table->integer('creator');
            $table->integer('createtime');
            $table->integer('update_time');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('components');
	}

}
