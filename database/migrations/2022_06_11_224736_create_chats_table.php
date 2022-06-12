<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;


/**
 * Class CreateChatsTable.
 */
class CreateChatsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chats', function(Blueprint $table) {
            $table->id('id');
            $table->longText("body");
            $table->foreignId("from_id")->nullable()->constrained('users','id')->nullOnDelete();
            $table->foreignId("to_id")->nullable()->constrained('users','id')->nullOnDelete();
            $table->foreignId("auction_id")->nullable()->constrained('users','id')->nullOnDelete();
            $table->timestamp("sent_at")->nullable();
            $table->timestamp("read_at")->nullable();
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
		Schema::drop('chats');
	}
}
