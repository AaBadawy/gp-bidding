<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAucctionProductsTable.
 */
class CreateAuctionProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auction_products', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('product_id')->nullable()->constrained('products','id')->nullOnDelete();
            $table->foreignId('auction_id')->nullable()->constrained('auctions','id')->nullOnDelete();
            $table->unique(['product_id', 'auction_id']); // todo remove it and make validation check if this product belongs to other auction
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
		Schema::drop('aucction_products');
	}
}
