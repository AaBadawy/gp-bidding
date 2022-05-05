<?php

namespace App\Providers;

use App\Entities\Category;
use App\Entities\Location;
use App\Entities\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::requireMorphMap();

        Relation::enforceMorphMap([
            'product'   => Product::class,
            'location'  => Location::class,
            'user'      => User::class,
            'category'  => Category::class,
        ]);
    }
}
