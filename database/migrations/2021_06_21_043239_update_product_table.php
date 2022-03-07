<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table){
           $table->foreignId('vendor_id')->after('price')->constrained('vendors', 'id')->cascadeOnDelete();
           $table->foreignId('auction_id')->nullable()->after('vendor_id')->constrained('auctions', 'id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table){
            $table->dropForeign('vendor_id');
            $table->dropForeign('auction_id');
        });
    }
}
