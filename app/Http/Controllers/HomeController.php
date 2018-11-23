<?php

namespace App\Http\Controllers;


use App\Entity\Products\Category;
use App\Entity\Products\Product\Product;
use App\Events\SearchEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public $results;

    //----------------------------------
    public function index(Category $category)
    {
        $categories = Category::where('status', '=', 'Y')->whereIsRoot()->defaultOrder()->getModels();
        return view('home', compact('categories'));
    }


    //----------------------------------
    public function show(Category $category, Product $product)
    {
        $query = $category ? $category->children()->where('status', '=', 'Y') : Category::whereIsRoot();
        $categories = $query->defaultOrder()->getModels();
        $categoryProducts = $category->descendantsOf($category->id)->count();

        $categoryIds = $category->descendants()->pluck('id');

        $products = Product::where('category_id', $category->id)->paginate(16);

        if (count($products) == 0) {
            $products = Product::whereIn('category_id', $categoryIds)->paginate(16);
        }

        return view('products.index', compact('categories', 'products', 'category', 'product'));
    }


    //----------------------------------
    public function showProduct(Product $product)
    {
        return view('products.show', compact('product'));
    }


    //----------------------------------
    public function search(Request $request, Category $category)
    {
//        $q = $request->input('q');
//        $max_page = 16;
//        if (empty($q)) {
//            $products = Product::where('category_id', $category->id)->paginate($max_page);
//        } else {
//            $products = $this->searchProduct($q, $max_page);
//
//        }
        $value = $request->get('q');

        if(trim($request->get('q'))) {
            $products = Product::where('name_original', 'like', '%' . $value . '%')
                ->orWhere('article', 'like', '%' . $value . '%')->get();

//        event(new SearchEvent($products));

            return response()->json($products);
        } else {

        $max_page = 16;
        $products = Product::where('category_id', $category->id)->paginate($max_page);
        $query = Product::orderByDesc('date_update');

        if (!empty($value = $request->get('q'))) {
            $query->where('name_original', 'like', '%' . $value . '%')
                ->orWhere('article', $value);
        }

//        return Product::where('name_original', 'like', '%' . $value . '%')
//                ->orWhere('article', $value)->get();

        return view('products.index', compact('products', 'queryCount'));
        }
    }


    //----------------------------------
    public function searchProduct($q, $count){
        $query = mb_strtolower($q, 'UTF-8');
        $arr = explode(" ", $query); //разбивает строку на массив по разделителю
        /*
         * Для каждого элемента массива (или только для одного) добавляет в конце звездочку,
         * что позволяет включить в поиск слова с любым окончанием.
         * Длинные фразы, функция mb_substr() обрезает на 1-3 символа.
         */
        $query = [];
        foreach ($arr as $word)
        {
            $len = mb_strlen($word, 'UTF-8');
            switch (true)
            {
                case ($len <= 3):
                {
                    $query[] = $word . "*";
                    break;
                }
                case ($len > 3 && $len <= 6):
                {
                    $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                    break;
                }
                case ($len > 6 && $len <= 9):
                {
                    $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                    break;
                }
                case ($len > 9):
                {
                    $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                    break;
                }
                default:
                {
                    break;
                }
            }
        }
        $query = array_unique($query, SORT_STRING);
        $qQeury = implode(" ", $query); //объединяет массив в строку
        // Таблица для поиска
        $products = Product::whereRaw("MATCH(name_original,article) AGAINST(? IN BOOLEAN MODE)", // name,email - поля, по которым нужно искать
            $qQeury)->paginate($count) ;
        return $products;
    }
}
