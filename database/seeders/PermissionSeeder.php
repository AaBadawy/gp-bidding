<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::firstOrCreate(['name' => 'index-vendor']);
        Permission::firstOrCreate(['name' => 'show-vendor']);
        Permission::firstOrCreate(['name' => 'create-vendor']);
        Permission::firstOrCreate(['name' => 'edit-vendor']);
        Permission::firstOrCreate(['name' => 'delete-vendor']);

        Permission::firstOrCreate(['name' => 'index-location']);
        Permission::firstOrCreate(['name' => 'show-location']);
        Permission::firstOrCreate(['name' => 'create-location']);
        Permission::firstOrCreate(['name' => 'edit-location']);
        Permission::firstOrCreate(['name' => 'delete-location']);

        Permission::firstOrCreate(['name' => 'index-category']);
        Permission::firstOrCreate(['name' => 'show-category']);
        Permission::firstOrCreate(['name' => 'create-category']);
        Permission::firstOrCreate(['name' => 'edit-category']);
        Permission::firstOrCreate(['name' => 'delete-category']);


        Permission::firstOrCreate(['name' => 'index-auction']);
        Permission::firstOrCreate(['name' => 'show-auction']);
        Permission::firstOrCreate(['name' => 'create-auction']);
        Permission::firstOrCreate(['name' => 'edit-auction']);
        Permission::firstOrCreate(['name' => 'delete-auction']);

        Permission::firstOrCreate(['name' => 'index-product']);
        Permission::firstOrCreate(['name' => 'show-product']);
        Permission::firstOrCreate(['name' => 'create-product']);
        Permission::firstOrCreate(['name' => 'edit-product']);
        Permission::firstOrCreate(['name' => 'delete-product']);


        Permission::firstOrCreate(['name' => 'index-order']);
        Permission::firstOrCreate(['name' => 'show-order']);
        Permission::firstOrCreate(['name' => 'create-order']);
        Permission::firstOrCreate(['name' => 'edit-order']);
        Permission::firstOrCreate(['name' => 'delete-order']);


        $admin_role = Role::where('name', '=','admin')->first()->givePermissionTo(Permission::all());
        $vendor_role = Role::where('name', '=','vendor')->first()->givePermissionTo(['index-location', 'index-order', 'show-order','index-product','show-product','create-product','edit-product','delete-product',
            'index-auction','show-auction','create-auction','index-category','show-category']);
        $client_role = Role::where('name', '=','client')->first()->givePermissionTo(['index-location', 'index-order', 'show-order','index-product','show-product',
            'index-auction','show-auction','index-category']);

    }
}
