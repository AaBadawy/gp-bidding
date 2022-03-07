<?php

namespace App\Console\Commands;

use App\Entities\Auction;
use App\Entities\Order;
use App\Http\Controllers\OrdersController;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class CreateOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Order Where Auction End Date greater than now and has at least one bidding';

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
        /**
         * get
         */
        $finished_auctions = $this->auctionsWithoutOrder();

        foreach ($finished_auctions as $auction)
        {
            $order = Order::create(
                [
                    'client_id' => $auction->biddings->last()->client->id,
                    'auction_id' => $auction->id,
                    'total_price' => $auction->biddings->last()->amount_price
                ]
            );
//            event(new OrderCreated($order));
        }
    }

    /**
     * get All Orders Where Has At Least one Bid and doesnt have order Yey
     * @return Collection
     */
    private function auctionsWithoutOrder():Collection
    {
        return Auction::has('biddings')->doesntHave('order')->with(['biddings.client'])->whereDate('end_at', '<=', Carbon::now())->get();
    }
}
