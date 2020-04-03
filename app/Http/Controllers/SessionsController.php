<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' =>'destroy']);
    }

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

        return redirect('authors')->with('message','You have successfully logged out!');
    }
}
