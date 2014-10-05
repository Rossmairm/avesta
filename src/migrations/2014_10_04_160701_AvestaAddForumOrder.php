<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaAddForumOrder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('__pandaac_forum_boards', function($table)
		{
			$table->integer('order')->default(0)->after('description');
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
			$table->dropColumn('order');
		});
	}

}
