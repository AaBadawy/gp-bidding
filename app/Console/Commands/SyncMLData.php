<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SyncMLData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:ml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Ml Data At one Command Line';

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
        Artisan::call('sync:users');
        Artisan::call('sync:products');
        Artisan::call('fetch:recommendation');
    }
}
