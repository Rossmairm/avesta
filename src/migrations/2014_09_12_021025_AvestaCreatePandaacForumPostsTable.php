<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaCreatePandaacForumPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Let us define all of the table columns that we want to use within
		// our new table, as well as set a foreign key for the id. 
		
		Schema::create('__pandaac_forum_posts', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('board_id')->unsigned();
			$table->integer('thread_id')->unsigned()->nullable()->default(null);
			$table->integer('player_id')->unsigned();
			$table->integer('guild_id')->unsigned()->nullable()->default(null);
			$table->string('title', 100)->nullable();
			$table->text('content')->nullable();
			$table->integer('views')->default(0);
			$table->integer('lastip')->default(0);
			$table->timestamps();

			$table->foreign('board_id')->references('id')->on('__pandaac_forum_boards')->onDelete('cascade');
			$table->foreign('thread_id')->references('id')->on('__pandaac_forum_posts')->onDelete('cascade');
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('guild_id')->references('id')->on('guilds')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('__pandaac_forum_posts');
	}

}
