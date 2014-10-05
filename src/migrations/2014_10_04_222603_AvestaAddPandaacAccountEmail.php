<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaAddPandaacAccountEmail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('__pandaac_accounts', function($table)
		{
			$table->integer('email')->default(0)->after('points');
			$table->integer('email_date')->default(0)->after('email');
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
			$table->dropColumn('email');
			$table->dropColumn('email_date');
		});
	}

}
