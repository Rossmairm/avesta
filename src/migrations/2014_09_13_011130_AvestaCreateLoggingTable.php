<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaCreateLoggingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('__pandaac_logging', function($table)
		{
			$table->increments('id');
			$table->string('type')->nullable();
			$table->string('type_id')->nullable();
			$table->string('reference_type')->nullable();
			$table->integer('reference_id')->nullable();
			$table->string('message')->nullable();
			$table->mediumText('data')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('__pandaac_logging');
	}

}
