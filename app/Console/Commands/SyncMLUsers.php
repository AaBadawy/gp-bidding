<?php

namespace App\Console\Commands;

use App\Entities\Client;
use App\Entities\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class
SyncMLUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:users';

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
        $ml_products = collect(json_decode($data))->unique('userName')->values();

        foreach ($ml_products as $index => $product)
        {
            $client = Client::create();
                $client->user()->firstOrCreate(['ml_id' => $product->userId, 'ml_user_name' => $product->userName]
                ,
                [
                    'ml_id' => $product->userId,
                    'ml_user_name' => $product->userName,
                    'name' => $product->userName,
                    'email' => Str::remove(' ',$product->userName) . '@antique.com',
                    'password' => 'password',
                ]);
                $client->assignRole('client');
        }
    }
}
