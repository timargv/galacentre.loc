<?php

namespace App\Providers;

use App\Entity\Products\Category;
use App\Entity\Products\Product\Product;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */


    public function boot()
    {
        //
        view()->composer('admin.products.products.index', function($view){
            $view->with('countProducts', Product::all()->count());
        });

        view()->composer('admin.left._nav', function($view){
            $view->with('countProducts', Product::all()->count());
        });

        view()->composer('admin.left._nav', function($view){
            $view->with('countCategories', Category::all()->count());
        });

        view()->composer('products.index', function($view){
            $category = new Category();
            $view->with('countCategoryProducts', Product::where('category_id', $category->id)->count());
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }
}
