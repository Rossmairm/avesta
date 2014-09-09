<?php namespace pandaac\Avesta;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AvestaServiceProvider extends ServiceProvider {

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
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$loader = AliasLoader::getInstance();

		$loader->alias('Account',			__NAMESPACE__.'\Account');
		$loader->alias('Forum',				__NAMESPACE__.'\Forum');
		$loader->alias('ForumPost',			__NAMESPACE__.'\ForumPost');
		$loader->alias('Guild',				__NAMESPACE__.'\Guild');
		$loader->alias('GuildRank',			__NAMESPACE__.'\GuildRank');
		$loader->alias('HighScore',			__NAMESPACE__.'\HighScore');
		$loader->alias('Player',			__NAMESPACE__.'\Player');
		$loader->alias('PlayerSkill',		__NAMESPACE__.'\PlayerSkill');
		$loader->alias('Record',			__NAMESPACE__.'\Record');
		$loader->alias('ShopItem',			__NAMESPACE__.'\ShopItem');
		$loader->alias('ShopProduct',		__NAMESPACE__.'\ShopProduct');
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
