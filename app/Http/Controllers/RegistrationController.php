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

    public function store()
    {
        $user = User::create([request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
            'password' => ['required', 'min:3']
        ]));
        auth()->login($user);
        return redirect('author/article/create');
    }
}
