<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaCreatePandaacPlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Let us define all of the table columns that we want to use within
		// our new table, as well as set a foreign key for the id. 
		
		Schema::create('__pandaac_players', function($table)
		{
			$table->integer('player_id')->primary()->unsigned();
			$table->tinyInteger('hide_char')->default(0);
			$table->mediumText('comment')->nullable();
			$table->integer('posts')->default(0);

			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
		});


		// Once the table has been created, we want to create a trigger that inserts a 
		// relevant row into the newly created table every time a new player is created.

		Trigger::createOrAlter(__FILE__, 'INSERT', 'AFTER', 'players', function()
		{
			return 'INSERT INTO `__pandaac_players` (`player_id`) VALUES(NEW.`id`);';
		});


		// If any players already exists in the players table, we want to seed the
		// __pandaac_players table with their respective information.

		App::make('seeder')->call('pandaac\Avesta\Seeds\PlayerSeeder');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('__pandaac_players');

		Trigger::restoreOrDrop(__FILE__, 'INSERT', 'AFTER', 'players');
	}

}
