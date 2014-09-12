<?php namespace pandaac\Avesta\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\DB;

class GuildSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		list($guilds, $data) = array(\Guild::all(), []);

		if ($guilds->count())
		{
			foreach ($guilds as $guild)
			{
				$data[] = array('guild_id' => $guild->id);
			}

			DB::table('__pandaac_guilds')->insert($data);
		}
	}

}
