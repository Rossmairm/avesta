<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaCreatePandaacGuildsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('__pandaac_guilds', function($table)
		{
			$table->integer('guild_id')->primary()->unsigned();
			$table->string('motd')->nullable();
			$table->string('logo')->nullable();

			$table->foreign('guild_id')->references('id')->on('guilds')->onDelete('cascade');
		});
		
		Trigger::createOrAlter(__FILE__, 'INSERT', 'AFTER', 'guilds', 'INSERT INTO `__pandaac_guilds` (`guild_id`) VALUES(NEW.`id`);');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('__pandaac_guilds');

		Trigger::restoreOrDrop(__FILE__, 'INSERT', 'AFTER', 'guilds');
	}

}
