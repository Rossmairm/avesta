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
		Schema::create('__pandaac_players', function($table)
		{
			$table->integer('player_id')->primary()->unsigned();
			$table->tinyInteger('hide_char')->default(0);
			$table->mediumText('comment')->nullable();
			$table->integer('posts')->default(0);

			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
		});

		Trigger::createOrAlter(__FILE__, 'INSERT', 'AFTER', 'players', 'INSERT INTO `__pandaac_players` (`player_id`) VALUES(NEW.`id`);');
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
