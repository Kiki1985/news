<?php

namespace App\Http\Controllers;

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

            request()->validate([
                'fName' => 'required|min:3|max:25',
                'lName' => 'required|min:3|max:25',
                'email' => 'required|email|min:3|max:25',
                'password' => 'required|confirmed|min:3|max:25'
                ]);
                    
            $user = User::create([
                'fName' => request('fName'),
                'lName' => request('lName'),
                'email' => request('email'),
                'image' =>'noUser.png',
                'password' => bcrypt(request('password'))
            ]);

            if($request->hasFile('image')){
                request()->validate([
                    'image' => 'file|image|max:5000'
            ]);
                    
            $filename = request()->image->getClientOriginalName();
            request()->image->storeAs('images', $filename, 'public');
            $user->update([
                'image' => $filename
            ]);
            } 
            
            auth()->login($user);
            
            session()->flash("message", "Thanks for Signing up");

            return redirect(session('link'));
        }
    }

    public function edit(User $user)
    {
        abort_unless(auth()->user()->id == $user->id, 403);
        return view('registration.edit', compact('user'));
    }

    public function update(User $user)
    {
        abort_unless(auth()->user()->id == $user->id, 403);
        request()->validate([
                'fName' => 'required|min:3|max:25',
                'lName' => 'required|min:3|max:25',
                'email' => 'required|email|min:3|max:25',
                'password' => 'required|confirmed|min:3|max:25'
                ]);
        $user->update([
                'fName' => request('fName'),
                'lName' => request('lName'),
                'password' => bcrypt(request('password')),
                'email' => request('email'),
                'image' => 'noUser.png',
            ]);

        if(request()->hasFile('image')){
            request()->validate([
            'image' => 'file|image|max:5000'
            ]);
                    
            $filename = request()->image->getClientOriginalName();
            request()->image->storeAs('images', $filename, 'public');
            $user->update([
                'image' => $filename
            ]);
        }

        return redirect("/");
    }

    public function destroy(User $user)
    {
        abort_unless(auth()->user()->id == $user->id, 403);
        $user->delete();
        return redirect('/');
    }
}
