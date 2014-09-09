<?php namespace pandaac\Avesta;

class GuildRank extends \pandaac\Foundation\GuildRank {

	/**
	 * Override columns with their appropriate counterpart.
	 *
	 * @return array
	 */
	public function alias()
	{
		return array();
	}

	/**
	 * Get the members associated with a guild rank.
	 *
	 * @return \Player
	 */
	public function players()
	{
		return $this->hasMany('Player', 'rank_id');
	}
	
}