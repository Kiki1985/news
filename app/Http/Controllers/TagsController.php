<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
    	$tags = Tag::all();
    	$articles = $tag->articles;

    	return view('index', compact('articles', 'tags'));
    }
}
