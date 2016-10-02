<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooditemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('food_items', function(Blueprint $table)
        {
            //$table->increments('id');
            $table->string('item_id',20);
            $table->string('item_name',255);
            $table->float('unit_price');
            $table->string('unit_type',255);
            $table->integer('available_quantity');
            $table->string('item_image_path',255);
            $table->integer('is_remove');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fooditems');
	}

}
