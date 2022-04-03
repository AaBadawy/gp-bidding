<?php

namespace Database\Seeders;

use App\Entities\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["watches" => "03","jewelry" => "02",'camera' =>"04"];

        foreach ($categories as $key => $image) {
            Category::create(['name' => $key])->addMediaFromUrl(asset_website("images/auction/$image.png"))
                ->toMediaCollection("category");
        }
    }
}
