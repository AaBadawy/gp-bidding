<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           RoleSeeder::class,
           PermissionSeeder::class,
           UserSeeder::class,
//            VendorSeeder::class,
//            ProductSeeder::class,
            AuctionSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
