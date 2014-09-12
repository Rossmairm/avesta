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
		// Let us define all of the table columns that we want to use within
		// our new table, as well as set a foreign key for the id. 
		
		Schema::create('__pandaac_guilds', function($table)
		{
			$table->integer('guild_id')->primary()->unsigned();
			$table->string('motd')->nullable();
			$table->string('logo')->nullable();

			$table->foreign('guild_id')->references('id')->on('guilds')->onDelete('cascade');
		});
		

		// Once the table has been created, we want to create a trigger that inserts a 
		// relevant row into the newly created table every time a new guild is created.

		Trigger::createOrAlter(__FILE__, 'INSERT', 'AFTER', 'guilds', function()
		{
			return 'INSERT INTO `__pandaac_guilds` (`guild_id`) VALUES(NEW.`id`);';
		});


		// If any guilds already exists in the guilds table, we want to seed the
		// __pandaac_guilds table with their respective information.

		App::make('seeder')->call('pandaac\Avesta\Seeds\GuildSeeder');
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
