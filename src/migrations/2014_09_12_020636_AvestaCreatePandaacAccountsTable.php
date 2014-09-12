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
		// Let us define all of the table columns that we want to use within
		// our new table, as well as set a foreign key for the id. 

		Schema::create('__pandaac_accounts', function($table)
		{
			$table->integer('account_id')->primary()->unsigned();
			$table->integer('points')->default(0);

			$table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
		});


		// Once the table has been created, we want to create a trigger that inserts a 
		// relevant row into the newly created table every time a new account is created.
		
		Trigger::createOrAlter(__FILE__, 'INSERT', 'AFTER', 'accounts', function()
		{
			return 'INSERT INTO `__pandaac_accounts` (`account_id`) VALUES(NEW.`id`);';
		});


		// If any accounts already exists in the accounts table, we want to seed the
		// __pandaac_accounts table with their respective information.

		App::make('seeder')->call('pandaac\Avesta\Seeds\AccountSeeder');
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
