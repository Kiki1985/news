<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subscriber;

use App\Notifications\SubscriberRegistrated;

class SubscribersController extends Controller
{
    public function create()
    {
        return view('subscribers');
    }

    public function store()
    {
        $subscriber = Subscriber::create(request()->validate([
            'name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'min:3', 'max:25']
        ]));
        return back()->with('message','Thank You for subscribing!');
    }
}
