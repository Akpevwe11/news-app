<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
     public function create() {
         return view('sessions.create');
     }

     public function store() {
         // validate the request

         $attributes = request()->validate([
             'email' => 'required|exists:users,email',
             'password' => 'required'
         ]);

        // attempt to authenticate and log in the user
        //based on the provided credentails

         if(auth()->attempt($attributes)) {

            // redirect with a success flash message

            return redirect('/')->with('success', 'Welcome Back!');
         }

         // auth failed.

         return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }


    public function destroy() {

       auth()->logout();

       return redirect('/')->with('success', 'Goodbye');

    }
}
