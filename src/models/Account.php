<?php namespace pandaac\Avesta;

class Account extends \pandaac\Foundation\Account {

	/**
	 * Override columns with their appropriate counterpart.
	 *
	 * @return array
	 */
	public function alias()
	{
		return array(
			'account'	 => 'id',
			'premium'	 => 'premend',
			'creation'	 => false,
		);
	}

	/**
	 * Add X premium days to the account.
	 * 
	 * @return void
	 */
	public function addPremiumDays($days)
	{
		$this->premium = (int) round(time() + ($days * 60 * 60 * 24));
	}

	/**
	 * Retrieve the amount of premium days the current account has.
	 * 
	 * @return integer
	 */
	public function getPremiumDays()
	{
		$expires = $this->premium;
		if ($expires <= time())
		{
			return 0;
		}

		return (int) round(($expires - time()) / 24 / 60 / 60);
	}

	/**
	 * Check if the current account has been invited to a specific guild.
	 *
	 * @param  Guild $guild 
	 * @param  Player $player false
	 * @return array|boolean
	 */
	public function hasGuildInvite(\Guild $guild, $player = false)
	{
		$playerIds = array_fetch($this->players->toArray(), 'id');
		if ($player and ($player instanceof \Player))
		{
			$playerIds = [$player->id];
		}

		$players = \DB::table('__pandaac_guild_invites')->select('guild_id', 'player_id')
			->whereGuildId($guild->id)->whereIn('player_id', $playerIds)->get();

		if (empty($players))
		{
			return false;
		}

		return (array) $players;
	}

}