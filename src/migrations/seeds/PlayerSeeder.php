<?php namespace pandaac\Avesta\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		list($players, $data) = array(\Player::all(), []);

		if ($players->count())
		{
			foreach ($players as $player)
			{
				$data[] = array('player_id' => $player->id);
			}

			DB::table('__pandaac_players')->insert($data);
		}
	}

}
