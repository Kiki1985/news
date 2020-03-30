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
        $this->validate(request(), [
            'firstName' => 'required|min:3|max:25',
            'lastName' => 'required|min:3|max:25',
            'email' => 'required|min:3|max:25',
            'password' => 'required|min:3|max:25'
        ]);
        $user = User::create([
            'fName' => request('firstName'),
            'lName' => request('lastName'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        auth()->login($user);
        return redirect('authors/articles/create');
    }
}
