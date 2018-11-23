<?php

use App\Entity\Products\Product\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run(Product $queryProd)
    {
        //
        //
//        $json = file_get_contents('http://www.galacentre.ru/api/v2/catalog/json/?key=d27b9aa09102f001d6f6f5c5fc97d222');
//        $json = file_get_contents('http://www.galacentre.ru/api/v2/catalog/json/?key=d27b9aa09102f001d6f6f5c5fc97d222&store=msk');
//        $data =  array_merge((array) json_decode($json));
//        $products = $data['DATA'];

//        $query = Product::all();
//        $reqdata = Product::all();
//
//
//
//        $this->command->getOutput()->progressStart(count($products));
//
//        foreach ($products as $item) {
//
////            $result = $reqdata->where('galaId', $item->id)->where('date_update', $item->date_update);
//            $result = $reqdata->whereIn('date_update', $item->date_update, 'article', $item->articul);
//
//            if (count($result) == null) {
//
//
//                if (!empty( $value = $reqdata->where('article', $item->articul) )) {
//
//                    Product::create(
//                        [
//                            'galaId' =>             $item->id,
//                            'status' =>             $item->active,
//                            'date_update' =>        $item->date_update,
//                            'article' =>            $item->articul,
//                            'name_original' =>      $item->name,
//                            'full_description' =>   $item->about,
//                            'image' =>              $item->image,
//                            'category_id' =>        $item->section,
//                            'price_base' =>         $item->price_base,
//                            'price_old' =>          $item->price_old,
//                            'price_sp' =>           $item->price_sp,
//                            'min' =>                $item->min,
//                            'box' =>                $item->box,
//                            'fix' =>                $item->fix,
//                            'new' =>                $item->new,
//                            'hit' =>                $item->hit,
//                            'store_ekb' =>          $item->store_ekb,
//                            'store_msk' =>          $item->store_msk,
//                            'store_nsk' =>          $item->store_nsk,
//                            'way' =>                $item->way,
//                            'barcode' =>            $item->barcode,
////                        'props' =>              $item->props,
////                        'specifications' =>     $item->specifications,
////                        'includes' =>           $item->includes,
//                        ]
//                    );
//                }
//            }
//
////            else {
////                $this->command->comment(" \n Новых товаров нет"  , 'red');
////            }
//
//            $this->command->getOutput()->progressAdvance();
//
//        }
//
//        $this->command->getOutput()->progressFinish();

//        foreach ($products as $item) {
//
//                Product::create(
//                    [
//                        'galaId' =>             $item->id,
//                        'status' =>             $item->active,
//                        'date_update' =>        $item->date_update,
//                        'article' =>            $item->articul,
//                        'name_original' =>      $item->name,
//                        'full_description' =>   $item->about,
//                        'image' =>              $item->image,
//                        'category_id' =>        $item->section,
//                        'price_base' =>         $item->price_base,
//                        'price_old' =>          $item->price_old,
//                        'price_sp' =>           $item->price_sp,
//                        'min' =>                $item->min,
//                        'box' =>                $item->box,
//                        'fix' =>                $item->fix,
//                        'new' =>                $item->new,
//                        'hit' =>                $item->hit,
//                        'store_ekb' =>          $item->store_ekb,
//                        'store_msk' =>          $item->store_msk,
//                        'store_nsk' =>          $item->store_nsk,
//                        'way' =>                $item->way,
//                        'barcode' =>            $item->barcode,
////                        'props' =>              $item->props,
////                        'specifications' =>     $item->specifications,
////                        'includes' =>           $item->includes,
//                    ]
//                );
//
//        }


       // $json = file_get_contents('http://www.galacentre.ru/api/v2/catalog/json/?key=d27b9aa09102f001d6f6f5c5fc97d222&section=7494&store=msk');
        $json = file_get_contents('http://www.galacentre.ru/api/v2/catalog/json/?key=d27b9aa09102f001d6f6f5c5fc97d222&store=msk');
        $data =  array_merge((array) json_decode($json));
        $products = $data['DATA'];

        $countProdUpdate = 0;
        $countProdCreate = 0;
        $i = 0;

        $this->command->getOutput()->progressStart(count($products));
//->where('date_update', $product->date_update)
        foreach ($products as $product) {
            $prodQ = $queryProd->where('article', '=', $product->articul)->first();


            if ( $prodQ != false ) {
//                echo    '<li>' .$product->id . ' - ' . $product->articul. ' - ' . $product->date_update;
                $countProd = $queryProd->where('article', $product->articul)->where('date_update', '!=', $product->date_update)->first();
                if ($countProd != false) {
                    $queryProd->where('article', $product->articul)->where('date_update', '!=', $product->date_update)->update([
                        'date_update' =>        $product->date_update,
                        'price_base' =>         $product->price_base,
                        'price_old' =>          $product->price_old,
                        'price_sp' =>           $product->price_sp,
                        'min' =>                $product->min,
                        'box' =>                $product->box,
                        'fix' =>                $product->fix,
                        'new' =>                $product->new,
                        'hit' =>                $product->hit,
                        'store_ekb' =>          $product->store_ekb,
                        'store_msk' =>          $product->store_msk,
                        'store_nsk' =>          $product->store_nsk,
                    ]);

                    $countProdUpdate++;
                }


            } elseif ( $prodQ == false ) {

                $product_data =  array_merge((array) $product);

                if (!empty($product_data{'props'})) {
                    $props = $product->props;
                } else {
                    $props = [];
                }

                if (!empty($product_data{'includes'})) {
                    $includes = $product->includes;
                } else {
                    $includes = [];
                }

                if (!empty($product_data{'specifications'})) {
                    $specifications = $product->specifications;
                } else {
                    $specifications = [];
                }

                if (!empty($product_data{'sert'})) {
                    $sert = $product->sert;
                } else {
                    $sert = [];
                }

                if (!empty($product_data{'images'})) {
                    $images = $product->images;
                } else {
                    $images = [];
                }

                Product::create(
                    [
                        'galaId' =>             $product->id,
                        'status' =>             $product->active,
                        'date_update' =>        $product->date_update,
                        'article' =>            $product->articul,
                        'name_original' =>      $product->name,
                        'full_description' =>   $product->about,
                        'image' =>              $product->image,
                        'images' =>             $images,
                        'category_id' =>        $product->section,
                        'price_base' =>         $product->price_base,
                        'price_old' =>          $product->price_old,
                        'price_sp' =>           $product->price_sp,
                        'min' =>                $product->min,
                        'box' =>                $product->box,
                        'fix' =>                $product->fix,
                        'new' =>                $product->new,
                        'hit' =>                $product->hit,
                        'store_ekb' =>          $product->store_ekb,
                        'store_msk' =>          $product->store_msk,
                        'store_nsk' =>          $product->store_nsk,
                        'way' =>                $product->way,
                        'barcode' =>            $product->barcode,
                        'slug' =>               str_slug($product->name),
                        'sert' =>               $sert,
                        'props' =>              $props,
                        'specifications' =>     $specifications,
                        'includes' =>           $includes,
                    ]
                );

                $countProdCreate++;

            }

            $this->command->getOutput()->progressAdvance();

        }


        $this->command->getOutput()->progressFinish();

        if ($countProdUpdate) {
            $this->command->comment("Обновлено $countProdUpdate");
            $this->command->comment("Добавлено $countProdCreate");
        }

        if ($countProdUpdate == 0) {
            $this->command->comment("Обновлено $countProdUpdate");
            $this->command->comment("Добавлено $countProdCreate");
        }
        $this->command->comment(date('Y-m-d H:i:s'));



        $this->call(ProductUpdateTableSeeder::class);
        $this->call(ProductUpdatePlusTableSeeder::class);

    }
}
