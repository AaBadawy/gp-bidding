<?php

namespace App\Console\Commands;

use App\Entities\AuctionRating;
use App\Entities\Product;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SyncRecommendData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:recommendation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $ml_products = collect(json_decode($data))->each(function ($value,$key){
            $product = Product::with(['auction'])->where('ml_id', $value->asin)->first();
            $rate = new AuctionRating();
            $rate->client_id = User::where('ml_id', '=', $value->userId)->first()->userable->id;
            $rate->auction_id = $product->auction->id;
            $rate->product_id = $product->id;
            $rate->product_title  = $product->title;
            $rate->rating_stars  = $value->rating;
        });

        return 0;
    }
}
