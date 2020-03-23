<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subscriber;

class SubscribersController extends Controller
{
    public function create()
    {
        return view('subscribe');
    }

    public function store()
    {
        Subscriber::create(request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3']
        ]));
        return back();
    }
}
