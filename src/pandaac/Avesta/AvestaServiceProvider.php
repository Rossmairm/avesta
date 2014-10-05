<?php namespace pandaac\Avesta;

class AvestaServiceProvider extends \pandaac\Bamboo\pandaacServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('pandaac/avesta', 'distro');
		
		require_once __DIR__.'/../../events.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		static::alias(array(
			'pandaac\Avesta\Account',
			'pandaac\Avesta\Forum',
			'pandaac\Avesta\ForumPost',
			'pandaac\Avesta\Guild',
			'pandaac\Avesta\GuildRank',
			'pandaac\Avesta\HighScore',
			'pandaac\Avesta\Player',
			'pandaac\Avesta\PlayerSkill',
			'pandaac\Avesta\PlayerDepotItem',
			'pandaac\Avesta\PlayerDeath',
			'pandaac\Avesta\Record',
			'pandaac\Avesta\StoreItem',
			'pandaac\Avesta\StoreProduct',
		));
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
