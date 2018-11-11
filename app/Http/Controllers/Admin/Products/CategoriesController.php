<?php

namespace App\Http\Controllers\Admin\Products;

use App\Entity\Products\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    //=================================
    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->get();
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
            'slug' => 'required|string|max:255',
            'parent' => 'nullable|integer|exists:product_categories,id',
        ]);

        $category = Category::create([
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
    public function show(Category $category)
    {
        return view('admin.products.categories.show', compact('category'));
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
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.products.categories.index');
    }
}
