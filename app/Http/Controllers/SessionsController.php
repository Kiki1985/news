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
    	if(! auth()->attempt(request(['name', 'password'])))
    	{
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'
    		]);
    	}return redirect('author/article/create');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('author');
    }
}
