<?php

namespace App\Http\Controllers\Admin\Products;

use App\Entity\Products\Category;
use App\Entity\Products\Product\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    //=================================
    public function index(Request $request, Category $category)
    {


        $categories = Category::defaultOrder();

        $query = $categories;

        if (!empty($value = $request->get('name_original'))) {
            $query->where('name_original', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('name'))) {
            $query = $category->orderByDesc('name');
        }

        if (!empty($value = $request->get('category_id'))) {
            $query->where('id', $value);
        }

        $categories = $query->withDepth()->paginate(50);

        return view('admin.products.categories.index', compact('categories'));
    }


    //=================================
    public function create()
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.products.categories.create', compact('parents'));
    }


    //=================================
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'parent' => 'nullable|integer|exists:product_categories,id',
        ]);

        $category = Category::create([
            'name' => $request['name'],
            'slug' => str_slug($request->name_original),

            'name_original' => $request['name_original'],
            'name_h1'       => $request['name_h1'],
            'name_menu'     => $request['name_menu'],
            'description'   => $request['description'],
            'status'        => $request['status'],
            'code'          => $request['code'],
            'count'         => $request['count'],
            'image'         => $request['image'],
            'date'          => $request['date'],
            'icon'          => $request['icon'],

            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.products.categories.show', $category);
    }


    //=================================
    public function show(Category $category)
    {
        $categories = Category::where('parent_id', $category->id)->defaultOrder()->get();
        $products = Product::where('category_id', $category->id)->paginate(15);
        return view('admin.products.categories.show', compact('category', 'categories', 'products'));
    }


    //=================================
    public function edit(Category $category)
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.products.categories.edit', compact('category', 'parents'));
    }


    //=================================
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'parent' => 'nullable|integer|exists:product_categories,id',
        ]);

        $category->update([
            'name' => $request['name'],
            'slug' => $request['slug'],

            'name_original' => $request['name_original'],
            'name_h1'       => $request['name_h1'],
            'name_menu'     => $request['name_menu'],
            'description'   => $request['description'],
            'status'        => $request['status'],
            'code'          => $request['code'],
            'count'         => $request['count'],
            'image'         => $request['image'],
            'date'          => $request['date'],
            'icon'          => $request['icon'],

            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.products.categories.show', $category);
    }


    //=================================
    public function first(Category $category)
    {
        if ($first = $category->siblings()->defaultOrder()->first()) {
            $category->insertBeforeNode($first);
        }
        return redirect()->back();
    }


    //=================================
    public function up(Category $category)
    {
        $category->up();
        return redirect()->back();
    }


    //=================================
    public function down(Category $category)
    {
        $category->down();
        return redirect()->back();
    }


    //=================================
    public function last(Category $category)
    {
        if ($last = $category->siblings()->defaultOrder('desc')->first()) {
            $category->insertAfterNode($last);
        }
        return redirect()->back();
    }


    //=================================
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.products.categories.index');
    }
}
