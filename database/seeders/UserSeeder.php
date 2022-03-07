<?php

namespace Database\Seeders;

use App\Entities\Admin;
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
        Admin::create()->user()->create([
            'name' => 'Ahmed Badawy',
            'email' => 'admin@antique.com',
            'password' => 'password',
        ]);
        $admin = Admin::first()->assignRole('admin');
    }
}
