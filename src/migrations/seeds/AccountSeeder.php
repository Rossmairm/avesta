<?php namespace pandaac\Avesta\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		list($accounts, $data) = array(\Account::all(), []);

		if ($accounts->count())
		{
			foreach ($accounts as $account)
			{
				$data[] = array('account_id' => $account->id);
			}

			DB::table('__pandaac_accounts')->insert($data);
		}
	}

}
