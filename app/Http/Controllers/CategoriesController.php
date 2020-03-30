<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
    	$categories = Category::all();
        return view('categories.show', compact('categories', 'category'));
    }
}
