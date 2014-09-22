<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaUpdateForumBoardsForNews extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('__pandaac_forum_boards', function($table)
		{
			$table->tinyInteger('news')->default(0)->after('board_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('__pandaac_forum_boards', function($table)
		{
			$table->dropColumn('news');
		});
	}

}
