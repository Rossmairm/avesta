<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaAddPandaacAccountLastForumPost extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('__pandaac_accounts', function($table)
		{
			$table->integer('last_post')->default(0)->after('points');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('__pandaac_accounts', function($table)
		{
			$table->dropColumn('last_post');
		});
	}

}
