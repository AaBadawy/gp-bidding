<?php

namespace App\Console\Commands;

use App\Entities\Auction;
use App\Entities\Client;
use App\Entities\Product;
use App\Entities\Vendor;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SyncMLProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Products to data from Ml';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = File::get(base_path('arts_craftss.json'));
        $ml_products = collect(json_decode($data))->unique('asin')->values();

        foreach ($ml_products as $index => $product)
        {
            Product::firstOrCreate(['ml_title' => $product->title, 'ml_id' => $product->asin],
                [
                    'ml_id' => $product->asin,
                    'ml_title' => $product->title,
                    'name' => $product->title,
                    'price' => random_int(10,10000),
                    'vendor_id' => Vendor::inRandomOrder()->limit(1)->first()->id,
                    'auction_id' => Auction::inRandomOrder()->limit(1)->first()->id,
                    'description' => $product->title
                ]
            );
        }
    }

}
