<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateQuestionsTable.
 */
return new class  extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("answer")->nullable();
            $table->foreignId("asked_by")->nullable()->constrained('users','id')->nullOnDelete();
            $table->foreignId("auction_id")->nullable()->constrained('auctions')->nullOnDelete();
            $table->timestamp("answered_at")->nullable();
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
		Schema::drop('questions');
	}
};
