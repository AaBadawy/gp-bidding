<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAuctionsTable.
 */
class CreateAuctionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auctions', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->float('start_price', 8,2);
            $table->enum('biding_type', ['free', 'step']);
            $table->float('bidding_price',8,2)->nullable();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->foreignId('vendor_id')->nullable()->constrained('vendors','id')->nullOnDelete();
            $table->enum('status', ['pending','ready','suspend','partial_pending', 'started', 'finished'])->default('ready');
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
		Schema::drop('auctions');
	}
}
