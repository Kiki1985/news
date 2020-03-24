<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subscriber;
use App\Mail\SubscriberRegistrated;

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
        \Mail::to($subscriber->email)->send(
        	new SubscriberRegistrated($subscriber)
        );
        return back();
    }
}
