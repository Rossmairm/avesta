<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaCreatePandaacStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Let us define all of the table columns that we want to use within
		// our new table.

		Schema::create('__pandaac_store', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('title', 50);
			$table->string('description')->nullable();
			$table->integer('points')->default(1);
			$table->integer('disabled')->default(0);
			$table->integer('order')->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('__pandaac_store');
	}

}
