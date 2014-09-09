<?php namespace pandaac\Avesta;

class HighScore extends \pandaac\Foundation\HighScore {

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
	 * Create a scope to sort by skill.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder $query
	 * @param  string $skill
	 * @return \Illuminate\Database\Query\Builder
	 */
	public function scopeSkill(\Illuminate\Database\Eloquent\Builder $query, $skill)
	{
		$skillset = $this->getSkillset();
		if ( ! array_key_exists($skill, $skillset))
		{
			return false;
		}

		return $query
			->whereHas('skills', function($query) use($skillset, $skill)
			{
				$query->whereSkillid($skillset[$skill]);
			})
			->join('player_skills AS s', 's.player_id', '=', 'players.id')
			->where('s.skillid', '=', $skillset[$skill])
			->orderBy('s.value', 'DESC')
			->orderBy('s.count', 'DESC')
			->orderBy('players.name', 'ASC')
			->groupBy('players.id');
	}

	/**
	 * Get the skills associated with the current player.
	 *
	 * @return \PlayerSkill
	 */
	public function skills()
	{
		return $this->hasMany('PlayerSkill', 'player_id');
	}

}