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

    public function store(Request $request)
    {
        $email = $request->email;
        if (Subscriber::where('email', $email)->exists()) {
            return redirect()->back()->with('message', 'The email address is already registrated.');
        } else {
            $subscriber = Subscriber::create(request()->validate([
                'email' => 'required|min:3|max:25'
            ]));
        }
        return back()->with('message', 'Thank You for subscribing!');
    }
}
