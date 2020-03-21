<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class CategoriesController extends Controller
{
    public function show()
	{
		$category = request('category');
		$articles = Article::where('category', $category)->orderBy('created_at', 'desc')->get();
		return view('category.show', compact('category', 'articles'));
	}
}
