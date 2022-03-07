<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAuctionRatingsTable.
 */
class CreateAuctionRatingsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auction_ratings', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('auction_id')->nullable()->constrained('auctions', 'id')->nullOnDelete();
            $table->foreignId('product_id')->nullable()->constrained('products', 'id')->nullOnDelete();
            $table->foreignId('vendor_id')->nullable()->constrained('vendors', 'id')->nullOnDelete();
            $table->foreignId('client_id')->nullable()->constrained('clients', 'id')->nullOnDelete();
            $table->string('product_title');
            $table->text('description')->nullable();
            $table->integer('rating_stars');
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
		Schema::drop('auction_ratings');
	}
}
