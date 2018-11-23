<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
 

Route::get('/', 'HomeController@index')->name('home');
Route::get('/categories/{category}', 'HomeController@show')->name('categories.show');
Route::get('/products/{product}', 'HomeController@showProduct')->name('product.show');
Route::get('/search', 'HomeController@search')->name('product.search');





Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

Route::get('/cabinet', 'Cabinet\HomeController@index')->name('cabinet');


Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['auth', 'can:admin-panel'],
    ],

    function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::resource('/users', 'UsersController');
        Route::post('/users/{user}/verify', 'UsersController@verify')->name('users.verify');


        Route::group(['prefix' => 'products', 'as' => 'products.', 'namespace' => 'Products'], function () {

            Route::resource('categories', 'CategoriesController');

            Route::group(['prefix' => 'categories/{category}', 'as' => 'categories.'], function () {
                Route::post('/first', 'CategoriesController@first')->name('first');
                Route::post('/up', 'CategoriesController@up')->name('up');
                Route::post('/down', 'CategoriesController@down')->name('down');
                Route::post('/last', 'CategoriesController@last')->name('last');
            });

            Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
                Route::get('/', 'ProductsController@index')->name('index');
                Route::get('/{product}', 'ProductsController@show')->name('show');
                Route::get('/{product}/edit', 'ProductsController@editForm')->name('edit');
                Route::put('/{product}/edit', 'ProductsController@edit');
                Route::get('/{product}/photos', 'ProductsController@photosForm')->name('photos');
                Route::post('/{product}/photos', 'ProductsController@photos');
                Route::delete('/{product}/destroy', 'ProductsController@destroy')->name('destroy');
            });


        });




    }

);
