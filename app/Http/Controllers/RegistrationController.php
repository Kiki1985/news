<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $email = $request->email;
        
        if (User::where('email', $email)->exists()) {
            return redirect()->back()->with('message', 'The email address is already registrated.');
        } else {
            request()->validate([
                'firstName' => 'required|min:3|max:25',
                'lastName' => 'required|min:3|max:25',
                'email' => 'required|email|min:3|max:25',
                'password' => 'required|confirmed|min:3|max:25'
            ]);
            $user = User::create([
                'fName' => request('firstName'),
                'lName' => request('lastName'),
                'email' => request('email'),
                'password' => bcrypt(request('password'))
            ]);
            auth()->login($user);
            session()->flash("message", "Thanks for Signing up");
            return redirect('/articles/create');
        }
    }
}
