<?php

namespace Database\Seeders;

use App\Entities\Admin;
use App\Entities\Vendor;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(100)->create();
        $user = User::factory()->create([
            'type'  => 'admin',
            'email' => 'admin@gp.com',
        ]);
        $user->assignRole('admin');

        User::factory()->create(['email' => 'vendor@gp.com','type' => 'vendor','vendor_id' => Vendor::factory()]);

        User::factory()->create(['email' => 'client@gp.com','type' => 'client']);

    }
}
