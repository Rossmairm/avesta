<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaCreatePandaacForumBoardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Let us define all of the table columns that we want to use within
		// our new table, as well as set a foreign key for the id. 
		
		Schema::create('__pandaac_forum_boards', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('board_id')->unsigned()->nullable()->default(null);
			$table->string('title', 100);
			$table->string('description')->nullable();

			$table->foreign('board_id')->references('id')->on('__pandaac_forum_boards')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('__pandaac_forum_boards');
	}

}
