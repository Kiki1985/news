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
        Subscriber::create([
            'name' => request('name'),
            'email' => request('email')
        ]);
        return back();
    }
}
