<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaAddForumPostLocked extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('__pandaac_forum_posts', function($table)
		{
			$table->integer('locked')->default(0)->after('guild_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('__pandaac_forum_posts', function($table)
		{
			$table->dropColumn('locked');
		});
	}

}
