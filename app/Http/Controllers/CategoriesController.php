<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoriesController extends Controller
{
    public function index(Category $category)
    {
    	$articles = $category->articles;
    	$category = $category->name;
    	return view('index', compact('articles', 'category'));
    }
}
