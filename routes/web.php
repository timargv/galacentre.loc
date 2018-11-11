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


Route::get('/', 'HomeController@index')->name('home');

//Route::get('/', function (){
//    $json = file_get_contents('http://www.galacentre.ru/api/v2/sections/json/?key=d27b9aa09102f001d6f6f5c5fc97d222');
//    $data =  (array)json_decode($json);
//    $catalogs = $data['DATA'];
//    $categoriesDate = $data['META'];
//
//    $query = \App\Entity\Products\Category::all('id');
//
//    $categories = [];
//
//    foreach ($catalogs as $key => $item) {
//
//        if (!empty($value = $item->id)) {
//            $query->where('id', $value);
//            dd(count($query));
//
//        }
//    }
//
//
//
//});

Auth::routes();

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

//            Route::group(['prefix' => 'categories/{category}', 'as' => 'categories.'], function () {
//                Route::post('/first', 'CategoryController@first')->name('first');
//                Route::post('/up', 'CategoryController@up')->name('up');
//                Route::post('/down', 'CategoryController@down')->name('down');
//                Route::post('/last', 'CategoryController@last')->name('last');
//                Route::resource('attributes', 'AttributeController')->except('index');
//            });


        });


    }

);
