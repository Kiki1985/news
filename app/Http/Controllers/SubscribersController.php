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
        $email = $request->input('email');
      
        if ($email == null) {
            $msg = 'Please insert Your E-mail.';
            if (request()->ajax()) {
                return ($msg);
            } else {
                session()->flash("msg", $msg);
                return back();
            }
        }
       
        if (Subscriber::where('email', $email)->exists()) {
            $msg = 'Email adress is already  registered.';
            if (request()->ajax()) {
                return ($msg);
            } else {
                session()->flash("msg", $msg);
                return back();
            }
        } else {
            $msg = 'Thank You for subscribing!';
            Subscriber::create(request()->validate([
                'email' => 'required|min:3|max:25'
            ]));
            if (request()->ajax()) {
                return ($msg);
            } else {
                session()->flash("msg", $msg);
                return back();
            }
        }
    }
}
