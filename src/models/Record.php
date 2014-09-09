<?php namespace pandaac\Avesta;

class Record extends \pandaac\Foundation\Record {

	/**
	 * Set the appropriate database table.
	 *
	 * @var string
	 */
	protected $table = 'server_record';

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
	 * Return the record amount of players online at one time.
	 *
	 * @return integer
	 */
	public function getRecord()
	{
		return (int) $this->first()->record;
	}

}