<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['edit', 'update', 'destroy']]);
    }
    
    public function create()
    {
        session(['link' => url()->previous()]);
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $email = $request->email;
        
        if (User::where('email', $email)->exists()) {
            return redirect()->back()->with('message', 'The email address is already registrated.');
        } else {
            $user = User::addUser($this->validateArticle());
            auth()->login($user);
            session()->flash("message", "Thanks for Signing up");
            return redirect(session('link'));
        }
    }

    public function edit(User $user)
    {
        abort_unless(auth()->user(), 403);
        abort_unless(auth()->user()->id == $user->id, 403);
        return view('registration.edit', compact('user'));
    }

    public function update(User $user)
    {
        abort_unless(auth()->user()->id == $user->id, 403);
        $user->edit($this->validateArticle());
        return redirect("/");
    }

    public function destroy(User $user)
    {
        abort_unless(auth()->user()->id == $user->id, 403);
        User::deleteOldUsersImage();
        User::deleteOldUsersArticlesImage();
        $user->delete();
        return redirect('/');
    }

    protected function validateArticle()
    {
        return request()->validate([
            'fName' => 'required|min:3|max:25',
            'lName' => 'required|min:3|max:25',
            'email' => 'required|email|min:3|max:25',
            'password' => 'required|confirmed|min:3|max:25',
            'image' => 'sometimes|file|image|max:5000'
            ]);
    }
}
