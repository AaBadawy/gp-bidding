<?php

namespace Database\Seeders;

use App\Entities\Auction;
use Illuminate\Database\Seeder;

class AuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Auction::factory(100)->create();
        Auction::factory(100)
            ->hasProducts(5)
//            ->running()
            ->create();
    }
}
