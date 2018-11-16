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
Route::get('/categories/{category}', 'HomeController@show')->name('categories.show');


//use App\Entity\Products\Product\Product;
//
//Route::get('/', function (){
//
//
//
//    $json = file_get_contents('http://www.galacentre.ru/api/v2/catalog/json/?key=d27b9aa09102f001d6f6f5c5fc97d222&section=7494&store=msk');
//    $data =  array_merge((array) json_decode($json));
//    $products = $data['DATA'];
//
//    $this->command->getOutput()->progressStart(count($catalogs));
//
//    foreach ($products as $product) {
//        $query = Product::where('article', $product->articul)->where('date_update', $product->date_update)->first();
//
//        if ($query != null) {
////                echo    '<li>' .$product->id . ' - ' . $product->articul. ' - ' . $product->date_update;
//            Product::where('article', $product->articul)->update([
//                'date_update' =>        $product->date_update,
//                'price_base' =>         $product->price_base,
//                'price_old' =>          $product->price_old,
//                'price_sp' =>           $product->price_sp,
//                'min' =>                $product->min,
//                'box' =>                $product->box,
//                'fix' =>                $product->fix,
//                'new' =>                $product->new,
//                'hit' =>                $product->hit,
//                'store_ekb' =>          $product->store_ekb,
//                'store_msk' =>          $product->store_msk,
//                'store_nsk' =>          $product->store_nsk,
//            ]);
//
//        } else {
//            Product::create(
//                [
//                    'galaId' =>             $product->id,
//                    'status' =>             $product->active,
//                    'date_update' =>        $product->date_update,
//                    'article' =>            $product->articul,
//                    'name_original' =>      $product->name,
//                    'full_description' =>   $product->about,
//                    'image' =>              $product->image,
//                    'category_id' =>        $product->section,
//                    'price_base' =>         $product->price_base,
//                    'price_old' =>          $product->price_old,
//                    'price_sp' =>           $product->price_sp,
//                    'min' =>                $product->min,
//                    'box' =>                $product->box,
//                    'fix' =>                $product->fix,
//                    'new' =>                $product->new,
//                    'hit' =>                $product->hit,
//                    'store_ekb' =>          $product->store_ekb,
//                    'store_msk' =>          $product->store_msk,
//                    'store_nsk' =>          $product->store_nsk,
//                    'way' =>                $product->way,
//                    'barcode' =>            $product->barcode,
////                        'props' =>              $item->props,
////                        'specifications' =>     $item->specifications,
////                        'includes' =>           $item->includes,
//                ]
//            );
//
//        }
//
//
//    }
//
//
//
//
//
//});
//
//    foreach ($products as $item) {
//
////        $result = $query->where('date_update', $item->date_update);
//        $result = $query->where('date_update', 'like', '%' . $item->date_update . '%');
//
//        $results = $result;

//        if ($result == null) {
//            echo 'test';
////            Product::create(
////                [
////                    'galaId' =>             $item->id,
////                    'status' =>             $item->active,
////                    'date_update' =>        $item->date_update,
////                    'article' =>            $item->articul,
////                    'name_original' =>      $item->name,
////                    'image' =>              $item->image,
////                    'full_description' =>   $item->about,
////                    'category_id' =>        $item->section,
////                    'price_base' =>         $item->price_base,
////                    'price_old' =>          $item->price_old,
////                    'price_sp' =>           $item->price_sp,
////                    'min' =>                $item->min,
////                    'box' =>                $item->box,
////                    'fix' =>                $item->fix,
////                    'new' =>                $item->new,
////                    'hit' =>                $item->hit,
////                    'store_ekb' =>          $item->store_ekb,
////                    'store_msk' =>          $item->store_msk,
////                    'store_nsk' =>          $item->store_nsk,
////                ]
////            );
//        }
//
//    }


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
