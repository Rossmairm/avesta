<?php namespace pandaac\Avesta;

class Guild extends \pandaac\Foundation\Guild {

	/**
	 * Override columns with their appropriate counterpart.
	 *
	 * @return array
	 */
	public function alias()
	{
		return array(
			'owner'			 => 'ownerid',
			'creation'		 => 'creationdata',
			'description'	 => 'pandaac.motd',
		);
	}

	/**
	 * Get the ranks associated with a guild.
	 *
	 * @return \GuildRank
	 */
	public function ranks()
	{
		return $this->hasMany('GuildRank')->with('players');
	}

	/**
	 * Get the guild rank associated with the current guild membership.
	 *
	 * @return \GuildRank
	 */
	public function rank()
	{
		return $this->hasOne('GuildRank', 'id', 'guild_rank_id');
	}

	/**
	 * Get all of the players associated with the current guild.
	 *
	 * @return \Player
	 */
	public function players()
	{
		return $this->hasManyThrough('Player', 'GuildRank', 'guild_id', 'rank_id');
	}

	/**
	 * Get the invitees associated with a guild.
	 *
	 * @return \Player
	 */
	public function invitees()
	{
		return $this->belongsToMany('Player', '__pandaac_guild_invites', 'guild_id', 'player_id');
	}

	/**
	 * Promote a specific player to a specified rank of the current
	 * guild.
	 *
	 * @param  \GuildRank $rank
	 * @param  \Player $player
	 * @return void
	 */
	public function promote(\GuildRank $rank, \Player $player)
	{
		$player->rank_id = $rank->id;

		$player->save();
	}

	/**
	 * Make a specific player join the current guild.
	 *
	 * @param  \Player $player
	 * @return void
	 */
	public function join(\Player $player)
	{
		$player = $this->getPlayer($player);

		$rank = $this->ranks()->whereLevel(1)->first();

		$player->rank_id = $rank->id;

		$player->save();
	}

	/**
	 * Make a specific player leave the current guild.
	 *
	 * @param  \Player $player
	 * @return void
	 */
	public function leave(\Player $player)
	{
		$player->rank_id = 0;

		$player->save();
	}

	/**
	 * Disband the current guild.
	 *
	 * @return void
	 */
	public function disband()
	{
		$players = $this->players()->update([
			'guildnick'	 => null,
			'rank_id'	 => null,
		]);

		$this->delete();
	}

}