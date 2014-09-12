<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvestaCreatePandaacShopItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('__pandaac_shop_items', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->string('title', 50);
			$table->string('type', 20)->default('item');
			$table->integer('type_id')->default(0);
			$table->integer('type_count')->default(1);
			$table->integer('disabled')->default(0);
			$table->integer('order')->default(1);

			$table->foreign('product_id')->references('id')->on('__pandaac_shop')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('__pandaac_shop_items');
	}

}
