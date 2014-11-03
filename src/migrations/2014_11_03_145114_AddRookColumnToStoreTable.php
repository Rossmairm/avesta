<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRookColumnToStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('__pandaac_store', function($table)
		{
			$table->integer('rookgaard')->default(0)->after('points');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('__pandaac_store', function($table)
		{
			$table->dropColumn('rookgaard');
		});
	}

}
