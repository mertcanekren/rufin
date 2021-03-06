<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class issue extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('issue', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('creator');
            $table->string('title',150);
            $table->text('content');
            $table->string('users',150);
            $table->string('components',10);
            $table->string('labels',150);
            $table->string('type',50);
            $table->integer('status')->default(0);
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
        Schema::drop('issue');
	}

}
