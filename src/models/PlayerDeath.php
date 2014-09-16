<?php namespace pandaac\Avesta;

class PlayerDeath extends \pandaac\Foundation\PlayerDeath {

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
	 * Get the Player object associated with the last hit killer.
	 *
	 * @return \Player
	 */
	public function killer()
	{
		return $this->belongsTo('Player', 'lasthit_killer', 'name');
	}

	/**
	 * Get the Player object associated with the most damage killer.
	 *
	 * @return \Player
	 */
	public function accomplice()
	{
		return $this->belongsTo('Player', 'mostdamage_killer', 'name');
	}

	/**
	 * Check whether there is only one killer or not.
	 *
	 * @return boolean
	 */
	public function isSingular()
	{
		if (is_null($this->killer) and is_null($this->accomplice))
		{
			return ($this->lasthit_killer == $this->mostdamage_killer);
		}

		return ($this->killer == $this->accomplice);
	}

	/**
	 * Return an array of all the available attributes for language files.
	 *
	 * @return array
	 */
	public function attributes()
	{
		return array(
			'time'		 => $this->time,
			'level'		 => $this->level,
			'killer'	 => $this->format($this->killer, $this->lasthit_killer),
			'accomplice' => $this->format($this->accomplice, $this->mostdamage_killer),
		);
	}

}