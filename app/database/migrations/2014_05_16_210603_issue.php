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
            $table->string('title',150);
            $table->string('content');
            $table->string('user',150);
            $table->string('components',150);
            $table->integer('status')->default(0);
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
        Schema::drop('issue');
	}

}
