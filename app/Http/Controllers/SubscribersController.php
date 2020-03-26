<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subscriber;

//use App\Events\SubscriberRegistrated;

class SubscribersController extends Controller
{
    public function create()
    {
        return view('subscribe');
    }

    public function store()
    {
        $subscriber = Subscriber::create(request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3']
        ]));

        //event(new SubscriberRegistrated($subscriber));
        return "You are now subscribed.";
    }
}
