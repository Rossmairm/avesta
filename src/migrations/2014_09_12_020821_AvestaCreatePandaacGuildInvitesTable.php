<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaCreatePandaacGuildInvitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('__pandaac_guild_invites', function($table)
		{
			$table->integer('player_id')->unsigned();
			$table->integer('guild_id')->unsigned();

			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('guild_id')->references('id')->on('guilds')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('__pandaac_guild_invites');
	}

}
