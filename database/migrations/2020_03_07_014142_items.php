<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Items extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::create('items', function (Blueprint $table) {
			$table->increments('id')->unique();
			$table->string('item_name', 200);
			$table->string('item_description', 200);
			$table->string('price');
			$table->string('stock');
			$table->timestamps();
			$table->softDeletes();
		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
	Schema::dropIfExists('items');
		//
	}
}
