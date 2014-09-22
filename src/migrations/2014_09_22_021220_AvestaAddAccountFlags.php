<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaAddAccountFlags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('__pandaac_accounts', function($table)
		{
			$table->bigInteger('flags')->default(0)->after('account_id');
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
			$table->dropColumn('flags');
		});
	}

}
