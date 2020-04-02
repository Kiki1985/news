<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoriesController extends Controller
{
    public function index(Category $category)
    {
    	$categories = Category::has('articles')->pluck('name');
    	$articles = $category->articles;

    	return view('index', compact('articles', 'categories'));
    }
}
