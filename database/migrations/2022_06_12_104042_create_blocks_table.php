<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBlocksTable.
 */
class CreateBlocksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blocks', function(Blueprint $table) {
            $table->id('id');
            $table->string('reason')->nullable();
            $table->foreignId('vendor_id')->nullable()->constrained('vendors')->nullOnDelete();
            $table->foreignId('blocked_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('blocked_by')->nullable()->constrained('users')->nullOnDelete();

            $table->unique(['vendor_id','blocked_id']);

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
		Schema::drop('blocks');
	}
}
