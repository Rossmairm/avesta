<?php namespace pandaac\Avesta;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
	 * Save the model to the database.
	 *
	 * @param  array  $options
	 * @return bool
	 */
	public function save(array $options = array())
	{
		// If this is the first time we save a player (i.e. upon creation), we want to assign
		// the lowest ranked group to them.

		if ( ! isset($this->group_id) and Schema::hasTable('groups'))
		{
			$this->group_id = DB::table('groups')->select('id')->orderBy('access', 'ASC')->take(1)->first()->id;
		}


		parent::save($options);
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
	public function scopeGuilds(\Illuminate\Database\Eloquent\Builder $query, Guild $guild)
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