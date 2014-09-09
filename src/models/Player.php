<?php namespace pandaac\Avesta;

class Player extends \pandaac\Foundation\Player {

	/**
	 * Override columns with their appropriate counterpart.
	 *
	 * @return array
	 */
	public function alias()
	{
		return array(
			'nick'	 => 'guildnick',
		);
	}

	/**
	 * Get the Guild associated with the current player.
	 *
	 * @return \Guild
	 */
	public function guild()
	{
		return $this->hasOneThrough('Guild', 'GuildRank', 'rank_id', 'id', 'guild_id', 'id');
	}

	/**
	 * Set the guild nick for the current player.
	 *
	 * @param  string $nick
	 * @return void
	 */
	public function nick($nick)
	{
		$this->nick = $nick;
		
		$this->save();
	}

	/**
	 * Create a scope for all players that belong to a specific guild.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder $query
	 * @param  \Guild $guild
	 * @return \Illuminate\Database\Query\Builder
	 */
	public function scopeGuild(\Illuminate\Database\Eloquent\Builder $query, Guild $guild)
	{
		return $query->whereHas('guild', function($table) use($guild)
		{
			$table->whereGuildId($guild->id);
		});
	}

	/**
	 * Create a scope for all online characters.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Query\Builder
	 */
	public function scopeOnline(\Illuminate\Database\Eloquent\Builder $query)
	{
		return $query->whereStatus(1);
	}

	/**
	 * Get the online status associated with the current player.
	 *
	 * @return boolean
	 */
	public function isOnline()
	{
		return (boolean) $this->status;
	}

	/**
	 * Remove the current player as an invitee (to all, or a specific guild).
	 *
	 * @param  boolean $guild false
	 * @return void|boolean
	 */
	public function clearInvites($guild = false)
	{
		$invitee = \DB::table('__pandaac_guild_invites')->wherePlayerId($this->id);
		if ($guild)
		{
			$invitee = $invitee->whereGuildId($guild);
		}
		$invitee->delete();
	}
}