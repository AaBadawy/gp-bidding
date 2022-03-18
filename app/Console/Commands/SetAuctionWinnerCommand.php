<?php

namespace App\Console\Commands;

use App\Entities\Auction;
use Illuminate\Console\Command;

class SetAuctionWinnerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set-winners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set the auction winners ';

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
        Auction::query()
            ->shouldBeAssignToWinner()
            ->cursor()
            ->each(fn(Auction $auction) => $auction->update(['winner_id' => $auction->lastBiding()->value("client_id")]));
    }
}
