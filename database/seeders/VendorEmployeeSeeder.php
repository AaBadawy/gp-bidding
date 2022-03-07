<?php

namespace Database\Seeders;

use App\Entities\VendorEmployee;
use Illuminate\Database\Seeder;

class VendorEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VendorEmployee::factory(10)->create();
    }
}
