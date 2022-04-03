<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watching', function (Blueprint $table) {
            $table->id();
            $table->foreignId("client_id")->nullable()->constrained("users")->nullOnDelete();
            $table->foreignId("auction_id")->nullable()->constrained("auctions")->nullOnDelete();
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
        Schema::dropIfExists('watching');
    }
}
