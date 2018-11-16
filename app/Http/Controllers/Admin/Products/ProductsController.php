<?php

namespace App\Http\Controllers\Admin\Products;

use App\Entity\Products\Product\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {


        $query = Product::orderByDesc('date_update');

        if (!empty($value = $request->get('name'))) {
            $query->where('name_original', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('article'))) {
            $query->where('article', $value);
        }

        $products = $query->paginate(20);

//        $getCount = new Product();
//
//        if ($value = $getCount->countProductGalaCentre() > $products) {
//            $countNewProducts = $value - $products;
//
//        } else {
//            $countNewProducts = 'Новых товаров нет';
//        }


//
//        $countNewProducts = $getCount->countProductGalaCentre();
//
//
//        if ($countNewProducts > count($products)) {
//            $result = 'Есть новые товары - '. $countNewProducts - count($products);
//        } else {
//            $result = 'Новых товарон нет';
//        }

        return view('admin.products.products.index', compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Product $product)
    {
        //
        return view('admin.products.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
