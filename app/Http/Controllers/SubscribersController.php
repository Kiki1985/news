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
      if ($email == null){
        $msg = 'Please insert Your E-mail.';
        return response()->json(array($msg), 200);
      }
       
        if (Subscriber::where('email', $email)->exists()) {
            $msg = 'Email adress is already  registered.';
            return response()->json(array($msg), 200);
        } 
            $msg = 'Thank You for subscribing!';
            Subscriber::create(request()->validate([
                'email' => 'required|min:3|max:25'
            ]));
        
            return response()->json(array($msg), 200);
    }
}
