<?php

namespace App\Http\Controllers;


use App\Entity\Products\Category;
use App\Entity\Products\Product\Product;
use DB;

class HomeController extends Controller
{

    public $results;

    public function index(Category $category)
    {
        $categories = Category::where('status', '=', 'Y')->whereIsRoot()->defaultOrder()->getModels();
//        $json = file_get_contents('http://www.galacentre.ru/api/v2/catalog/json/?key=d27b9aa09102f001d6f6f5c5fc97d222&section=1960&store=msk');
//        $data =  array_merge((array) json_decode($json));
//        $products = $data['DATA'];
//
//        $reqdata = Product::all();
//
//        foreach ($products as $item) {
//
////            $result = $reqdata->where('galaId', $item->id)->where('date_update', $item->date_update);
//            $result = $reqdata->whereIn('date_update', $item->date_update);
//
//            if (count($result)) {
//                dd($result);
//            } else {
//                echo 'ss';
//            }
//
//
//        }
        return view('home', compact('categories'));
    }

    public function show(Category $category, Product $product)
    {
        $query = $category ? $category->children()->where('status', '=', 'Y') : Category::whereIsRoot();
        $categories = $query->defaultOrder()->getModels();
        $products = Product::where('category_id', $category->id)->paginate(16);



        return view('products.index', compact('categories', 'products', 'category', 'product', 'res'));
    }

    public function showProduct(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
