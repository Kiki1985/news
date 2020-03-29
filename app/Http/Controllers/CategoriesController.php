<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\Category;

class CategoriesController extends Controller
{
    public function show($category)
    {
    	$categories = Category::all();
        //$articles = Article::where('category', $category)->orderBy('created_at', 'desc')->get();
        $articles = Article::category($category);
        return view('categories.show', compact('category', 'articles', 'categories'));
    }
}
