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
        session(['link' => url()->previous()]);
        return view('sessions.create');
    }

    public function store()
    {
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->with('message', 'Please check your credentials and try again.');
        }
        return redirect(session('link'));
    }
    public function destroy()
    {
        auth()->logout();
        session(['link' => url()->previous()]);
        return redirect(session('link'));
    }
}
