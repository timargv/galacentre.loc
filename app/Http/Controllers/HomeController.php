<?php

namespace App\Http\Controllers;


use App\Entity\Products\Category;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::where('status', '=', 'Y')->whereIsRoot()->defaultOrder()->getModels();
        return view('home', compact('categories'));
    }
}
