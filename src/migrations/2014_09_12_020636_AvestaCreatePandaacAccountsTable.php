<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaCreatePandaacAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('__pandaac_accounts', function($table)
		{
			$table->integer('account_id')->primary()->unsigned();
			$table->integer('points')->default(0);

			$table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
		});
		
		Trigger::createOrAlter(__FILE__, 'INSERT', 'AFTER', 'accounts', 'INSERT INTO `__pandaac_accounts` (`account_id`) VALUES(NEW.`id`);');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('__pandaac_accounts');

		Trigger::restoreOrDrop(__FILE__, 'INSERT', 'AFTER', 'accounts');
	}

}
