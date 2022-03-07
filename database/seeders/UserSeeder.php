<?php

namespace Database\Seeders;

use App\Entities\Admin;
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
        User::factory(100)->create();
        User::first()->update([
            'type'  => 'admin',
            'email' => 'badawy@gp.com',
        ]);
    }
}
