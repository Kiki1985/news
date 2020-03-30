<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
    	return view('sessions.create');
    }

    public function store()
    {
    	if(! auth()->attempt(request(['fName', 'lName', 'password'])))
    	{
    		return back()->with('message','Please check your credentials and try again.');

    	}return redirect('authors/articles/create');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('authors');
    }
}
